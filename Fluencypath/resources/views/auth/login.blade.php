@extends('layouts.login')

@section('content')
<!-- Session Status -->
<x-auth-session-status class="mb-4" :status="session('status')" />

<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="mb-5 font-primary font-medium text-2xl text-neutral-600 card-header">{{ __('Entrar') }}</div>

    <!-- Email Address -->
    <div>
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" placeholder="exemplo@email.com" :value="old('email')" required autofocus autocomplete="username" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Password -->
    <div class="mt-5">
        <x-input-label for="password" :value="__('Senha')" />

        <x-text-input id="password" class="block mt-1 w-full"
            type="password"
            name="password"
            placeholder="Senha"
            required autocomplete="current-password" />

        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Remember Me -->
    <div class="mt-5 flex flex-row justify-between">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-neutral-300 text-cyan-600 focus:outline-none  shadow-sm" name="remember">
                <span class="ms-2 font-secondary font-medium text-sm text-neutral-500">{{ __('Lembrar-me') }}</span>
            </label>
  
            @if (Route::has('password.request'))
            <a class="font-primary font-medium text-sm text-primary-700 hover:text-primary-700 hover:underline rounded-md" href="{{ route('password.request') }}">
                {{ __('Esqueceu a senha?') }}
            </a>
            @endif
    </div>

    <div class="mt-10 flex justify-center items-center">
        <x-primary-button>
            {{ __('Entrar') }}
        </x-primary-button>
    </div>

    <div class="flex items-center justify-end mt-3 gap-2">
        @if (Route::has('register'))
        <span class="font-primary font-medium text-sm text-neutral-500">Não possui conta? </span>
        <a class="font-primary font-medium text-sm text-primary-700 hover:text-primary-700 hover:underline rounded-md" href="{{ route('register') }}">
            {{ __('Cadastre-se') }}
        </a>
        @endif
    </div>
</form>

<div class="flex items-center justify-center space-x-4 mt-5">
    <hr class="flex-grow text-neutral-300 ">
    <span class="font-secondary text-neutral-400 text-base">ou</span>
    <hr class="flex-grow text-neutral-200">
</div>

<div class="mt-5 space-y-4">
    <a href=" {{ route('redirect.google') }} ">
        <button class="w-full h-[45px] flex flex-row gap-4  items-center justify-center border border-primary-700 font-primary font-medium text-sm text-primary-1000 py-2 rounded-md shadow-md hover:border-primary-400 hover:border-1.5 focus:border-primary-700 focus:border-2 transition duration-200">
            <img src="https://cdn-icons-png.flaticon.com/256/2875/2875404.png" alt="Google logo" class="w-5 h-auto"> Continuar com o Google
        </button>
    </a>
</div>

@endsection