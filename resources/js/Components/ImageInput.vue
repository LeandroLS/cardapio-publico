<template>
  <transition name="fade" tag="p">
    <div v-if="url" class="my-2">
      <img
        :src="url"
        class="object-cover rounded w-auto overflow-hidden"
        style="width: 150px; height: 150px"
      />
    </div>
  </transition>
</template>
<script>
export default {
  props: {
    url: {
      default: null,
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