<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Categoria do Cardápio
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="container">
          <div class="row">
            <div class="col-md-6"><slot></slot></div>
            <!-- <div class="col-md-6"><slot name="itens-categoria"></slot></div> -->
          </div>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "./../../Layouts/AppLayout";
import CategoriaCardapio from "./CategoriaCardapio";
export default {
  components: {
    AppLayout,
    CategoriaCardapio,
  },
};
</script>
