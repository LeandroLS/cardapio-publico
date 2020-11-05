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
      <button @click="showModal = true"
        class="w-full mb-2 mx-2 border border-transparent bg-gray-300 rounded-md font-semibold text-black uppercase tracking-widest hover:bg-gray-700 hover:text-white active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150"
      >
        Adicionar Item
      </button>
      <div
        class="w-full mx-2 my-2"
        data-toggle="modal"
        data-target="#modalCategoriaItem"
        v-for="item in categoria.itens"
        :key="item.id"
        @click="choseEditItem(item)"
      >
        {{ item.nome }} - {{ item.preco }} -
        <form @submit.prevent="destroy(item.id)">
          <button type="submit" class="text-sm text-grey-dark">Excluir</button>
        </form>
      </div>
      <!-- <button
        @click="addCategoriaItem(categoria)"
        type="button"
        href="#"
        class="card-link"
        data-toggle="modal"
        data-target="#modalCategoriaItem"
      >
        Add
      </button> -->
    </div>
    <jet-dialog-modal :show="showModal">
      <template #title>Adicionar Item</template>
      <template #content>
        <form @submit.prevent="storeOrUpdate" method="post">
          <input
            type="hidden"
            name="cardapio_categoria_id"
            v-model="item.cardapio_categoria_id"
          />
          <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="col-md-6">
                  <label for="">Nome </label>
                  <input
                    class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="text"
                    placeholder="Ex: Bolos"
                    name="nome"
                    v-model="item.nome"
                    required
                  />

                  <label for="">Descrição </label>
                  <input
                    class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="text"
                    v-model="item.descricao"
                    placeholder="Ex: Bolos"
                    name="desscricao"
                  />
                  <label for="">Preço </label>
                  <input
                    class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="text"
                    v-model="item.preco"
                    placeholder="Ex: Bolos"
                    name="preco"
                  />
                </div>
                <div class="col-md-6">
                  <h1>Foto</h1>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer"></div></form
      ></template>
      <template #footer
        ><button type="button" @click="showModal = false" class="btn btn-secondary" data-dismiss="modal">
          Close
        </button>
        <button type="submit" class="btn btn-primary">
          Save changes
        </button></template
      >
    </jet-dialog-modal>
    <!-- Button trigger modal -->
  </div>
</template>

<script>
import ClickEditInput from "../../Components/ClickEditInput";
import JetInput from "../../Jetstream/Input";
import JetButton from "./../../Jetstream/Button";
import VueToastedOptions from "../../Modules/vue-toasted-options";
import JetInputError from "./../../Jetstream/InputError";
import JetDialogModal from "./../../Jetstream/DialogModal";
export default {
  components: {
    ClickEditInput,
    JetInput,
    JetButton,
    JetInputError,
    JetDialogModal,
  },
  data() {
    return {
      showModal: false,
      adding: null,
      item: {
        nome: null,
        cardapio_categoria_id: null,
        descricao: null,
        preco: null,
      },
    };
  },
  methods: {
    choseEditItem(item) {
      this.item = item;
      this.adding = false;
    },
    addCategoriaItem(categoria) {
      this.item.cardapio_categoria_id = categoria.id;
      this.adding = true;
    },
    storeOrUpdate() {
      if (this.adding) {
        this.$inertia.post("/categoria-item", this.item, {
          preserveScroll: true,
        });
      } else {
        this.$inertia.post("/categoria-item/update", this.item, {
          preserveScroll: true,
        });
      }
    },
    destroy(id) {
      this.$inertia.post(
        "/categoria-item/destroy",
        { id: id },
        { preserveScroll: true }
      );
      this.$toasted.show("Categoria removida!", {
        theme: "toasted-primary",
        position: "top-left",
        duration: 5000,
      });
    },
  },
  props: {
    categorias: Array,
    errors: Object,
  },
};
</script>