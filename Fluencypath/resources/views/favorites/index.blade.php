@extends('layouts.app')

@section('content')
<section class="max-w-7xl mx-auto px-4 sm:px-10 lg:px-10">
    <header>
        <div class="w-full h-[400px] bg-neutral-200">
        </div>

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

        <h1 class="font-primary font-medium text-2xl text-primary-1000 py-8">
            {{ __('Meus Favoritos') }}
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

    <div class="container py-10">
        <div class="items-center justify-center grid grid-cols-3 gap-2">
            @php
            $user = Auth::user();
            $favoriteTexts = $user->favorites()->with('favorites')->get();
            @endphp

            <article class="w-[340px] h-[260px] relative bg-primary-100 rounded-lg p-4 shadow-md">
                @if ($favoriteTexts->isEmpty())
                <div class="flex flex-col absolute inset-0 items-center justify-center font-primary text-center p-8">
                    <h1 class="font-medium text-lg text-neutral-500 py-2">Nenhum texto favoritado</h1>
                    <p class="text-justify text-sm text-neutral-500 py-2">Marque com estrelas os textos que você deseja acessar facilmente depois.</p>
                </div>
                @else
                @foreach ($favoriteTexts as $text)
                <header class="flex items-center space-x-2 mt-2">
                    <a href="{{ route('texts.show', $text->id) }}" class="font-primary font-medium text-base text-primary-1000">
                        {{ $text->title }}
                    </a>

                    <div class="flex w-[50px] h-[30px] bg-primary-200 rounded border-2 border-neutral-100">
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
                </header>

                <p class="text-sm text-gray-500">{{ $text->user->name }} - {{ $text->created_at->format('d/m/Y') }}</p>

                @php
                $tags = json_decode($text->tag, true);
                @endphp
                @if (is_array($tags))
                @foreach ($tags as $tag)
                <span class="inline-block bg-gray-200 text-gray-800 px-2 py-1 rounded-md text-sm">
                    {{ $tag['value'] }}
                </span>
                @endforeach
                @else
                <span class="text-gray-400 text-sm">Sem tags</span>
                @endif

                <p class="mt-2 text-sm text-gray-700">{{ Str::limit($text->content, 160, '...') }}</p>

                @if ($text->audio_path)
                <audio controls class="mt-2 w-full">
                    <source src="{{ asset('storage/' . $text->audio_path) }}" type="audio/mpeg">
                </audio>
                @endif
                @endforeach
                @endif
            </article>
        </div>

        <a href="{{ route('favorites.index') }}" class="justify-end block mt-4 text-center text-primary-1000 font-medium">Ver mais</a>
        </>
</section>
@endsection