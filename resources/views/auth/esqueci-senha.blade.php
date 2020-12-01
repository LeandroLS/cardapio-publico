@extends('layouts.landing-page')

@section('content')


<div class="pt-24">
    <div class="px-3 py-10 my-10 mx-auto flex justify-center">

        <form method="POST" action="{{ route('password.email') }}"
            class="rounded p-2 bg-white opacity-75 border shadow text-black w-3/4 lg:w-2/5">
            @csrf

            <div class="mb-4 text-sm text-gray-600">
                {{ __('Esqueceu sua senha? Sem problemas. Apenas nos informe seu email e nós enviariamos um link para você definir uma nova senha.') }}
            </div>
            <div class="block">
                <x-jet-label class="font-bold" for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button class="gradient">
                    {{ __('Enviar link de reset de senha') }}
                </x-jet-button>
            </div>
        </form>


    </div>
</div>
@endsection
