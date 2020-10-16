<template>
  <div>
    <div
      v-for="categoria in categorias"
      :key="categoria.id"
      class="card mt-4 shadow-lg"
      style="width: 18rem"
    >
      <div class="card-body">
        <h5 class="card-title">{{ categoria.nome }}</h5>
        <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
        <p class="card-text">
          Some quick example text to build on the card title and make up the
          bulk of the card's content.
        </p>
        <a href="#" class="card-link">Card link</a>
        <a href="#" class="card-link">Another link</a>
      </div>
    </div>
  </div>
</template>

<script>
import Cardapio from "./Cardapio";
export default {
  data() {
    return {
      categoria: {
        nome: null,
      },
    };
  },
  methods: {},
  components: {
    Cardapio,
  },
  props: {
    categorias: Array,
    errors: Object,
  },
};
</script>