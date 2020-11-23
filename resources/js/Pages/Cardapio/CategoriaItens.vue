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
          class="w-4/5 flex cursor-pointer text-sm"
          @click="
            getCategoriaItem(item.id);
            showModal = true;
          "
        >
          <div class="flex-1">{{ item.nome }}</div>

          <div class="flex-1" v-if="item.preco">R$ {{ item.preco }}</div>
        </div>
        <div class="w-1/5 flex justify-end">
          <form class="mr-2" @submit.prevent="destroy(item.id)">
            <button
              v-if="item.visivel"
              @click="toggleVisible(item)"
              title="Ocultar"
              type="button"
              class="inline-flex items-center px-1 py-1 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150"
            >
              <svg
                class="h-3 md:h-5"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20"
                fill="currentColor"
              >
                <path
                  fill-rule="evenodd"
                  d="M3.707 2.293a1 1 0 00-1.414 1.414l14 14a1 1 0 001.414-1.414l-1.473-1.473A10.014 10.014 0 0019.542 10C18.268 5.943 14.478 3 10 3a9.958 9.958 0 00-4.512 1.074l-1.78-1.781zm4.261 4.26l1.514 1.515a2.003 2.003 0 012.45 2.45l1.514 1.514a4 4 0 00-5.478-5.478z"
                  clip-rule="evenodd"
                />
                <path
                  d="M12.454 16.697L9.75 13.992a4 4 0 01-3.742-3.741L2.335 6.578A9.98 9.98 0 00.458 10c1.274 4.057 5.065 7 9.542 7 .847 0 1.669-.105 2.454-.303z"
                />
              </svg>
            </button>
            <button
              @click="toggleVisible(item)"
              title="Deixar visível"
              type="button"
              v-else
              class="inline-flex items-center px-1 py-1 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150"
            >
              <svg
                class="h-3 md:h-5"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20"
                fill="currentColor"
              >
                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                <path
                  fill-rule="evenodd"
                  d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                  clip-rule="evenodd"
                />
              </svg>
            </button>
          </form>
          <form @submit.prevent="destroy(item.id)">
            <button
              title="Remover"
              type="button"
              class="inline-flex items-center px-1 py-1 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150"
            >
              <svg
                class="h-3 md:h-5"
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
            <template v-if="form.nome_foto_prato">
              <image-input
                :url="'/storage/' + form.nome_foto_prato"
              ></image-input>
              <jet-button @clicked="exluirImgEResetarForm(form)"
                >Excluir
              </jet-button>
            </template>
            <template v-else>
              <input class="btn-sm" type="file" @change="showImage" />
              <input-image-preview
                :image="form.foto_prato"
              ></input-image-preview>
            </template>
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
        <jet-secondary-button @clicked="fecharModal">
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
import InputImagePreview from "./../../Components/InputImagePreview";
import ImageInput from "./../../Components/ImageInput";

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
    InputImagePreview,
    ImageInput,
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
    exluirImgEResetarForm(form) {
      this.exluirImgPratoPromise(form.id).then((res) =>
        this.getCategoriaItem(form.id)
      );
      this.$toasted.show(
        "Imagem excluída com sucesso.",
        VueToastedOptions.success
      );
    },

    exluirImgPratoPromise(id) {
      return axios.post("/cardapio/categoria/item/imagem", { id: id });
    },
    fecharModal() {
      this.showModal = false;
      this.form = this.emptyFormObject();
    },

    getCategoriaItem(id) {
      fetch(`/cardapio/categoria/item?id=${id}`)
        .then((res) => res.json())
        .then((res) => {
          this.form = this.$inertia.form(res, {
            resetOnSuccess: true,
          });
        });
    },
    toggleVisible(categoriaItem) {
      let mensagem = "";
      if (categoriaItem.visivel == 1) {
        categoriaItem.visivel = 0;
        mensagem = "Item da categoria ocultado.";
      } else {
        categoriaItem.visivel = 1;
        mensagem = "Item da categoria vísivel.";
      }
      this.$inertia.post("/cardapio/categoria/item", categoriaItem, {
        preserveScroll: true,
        onSuccess: (page) => {
          if (Object.keys(this.errors).length == 0) {
            this.$toasted.show(mensagem, VueToastedOptions.success);
          }
        },
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
      let message = this.form.id ? 'Prato atualizado' : 'Prato adicionado';
      this.$inertia.post("/cardapio/categoria/item", data, {
        preserveScroll: true,
        onSuccess: (page) => {
          if (Object.keys(this.errors).length == 0) {
            this.$toasted.show(
              message,
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
    showImage(e) {
      this.form.foto_prato = e.target.files[0];
    },
    destroy(id) {
      this.$inertia.post(
        "/cardapio/categoria/item/destroy",
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