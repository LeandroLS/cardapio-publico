<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Compartilhar Cardápio
      </h2>
    </template>

    <div class="container mx-auto">
      <div class="flex flex-col lg:flex-row">
        <h1>links</h1>
        <img :src="linkQrCode" alt="" />
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "./../Layouts/AppLayout";

export default {
  components: {
    AppLayout,
  },
  props: {
    errors: Object,
  },
  data() {
    return {
      linkQrCode: null,
    };
  },
  created() {
    // this.linkQrCode =
    //   "https://chart.googleapis.com/chart?chs=300x300&cht=qr& chl=" +
    //   $page.user;
    // console.log($page.user);
  },
};
</script>
