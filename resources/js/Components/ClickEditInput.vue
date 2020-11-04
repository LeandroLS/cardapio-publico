<template>
  <div>
    <template v-show="edit == false">
      <label @click="edit = true"> {{ title }} </label>
    </template>
    <input
      class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
      v-show="edit == true"
      v-model="title"
      v-on:blur="
        edit = false;
        $emit('update', title);
      "
      @keyup.enter="
        edit = false;
        $emit('update', title);
      "
    />
  </div>
</template>

<script>
export default {
  data() {
    return {
      edit: false,
    };
  },
  props: ["title"],
};
</script>