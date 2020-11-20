<template>
  <div class="flex items-center hover:bg-gray-100 p-1">
    <div class="w-4/5 mx-2 text-sm" @click="edit = true">
      <label v-if="edit == false"> {{ categoria.nome }} </label>
      <input
        class="w-full appearance-none border rounded text-gray-700 p-2 leading-tight focus:outline-none focus:shadow-outline"
        v-if="edit == true"
        v-model="categoria.nome"
      />
    </div>
    <div v-if="edit == false" class="w-1/5 text-right mx-2 my-2">
      <form @submit.prevent="$emit('destroied', categoria.id)">
        <jet-button>
          <svg
            class="h-5 w-5"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
            /></svg
        ></jet-button>
      </form>
    </div>
    <div v-else class="w-1/5 text-right mx-2 my-2">
      <jet-button
        :type="'button'"
        @clicked="
          edit = false;
          $emit('updated', categoria.nome);
        "
        ><svg
          class="h-5 w-5"
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 20 20"
          fill="currentColor"
        >
          <path
            fill-rule="evenodd"
            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
            clip-rule="evenodd"
          /></svg
      ></jet-button>
    </div>
  </div>
</template>

<script>
import JetButton from "./../Jetstream/Button";
export default {
  components: {
    JetButton,
  },
  data() {
    return {
      edit: false,
    };
  },
  props: ["categoria"],
};
</script>