<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Informações do Estabelecimento
      </h2>
    </template>
    <div>
      <div class="container">
        <estabelecimento-informacoes
          :user="$page.user" :estabelecimento="estabelecimento"
        ></estabelecimento-informacoes>
        <estabelecimento-localizacao
          :localizacao="estabelecimento"
        ></estabelecimento-localizacao>
        <estabelecimento-contato
          :contatos="estabelecimento.contatos"
        ></estabelecimento-contato>
        <estabelecimento-dias-atendimento
          :diasAtendimento="estabelecimento.dias_atendimento"
        ></estabelecimento-dias-atendimento>
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
import EstabelecimentoInformacoes from "./EstabelecimentoInformacoes.vue";

export default {
  components: {
    AppLayout,
    JetButton,
    JetInput,
    EstabelecimentoLocalizacao,
    EstabelecimentoContato,
    EstabelecimentoDiasAtendimento,
    EstabelecimentoInformacoes,
  },

  props: {
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