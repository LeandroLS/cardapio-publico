<template>
  <app-layout>
    <div>
      <div class="container">
        <form @submit.prevent="store()">
          <label for="">Nome do Estabelecimento</label>
          <jet-input v-model="estabelecimentoData.nome"></jet-input>
          <label for="">Descrição do Estabelecimento</label>
          <jet-input v-model="estabelecimentoData.descricao"></jet-input>
          <jet-button>Salvar</jet-button>
        </form>
        <estabelecimento-localizacao :municipios="municipios"></estabelecimento-localizacao>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "../Layouts/AppLayout";
import JetButton from "../Jetstream/Button";
import JetInput from "../Jetstream/Input";
import EstabelecimentoLocalizacao from './EstabelecimentoLocalizacao';

export default {
  components: {
    AppLayout,
    JetButton,
    JetInput,
    EstabelecimentoLocalizacao
  },

  props: {
    estabelecimento: {
      type: Object,
      default: null,
    },
    municipios: {
      type: Array
    }
  },

  data() {
    return {
      estabelecimentoData: {},
    };
  },

  created() {
    if (!this.estabelecimento) {
      this.estabelecimentoData = { nome: "", descricao: "" };
    } else {
      this.estabelecimentoData = this.estabelecimento;
    }
  },
  methods: {
    store() {
      this.$inertia.post("/estabelecimento", this.estabelecimentoData, {
        preserveScroll: true,
      });
    },
  },
};
</script>