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
      <draggable
        v-model="categoria.itens"
        :move="onMoveCallback"
        @end="onEndDrag"
        handle=".handle"
      >
        <transition-group>
          <div
            class="mx-2 border-b border-grey-500 p-1 items-center flex justify-between hover:bg-gray-100"
            v-for="item in categoria.itens"
            :key="item.id"
          >
            <div
              class="w-4/5 flex items-center cursor-pointer text-sm"
              @click="
                getCategoriaItem(item.id);
                show_modal = true;
              "
            >
              <div class="flex handle cursor-move">
                <svg
                  title="Mover de posição"
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
                    d="M7 11.5V14m0-2.5v-6a1.5 1.5 0 113 0m-3 6a1.5 1.5 0 00-3 0v2a7.5 7.5 0 0015 0v-5a1.5 1.5 0 00-3 0m-6-3V11m0-5.5v-1a1.5 1.5 0 013 0v1m0 0V11m0-5.5a1.5 1.5 0 013 0v3m0 0V11"
                  />
                </svg>
              </div>
              
              <div class="flex-1" v-if="item.nome_foto_prato">
                <img
                  class="object-cover"
                  width="40px"
                  :src="$page.aws_url + '/' + item.nome_foto_prato"
                />
              </div>
              <div class="flex-1" v-else></div>
              <div class="flex-1">{{ item.nome }}</div>
              <div class="flex-1" v-if="item.preco">R$ {{ item.preco }}</div>
              <div class="flex-1" v-else></div>
            </div>
            <div class="w-1/5 flex justify-end">
              <form action="">
                <button
                  v-if="item.visivel"
                  @click="toggleVisible(item)"
                  title="Ocultar"
                  type="button"
                  class="inline-flex items-center mr-2 px-1 py-1 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150"
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
                  class="inline-flex items-center mr-2 px-1 py-1 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150"
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
              <form @submit.prevent="showModalDeletarItem(item)">
                <button
                  title="Remover"
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
        </transition-group>
      </draggable>

      <div class="mx-2">
        <button
          @click="
            show_modal = true;
            form.cardapio_categoria_id = categoria.id;
          "
          class="w-full my-2 border border-transparent bg-gray-300 rounded-md font-semibold text-black uppercase tracking-widest hover:bg-gray-700 hover:text-white active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150"
        >
          Adicionar Item
        </button>
      </div>
    </div>
    <jet-confirmation-modal
      :show="categoriaItemSendoDeletado"
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
    <jet-dialog-modal :show="show_modal" @close="resetForm">
      <template #title></template>
      <template #content>
        <div class="w-full">
          <div class="mb-2">
            <jet-label>Imagem do prato</jet-label>
            <template v-if="form.nome_foto_prato">
              <image-input
                :url="$page.aws_url + '/' + form.nome_foto_prato"
              ></image-input>
              <jet-button @clicked="exluirImgEResetarForm(form)"
                >Excluir
              </jet-button>
            </template>
            <template v-else>
              <input class="btn-sm" type="file" @change="showImage" />
              <input-image-preview :image="foto_prato"></input-image-preview>
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
              v-model="VMoneyPrice"
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
              rows="3"
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
        <jet-secondary-button @clicked="resetForm">
          Fechar
        </jet-secondary-button>
        <jet-button
          @clicked="storeOrUpdate"
          :class="{ 'opacity-25': form.processing }"
          :disabled="form.processing"
          >Salvar</jet-button
        >
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
import JetConfirmationModal from "./../../Jetstream/ConfirmationModal";
import JetDangerButton from "./../../Jetstream/DangerButton";
import { Money } from "v-money";
import InputImagePreview from "./../../Components/InputImagePreview";
import ImageInput from "./../../Components/ImageInput";
import draggable from "vuedraggable";

export default {
  components: {
    ClickEditInput,
    JetLabel,
    JetInput,
    JetButton,
    JetInputError,
    JetDialogModal,
    JetSecondaryButton,
    JetConfirmationModal,
    JetDangerButton,
    Money,
    InputImagePreview,
    ImageInput,
    draggable,
  },

  data() {
    return {
      itemDragged: null,
      categoria_item_id_deletar: null,
      categoriaItemSendoDeletado: false,
      show_modal: false,
      foto_prato: null,
      VMoneyPrice: 0,
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
          preco: 0,
          nome_foto_prato: null,
          id: null,
          ordem: null,
        },
        {
          resetOnSuccess: true,
        }
      );
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

    storeOrUpdate() {
      var data = new FormData();
      data.append("nome", this.form.nome || "");
      data.append("id", this.form.id || "");
      data.append(
        "cardapio_categoria_id",
        this.form.cardapio_categoria_id || ""
      );
      data.append("descricao", this.form.descricao || "");
      data.append("preco", this.VMoneyPrice || "");
      data.append("foto_prato", this.foto_prato || "");
      let message = this.form.id ? "Prato atualizado" : "Prato adicionado";
      this.form.processing = true;
      this.$inertia.post("/cardapio/categoria/item", data, {
        preserveScroll: true,
        onSuccess: (page) => {
          if (Object.keys(this.errors).length == 0) {
            this.$toasted.show(message, VueToastedOptions.success);
            this.resetForm();
          } else {
            this.$toasted.show(
              "Verifique os campos obrigatórios.",
              VueToastedOptions.danger
            );
          }
          this.form.processing = false;
          //após concluir reseta o formlário e o campo de seleção imagem
        },
      });
    },
    destroy() {
      this.$inertia.post(
        "/cardapio/categoria/item/destroy",
        { id: this.categoria_item_id_deletar },
        { preserveScroll: true }
      );
      this.$toasted.show(
        "Item da categoria removido",
        VueToastedOptions.success
      );
      this.closeModalDeletarItem();
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
    resetForm() {
      this.show_modal = false;
      this.foto_prato = undefined;
      this.form = this.emptyFormObject();
    },
    showModalDeletarItem(item) {
      this.categoria_item_id_deletar = item.id;
      this.categoriaItemSendoDeletado = true;
    },
    closeModalDeletarItem() {
      this.categoria_item_id_deletar = null;
      this.categoriaItemSendoDeletado = false;
    },

    showImage(e) {
      this.foto_prato = e.target.files[0];
    },
    onMoveCallback(evt, originalEvent) {
      this.itemDragged = evt.draggedContext.element;
    },
    onEndDrag(evt) {
      /** retorna a categoria do item selecionado */
      let categoria = this.categorias.filter(
        (el) => el.id == this.itemDragged.cardapio_categoria_id
      )[0];
      this.$inertia.post(
        "/cardapio/categoria/item/sort",
        { categoria_itens: categoria.itens },
        {
          preserveScroll: true,
          onSuccess: (page) => {
            if (Object.keys(this.errors).length == 0) {
              this.$toasted.show(
                "Ordem do item modificada",
                VueToastedOptions.success
              );
            }
          },
        }
      );
    },
  },

  watch: {
    "form.preco": function (newValue, oldValue) {
      this.VMoneyPrice = newValue;
    },
  },
  props: {
    categorias: Array,
    errors: Object,
  },
};
</script>