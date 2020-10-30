<template>
  <jet-form-section>
    <template #title> Dias de Atendimento </template>

    <template #description>
      Atualize os dias de atendimento do estabelecimento
    </template>
    <template #form>
      <template v-if="diasAtendimento.length >= 1">
        <template v-for="(dia, index) in diasAtendimento">
          <input type="text" :value="dia.dia_semana" />
          <input type="text" :value="dia.abre" />
          <input type="text" :value="dia.fecha" />
          <button @click="remove(dia.id)">Remove</button>
        </template>
      </template>

      <div class="col-span-6 sm:col-span-2">
        <select
          class="px-3 py-2 w-full border rounded-md shadow-sm"
          v-model="atendimento.dia_semana"
        >
          <option value="">Selecione</option>
          <option v-for="(dia, index) in diasSemana" :key="index">
            {{ dia }}
          </option>
        </select>
      </div>

      <div class="col-span-6 sm:col-span-2">
        <jet-input type="text" v-model="atendimento.abre" />
      </div>
      <div class="col-span-6 sm:col-span-2">
        <jet-input type="text" v-model="atendimento.fecha" />
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
  props: {
    diasAtendimento: {
      type: Array,
      default: function () {
        return [];
      },
    },
  },
  components: {
    JetFormSection,
    JetInput,
    JetLabel,
    JetButton,
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
      this.$inertia.post(
        "/estabelecimento/horario-atendimento",
        this.atendimento,
        {
          preserveScroll: true,
        }
      );
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
