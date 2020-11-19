<template>
  <div>
    <image-input :url="url"></image-input>
  </div>
</template>
<script>
import ImageInput from "../Components/ImageInput";

export default {
  props: {
    image: {
      default: null,
    },
  },
  data() {
    return {
      url: null,
    };
  },

  components: {
    ImageInput,
  },
  watch: {
    image: function(newVal, oldVal) {
      if (newVal) {
        this.url = URL.createObjectURL(newVal);
      } else {
        this.url = null;
      }
    },
  },
};
</script>