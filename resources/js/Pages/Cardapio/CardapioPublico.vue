<template>
  <div>
    <div
      class="grid grid-cols-6 justify-center text-center lg:text-left w-full p-2 container mx-auto"
    >
      <div class="col-span-6 lg:col-span-2 mx-auto">
        <img
          width="200"
          height="200"
          class="object-contain md:object-scale-down rounded "
          v-if="$page.user.profile_photo_url"
          :src="$page.user.profile_photo_url"
        />
      </div>
      <div class="col-span-6 lg:col-span-4">
        <div class="text-3xl font-bold">{{ estabelecimento.nome }}</div>
        <div class="mb-2 text-2xl text-gray-600">
          {{ estabelecimento.descricao }}
        </div>

        <div class="text-sm lg:text-lg text-gray-600">
          {{ estabelecimento.endereco }}, {{ estabelecimento.numero }},
          {{ estabelecimento.bairro }} - {{ estabelecimento.municipio.nome }}
        </div>
        <div class="text-sm lg:text-lg text-gray-600">
          <div
            class="mx-auto lg:mr-15"
            v-for="atendimento in estabelecimento.dias_atendimento"
            :key="atendimento.id"
          >
            {{ atendimento.dia_semana }} das {{ atendimento.abre }} às
            {{ atendimento.fecha }}
          </div>
        </div>
        <div class="text-sm lg:text-lg text-gray-600">
          
          <div class="inline-block mr-5"
            v-for="contato in estabelecimento.contatos"
            :key="contato.id"
          >
            {{ contato.contato }}
          </div>
        </div>
      </div>
    </div>
    <div class="flex flex-col lg:flex-row justify-center w-full bg-gray-100">
      <div class="lg:w-2/6 mx-4 my-4">
        <div class="w-full bg-white">
          <div class="rounded-md overflow-hidden shadow-lg">
            <div class="text-center border-b border-grey-500 mx-2 mt-2">
              <div class="font-bold text-xl mb-2">Categorias do Cardápio</div>
            </div>

            <a
              v-for="categoria in estabelecimento.cardapio_categorias"
              :key="categoria.id"
              :href="'#' + categoria.id"
              class="border-b p-4 border-grey-500 cursor-pointer mx-2 block"
            >
              {{ categoria.nome }}
            </a>
          </div>
        </div>
      </div>
      <div class="lg:w-4/6 mx-4 my-4">
        <div
          v-for="categoria in estabelecimento.cardapio_categorias"
          :key="categoria.id"
          :id="categoria.id"
          class="rounded-md overflow-hidden shadow-lg mb-2 bg-white"
        >
          <div class="mt-2 mx-2 border-b border-grey-500">
            <div class="font-bold text-xl mb-2 w-3/4">{{ categoria.nome }}</div>
          </div>
          <div
            class="mx-2 border-b border-grey-500 p-1 items-center flex justify-between"
            v-for="item in categoria.itens"
            :key="item.id"
          >
            <div class="w-full grid grid-cols-4 text-sm">
              <div
                class="col-span-4 lg:col-span-1 cursor-pointer"
                @click="showModal = true"
              >
                <image-input
                  v-if="item.nome_foto_prato"
                  :url="'/storage/' + item.nome_foto_prato"
                ></image-input>

                <image-input
                  v-else
                  :url="'https://via.placeholder.com/150x150?text=Sem Imagem'"
                ></image-input>
              </div>
              <div class="col-span-4 lg:col-span-3">
                <div class="font-bold my-2">{{ item.nome }}</div>
                <div class="my-2 text-gray-600" v-if="item.preco">
                  R$ {{ item.preco }}
                </div>
                <div class="my-2 text-gray-600">{{ item.descricao }}</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <jet-dialog-modal :show="showModal">
      <template #title> Imagem do Prato </template>

      <template #content>
        <h1>aqui</h1>
      </template>

      <template #footer>
        <!-- <jet-secondary-button @click.native="showModal = false">
            Fechar
          </jet-secondary-button> -->
      </template>
    </jet-dialog-modal>
  </div>
</template>

<script>
import ImageInput from "./../../Components/ImageInput";
import JetDialogModal from "./../../Jetstream/DialogModal";
import JetSecondaryButton from "./../../Jetstream/SecondaryButton";

export default {
  components: { ImageInput, JetDialogModal, JetSecondaryButton },
  props: {
    estabelecimento: Object,
  },
  data() {
    return {
      showModal: false,
    };
  },
};
</script>
