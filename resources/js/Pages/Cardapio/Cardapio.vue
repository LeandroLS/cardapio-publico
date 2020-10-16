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
          <categoria-cardapio
            :categorias="categorias"
            :errors="errors"
          ></categoria-cardapio>
        </div>
        <div class="col-md-8">
          <itens-categoria-cardapio
            :categorias="categorias"
            :errors="errors"
          ></itens-categoria-cardapio>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "./../../Layouts/AppLayout";
import CategoriaCardapio from "./CategoriaCardapio";
import ItensCategoriaCardapio from "./ItensCategoriaCardapio";

export default {
  components: {
    AppLayout,
    CategoriaCardapio,
    ItensCategoriaCardapio,
  },
  props: {
    categorias: Array,
    errors: Object,
    success: Object,
  },
};
</script>
