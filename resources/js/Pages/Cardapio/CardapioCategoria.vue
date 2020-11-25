<template>
  <div class="w-full bg-white">
    <form @submit.prevent="updateCardapioCategoria">
      <div class="rounded-md overflow-hidden shadow-lg">
        <div class="text-center border-b border-grey-500 mx-2 mt-2">
          <div class="font-bold text-xl mb-2">Categorias do Cardápio</div>
        </div>

        <div
          v-for="categoria in categorias"
          :key="categoria.id"
          class="border-b border-grey-500 cursor-pointer mx-2"
        >
          <click-edit-input
            @updated="update(categoria, $event)"
            @destroied="showModalDeletarItem($event)"
            :categoria="categoria"
          ></click-edit-input>
        </div>

        <div class="flex p-1">
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
    <jet-confirmation-modal
      :show="categoriaSendoDeletada"
      @close="closeModalDeletarItem"
    >
      <template #title> Deletar Item </template>

      <template #content> Tem certeza que quer excluír esse item ? </template>

      <template #footer>
        <jet-secondary-button @click.native="closeModalDeletarItem">
          Cancelar
        </jet-secondary-button>

        <jet-danger-button class="ml-2" @click.native="destroy">
          Excluir
        </jet-danger-button>
      </template>
    </jet-confirmation-modal>
  </div>
</template>

<script>
import ClickEditInput from "../../Components/ClickEditInput";
import VueToastedOptions from "../../Modules/vue-toasted-options";
import JetInput from "../../Jetstream/Input";
import JetButton from "./../../Jetstream/Button";
import JetInputError from "./../../Jetstream/InputError";
import JetConfirmationModal from "./../../Jetstream/ConfirmationModal";
import JetDangerButton from "./../../Jetstream/DangerButton";
import JetSecondaryButton from "./../../Jetstream/SecondaryButton";
export default {
  components: {
    ClickEditInput,
    JetInput,
    JetButton,
    JetInputError,
    JetConfirmationModal,
    JetDangerButton,
    JetSecondaryButton
  },
  data() {
    return {
      categoriaSendoDeletada: false,
      categoria_id_deletar: null,
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
        "/cardapio/categoria/update",
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
      this.form.post("/cardapio/categoria", {
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
        "/cardapio/categoria/destroy",
        { id: this.categoria_id_deletar },
        {
          preserveScroll: true,
          onSuccess: (page) => {
            if (Object.keys(this.errors).length == 0) {
              this.$toasted.show(
                "Categoria do cardápio removida.",
                VueToastedOptions.success
              );
            }
            this.closeModalDeletarItem();
          },
        }
      );
    },
    showModalDeletarItem(itemId) {
      this.categoria_id_deletar = itemId;
      this.categoriaSendoDeletada = true;
    },
    closeModalDeletarItem() {
      this.categoriaSendoDeletada = false;
    },
  },

  props: {
    categorias: Array,
    errors: Object,
  },
};
</script>