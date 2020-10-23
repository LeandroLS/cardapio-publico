<template>
  <div class="w-full">
    <div v-if="diasAtendimento.length >= 1">
      <div v-for="(dia, index) in diasAtendimento" :key="index">
        <input type="text" :value="dia.dia_semana" />
        <input type="text" :value="dia.abre" />
        <input type="text" :value="dia.fecha" />
        <button @click="remove(dia.id)">Remove</button>
      </div>
    </div>
    <form
      @submit.prevent="store()"
      class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
    >
      <select v-model="atendimento.dia_semana">
        <option value="">Selecione</option>
        <option v-for="(dia, index) in diasSemana" :key="index">
          {{ dia }}
        </option>
      </select>
      <input type="text" v-model="atendimento.abre" />
      <input type="text" v-model="atendimento.fecha" />
      <button type="submit">Add</button>
    </form>
  </div>
</template>
<script>
export default {
  props: {
    diasAtendimento: {
      type: Array,
      default: function() {
        return [];
      },
    },
  },

  data() {
    return {
      atendimento: {
        dia_semana: null,
        abre: null,
        fecha: null,
      },
      diasSemana: [
        "Segunda-feira",
        "Terça-feira",
        "Quarda-feira",
        "Quinta-feira",
        "Sexta-feira",
        "Sábado",
        "Domingo",
        "Segunda a Sexta",
        "Segunda a Sábado",
        "Todos os dias",
      ],
    };
  },
  methods: {
    store() {
      this.$inertia.post("/estabelecimento/horario-atendimento", this.atendimento, {
        preserveScroll: true,
      });
    },
    remove(id) {
      this.$inertia.post(
        "/estabelecimento/horario-atendimento/destroy",
        { id: id },
        {
          preserveScroll: true,
        }
      );
    },
  },
};
</script>
