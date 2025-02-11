<x-guest-layout>
    <div class="relative">
        <div class="absolute -top-16 left-1/2 -translate-x-1/2  bg-primary-700 rounded-full w-32 h-32 flex justify-center items-center shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-16 h-16 text-primary-200">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z" />
            </svg>
        </div>
    </div>

    <div class="mb-2 font-primary font-medium text-primary-700 text-2xl">
        {{ __('Redefina sua senha') }}
    </div>

    <div class="mb-10 font-primary font-medium text-neutral-300 text-sm">
        {{ __('Insira o seu email para realizar a redifinição da sua senha.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-10" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" placeholder="exemplo@email.com" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-10">
            <x-primary-button>
                {{ __('CONFIRMAR') }}
            </x-primary-button>
        </div>

        <div class="flex items-center justify-end mt-5">
            <a class="font-primary font-medium text-sm text-neutral-300 hover:text-primary-700 hover:underline rounded-md" href="{{ route('login') }}">
                {{ __('Voltar para login') }}
            </a>

        </div>
    </form>
</x-guest-layout>