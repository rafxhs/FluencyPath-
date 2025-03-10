@extends('layouts.app')

@section('content')
<section class="container max-w-7xl mx-auto px-4 sm:px-10 lg:px-10 mt-20">
    <header class="flex justify-between">
        <h1 class="font-primary font-medium text-2xl text-primary-1000 py-8">
            {{ __('Flashcards') }}
        </h1>

        <div class="flex items-center justify-end gap-4">
            <x-dropdown-texts align="left">
                <x-slot name="trigger">
                    <button class="bg-white border rounded-lg flex items-center justify-between w-40 shadow px-4 py-2">
                        Textos
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" :class="{'rotate-180': open}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('texts.index')">Textos</x-dropdown-link>
                    <x-dropdown-link :href="route('flashcards.index')">Flashcards</x-dropdown-link>
                    <x-dropdown-link :href="route('texts.index')">Meus textos</x-dropdown-link>
                    <x-dropdown-link :href="route('favorites.index')">Meus favoritos</x-dropdown-link>
                </x-slot>
            </x-dropdown-texts>

            <x-tertiary-button>
                <x-heroicon-s-plus class="w-6 h-6 text-primary-300" />
                <a href="{{ route('texts.create') }}" class="font-primary text-primary-300">Adicionar texto</a>
            </x-tertiary-button>
        </div>
    </header>

    <section>
        @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
            {{ session('error') }}
        </div>
        @endif

        @if($flashcards->isEmpty())
        <p class="text-gray-600">Você ainda não adicionou nenhum flashcard.</p>
        @else
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-4">
            @foreach($flashcards as $flashcard)
            <div x-data="{ flipped: false }" @click="flipped = !flipped" class="relative w-full h-60 perspective" data-word="{{ $flashcard->word }}">

                <!-- Card Container -->
                <div class="w-full h-full transition-transform duration-500 transform-style preserve-3d" :class="{ 'rotate-y-180': flipped }">
                    <!-- Frente do Card -->
                    <div class="absolute w-full h-full bg-primary-200 shadow-md rounded-lg flex flex-col items-center justify-center p-6 backface-hidden">
                        <h5 class="text-2xl font-bold text-center">{{ $flashcard->word }}</h5>
                        <button type="button" onclick="speakText(event,this)" class="absolute top-2 right-2">
                            <x-heroicon-o-speaker-wave class="w-6 h-6 text-primary-800  hover:text-primary-700 m-2" />
                        </button>
                        <p class="text-gray-700 text-center mt-2">{!! $flashcard->sentence_en !!}</p>
                    </div>
                    <!-- Verso do Card -->
                    <div class="absolute w-full h-full bg-blue-50 border-neutral-200 shadow-md rounded-lg p-6 transform rotate-y-180 backface-hidden flex flex-col justify-center">
                        <p class="text-gray-500 text-center word-translation">{{ $flashcard->word }} - {!! $flashcard->sentence_pt !!}</p>
                        <p class="text-gray-500 text-center"><em>{{ $flashcard->ipa }}</em></p>
                        <p class="font-medium text-gray-800 mt-2">Exemplo:</p>
                        <p class="font-medium text-lg sentence-en">{!! $flashcard->sentence_en !!}</p>
                        <p class="text-gray-700 sentence-pt"></p>
                        <button type="button" onclick="speakText(event, this)" class="absolute top-2 right-2">
                            <x-heroicon-o-speaker-wave class="w-6 h-6 text-primary-800  hover:text-primary-700 m-2" />
                        </button>
                        <form action="{{ route('flashcards.destroy', $flashcard->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja apagar este flashcard?');" class="pt-5">
                            @csrf
                            @method('DELETE')
                            <button class="flex items-center ml-auto bg-neutral-100 text-neutral-500 p-2 rounded-md hover:bg-primary-500 hover:text-primary-100">
                                Estudado
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </section>
</section>

<!-- Incluindo Alpine.js -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<!-- Script para funcionamento das Apis para tradução, frase, e leitura das palavras -->
<script src="{{ asset('js/flashcard.js') }}" defer></script>

<!-- Estilos da animação do card -->
<style>
    .perspective {
        perspective: 1000px;
    }

    .transform-style {
        transform-style: preserve-3d;
    }

    .backface-hidden {
        backface-visibility: hidden;
        position: absolute;
        width: 100%;
        height: 100%;
    }

    .rotate-y-180 {
        transform: rotateY(180deg);
    }
</style>
@endsection