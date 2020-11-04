<template>
  <div>
    <div
      v-for="categoria in categorias"
      :key="categoria.id"
      class="card shadow-lg"
    >
      <div class="card-body">
        <h5 class="card-title">{{ categoria.nome }}</h5>
        <ul class="list-group list-group-flush">
          <li
            data-toggle="modal"
            data-target="#modalCategoriaItem"
            class="list-group-item"
            v-for="item in categoria.itens"
            :key="item.id"
            @click="choseEditItem(item)"
          >
            {{ item.nome }} - {{ item.preco }} -
            <form @submit.prevent="destroy(item.id)">
              <button type="submit" class="text-sm text-grey-dark">
                Excluir
              </button>
            </form>
          </li>
        </ul>
        <button
          @click="addCategoriaItem(categoria)"
          type="button"
          href="#"
          class="card-link"
          data-toggle="modal"
          data-target="#modalCategoriaItem"
        >
          Add
        </button>
        <a href="#" class="card-link">Another link</a>
      </div>
    </div>
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div
      class="modal fade"
      id="modalCategoriaItem"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title a</h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form @submit.prevent="storeOrUpdate" method="post">
            <input
              type="hidden"
              name="cardapio_categoria_id"
              v-model="item.cardapio_categoria_id"
            />
            <div class="modal-body">
              <div class="container">
                <div class="row">
                  <div class="col-md-6">
                    <label for="">Nome </label>
                    <input
                      class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                      type="text"
                      placeholder="Ex: Bolos"
                      name="nome"
                      v-model="item.nome"
                      required
                    />

                    <label for="">Descrição </label>
                    <input
                      class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                      type="text"
                      v-model="item.descricao"
                      placeholder="Ex: Bolos"
                      name="desscricao"
                    />
                    <label for="">Preço </label>
                    <input
                      class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                      type="text"
                      v-model="item.preco"
                      placeholder="Ex: Bolos"
                      name="preco"
                    />
                  </div>
                  <div class="col-md-6">
                    <h1>Foto</h1>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-secondary"
                data-dismiss="modal"
              >
                Close
              </button>
              <button type="submit" class="btn btn-primary">
                Save changes
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      adding: null,
      item: {
        nome: null,
        cardapio_categoria_id: null,
        descricao: null,
        preco: null,
      },
    };
  },
  methods: {
    choseEditItem(item) {
      this.item = item;
      this.adding = false;
    },
    addCategoriaItem(categoria) {
      this.item.cardapio_categoria_id = categoria.id;
      this.adding = true;
    },
    storeOrUpdate() {
      if (this.adding) {
        this.$inertia.post("/categoria-item", this.item, {
          preserveScroll: true,
        });
      } else {
        this.$inertia.post("/categoria-item/update", this.item, {
          preserveScroll: true,
        });
      }
    },
    destroy(id) {
      this.$inertia.post(
        "/categoria-item/destroy",
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
  props: {
    categorias: Array,
    errors: Object,
  },
};
</script>