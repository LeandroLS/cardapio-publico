<template>
  <jet-form-section @submitted="updateEstabelecimentoContato">
    <template #title> Informações de Contato </template>

    <template #description> Atualize as informações de contato </template>

    <template #form>
      <template v-if="contatos.length >= 1">
        <template v-for="(contato, index) in contatos">
          <div
            :key="index"
            class="flex items-center border-b border-grey-500 py-2 col-span-6 sm:col-span-6"
          >
            <input
              type="text"
              class="appearance-none bg-transparent border-none smt-1 block w-full"
              disabled
              :value="contato.tipo_contato"
            />

            <input
              type="text"
              class="appearance-none bg-transparent border-none smt-1 block w-full"
              disabled
              :value="contato.contato"
            />

            <jet-button :type="'button'" @clicked="remove(contato.id)">
              del
            </jet-button>
          </div>
        </template>
      </template>
      <div class="col-span-6 sm:col-span-3 mt-3">
        <jet-label>Tipo Contato</jet-label>
        <select
          class="px-3 py-2 w-full border rounded-md shadow-sm"
          v-model="form.tipo_contato"
        >
          <option value="">Selecione</option>
          <option v-for="(tipo, index) in tiposContato" :key="index">
            {{ tipo }}
          </option>
        </select>
        <jet-input-error :message="errors.tipo_contato" class="mt-2" />
      </div>
      <div class="col-span-6 sm:col-span-3 mt-3">
        <jet-label>Contato</jet-label>
        <jet-input
          type="text"
          :placeholder="'Ex: email@email.com.br'"
          v-model="form.contato"
        />
        <jet-input-error :message="errors.contato" class="mt-2" />
      </div>
    </template>
    <template #actions>
      <jet-button> Salvar </jet-button>
    </template>
  </jet-form-section>
</template>
<script>
import JetFormSection from "./../../Jetstream/FormSection";
import JetButton from "../../Jetstream/Button";
import JetInput from "./../../Jetstream/Input";
import JetLabel from "./../../Jetstream/Label";
import VueToastedOptions from "../../Modules/vue-toasted-options";
import JetInputError from "./../../Jetstream/InputError";

export default {
  components: {
    JetFormSection,
    JetInput,
    JetLabel,
    JetButton,
    JetInputError,
  },
  props: {
    contatos: {
      type: Array,
      default: function () {
        return [];
      },
    },
    errors: Object,
  },
  data() {
    return {
      form: this.$inertia.form(
        {
          tipo_contato: "",
          contato: null,
        },
        {
          resetOnSuccess: true,
        }
      ),
      tiposContato: ["e-mail", "telefone", "whatsapp", "celular"],
    };
  },
  methods: {
    updateEstabelecimentoContato() {
      this.form.post("/estabelecimento/contato", {
        preserveScroll: true,
        onSuccess: (page) => {
          if (Object.keys(this.errors).length == 0) {
            this.$toasted.show(
              "Informações Salvas.",
              VueToastedOptions.success
            );
          }
        },
      });
    },
    remove(id) {
      this.$inertia.post(
        "/estabelecimento/contato/destroy",
        { id: id },
        {
          preserveScroll: true,
          onSuccess: (page) => {
            this.$toasted.show(
              "Informação de contato excluída.",
              VueToastedOptions.success
            );
          },
        }
      );
    },
  },
};
</script>
