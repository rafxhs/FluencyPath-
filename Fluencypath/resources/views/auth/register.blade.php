@extends('layouts.register')

@section('content')

<a href="{{ route('/') }}">
    <img src="{{URL::asset('images/logo-primaria-horizontal.svg')}}" alt="Logo" class="h-8 w-auto object-contain mb-8">
</a>

<form method="POST" action="{{ route('register') }}">
    @csrf

    <div class="mb-10 font-primary font-medium text-2xl text-neutral-600">{{ __('Cadastre-se') }}</div>

    <!-- Name -->
    <div>
        <x-input-label for="name" :value="__('Nome')" />
        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" placeholder="Nome" :value="old('name')" required autofocus autocomplete="name" />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <!-- Email Address -->
    <div class="mt-5">
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" placeholder="exemplo@email.com" :value="old('email')" required autocomplete="username" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Password container -->

    <div class="flex justify-between gap-5 mt-5">
        <!-- Password -->
        <div class="w-full">
            <x-input-label for="password" :value="__('Senha')" />

            <x-text-input id="password" class="block mt-1 w-full"
                type="password"
                name="password"
                placeholder="Senha"
                required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="w-full">
            <x-input-label for="password_confirmation" :value="__('Confirmar senha')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                type="password"
                name="password_confirmation" placeholder="Confirmar senha" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
    </div>

    <div class="flex items-center justify-end mt-8">
        <x-primary-button>
            {{ __('Cadastre-se') }}
        </x-primary-button>
    </div>

    <div class="flex items-center justify-end mt-3 gap-2">
        <span class="font-primary font-medium text-sm text-neutral-500">Já tem uma conta?</span>
        <a class="font-primary font-medium text-sm text-primary-700 hover:text-primary-700 hover:underline rounded-md" href="{{ route('login') }}">
            {{ __('Entrar') }}
        </a>

    </div>

</form>

<div class="flex items-center justify-center space-x-4 mt-5">
    <hr class="flex-grow text-neutral-200 ">
    <span class="font-secondary text-neutral-400 text-base">ou</span>
    <hr class="flex-grow text-neutral-200">
</div>

<div class="mt-5 space-y-4">
    <a href=" {{ route('redirect.google') }} ">
        <button class="w-full h-[45px] flex flex-row gap-4 items-center justify-center border border-primary-700 font-primary font-medium text-sm text-primary-1000 py-2 rounded-md shadow-md hover:border-primary-400 hover:border-1.5 focus:border-primary-700 focus:border-2 transition duration-200">
            <img src="https://cdn-icons-png.flaticon.com/256/2875/2875404.png" alt="Google logo" class="w-5 h-auto">
            <span>Continuar com o Google</span>
        </button>
    </a>
</div>
@endsection
