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
          Facilite o acesso do seu cardápio compartilhando o QR Code em
          adesivos, mesas, materiais publicitários e etc.
        </template>
        <template #form>
          <img class="col-start-3 col-span-2" :src="linkQrCode" alt="" />
        </template>
        <template #actions>
          <form :action="route('cardapio.download-qrcode')" method="get">
            <jet-button> Download QR Code </jet-button>
          </form>
        </template>
      </jet-form-section>
      <jet-section-border />
      <jet-form-section>
        <template #title> Link do cardápio </template>
        <template #description>
          Com o link do cardápio qualquer um pode visualizar o cadápio do seu
          estabelecimento.
        </template>
        <template #form>
          <a class="col-span-4" :href="cardapio_url">
            <div
              class="mt-3 flex items-center text-sm font-semibold text-indigo-700"
            >
              <div>
                {{ cardapio_url }}
              </div>

              <div class="ml-1 text-indigo-500">
                <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                  <path
                    fill-rule="evenodd"
                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                    clip-rule="evenodd"
                  ></path>
                </svg>
              </div>
            </div>
          </a>
        </template>
        <template #actions>
          <jet-button
            :type="button"
            v-clipboard:copy="cardapio_url"
            v-clipboard:success="onCopy"
            v-clipboard:error="onError"
          >
            Copiar
          </jet-button>
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
import JetNavLink from "./../Jetstream/NavLink";
import VueToastedOptions from "../Modules/vue-toasted-options";
export default {
  components: {
    AppLayout,
    JetFormSection,
    JetButton,
    JetInput,
    JetSectionBorder,
    JetNavLink,
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
  methods: {
    onCopy: function (e) {
      this.$toasted.show(
        "Link copiado! Agora basta enviar esse link para seus clientes ou compartilhar nas redes sociais.",
        VueToastedOptions.success
      );
    },
    onError: function (e) {
      this.$toasted.show(
        "Não foi possível copiar o link.",
        VueToastedOptions.danger
      );
    },
  },
  created() {
    this.linkQrCode =
      "https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=" +
      this.cardapio_url;
  },
};
</script>
