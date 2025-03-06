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
        <div x-data="{ flipped: false }" @click="flipped = !flipped" class="relative w-full h-60 perspective">
            <!-- Card Container -->
            <div class="w-full h-full transition-transform duration-500 transform-style preserve-3d" :class="{ 'rotate-y-180': flipped }">
                <!-- Frente do Card -->
                <div class="absolute w-full h-full bg-white shadow-md rounded-lg flex flex-col items-center justify-center p-6 backface-hidden">
                    <h5 class="text-2xl font-bold text-center">{{ $flashcard->word }}</h5>
                    <p class="text-gray-700 text-center mt-2">{!! $flashcard->sentence_en !!}</p>
                </div>
                <!-- Verso do Card -->
                <div class="absolute w-full h-full bg-blue-50 border-blue-200 shadow-md rounded-lg p-6 transform rotate-y-180 backface-hidden flex flex-col justify-center">
                    <p class="text-gray-500 text-center">{{ $flashcard->word }} - {!! $flashcard->sentence_pt !!}</p>
                    <p class="text-gray-500 text-center"><em>{{ $flashcard->ipa }}</p></em>
                    <p class="font-medium mt-2">Exemplo:</p>
                    <p class="text-gray-700">{!! $flashcard->sentence_en !!}</p>
                    <p class="text-gray-700">("aqui é a tradução do frase"!!)</p>
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

<!-- Estilos Extras -->
<style>
    .perspective {
        perspective: 1000px;
    }
    .transform-style {
        transform-style: preserve-3d;
    }
    .backface-hidden {
        backface-visibility: hidden;
    }
    .rotate-y-180 {
        transform: rotateY(180deg);
    }
</style>
@endsection
