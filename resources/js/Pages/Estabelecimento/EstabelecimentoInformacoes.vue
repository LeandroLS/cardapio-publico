<template>
  <jet-form-section @submitted="updateProfileInformation">
    <template #title> Estabelecimento </template>

    <template #description>
      Atualize as informações do seu estabelecimento
    </template>

    <template #form>
      <!-- Profile Photo -->
      <div
        class="col-span-6 sm:col-span-4"
        v-if="$page.jetstream.managesProfilePhotos"
      >
        <!-- Profile Photo File Input -->
        <input
          type="file"
          class="hidden"
          ref="photo"
          @change="updatePhotoPreview"
        />

        <jet-label for="photo" value="Logo" />

        <!-- Current Profile Photo -->
        <div class="mt-2" v-show="!photoPreview">
          <img
            :src="$page.user.profile_photo_url"
            alt="Current Profile Photo"
            class="rounded-full h-20 w-20 object-cover"
          />
        </div>

        <!-- New Profile Photo Preview -->
        <div class="mt-2" v-show="photoPreview">
          <span
            class="block rounded-full w-20 h-20"
            :style="
              'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' +
              photoPreview +
              '\');'
            "
          >
          </span>
        </div>

        <jet-secondary-button
          class="mt-2 mr-2"
          type="button"
          @click.native.prevent="selectNewPhoto"
        >
          Novo logo
        </jet-secondary-button>

        <jet-secondary-button
          type="button"
          class="mt-2"
          @click.native.prevent="deletePhoto"
          v-if="$page.user.profile_photo_path"
        >
          Remover logo
        </jet-secondary-button>

        <jet-input-error :message="$page.errors.photo" class="mt-2" />
      </div>

      <!-- Nome do Estabelecimento -->
      <div class="col-span-6 sm:col-span-4">
        <jet-label for="nome" value="Nome do Estabelecimento" />
        <jet-input
          id="nome"
          type="text"
          class="mt-1 block w-full"
          v-model="form.nome"
          autocomplete="nome"
        />
        <!-- <jet-input-error :message="form.error('nome')" class="mt-2" /> -->
        <jet-input-error :message="$page.errors.nome" class="mt-2" />
      </div>

      <div class="col-span-6 sm:col-span-4">
        <jet-label for="descricao" value="Descrição do Estabelecimento" />
        <jet-input
          id="descricao"
          type="text"
          class="mt-1 block w-full"
          v-model="form.descricao"
        />
        <jet-input-error :message="form.error('descricao')" class="mt-2" />
      </div>
    </template>

    <template #actions>
      <jet-button
        :class="{ 'opacity-25': form.processing }"
        :disabled="form.processing"
      >
        Salvar
      </jet-button>
    </template>
  </jet-form-section>
</template>

<script>
import JetButton from "./../../Jetstream/Button";
import JetFormSection from "./../../Jetstream/FormSection";
import JetInput from "./../../Jetstream/Input";
import JetInputError from "./../../Jetstream/InputError";
import JetLabel from "./../../Jetstream/Label";
import JetSecondaryButton from "./../../Jetstream/SecondaryButton";
import VueToastedOptions from "../../Modules/vue-toasted-options";

export default {
  components: {
    JetButton,
    JetFormSection,
    JetInput,
    JetInputError,
    JetLabel,
    JetSecondaryButton,
  },

  props: {
    estabelecimento: {
      type: Object,
      default: function () {
        return {
          nome: "",
          descricao: "",
        };
      },
    },
  },
  data() {
    return {
      form: this.$inertia.form(
        {
          nome: this.estabelecimento.nome,
          descricao: this.estabelecimento.descricao,
          photo: null,
        },
        {
          bag: "updateProfileInformation",
          resetOnSuccess: false,
        }
      ),

      photoPreview: null,
    };
  },

  methods: {
    updateProfileInformation() {
      if (this.$refs.photo) {
        this.form.photo = this.$refs.photo.files[0];
      }
      this.form.post(route("estabelecimento.store"), {
        preserveScroll: true,
        onSuccess: (page) => {
          if (Object.keys(this.$page.errors).length == 0) {
            this.$toasted.show(
              "Informações Salvas.",
              VueToastedOptions.success
            );
          }
        },
      });
    },

    selectNewPhoto() {
      this.$refs.photo.click();
    },

    updatePhotoPreview() {
      const reader = new FileReader();

      reader.onload = (e) => {
        this.photoPreview = e.target.result;
      };

      reader.readAsDataURL(this.$refs.photo.files[0]);
    },

    deletePhoto() {
      this.$inertia
        .delete(route("current-user-photo.destroy"), {
          preserveScroll: true,
        })
        .then(() => {
          this.photoPreview = null;
        });
    },
  },
};
</script>
