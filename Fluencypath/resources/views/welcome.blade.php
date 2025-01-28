<x-guest-layout>
    <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-stretch h-16">
                <div class="flex flex-row">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('dashboard') }}">
                            <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                        </a>
                    </div>
                    <div class="flex flex-row justify-end items-center">
                        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                            <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                                {{ __('Entrar') }}
                            </x-nav-link>
                        </div>
                        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                            <x-nav-link :href="route('register')" :active="request()->routeIs('register')">
                                {{ __('Cadastre-se') }}
                            </x-nav-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mx-auto px-4 bg-gray-100">
    
    <section>
        <div>
            <h1></h1>
            <p></p>
        </div>
    </section>
    <div class="mt-10 flex items-center justify-center gap-x-6">
        <a href="{{ route('register') }}" class="rounded-md bg-cyan-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Get started</a>
    </div>

    <section class="text-center py-12">
        <h1 class="text-3xl font-bold mb-4">Inove o seu método de estudo</h1>
        <p class="text-gray-600 mb-8">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        <div class="relative inline-block">
            <img src="{{asset('images/woman.png')}}" alt="Woman pointing" class="mx-auto">
            <div class="absolute top-0 left-0 -translate-y-10 -translate-x-14">
                <div class="bg-white border border-gray-200 shadow-md rounded-xl p-4">
                    <p class="font-medium">Textos com áudio</p>
                </div>
            </div>
            <div class="absolute top-20 right-0 -translate-x-10">
                <div class="bg-white border border-gray-200 shadow-md rounded-xl p-4">
                    <p class="font-medium">Favoritos</p>
                </div>
            </div>
            <div class="absolute top-12 left-10">
                <div class="bg-white border border-gray-200 shadow-md rounded-xl p-4">
                    <p class="font-medium">Flashcards</p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-12 text-center">
        <h2 class="text-xl font-bold mb-4">Precisa de ajuda? Entre em contato por email</h2>
        <p class="text-gray-600 mb-6">Clique no email abaixo para ser direcionado para o Outlook:</p>
        <a href="mailto:fluencypathifpe@gmail.com" class="text-teal-500 font-medium">fluencypathifpe@gmail.com</a>
    </section>

    <section class="py-12">
        <h2 class="text-xl font-bold text-center mb-8">Depoimentos</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
            <div class="bg-white border border-gray-200 shadow-md rounded-xl p-4">
                <p class="text-gray-600 mb-4">Texto com áudio...</p>
                <p class="text-sm text-gray-500 font-medium">Roberto Almeida</p>
            </div>
            <div class="bg-white border border-gray-200 shadow-md rounded-xl p-4">
                <p class="text-gray-600 mb-4">Texto com áudio...</p>
                <p class="text-sm text-gray-500 font-medium">Maria de Souza</p>
            </div>
            <div class="bg-white border border-gray-200 shadow-md rounded-xl p-4">
                <p class="text-gray-600 mb-4">Texto com áudio...</p>
                <p class="text-sm text-gray-500 font-medium">Paulo de Oliveira</p>
            </div>
            <div class="bg-white border border-gray-200 shadow-md rounded-xl p-4">
                <p class="text-gray-600 mb-4">Texto com áudio...</p>
                <p class="text-sm text-gray-500 font-medium">Ana Santos</p>
            </div>
        </div>
    </section>

    <footer class="bg-teal-500 text-white py-6">
        <div class="container mx-auto px-4 grid grid-cols-1 sm:grid-cols-3 gap-6 text-center">
            <div>
                <h3 class="text-lg font-bold mb-2">Links</h3>
                <ul>
                    <li><a href="#" class="hover:underline">Sobre</a></li>
                    <li><a href="#" class="hover:underline">Termos e Políticas</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-lg font-bold mb-2">Suporte</h3>
                <ul>
                    <li><a href="#" class="hover:underline">Sugestões</a></li>
                    <li><a href="#" class="hover:underline">Fale Conosco</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-lg font-bold mb-2">Empresa</h3>
                <ul>
                    <li><a href="#" class="hover:underline">Quem Somos</a></li>
                    <li><a href="#" class="hover:underline">Carreiras</a></li>
                </ul>
            </div>
        </div>
    </footer>
    </div>
</x-guest-layout>