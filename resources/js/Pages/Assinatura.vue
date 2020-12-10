<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Assinatura
      </h2>
    </template>
    <div class="container mx-auto mt-5">
      <success-message v-if="$page.assinatura.active">
        <template #title>Você já assinou nosso plano!</template>
        <template #text>Sua assinatura vence em {{ fimAssinatura() }}</template>
      </success-message>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "./../Layouts/AppLayout";
import SuccessMessage from "./../Components/SuccessMessage";
export default {
  components: {
    AppLayout,
    SuccessMessage,
  },
  methods: {
    fimAssinatura(){
      return moment(this.$page.assinatura.end_at).format('DD/MM/YYYY');
    }
  }
};
</script>
