<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Categorias e Pratos do Cardápio
      </h2>
    </template>

    <div class="container mx-auto">
      <div class="flex flex-col  lg:flex-row">
        <div class="lg:w-2/6 mx-4 my-4">
          <cardapio-categoria
            :categorias="categorias"
            :errors="errors"
          ></cardapio-categoria>
        </div>
        <div class="lg:w-4/6 mx-4 my-4">
          <categoria-itens
            :categorias="categorias"
            :errors="errors"
          ></categoria-itens>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "./../../Layouts/AppLayout";
import CardapioCategoria from "./CardapioCategoria";
import CategoriaItens from "./CategoriaItens";

export default {
  components: {
    AppLayout,
    CardapioCategoria,
    CategoriaItens,
  },
  props: {
    categorias: Array,
    errors: Object,
    success: Object,
  },
};
</script>
