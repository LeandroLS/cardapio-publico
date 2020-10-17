<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Categoria do Cardápio
      </h2>
    </template>
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <cardapio-categoria
            :categorias="categorias"
            :errors="errors"
          ></cardapio-categoria>
        </div>
        <div class="col-md-8">
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
