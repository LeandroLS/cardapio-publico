<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Informações do Estabelecimento
      </h2>
    </template>
    <div>
      <div class="container">
        <form @submit.prevent="store()" enctype="multipart/form-data">
          <label for="">Imagem</label>
          <input type="file" name="logo">
          <input type="text" required v-model="estabelecimento.nome" />
          <label for="">Nome do Estabelecimento</label>
          <input type="text" required v-model="estabelecimento.nome" />
          <div v-if="errors.nome">{{ errors.nome }}</div>
          <label for="">Descrição do Estabelecimento</label>
          <jet-input v-model="estabelecimento.descricao"></jet-input>
          <jet-button>Salvar</jet-button>
        </form>
        <estabelecimento-localizacao
          :localizacao="estabelecimento"
        ></estabelecimento-localizacao>
        <estabelecimento-contato
          :contatos="estabelecimento.contatos"
        ></estabelecimento-contato>
        <estabelecimento-dias-atendimento :diasAtendimento="estabelecimento.dias_atendimento"></estabelecimento-dias-atendimento>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "../../Layouts/AppLayout";
import JetButton from "../../Jetstream/Button";
import JetInput from "../../Jetstream/Input";
import EstabelecimentoLocalizacao from "./EstabelecimentoLocalizacao";
import EstabelecimentoContato from "./EstabelecimentoContato";
import EstabelecimentoDiasAtendimento from "./EstabelecimentoDiasAtendimento";

export default {
  components: {
    AppLayout,
    JetButton,
    JetInput,
    EstabelecimentoLocalizacao,
    EstabelecimentoContato,
    EstabelecimentoDiasAtendimento
  },

  props: {
    errors: Object,
    contatos: [],
    estabelecimento: {
      type: Object,
      default: function () {
        return {
          nome: "",
          descricao: "",
        };
      },
    },
  },

  methods: {
    store() {
      this.$inertia.post("/estabelecimento", this.estabelecimento, {
        preserveScroll: true,
      });
    },
  },
};
</script>