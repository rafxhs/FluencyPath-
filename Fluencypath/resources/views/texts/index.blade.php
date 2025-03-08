@extends('layouts.app')

@section('content')
<section class="max-w-7xl mx-auto px-4 sm:px-10 lg:px-10">
    <header>
        <div class="w-full h-[400px] bg-neutral-200">
        </div>

        <h1 class="font-primary font-medium text-2xl text-primary-1000 py-8">
            {{ __('Textos') }}
        </h1>

        <div class="flex items-end justify-end gap-4">
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
                    <x-dropdown-link :href="route('about')">Flashcards</x-dropdown-link>
                    <x-dropdown-link :href="route('profile.edit')">Meus textos</x-dropdown-link>
                    <x-dropdown-link :href="route('favorites.index')">Meus favoritos</x-dropdown-link>
                </x-slot>
            </x-dropdown-texts>

            <x-tertiary-button>
                <x-heroicon-s-plus class="w-6 h-6 text-primary-300" />
                <a href="{{ route('texts.create') }}" class="font-primary text-primary-300">Adicionar texto</a>
            </x-tertiary-button>
        </div>
    </header>

    <div class="justify-between">
        @php
        $user = Auth::user();
        $favoriteTexts = $user->favorites()->with('favorites')->get();
        @endphp
        @foreach ($texts as $text)
        <div class="card" style="border: 1px solid #ccc; padding: 15px; margin: 15px; width: 50%">
            <h3>{{ $text->title }}</h3>
            <p>
                Tags:
                @php
                $tags = json_decode($text->tag, true);
                @endphp
                @if (is_array($tags))
                @foreach ($tags as $tag)
                <span style="display: inline-block; background-color: #e0e0e0; color: #333; padding: 5px 10px; margin: 5px; border-radius: 5px;">
                    {{ $tag['value'] }}
                </span>
                @endforeach
                @else
                <span>tags não correspondente (MUDAR ISSO pra quando não tiver na lista, nem guradar no banco)</span>
                @endif
            </p>
            <p>{{ Str::limit($text->content, 160, '...') }}</p> <!--Limita até 25 caracteres do texto -->
            @if ($text->audio_path)
            <audio controls>
                <source src="{{ asset('storage/' . $text->audio_path) }}" type="audio/mpeg">
            </audio>
            @endif
            <a href="{{ route('texts.show', $text->id) }}" style="text-decoration: none; color: blue;">Ver mais</a>

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
        </div>



        <div>
            <form action="{{ route('texts.destroy', $text->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button onclick="return confirm('Deseja excluir este texto?')" class="btn btn-danger btn-sm bg-red-300 text-white p-2 rounded hover:bg-red-400">
                    <i class="bi bi-trash"></i> Deletar
                </button>
            </form>

            <a href="{{ route('texts.edit', $text->id) }}" class="bg-yellow-300 text-white p-2 rounded hover:bg-yellow-600 ">Editar</a>
        </div>
        @endforeach
    </div>
</section>
@endsection