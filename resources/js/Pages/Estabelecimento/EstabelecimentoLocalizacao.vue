<template>
  <div class="w-full">
    <form
      @submit.prevent="store()"
      class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
    >
      <div class="mb-4">
        <label
          class="block text-gray-700 text-sm font-bold mb-2"
          for="username"
        >
          CEP
        </label>
        <input
          v-mask="'#####-###'"
          v-model="localizacao.cep"
          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
          id="username"
          type="text"
          placeholder=""
        />
      </div>
      <div class="mb-6">
        <label
          class="block text-gray-700 text-sm font-bold mb-2"
          for="password"
        >
          Endereço
        </label>
        <input
          v-model="localizacao.endereco"
          class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
          id="password"
        />
        <label
          class="block text-gray-700 text-sm font-bold mb-2"
          for="password"
        >
          Número
        </label>
        <input
          v-model="localizacao.numero"
          class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
          id="password"
        />
        <label
          class="block text-gray-700 text-sm font-bold mb-2"
          for="password"
        >
          Bairro
        </label>
        <input
          v-model="localizacao.bairro"
          class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
          id="password"
        />
        <label
          class="block text-gray-700 text-sm font-bold mb-2"
          for="password"
        >
          Cidade
        </label>
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
      <jet-button>Salvar</jet-button>
    </form>
  </div>
</template>
<script>
import { mask } from "vue-the-mask";
import JetButton from "../../Jetstream/Button";
import vSelect from "vue-select";
import "vue-select/dist/vue-select.css";
export default {
  components: {
    JetButton,
    vSelect,
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
    store() {
      this.localizacao.codigo_ibge = this.municipios[0].codigo_ibge;
      this.$inertia.post("/estabelecimento", this.localizacao, {
        preserveScroll: true,
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
          this.localizacao.cep = res.data.cep;
          this.localizacao.endereco = res.data.logradouro;
          this.localizacao.bairro = res.data.bairro;
          this.localizacao.codigo_ibge = res.data.codigo_ibge;
          this.getMunicipioByCodIBGE(res.data.ibge);
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