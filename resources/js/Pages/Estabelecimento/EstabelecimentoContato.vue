<template>
  <jet-form-section>
    <template #title> Informações de Contato </template>

    <template #description> Atualize as informações de contato </template>

    <template #form>
      <template v-if="contatos.length >= 1">
        <template v-for="(contato, index) in contatos" >
          <div class="col-span-6 sm:col-span-2">
            <jet-input
              type="text"
              class="mt-1 block w-full"
              :value="contato.contato"
              :disabled="true"
            />
          </div>
          <div class="col-span-6 sm:col-span-2">
            <jet-input
              type="text"
              class="mt-1 block w-full"
              :value="contato.tipo_contato"
              :disabled="true"
            />
          </div>
          <div class="col-span-6 sm:col-span-2">
            <jet-button @click="remove(contato.id)"> Remover </jet-button>
          </div>
        </template>
      </template>
      <div class="col-span-6 sm:col-span-3">
        <select
          class="px-3 py-2 w-full border rounded-md shadow-sm"
          v-model="contato.tipo_contato"
        >
          <option value="" selected>Selecione</option>
          <option v-for="(tipo, index) in tiposContato" :key="index">
            {{ tipo }}
          </option>
        </select>
      </div>
      <div class="col-span-6 sm:col-span-3">
        <jet-input type="text" v-model="contato.contato" />
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

export default {
  components: {
    JetFormSection,
    JetInput,
    JetLabel,
    JetButton,
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
