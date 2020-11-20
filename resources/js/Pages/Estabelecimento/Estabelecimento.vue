<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Informações do Estabelecimento
      </h2>
    </template>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
      <estabelecimento-informacoes
        :estabelecimento="estabelecimento || undefined"
      ></estabelecimento-informacoes>
      <jet-section-border />
      <estabelecimento-localizacao
        class="mt-10"
        :localizacao="estabelecimento || undefined"
      ></estabelecimento-localizacao>
      <jet-section-border />
      <estabelecimento-contato
        class="mt-10"
        :contatos="estabelecimento ? estabelecimento.contatos : undefined"
      ></estabelecimento-contato>
      <jet-section-border />
      <estabelecimento-dias-atendimento
        class="mt-10"
        :diasAtendimento="
          estabelecimento ? estabelecimento.dias_atendimento : undefined
        "
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
    estabelecimento: Object,
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