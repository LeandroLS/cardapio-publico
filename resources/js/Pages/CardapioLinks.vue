<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Compartilhar Cardápio
      </h2>
    </template>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
      <jet-form-section>
        <template #title> QR-Code do Cardápio </template>
        <template #description>
          Escanear o QR-Code retorna o link para acesso ao cardápio.
        </template>
        <template #form>
          <img :src="linkQrCode" alt="" />
        </template>
        <template #actions>
          <jet-button> Imprimir </jet-button>
        </template>
      </jet-form-section>
      <jet-section-border />
      <jet-form-section>
        <template #title> Link do cardápio </template>
        <template #description>
          Com o link do cardápio qualquer um pode visualizar o cadápio do seu
          estabelecimento
        </template>
        <template #form>
          <label for=""
            ><a :href="route('cardapio.publico', {'cardapiourl' : cardapio_url})">{{ cardapio_url }}</a></label
          >
        </template>
        <template #actions>
          <jet-button> Copiar </jet-button>
        </template>
      </jet-form-section>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "./../Layouts/AppLayout";
import JetFormSection from "./../Jetstream/FormSection";
import JetButton from "./../Jetstream/Button";
import JetInput from "./../Jetstream/Input";
import JetSectionBorder from "./../Jetstream/SectionBorder";
import JetLabel from "./../Jetstream/Label";

export default {
  components: {
    AppLayout,
    JetFormSection,
    JetButton,
    JetInput,
    JetSectionBorder,
  },
  props: {
    errors: Object,
    cardapio_url: String,
  },
  data() {
    return {
      linkQrCode: null,
    };
  },
  created() {
    this.linkQrCode =
      "https://chart.googleapis.com/chart?chs=300x300&cht=qr& chl=" +
      this.cardapio_url;
  },
};
</script>
