<template>
  <div class="container mx-auto">
    <div
      class="flex flex-col justify-center h-48 w-full shadow rounded-md p-2 bg-gray-200"
    >
      <div class="text-3xl font-bold">{{ estabelecimento.nome }}</div>
      <div class="text-lg">{{ estabelecimento.descricao }}</div>

      <div class="text-lg">
        {{ estabelecimento.endereco }}, {{ estabelecimento.numero }},
        {{ estabelecimento.bairro }} - {{ estabelecimento.municipio.nome }}
      </div>
      <div class="text-lg">
        <div
          class="mr-2 inline-block"
          v-for="atendimento in estabelecimento.dias_atendimento"
          :key="atendimento.id"
        >
          {{ atendimento.dia_semana }} das {{ atendimento.abre }} às
          {{ atendimento.fecha }}
        </div>
      </div>
      <div class="text-lg">
        <div
          class="mr-2 inline-block"
          v-for="contato in estabelecimento.contatos"
          :key="contato.id"
        >
          {{ contato.contato }}
        </div>
      </div>
    </div>
    <div
      class="flex flex-col lg:flex-row justify-center h-48 w-full shadow rounded-md p-2 bg-gray-200"
    >
      <div class="lg:w-2/6 mx-4 my-4">
        <div class="w-full bg-white">
          <div class="rounded-md overflow-hidden shadow-lg">
            <div class="text-center border-b border-grey-500 mx-2 mt-2">
              <div class="font-bold text-xl mb-2">Categorias do Cardápio</div>
            </div>

            <div
              v-for="categoria in estabelecimento.cardapio_categorias"
              :key="categoria.id"
              class="border-b border-grey-500 cursor-pointer mx-2"
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
            <div class="w-4/5 flex cursor-pointer text-sm">
              <div class="flex-1"> <image-input
                :url="'/storage/' + item.nome_foto_prato"
              ></image-input></div>
              <div class="flex-1">{{ item.nome }}</div>
              <div class="flex-1" v-if="item.preco">R$ {{ item.preco }}</div>
              <div class="flex-1">{{ item.descricao }}</div>
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
