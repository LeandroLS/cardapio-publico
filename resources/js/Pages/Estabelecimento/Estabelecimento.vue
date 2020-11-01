<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Informações do Estabelecimento
      </h2>
    </template>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
      <estabelecimento-informacoes
        :user="$page.user"
        :estabelecimento="estabelecimento"
        :errors="errors"
      ></estabelecimento-informacoes>
      <jet-section-border />
      <estabelecimento-localizacao
        class="mt-10"
        :localizacao="estabelecimento"
      ></estabelecimento-localizacao>
      <jet-section-border />
      <estabelecimento-contato
        class="mt-10"
        :contatos="estabelecimento.contatos"
      ></estabelecimento-contato>
      <jet-section-border />
      <estabelecimento-dias-atendimento
        class="mt-10"
        :diasAtendimento="estabelecimento.dias_atendimento"
      ></estabelecimento-dias-atendimento>
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
import JetSectionBorder from "./../../Jetstream/SectionBorder";

export default {
  components: {
    AppLayout,
    JetButton,
    JetInput,
    EstabelecimentoLocalizacao,
    EstabelecimentoContato,
    EstabelecimentoDiasAtendimento,
    EstabelecimentoInformacoes,
    JetSectionBorder,
  },

  props: {
    errors: Object,
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