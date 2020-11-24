<template>
    <jet-action-section>
        <template #title>
            Deletar conta
        </template>

        <template #description>
            Deletar essa conta permanentemente
        </template>

        <template #content>
            <div class="max-w-xl text-sm text-gray-600">
                Uma vez  que sua conta for deletada, todos os recursos e informações dessa conta serão deletados.
            </div>

            <div class="mt-5">
                <jet-danger-button @click.native="confirmUserDeletion">
                    Deletar Conta
                </jet-danger-button>
            </div>

            <!-- Delete Account Confirmation Modal -->
            <jet-dialog-modal :show="confirmingUserDeletion" @close="confirmingUserDeletion = false">
                <template #title>
                    Deletar conta
                </template>

                <template #content>
                    Você tem certeza que quer deletar sua conta ? Uma vez deletada, todas suas informações vão ser excluídas permanentemente. Por favor coloque sua senha para confirmar que você gostaria de deletar sua conta.
                    <div class="mt-4">
                        <jet-input type="password" class="mt-1 block w-3/4" placeholder="Password"
                                    ref="password"
                                    v-model="form.password"
                                    @keyup.enter.native="deleteUser" />

                        <jet-input-error :message="form.error('password')" class="mt-2" />
                    </div>
                </template>

                <template #footer>
                    <jet-secondary-button @click.native="confirmingUserDeletion = false">
                        Fechar
                    </jet-secondary-button>

                    <jet-danger-button class="ml-2" @click.native="deleteUser" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Deletar conta
                    </jet-danger-button>
                </template>
            </jet-dialog-modal>
        </template>
    </jet-action-section>
</template>

<script>
    import JetActionSection from './../../Jetstream/ActionSection'
    import JetButton from './../../Jetstream/Button'
    import JetDialogModal from './../../Jetstream/DialogModal'
    import JetDangerButton from './../../Jetstream/DangerButton'
    import JetInput from './../../Jetstream/Input'
    import JetInputError from './../../Jetstream/InputError'
    import JetSecondaryButton from './../../Jetstream/SecondaryButton'

    export default {
        components: {
            JetActionSection,
            JetButton,
            JetDangerButton,
            JetDialogModal,
            JetInput,
            JetInputError,
            JetSecondaryButton,
        },

        data() {
            return {
                confirmingUserDeletion: false,
                deleting: false,

                form: this.$inertia.form({
                    '_method': 'DELETE',
                    password: '',
                }, {
                    bag: 'deleteUser'
                })
            }
        },

        methods: {
            confirmUserDeletion() {
                this.form.password = '';

                this.confirmingUserDeletion = true;

                setTimeout(() => {
                    this.$refs.password.focus()
                }, 250)
            },

            deleteUser() {
                this.form.post(route('current-user.destroy'), {
                    preserveScroll: true
                }).then(response => {
                    if (! this.form.hasErrors()) {
                        this.confirmingUserDeletion = false;
                    }
                })
            },
        },
    }
</script>
