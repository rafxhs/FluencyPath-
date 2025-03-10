@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <section class="py-10">
        <div class="w-full flex justify-end pt-28">
            <x-secondary-button>
                <x-heroicon-s-plus class="w-6 h-6  text-primary-300" />
                <a href="{{ route('texts.create') }}" class="font-primary text-sm text-primary-300">Adicionar texto</a>
            </x-secondary-button>
        </div>
        <h1 class="font-primary font-medium text-2xl text-primary-1000 py-8">Meus Favoritos</h1>

        <div class="items-center justify-center grid grid-cols-3 gap-2">
            @php
            $user = Auth::user();
            $favoriteTexts = $user->favorites()->with('favorites')->get();
            @endphp

            @if ($favoriteTexts->isEmpty())
            <div class="flex flex-col absolute inset-0 items-center justify-center font-primary text-center p-8">
                <h1 class="font-medium text-lg text-neutral-500 py-2">Nenhum texto favoritado</h1>
                <p class="text-justify text-sm text-neutral-500 py-2">Marque com estrelas os textos que você deseja acessar facilmente depois.</p>
            </div>
            @else
            @foreach ($favoriteTexts as $text)
            <article class="w-[340px] h-[260px] bg-primary-100 rounded-lg p-4 shadow-md">
                <header class="flex items-center justify-between my-2">
                    <a href="{{ route('texts.show', $text->id) }}" class="font-primary font-medium text-base text-primary-1000">
                        {{ $text->title }}
                    </a>

                    <div class="w-[60px] h-[30px]  flex items-center justify-center bg-primary-200 rounded border-2 border-neutral-100">
                        <!-- Botão de Favoritar -->
                        <button
                            class="favorite-btn flex items-center space-x-2"
                            data-text-id="{{ $text->id }}"
                            data-favorited="{{ Auth::user()->favorites()->where('text_id', $text->id)->exists() ? 'true' : 'false' }}">
                            <!-- Ícone do coração -->
                            <span class="favorite-icon text-xl">
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

                <p class="mt-2 text-sm text-gray-700 text-justify">{{ Str::limit($text->content, 160, '...') }}</p>

                @if ($text->audio_path)
                <audio controls class="mt-2 w-full">
                    <source src="{{ asset('storage/' . $text->audio_path) }}" type="audio/mpeg">
                </audio>
                @endif
            </article>
            @endforeach
            @endif
        </div>

        @if (!$favoriteTexts->isEmpty())
        <a href="{{ route('favorites.index') }}" class="justify-end block mt-4 text-center text-primary-1000 font-medium">Ver mais</a>
        @endif
    </section>


    <section class="py-10">
        <h1 class="font-primary font-medium text-2xl text-primary-1000 py-8">Meus Textos</h1>

        @if ($userTexts->isEmpty())
        <div class="flex flex-col absolute inset-0 items-center justify-center font-primary text-center p-8">
            <h1 class="font-medium text-lg text-neutral-500 py-2">Nenhum texto adicionado</h1>
            <p class="text-justify text-sm text-neutral-500 py-2">Adicione algum texto para visualizar.</p>
        </div>
        @else

        @php
        $user = Auth::user();
        $favoriteTexts = $user->favorites()->with('favorites')->get();
        @endphp
        @foreach ($userTexts as $text)
        <section class="items-center justify-center grid grid-cols-3 gap-2">
            <article class="w-[340px] h-[260px] relative bg-primary-100 rounded-lg p-4 shadow-md">
                <header class="flex items-center space-x-2 mt-2">
                    <a href="{{ route('texts.show', $text->id) }}" class="font-primary font-medium text-base text-primary-1000">
                        {{ $text->title }}
                    </a>

                    <div class="w-[60px] h-[30px] flex items-center justify-center bg-primary-200 rounded border-2 border-neutral-100">
                        <!-- Botão de Favoritar -->
                        <button
                            class="favorite-btn flex items-center space-x-2"
                            data-text-id="{{ $text->id }}"
                            data-favorited="{{ Auth::user()->favorites()->where('text_id', $text->id)->exists() ? 'true' : 'false' }}">
                            <!-- Ícone do coração -->
                            <span class="favorite-icon text-xl">
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
            </article>
            @endforeach
            @endif
        </section>

        @if (!$favoriteTexts->isEmpty())
        <a href="{{ route('favorites.index') }}" class="justify-end block mt-4 text-center text-primary-1000 font-medium">Ver mais</a>
        @endif
    </section>


    <section class="py-10">
        <h1 class="font-primary font-medium text-2xl text-primary-1000 py-">Textos</h1>

        <div class="items-center justify-center grid grid-cols-3 gap-2">
            @php
            $user = Auth::user();
            $favoriteTexts = $user->favorites()->with('favorites')->get();
            @endphp
            @foreach ($texts as $text)
            <article class="w-[340px] h-[260px] bg-primary-100 rounded-lg p-4 shadow-md">

                <header class="flex items-center space-x-2 mt-2">
                    <a href="{{ route('texts.show', $text->all()) }}" class="font-primary font-medium text-base text-primary-1000">
                        {{ $text->title }}
                    </a>

                    <div class="w-[60px] h-[30px] flex items-center justify-center bg-primary-200 rounded border-2 border-neutral-100">
                        <!-- Botão de Favoritar -->
                        <button
                            class="favorite-btn flex items-center space-x-2"
                            data-text-id="{{ $text->id }}"
                            data-favorited="{{ Auth::user()->favorites()->where('text_id', $text->id)->exists() ? 'true' : 'false' }}">
                            <!-- Ícone do coração -->
                            <span class="favorite-icon text-xl">
                                {{ Auth::user()->favorites()->where('text_id', $text->id)->exists() ? '❤️' : '🤍' }}
                            </span>
                            <!-- Contador de favoritos -->
                            <span class="favorites-count text-gray-600 text-lg">
                                {{ $text->favorites_count }}
                            </span>
                        </button>
                    </div>
                </header>

                <div class="grid grid-cols-2">
                    <p class="text-sm text-gray-500 truncate">{{ $text->user->name }}</p>
                    <p class="text-sm text-gray-500">- {{ $text->created_at->format('d/m/Y') }}</p>
                </div>

                <ul>
                    @php
                    $tags = json_decode($text->tag, true);
                    @endphp
                    @if (is_array($tags))
                    @foreach ($tags as $tag)
                    <li class="inline-block bg-gray-200 text-gray-800 px-2 py-1 rounded-md text-sm">
                        {{ $tag['value'] }}
                    </li>
                    @endforeach
                    @else
                    <li class="text-gray-400 text-sm">Sem tags</li>
                    @endif
                </ul>

                <p class="mt-2 text-sm text-gray-700">{{ Str::limit($text->content, 160, '...') }}</p>

                @if ($text->audio_path)
                <audio controls class="mt-2 w-full">
                    <source src="{{ asset('storage/' . $text->audio_path) }}" type="audio/mpeg">
                </audio>
                @endif
            </article>
            @endforeach
        </div>

        <a href="{{ route('texts.index') }}" class="block mt-4 text-center text-primary-1000 font-medium">Ver mais</a>
    </section>
</div>
@endsection