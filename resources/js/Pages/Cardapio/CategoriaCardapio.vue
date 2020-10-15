<template>
  <cardapio>
    <div class="w-full max-w-screen-xl mx-auto p-6">
      <div
        class="bg-white mx-auto max-w-sm shadow-lg rounded-lg overflow-hidden"
      >
        <div class="sm:flex sm:items-center px-2 py-4">
          <div class="flex-grow">
            <h3 class="font-normal px-2 py-3 leading-tight">
              Categorias do Cardápio
            </h3>
            <div class="w-full">
              <div
                v-for="categoria in categorias"
                :key="categoria.id"
                class="flex cursor-pointer my-1 hover:bg-blue-lightest rounded"
              >
                <div class="w-8 h-10 text-center py-1">
                  <p class="text-3xl p-0 text-green-dark">&bull;</p>
                </div>
                <div class="w-4/5 h-10 py-3 px-1">
                  <p class="hover:text-blue-dark">{{ categoria.nome }}</p>
                </div>
                <div class="w-1/5 h-10 text-right p-3">
                  <p class="text-sm text-grey-dark">Excluir</p>
                </div>
              </div>
            </div>
            <div class="w-full">
              <h1>aqui</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
  </cardapio>
</template>

<script>
import Cardapio from "./Cardapio";
export default {
  components: {
    Cardapio,
  },
  props: {
    categorias: Array,
  },
};
</script>

<style>
</style>