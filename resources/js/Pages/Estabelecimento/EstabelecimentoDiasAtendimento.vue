<template>
  <jet-form-section @submitted="updateDiasAtendimento">
    <template #title> Dias de Atendimento </template>
    <template #description>
      Atualize os dias de atendimento do estabelecimento
    </template>
    <template #form>
      <template v-if="diasAtendimento.length >= 1">
        <template v-for="(dia, index) in diasAtendimento">
          <div
            class="flex items-center border-b border-grey-500 py-2 col-span-6 sm:col-span-6"
            :key="index"
          >
            <input
              type="text"
              class="appearance-none bg-transparent border-none smt-1 block w-full"
              disabled
              :value="dia.dia_semana"
            />
            <input
              type="text"
              class="appearance-none bg-transparent border-none smt-1 block w-full"
              disabled
              :value="dia.abre"
            />
            <input
              type="text"
              class="appearance-none bg-transparent border-none smt-1 block w-full"
              disabled
              :value="dia.fecha"
            />
            <jet-button :type="'button'" @clicked="remove(dia.id)">
              <svg
                class="h-5 w-5"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                />
              </svg>
            </jet-button>
          </div>
        </template>
      </template>
      <div class="col-span-6 sm:col-span-2 mt-3">
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
        <jet-input-error :message="$page.errors.dia_semana" class="mt-2" />
      </div>
      <div class="col-span-6 sm:col-span-2 mt-3">
        <jet-label>Abre às</jet-label>
        <jet-input type="text" v-model="form.abre" />
        <jet-input-error :message="$page.errors.abre" class="mt-2" />
      </div>
      <div class="col-span-6 sm:col-span-2 mt-3">
        <jet-label>Fecha às</jet-label>
        <jet-input type="text" v-model="form.fecha" />
        <jet-input-error :message="$page.errors.fecha" class="mt-2" />
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
          if (Object.keys(this.$form.erros).length == 0) {
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
            this.$toasted.show(
              "Dia de atendimento removido.",
              VueToastedOptions.success
            );
          },
        }
      );
    },
  },
};
</script>
