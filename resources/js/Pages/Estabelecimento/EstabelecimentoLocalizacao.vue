<template>
  <jet-form-section @submitted="updateEstabelecimentoLocalizacao">
    <template #title> Localização </template>
    <template #description>
      Informe a localização do seu estabelecimento
    </template>
    <template #form>
      <div class="col-span-6 sm:col-span-4">
        <jet-label value="CEP" />
        <jet-input v-mask="'#####-###'" v-model="localizacao.cep" />
      </div>
      <div class="col-span-6 sm:col-span-4">
        <jet-label value="Endereço" />
        <jet-input v-model="localizacao.endereco" />
      </div>
      <div class="col-span-6 sm:col-span-4">
        <jet-label value="Número" />
        <jet-input v-model="localizacao.numero" />
      </div>
      <div class="col-span-6 sm:col-span-4">
        <jet-label value="Bairro" />
        <jet-input v-model="localizacao.bairro" />
      </div>
      <div class="col-span-6 sm:col-span-4">
        <jet-label value="Cidade" />
        <v-select
          @search="getMunicipios"
          v-model="municipios[0]"
          :options="municipios"
          :get-option-label="
            (municipios) => municipios.nome + ' - ' + municipios.estado.uf
          "
        >
          <span slot="no-options">Digite 3 ou mais caracteres. </span></v-select
        >
      </div>
    </template>
    <template #actions>
      <jet-button> Salvar </jet-button>
    </template>
  </jet-form-section>
</template>
<script>
import JetFormSection from "./../../Jetstream/FormSection";
import JetButton from "../../Jetstream/Button";
import JetInput from "./../../Jetstream/Input";
import JetLabel from "./../../Jetstream/Label";
import { mask } from "vue-the-mask";
import vSelect from "vue-select";
import "vue-select/dist/vue-select.css";
import VueToastedOptions from "../../Modules/vue-toasted-options";
export default {
  components: {
    JetButton,
    vSelect,
    JetFormSection,
    JetInput,
    JetLabel,
  },
  directives: { mask },
  data() {
    return {
      municipios: [],
    };
  },
  props: {
    localizacao: {
      type: Object,
      default() {
        return {
          cep: "",
          endereco: "",
          numero: "",
          bairro: "",
          codigo_ibge: "",
        };
      },
    },
  },
  methods: {
    updateEstabelecimentoLocalizacao() {
      this.localizacao.codigo_ibge = this.municipios[0].codigo_ibge;
      this.$inertia.post("/estabelecimento", this.localizacao, {
        preserveScroll: true,
        onSuccess: (page) => {
          this.$toasted.show("Informações Salvas.", VueToastedOptions.success);
        },
      });
    },
    async getMunicipios(text, loading) {
      if (text.length >= 3) {
        loading(true);
        await axios.get(`/municipio?nome=${text}`).then((res) => {
          this.municipios = res.data;
          loading(false);
        });
      }
    },
    async getMunicipioByCodIBGE(cod) {
      await axios
        .get(`/municipio?codigo_ibge=${cod}`)
        .then((res) => (this.municipios = res.data));
    },
    async getCep(cep) {
      const resposta = await axios.get(`https://viacep.com.br/ws/${cep}/json/`);
      return resposta;
    },
  },

  watch: {
    "localizacao.cep": async function (newLocalizacao, oldLocalizacao) {
      if (newLocalizacao.length == 9) {
        this.getCep(newLocalizacao).then((res) => {
          if (res.data.erro) {
            this.$toasted.show("CEP não encontrado.", VueToastedOptions.danger);
          } else {
            this.localizacao.cep = res.data.cep;
            this.localizacao.endereco = res.data.logradouro;
            this.localizacao.bairro = res.data.bairro;
            this.localizacao.codigo_ibge = res.data.codigo_ibge;
            this.getMunicipioByCodIBGE(res.data.ibge);
          }
        });
      }
    },
  },
  created() {
    if (this.localizacao.codigo_ibge) {
      this.getMunicipioByCodIBGE(this.localizacao.codigo_ibge);
    }
  },
};
</script>