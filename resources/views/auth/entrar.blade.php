@extends('layouts.landing-page')

@section('content')

@if (session('status'))
<div class="mb-4 font-medium text-sm text-green-600">
    {{ session('status') }}
</div>
@endif
<div class="pt-24">
    <div class="px-3 my-10 mx-auto flex justify-center">
        <form method="POST" action="{{ url('/login') }}"
            class="rounded p-2 bg-white opacity-75 border shadow text-black w-3/4 lg:w-2/5">
            @csrf
            <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                @foreach ($errors->all() as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
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
              
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ url('/senha/resetar') }}">
                    {{ __('Esqueceu sua senha ?') }}
                </a>
             
                <x-jet-button class="ml-4 gradient">
                    {{ __('Entrar') }}
                </x-jet-button>
            </div>
        </form>
    </div>
</div>
@endsection
