<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Informações do Estabelecimento
            </h2>
        </template>
       
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div v-if="userRecemCriado"
                class="flex justify-center items-center m-1 font-medium py-1 px-2 mb-10 bg-white rounded-md text-green-100 bg-green-400 border border-green-400 ">
                <div slot="avatar">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-check-circle w-5 h-5 mx-2">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                    </svg>
                </div>
                <div class="text-xl font-normal  max-w-full flex-initial">
                    <div class="py-2">Seja bem vindo!
                        <div class="text-base font-base"> Esse é seu primeiro acesso, vamos ajudar a configurar sua conta.
                        </div>
                        <div class="text-base font-base"> Pro
                            seu cardápio funcionar, <span class="font-bold"> é necessário no mínimo </span> que você nos forneça o nome do
                            estabelecimento no
                            formulário abaixo. As demais informações são opcionais.
                        </div>
                    </div>
                </div>
                <div class="flex flex-auto flex-row-reverse">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="feather feather-x cursor-pointer hover:text-green-400 rounded-full w-5 h-5 ml-2">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </div>
                </div>
            </div>
            <estabelecimento-informacoes :estabelecimento="estabelecimento || undefined"></estabelecimento-informacoes>
            <jet-section-border />
            <estabelecimento-localizacao class="mt-10" :localizacao="estabelecimento || undefined">
            </estabelecimento-localizacao>
            <jet-section-border />
            <estabelecimento-contato class="mt-10" :contatos="estabelecimento ? estabelecimento.contatos : undefined">
            </estabelecimento-contato>
            <jet-section-border />
            <estabelecimento-dias-atendimento class="mt-10" :diasAtendimento="
          estabelecimento ? estabelecimento.dias_atendimento : undefined
        "></estabelecimento-dias-atendimento>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from "../../Layouts/AppLayout";
    import JetButton from "../../Jetstream/Button";
    import JetInput from "../../Jetstream/Input";
    import EstabelecimentoLocalizacao from "./EstabelecimentoLocalizacao";
    import EstabelecimentoContato from "./EstabelecimentoContato";
    import EstabelecimentoDiasAtendimento from "./EstabelecimentoDiasAtendimento";
    import EstabelecimentoInformacoes from "./EstabelecimentoInformacoes.vue";
    import JetSectionBorder from "./../../Jetstream/SectionBorder";

    export default {
        components: {
            AppLayout,
            JetButton,
            JetInput,
            EstabelecimentoLocalizacao,
            EstabelecimentoContato,
            EstabelecimentoDiasAtendimento,
            EstabelecimentoInformacoes,
            JetSectionBorder,
        },

        props: {
            estabelecimento: Object,
            user: Object
        },
        computed: {
          userRecemCriado(){
            let dataCriacaoUser = moment(this.user.created_at);
            let today = moment();
            if(today.diff(dataCriacaoUser, 'days') <= 1){
              return true;
            }
          }
        }
    };

</script>
