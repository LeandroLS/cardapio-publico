<template>
  <div class="w-full">
    <div v-if="contatos.length >= 1">
      <div v-for="(contato, index) in contatos" :key="index">
        <input type="text" :value="contato.contato" />
        <input type="text" :value="contato.tipo_contato" />
        <button @click="remove(contato.id)">Remove</button>
      </div>
    </div>
    <form
      @submit.prevent="store()"
      class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
    >
      <select name="tipo_contato" v-model="contato.tipo_contato">
        <option value="">Selecione</option>
        <option v-for="(tipo, index) in tiposContato" :key="index">
          {{ tipo }}
        </option>
      </select>
      <input
        type="text"
        v-model="contato.contato"
        placeholder="Ex: 11 99999-9999"
      />
      <button type="submit">Add</button>
    </form>
  </div>
</template>
<script>
export default {
  props: {
    contatos: {
      type: Array,
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
