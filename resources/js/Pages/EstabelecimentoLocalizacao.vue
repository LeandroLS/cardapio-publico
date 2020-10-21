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
          <input
            v-model="viaCepResponse.localidade"
            class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
            id="password"
          />
        </div>
        <jet-button>Salvar</jet-button>
        <v-select label="nome" :options="municipios" :get-option-label="municipio => municipio.nome + ' - ' + municipio.estado.uf" :reduce="nome => nome.codigo_ibge"></v-select>
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
  props: {
    municipios: {
        type: Array
    },
  },
  components: {
    JetButton,
    vSelect,
  },
  directives: { mask },
  methods: {
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
    };
  },
  watch: {
    "localizacaoData.cep": async function (newLocalizacao, oldLocalizacao) {
      if (newLocalizacao.length == 9) {
        this.getCep(newLocalizacao).then((res) => {
          this.viaCepResponse = res.data;
        });
      }
    },
  },
};
</script>