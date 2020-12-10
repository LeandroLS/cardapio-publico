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
      <div class="grid gap-4 grid-cols-1 md:grid-cols-3">
        <div class="bg-white rounded-md shadow-lg p-3">
          <div class="text-center border-b border-grey-500 mx-2 mt-2">
            <div class="font-bold text-xl mb-2">Plano Mensal</div>
          </div>
          <div class="font-bold text-xl my-2 p-2 text-center">
            R$ <span class="text-4xl">49</span> /mês
          </div>
          <script
            type="application/javascript"
            src="https://www.mercadopago.com.br/integrations/v1/web-payment-checkout.js"
            :data-preference-id="$page.preferenceMes"
            async
            data-button-label="Assinar"
          ></script>
        </div>
        <div class="bg-white rounded-md shadow-lg p-3">
          <div class="text-center border-b border-grey-500 mx-2 mt-2">
            <div class="font-bold text-xl mb-2">Plano Semestral</div>
          </div>
          <div class="font-bold text-xl my-2 p-2 text-center">
            R$ <span class="text-4xl">39</span> /mês
          </div>
          <script
            type="application/javascript"
            src="https://www.mercadopago.com.br/integrations/v1/web-payment-checkout.js"
            :data-preference-id="$page.preferenceSemestral"
            data-button-label="Assinar"
            async
          ></script>
        </div>
        <div class="bg-white rounded-md shadow-lg p-3">
          <div class="text-center border-b border-grey-500 mx-2 mt-2">
            <div class="font-bold text-xl mb-2">Plano Anual</div>
          </div>
          <div class="font-bold text-xl my-2 p-2 text-center">
            R$ <span class="text-4xl">29</span> /mês
          </div>
          <script
            type="application/javascript"
            src="https://www.mercadopago.com.br/integrations/v1/web-payment-checkout.js"
            :data-preference-id="$page.preferenceAnual"
            async
            data-button-label="Assinar"
          ></script>
        </div>
      </div>
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
    fimAssinatura() {
      return moment(this.$page.assinatura.end_at).format("DD/MM/YYYY");
    },
  },
};
</script>
