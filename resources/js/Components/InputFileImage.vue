<template>
  <div>
    <div>
      <input
        class="btn-sm"
        type="file"
        @change="showImages"
        :name="`${inputFileName}[]`"
      />
    </div>
    <div v-if="limiteAtingido">
      <div class="">Limite de imagens atigindo</div>
    </div>
    <transition-group name="fade" tag="p">
      <div
        :key="image.name"
        v-for="image in imagesUrls"
        style="margin-top: 4px; margin-bottom: 4px"
      >
        <img :src="image.url" style="max-width: 300px; height: 200px" />
        {{ image.name }}
      </div>
    </transition-group>
  </div>
</template>
<script>
export default {
  props: ["limiteImagens", "inputFileName"],
  data() {
    return {
      imagesUrls: [],
      limiteAtingido: false,
    };
  },
  methods: {
    showImages: function (e) {
      this.imagesUrls = [];
      if (!this.passouDoLimite(e)) {
        this.limiteAtingido = false;
        Array.from(e.target.files).forEach((element) => {
          this.imagesUrls.push({
            url: URL.createObjectURL(element),
            name: element.name,
          });
        });
      }
    },
    passouDoLimite: function (e) {
      if (e.target.files.length > this.limiteImagens) {
        this.limiteAtingido = true;
        e.target.value = "";
        return true;
      } else {
        return false;
      }
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