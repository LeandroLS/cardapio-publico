<template>
  <jet-form-section>
    <template #title> Informações de Contato </template>

    <template #description> Atualize as informações de contato </template>

    <template #form>
      <div class="col-span-6 sm:col-span-4" v-if="contatos.length >= 1">
        <div v-for="(contato, index) in contatos" :key="index">
          <jet-input
            type="text"
            class="mt-1 block w-full"
            :value="contato.contato"
            :disabled="'true'"
          />
          <jet-input
            type="text"
            class="mt-1 block w-full"
            :value="contato.tipo_contato"
            :disabled="'true'"
          />
          <jet-button @click="remove(contato.id)"> Remover </jet-button>
        </div>

        <select
          class="mt-1 block w-full"
          v-model="contato.tipo_contato"
        >
          <option value="">Selecione</option>
          <option v-for="(tipo, index) in tiposContato" :key="index">
            {{ tipo }}
          </option>
        </select>
        <jet-input
          type="text"
          class="mt-1 block w-full"
          v-model="contato.contato"
        />

        <jet-button> Adicionar </jet-button>

        <!-- Name -->
      </div>
    </template>
  </jet-form-section>
</template>
<script>
import JetFormSection from "./../../Jetstream/FormSection";
import JetButton from "../../Jetstream/Button";
import JetInput from "./../../Jetstream/Input";
import JetLabel from "./../../Jetstream/Label";
import JetDropdown from "./../../Jetstream/Dropdown";

export default {
  components: {
    JetFormSection,
    JetInput,
    JetLabel,
    JetButton,
    JetDropdown,
  },
  props: {
    contatos: {
      type: Array,
      default: function () {
        return [];
      },
    },
  },
  data() {
    return {
      contato: {
        tipo_contato: null,
        contato: null,
      },
      tiposContato: ["e-mail", "telefone", "whatsapp", "celular"],
    };
  },
  methods: {
    store() {
      this.$inertia.post("/estabelecimento/contato", this.contato, {
        preserveScroll: true,
      });
    },
    remove(id) {
      this.$inertia.post(
        "/estabelecimento/contato/destroy",
        { id: id },
        {
          preserveScroll: true,
        }
      );
    },
  },
};
</script>
