<template>
  <div class="w-full bg-white">
    <form @submit.prevent="updateCardapioCategoria">
      <div class="rounded-md overflow-hidden shadow-lg">
        <div class="my-3 mx-3 text-center border-b border-grey-500 mx-2 my-2">
          <div class="font-bold text-xl mb-2">Categorias do Cardápio</div>
        </div>

        <div
          v-for="categoria in categorias"
          :key="categoria.id"
          class=" border-b border-grey-500 cursor-pointer mx-2 my-2"
        >
          <click-edit-input
            @updated="update(categoria, $event)"
            @destroied="destroy($event)"
            :categoria="categoria"
          ></click-edit-input>
        </div>

        <div class="flex">
          <div class="w-3/4">
            <div class="mx-2 pt-2 pb-2">
              <jet-input
                v-model="form.nome"
                :placeholder="'Ex: Bebidas, Doces'"
              ></jet-input>
              <jet-input-error :message="errors.nome" class="mt-2" />
            </div>
          </div>
          <div class="w-1/4 mr-1 text-right">
            <div class="mx-2 pt-2 pb-2 h-5">
              <jet-button
                ><svg
                  class="h-6"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"
                  /></svg
              ></jet-button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import ClickEditInput from "../../Components/ClickEditInput";
import JetInput from "../../Jetstream/Input";
import JetButton from "./../../Jetstream/Button";
import VueToastedOptions from "../../Modules/vue-toasted-options";
import JetInputError from "./../../Jetstream/InputError";
export default {
  components: {
    ClickEditInput,
    JetInput,
    JetButton,
    JetInputError,
  },
  data() {
    return {
      form: this.$inertia.form(
        {
          nome: "",
        },
        {
          resetOnSuccess: true,
        }
      ),
    };
  },
  methods: {
    update(categoria, novoNome) {
      this.$inertia.post(
        "/categoria-cardapio/update",
        { novoNome: novoNome, id: categoria.id },
        {
          preserveScroll: true,
          onSuccess: (page) => {
            if (Object.keys(this.errors).length == 0) {
              this.$toasted.show(
                "Categoria do cardápio editada.",
                VueToastedOptions.success
              );
            }
          },
        }
      );
    },
    updateCardapioCategoria() {
      this.form.post("/categoria-cardapio", {
        preserveScroll: true,
        onSuccess: (page) => {
          if (Object.keys(this.errors).length == 0) {
            this.$toasted.show(
              "Nova categoria do cardápio inserida.",
              VueToastedOptions.success
            );
          } else {
            this.$toasted.show(
              "Verifique os campos obrigatórios.",
              VueToastedOptions.danger
            );
          }
        },
      });
    },
    destroy(id) {
      this.$inertia.post(
        "/categoria-cardapio/destroy",
        { id: id },
        {
          preserveScroll: true,
          onSuccess: (page) => {
            if (Object.keys(this.errors).length == 0) {
              this.$toasted.show(
                "Categoria do cardápio removida.",
                VueToastedOptions.success
              );
            }
          },
        }
      );
    },
  },

  props: {
    categorias: Array,
    errors: Object,
  },
};
</script>