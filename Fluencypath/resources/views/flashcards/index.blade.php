@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold my-4">Meus Flashcards</h1>

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
                <div class="absolute w-full h-full bg-white shadow-md rounded-lg flex flex-col items-center justify-center p-6 backface-hidden">
                    <h5 class="text-2xl font-bold text-center">{{ $flashcard->word }}</h5>
                    <button  type="button" onclick="speakText(event,this)" class="absolute top-2 right-2 text-blue-500 hover:text-blue-700">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.114 5.636a9 9 0 0 1 0 12.728M16.463 8.288a5.25 5.25 0 0 1 0 7.424M6.75 8.25l4.72-4.72a.75.75 0 0 1 1.28.53v15.88a.75.75 0 0 1-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.009 9.009 0 0 1 2.25 12c0-.83.112-1.633.322-2.396C2.806 8.756 3.63 8.25 4.51 8.25H6.75Z" />
                        </svg>
                    </button>
                    <p class="text-gray-700 text-center mt-2">{!! $flashcard->sentence_en !!}</p>
                </div>
                <!-- Verso do Card -->
                <div class="absolute w-full h-full bg-blue-50 border-blue-200 shadow-md rounded-lg p-6 transform rotate-y-180 backface-hidden flex flex-col justify-center">
                    <p class="text-gray-500 text-center word-translation">{{ $flashcard->word }} - {!! $flashcard->sentence_pt !!}</p>
                    <p class="text-gray-500 text-center"><em>{{ $flashcard->ipa }}</em></p>
                    <p class="font-medium text-gray-800 mt-2">Exemplo:</p>
                    <p class="font-medium text-lg sentence-en">{!! $flashcard->sentence_en !!}</p>
                    <p class="text-gray-700 sentence-pt"></p> 
                    <button type="button" onclick="speakText(event, this)" class="absolute top-2 right-2 text-blue-500 hover:text-blue-700">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.114 5.636a9 9 0 0 1 0 12.728M16.463 8.288a5.25 5.25 0 0 1 0 7.424M6.75 8.25l4.72-4.72a.75.75 0 0 1 1.28.53v15.88a.75.75 0 0 1-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.009 9.009 0 0 1 2.25 12c0-.83.112-1.633.322-2.396C2.806 8.756 3.63 8.25 4.51 8.25H6.75Z" />
                        </svg>
                    </button>
                    <form action="{{ route('flashcards.destroy', $flashcard->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja apagar este flashcard?');">
                        @csrf
                        @method('DELETE')
                        <button class="ml-auto bg-gray-300 text-black p-2 rounded hover:bg-red-300 flex items-center">
                            Estudado
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif

    <a href="{{ route('texts.index') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded mt-4 hover:bg-blue-600">Voltar</a>
</div>

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
