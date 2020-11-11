<template>
  <div>
    <div
      v-for="categoria in categorias"
      :key="categoria.id"
      class="rounded-md overflow-hidden shadow-lg mb-2 bg-white"
    >
      <div class="my-3 mx-3 flex justify-between border-b border-grey-500">
        <div class="font-bold text-xl mb-2 w-3/4">{{ categoria.nome }}</div>
      </div>
      <div
        class="my-3 mx-3"
        v-for="item in categoria.itens"
        :key="item.id"
        @click="choseEditItem(item); showModal = true;"
      >
        <div
          class="flex justify-between border-b border-grey-500"
        >
          <div class="mb-2 w-3/4">{{ item.nome }} - {{ item.preco }}</div>
          <form @submit.prevent="destroy(item.id)">
            <button type="submit" class="text-sm text-grey-dark">
              Excluir
            </button>
          </form>
        </div>
      </div>
      <div class="mx-2">
        <button
          @click="
            showModal = true;
            form.cardapio_categoria_id = categoria.id;
          "
          class="w-full mb-2 border border-transparent bg-gray-300 rounded-md font-semibold text-black uppercase tracking-widest hover:bg-gray-700 hover:text-white active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150"
        >
          Adicionar Item
        </button>
      </div>
    </div>
    <jet-dialog-modal :show="showModal">
      <template #title>Adicionar Item</template>
      <template #content>
        <div class="w-full">
          <div class="mb-2">
            <jet-label>Nome do Prato</jet-label>
            <jet-input
              v-model="form.nome"
              :placeholder="'Ex: Frango empanado'"
            ></jet-input>
            <jet-input-error :message="errors.nome" class="mt-2" />
          </div>
          <div class="mb-2">
            <jet-label>Valor</jet-label>
            <jet-input></jet-input>
          </div>
          <div class="mb-2">
            <jet-label>Descrição</jet-label>
            <textarea
              v-model="form.descricao"
              placeholder="Ex: Um frango empanado delicioso!"
              class="form-input w-full rounded-md shadow-sm"
              cols="10"
              rows="4"
            ></textarea>
          </div>
        </div>
        <input
          type="hidden"
          name="cardapio_categoria_id"
          v-model="form.cardapio_categoria_id"
        />
      </template>
      <template #footer>
        <jet-secondary-button @clicked="showModal = false" type="button">
          Fechar
        </jet-secondary-button>
        <jet-button @clicked="storeOrUpdate">Salvar</jet-button>
      </template>
    </jet-dialog-modal>
    <!-- Button trigger modal -->
  </div>
</template>

<script>
import ClickEditInput from "../../Components/ClickEditInput";
import JetInput from "../../Jetstream/Input";
import JetButton from "./../../Jetstream/Button";
import JetSecondaryButton from "./../../Jetstream/SecondaryButton";
import VueToastedOptions from "../../Modules/vue-toasted-options";
import JetInputError from "./../../Jetstream/InputError";
import JetDialogModal from "./../../Jetstream/DialogModal";
import JetLabel from "./../../Jetstream/Label";
export default {
  components: {
    ClickEditInput,
    JetLabel,
    JetInput,
    JetButton,
    JetInputError,
    JetDialogModal,
    JetSecondaryButton,
  },
  data() {
    return {
      showModal: false,
      form: this.$inertia.form(
        {
          nome: null,
          cardapio_categoria_id: null,
          descricao: null,
          preco: null,
        },
        {
          resetOnSuccess: true,
        }
      ),
    };
  },
  methods: {
    choseEditItem(item) {
      console.log('aqui');
    },
    // addCategoriaItem(categoria) {
    //   this.form.cardapio_categoria_id = categoria.id;
    // },
    storeOrUpdate() {
      // if (this.adding) {
      //   this.$inertia.post("/categoria-item", this.item, {
      //     preserveScroll: true,
      //   });
      this.form.post("/categoria-item", {
        preserveScroll: true,
        onSuccess: (page) => {
          if (Object.keys(this.errors).length == 0) {
            this.$toasted.show(
              "Novo prato adicionado na categoria.",
              VueToastedOptions.success
            );
            this.showModal = false;
          } else {
            this.$toasted.show(
              "Verifique os campos obrigatórios.",
              VueToastedOptions.danger
            );
          }
        },
      });
      // } else {
      //   this.$inertia.post("/categoria-item/update", this.item, {
      //     preserveScroll: true,
      //   });
      // }
    },
    destroy(id) {
      this.$inertia.post(
        "/categoria-item/destroy",
        { id: id },
        { preserveScroll: true }
      );
      this.$toasted.show(
        "Item da categoria removido",
        VueToastedOptions.success
      );
    },
  },
  props: {
    categorias: Array,
    errors: Object,
  },
};
</script>