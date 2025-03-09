<x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <div class="relative">
            <div class="absolute top-50 bottom-0 left-1/2 -translate-x-1/2  bg-primary-700 rounded-full w-32 h-32 flex justify-center items-center shadow-lg">
                <x-heroicon-o-lock-closed class="w-16 h-16 text-primary-200" />
            </div>
        </div>

        <div class="mb-2 mt-8 font-primary font-medium text-primary-700 text-2xl">
            {{ __('Crie uma nova senha') }}
        </div>

        <div class="mb-10 font-primary font-medium text-neutral-300 text-sm">
            {{ __('Insira uma nova senha.') }}
        </div>

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Senha')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" placeholder="Senha" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmar Senha')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                type="password"
                name="password_confirmation" placeholder="Confirmar senha" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
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