<template>
  <div>
    <div
      v-for="categoria in categorias"
      :key="categoria.id"
      class="rounded-md overflow-hidden shadow-lg mb-2 bg-white"
    >
      <div class="mt-2 mx-2 flex justify-between border-b border-grey-500">
        <div class="font-bold text-xl mb-2 w-3/4">{{ categoria.nome }}</div>
      </div>
      <div
        class="mx-2 border-b border-grey-500 p-1 items-center flex justify-between hover:bg-gray-100"
        v-for="item in categoria.itens"
        :key="item.id"
      >
        <div
          class="w-3/4 flex"
          @click="
            getCategoriaItem(item.id);
            showModal = true;
          "
        >
          <div class="flex-1">{{ item.nome }}</div>

          <div class="flex-1" v-if="item.preco">R$ {{ item.preco }}</div>
        </div>
        <div class="w-1/4 text-right">
          <form @submit.prevent="destroy(item.id)">
            <jet-button>
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
                /></svg
            ></jet-button>
          </form>
        </div>
      </div>
      <div class="mx-2">
        <button
          @click="
            showModal = true;
            form.cardapio_categoria_id = categoria.id;
          "
          class="w-full my-2 border border-transparent bg-gray-300 rounded-md font-semibold text-black uppercase tracking-widest hover:bg-gray-700 hover:text-white active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150"
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
            <jet-label>Imagem do prato</jet-label>
            <img
              v-if="form.nome_foto_prato"
              :src="'/storage/' + form.nome_foto_prato"
              class="object-cover rounded w-auto overflow-hidden"
              style="width: 150px; height: 150px"
            />
            <input-file-image
              v-else
              @image-selected="pegaFotoPrato"
              input-file-name="image-chamado"
            ></input-file-image>
            <jet-input-error :message="errors.foto_prato" class="mt-2" />
          </div>
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
            <money
              class="form-input w-full rounded-md shadow-sm"
              v-model="form.preco"
              v-bind="money"
            ></money>
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
        <jet-secondary-button
          @clicked="
            showModal = false;
            form = emptyFormObject();
          "
          type="button"
        >
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
import { Money } from "v-money";
import InputFileImage from "./../../Components/InputFileImage";

export default {
  components: {
    ClickEditInput,
    JetLabel,
    JetInput,
    JetButton,
    JetInputError,
    JetDialogModal,
    JetSecondaryButton,
    Money,
    InputFileImage,
  },
  data() {
    return {
      showModal: false,
      money: {
        decimal: ",",
        thousands: ".",
        prefix: "R$ ",
        precision: 2,
        masked: false,
      },
      form: this.emptyFormObject(),
    };
  },
  methods: {
    emptyFormObject() {
      return this.$inertia.form(
        {
          nome: null,
          cardapio_categoria_id: null,
          descricao: null,
          preco: 0.0,
          foto_prato: null,
          nome_foto_prato: null,
          id: null,
        },
        {
          resetOnSuccess: true,
        }
      );
    },
    pegaFotoPrato(img) {
      this.form.foto_prato = img;
    },
    getCategoriaItem(id) {
      fetch(`/categoria-item?id=${id}`)
        .then((res) => res.json())
        .then((res) => {
          this.form.nome = res.nome;
          this.form.id = res.id;

          this.form.cardapio_categoria_id = res.cardapio_categoria_id;
          this.form.descricao = res.descricao;
          this.form.nome_foto_prato = res.nome_foto_prato;
          this.form.preco = res.preco ?? 0;
        });
    },

    storeOrUpdate() {
      var data = new FormData();
      data.append("nome", this.form.nome || "");
      data.append("id", this.form.id || "");

      data.append(
        "cardapio_categoria_id",
        this.form.cardapio_categoria_id || ""
      );
      data.append("descricao", this.form.descricao || "");
      data.append("preco", this.form.preco || "");
      data.append("foto_prato", this.form.foto_prato || "");

      this.$inertia.post("/categoria-item", data, {
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