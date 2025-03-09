<x-guest-layout>
    <div class="relative">
        <div class="absolute top-50 bottom-0 left-1/2 -translate-x-1/2  bg-primary-700 rounded-full w-32 h-32 flex justify-center items-center shadow-lg">
        <x-heroicon-o-key class="w-16 h-16 text-primary-200"/>
        </div>
    </div>

    <div class="mb-2 mt-5 font-primary font-medium text-primary-700 text-2xl">
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