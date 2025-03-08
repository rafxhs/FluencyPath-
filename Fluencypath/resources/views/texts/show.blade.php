@extends('layouts.app')

@section('content')
<section class="container">
    <div>
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li>
                <div class="flex items-center">
                    <a href="{{route('texts.index')}}" class="ms-1 font-primary font-medium text-sm text-neutral-400 md:ms-2 dark:hover:text-neutral-300">Textos</a>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <x-heroicon-s-chevron-right class="w-5 h-4 text-neutral-300" />
                    <span class="ms-1 font-primary font-medium text-sm text-neutral-400 md:ms-2">Meus Favoritos</span>
                </div>
            </li>
        </ol>
    </div>

    <div>
        <div>
            <h1 class="font-primary font-medium text-base text-primary-1000">{{ $texts->title }}</h1>
            <!-- Botão de Favoritar -->
            <button
                class="favorite-btn flex items-center space-x-2 mt-4"
                data-text-id="{{ $text->id }}"
                data-favorited="{{ Auth::user()->favorites()->where('text_id', $text->id)->exists() ? 'true' : 'false' }}">
                <!-- Ícone do coração -->
                <span class="favorite-icon text-2xl">
                    {{ Auth::user()->favorites()->where('text_id', $text->id)->exists() ? '❤️' : '🤍' }}
                </span>
                <!-- Contador de favoritos -->
                <span class="favorites-count text-gray-600 text-lg">
                    {{ $text->favorites_count }}
                </span>
            </button>
            <x-tertiary-button>
                <x-heroicon-s-plus class="w-6 h-6 text-primary-300" />
                <a href="{{ route('texts.create') }}" class="font-primary text-primary-300">Adicionar texto</a>
            </x-tertiary-button>
        </div>
        <p><strong>Tags:</strong> {{ $texts->tag }}</p>
        <p>{{ $texts->content }}</p>
        <audio controls>
            <source src="{{ Storage::url($texts->audio->file_path) }}" type="audio/{{ pathinfo($texts->audio->file_path, PATHINFO_EXTENSION) }}">
            Seu navegador não suporta o elemento de áudio.
        </audio>
        <a href="{{ route('texts.index') }}" style="text-decoration: none; color: blue;">Back to List</a>
    </div>

</section>
@endsection