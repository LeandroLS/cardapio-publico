<template>
  <form @submit.prevent="storeEstabelecimento()">
    <div class="w-full">
      <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <div class="mb-4">
          <label
            class="block text-gray-700 text-sm font-bold mb-2"
            for="username"
          >
            CEP
          </label>
          <input
            v-mask="'#####-###'"
            v-model="localizacaoData.cep"
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
            v-model="viaCepResponse.logradouro"
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
            v-model="viaCepResponse.bairro"
            class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
            id="password"
          />
          <label
            class="block text-gray-700 text-sm font-bold mb-2"
            for="password"
          >
            Cidade
          </label>
            <v-select @search="getMunicipios" label="nome" v-model="municipioSelected" :options="municipios" :get-option-label="municipios => municipios.nome + ' - ' + municipios.estado.uf" :reduce="nome => nome.codigo_ibge">  <span slot="no-options">Digite 3 ou mais caracteres. </span></v-select>

          <!-- <input
            v-model="viaCepResponse.localidade"
            class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
            id="password"
          /> -->
        </div>
        <jet-button>Salvar</jet-button>
      </form>
    </div>
  </form>
</template>
<script>
import { mask } from "vue-the-mask";
import JetButton from "../Jetstream/Button";
import vSelect from "vue-select";
import "vue-select/dist/vue-select.css";
export default {
  components: {
    JetButton,
    vSelect,
  },
  directives: { mask },
  methods: {
    async getMunicipios(text, loading){
        if(text.length >= 3){
            loading(true);
            await axios.get(`/municipio?nome=${text}`).then(res => {
                this.municipios = res.data;
                loading(false);
            });
        }
    },
    async getMunicipioByCodIBGE(cod){
        await axios.get(`/municipio?codigo_ibge=${cod}`).then(res => this.municipioSelected = res.data);
    },
    async getCep(cep) {
      const resposta = await axios.get(`https://viacep.com.br/ws/${cep}/json/`);
      return resposta;
    },
  },
  data() {
    return {
      localizacaoData: {
        cep: "",
      },
      viaCepResponse: {},
      municipios: [],
      municipioSelected: ''
    };
  },
  watch: {
    "localizacaoData.cep": async function (newLocalizacao, oldLocalizacao) {
      if (newLocalizacao.length == 9) {
        this.getCep(newLocalizacao).then((res) => {
          this.viaCepResponse = res.data;
          this.getMunicipioByCodIBGE(res.data.ibge);
        });
      }
    },
  },
};
</script>