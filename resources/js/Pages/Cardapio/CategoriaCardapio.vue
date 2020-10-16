<template>
  <div class="w-full bg-white shadow-lg mt-4 p-3 rounded">
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
            <form @submit.prevent="destroy(categoria.id)">
              <button type="submit" class="text-sm text-grey-dark">
                Excluir
              </button>
            </form>
          </div>
        </div>
      </div>
      <div class="w-full">
        <form @submit.prevent="store">
          <input
            class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            type="text"
            placeholder="Ex: Bolos"
            name="nome"
            v-model="categoria.nome"
          />
          <div v-if="errors.nome">{{ errors.nome }}</div>
          <button type="submit" class="btn btn-danger">Adicionar</button>
        </form>
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
  methods: {
    store() {
      // this.$inertia.visit(url, )
      this.$inertia.post("/categoria-cardapio", this.categoria, {
        preserveScroll: true,
      });
    },
    destroy(id) {
      this.$inertia.post(
        "/categoria-cardapio/destroy",
        { id: id },
        { preserveScroll: true }
      );
      this.$toasted.show("Categoria removida!", {
        theme: "toasted-primary",
        position: "top-left",
        duration: 5000,
      });
    },
  },
  components: {
    Cardapio,
  },
  props: {
    categorias: Array,
    errors: Object,
  },
};
</script>