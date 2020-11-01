<template>
  <jet-form-section @submitted="updateDiasAtendimento">
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
        <jet-label>Dia Semana</jet-label>
        <select
          class="px-3 py-2 w-full border rounded-md shadow-sm"
          v-model="form.dia_semana"
        >
          <option value="">Selecione</option>
          <option v-for="(dia, index) in diasSemana" :key="index">
            {{ dia }}
          </option>
        </select>
        <jet-input-error :message="form.error('dia_semana')" class="mt-2" />
      </div>
      <div class="col-span-6 sm:col-span-2">
        <jet-label>Abre às</jet-label>
        <jet-input type="text" v-model="form.abre" />
        <jet-input-error :message="form.error('abre')" class="mt-2" />
      </div>
      <div class="col-span-6 sm:col-span-2">
        <jet-label>Fecha às</jet-label>
        <jet-input type="text" v-model="form.fecha" />
        <jet-input-error :message="form.error('fecha')" class="mt-2" />
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
    JetInputError,
  },
  data() {
    return {
      form: this.$inertia.form(
        {
          dia_semana: "",
          abre: null,
          fecha: null,
        },
        {
          resetOnSuccess: true,
        }
      ),
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
    updateDiasAtendimento() {
      this.form.post("/estabelecimento/horario-atendimento", {
        preserveScroll: true,
        onSuccess: (page) => {
          if (!this.form.errors()) {
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
        "/estabelecimento/horario-atendimento/destroy",
        { id: id },
        {
          preserveScroll: true,
          onSuccess: (page) => {
            if (!this.form.errors()) {
              this.$toasted.show(
                "Informações Salvas.",
                VueToastedOptions.success
              );
            }
          },
        }
      );
    },
  },
};
</script>
