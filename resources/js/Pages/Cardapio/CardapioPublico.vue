<template>
  <div>
    <div class="flex flex-col justify-center h-48 w-full p-2 container mx-auto">
      <div class="text-3xl font-bold">{{ estabelecimento.nome }}</div>
      <div class="text-2xl text-gray-600">{{ estabelecimento.descricao }}</div>

      <div class="text-lg text-gray-600">
        {{ estabelecimento.endereco }}, {{ estabelecimento.numero }},
        {{ estabelecimento.bairro }} - {{ estabelecimento.municipio.nome }}
      </div>
      <div class="text-lg">
        <div
          class="mr-15 inline-block text-gray-600"
          v-for="atendimento in estabelecimento.dias_atendimento"
          :key="atendimento.id"
        >
          {{ atendimento.dia_semana }} das {{ atendimento.abre }} às
          {{ atendimento.fecha }}
        </div>
      </div>
      <div class="text-lg text-gray-600">
        <div
          class="mr-15 inline-block text-gray-600"
          v-for="contato in estabelecimento.contatos"
          :key="contato.id"
        >
          {{ contato.contato }}
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

            <div
              v-for="categoria in estabelecimento.cardapio_categorias"
              :key="categoria.id"
              class="border-b p-4 border-grey-500 cursor-pointer mx-2"
            >
              {{ categoria.nome }}
            </div>
          </div>
        </div>
      </div>
      <div class="lg:w-4/6 mx-4 my-4">
        <div
          v-for="categoria in estabelecimento.cardapio_categorias"
          :key="categoria.id"
          class="rounded-md overflow-hidden shadow-lg mb-2 bg-white"
        >
          <div class="mt-2 mx-2 border-b border-grey-500">
            <div class="font-bold text-xl mb-2 w-3/4">{{ categoria.nome }}</div>
          </div>
          <div
            class="mx-2 border-b border-grey-500 p-1 items-center flex justify-between hover:bg-gray-100"
            v-for="item in categoria.itens"
            :key="item.id"
          >
            <div class="w-full grid grid-cols-4 cursor-pointer text-sm">
              <div class="col-span-4 lg:col-span-1">
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
  </div>
</template>

<script>
import ImageInput from "./../../Components/ImageInput";
export default {
  components: { ImageInput },
  props: {
    estabelecimento: Object,
  },
};
</script>
