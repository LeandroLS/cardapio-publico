<template>
  <div>
    <div>
      <input
        class="btn-sm"
        type="file"
        @change="showImages"
        :name="`${inputFileName}`"
      />
    </div>

    <transition name="fade" tag="p">
      <div v-if="imgUrl" style="margin-top: 4px; margin-bottom: 4px">
        <img :src="imgUrl" style="max-width: 300px; max-height: 180px" />
      </div>
    </transition>
  </div>
</template>
<script>
export default {
  props: ["inputFileName"],
  data() {
    return {
      selectedImage: null,
      imgUrl: null,
    };
  },
  methods: {
    showImages: function (e) {
      this.selectedImage = e.target.files[0];
      this.imgUrl = URL.createObjectURL(this.selectedImage);
      this.$emit("image-selected", this.selectedImage);
    },
  },
};
</script>
<style>
/* Animações de entrada e saída podem utilizar diferentes */
/* funções de duração e de tempo. */
.slide-fade-enter-active {
  transition: all 0.4s ease;
}

.slide-fade-leave-active {
  transition: all 0.4s cubic-bezier(1, 0.5, 0.8, 1);
}

.slide-fade-enter,
.slide-fade-leave-to {
  transform: translateX(10px);
  opacity: 0;
}

.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s;
}

.fade-enter,
.fade-leave-to {
  opacity: 0;
}
</style>