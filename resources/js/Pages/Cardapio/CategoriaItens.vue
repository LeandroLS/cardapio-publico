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
        <ul class="list-group list-group-flush">
          <li
            class="list-group-item"
            v-for="item in categoria.itens"
            :key="item.id"
          >
            {{ item.nome }} - {{ item.preco }}
          </li>
        </ul>
        <button
          type="button"
          href="#"
          class="card-link"
          data-toggle="modal"
          data-target="#exampleModal"
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
      id="exampleModal"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
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
                  />

                  <label for="">Descrição </label>
                  <input
                    class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="text"
                    placeholder="Ex: Bolos"
                    name="desscricao"
                  />
                  <label for="">Preço </label>
                  <input
                    class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="text"
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
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      categoria: {
        nome: null,
      },
    };
  },
  methods: {},
  props: {
    categorias: Array,
    errors: Object,
  },
};
</script>