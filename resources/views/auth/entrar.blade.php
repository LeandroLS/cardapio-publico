@extends('layouts.landing-page')

@section('content')

<x-jet-validation-errors class="mb-4" />

@if (session('status'))
<div class="mb-4 font-medium text-sm text-green-600">
    {{ session('status') }}
</div>
@endif
<div class="pt-24">
    <div class="px-3 my-10 mx-auto flex justify-center">
        <form method="POST" action="{{ route('login') }}"
            class="rounded p-2 bg-white opacity-75 border shadow text-black w-3/4 lg:w-2/5">
            @csrf

            <div>
                <x-jet-label for="email" class="font-bold" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password"  class="font-bold" value="{{ __('Senha') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Lembrar ?') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                    {{ __('Esqueceu sua senha ?') }}
                </a>
                @endif

                <x-jet-button class="ml-4 gradient">
                    {{ __('Entrar') }}
                </x-jet-button>
            </div>
        </form>
    </div>
</div>


@endsection
