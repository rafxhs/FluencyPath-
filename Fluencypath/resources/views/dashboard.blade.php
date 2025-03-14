@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <section class="py-6">
        <div class="w-full flex justify-end pt-28">
            <x-secondary-button>
                <x-heroicon-s-plus class="w-6 h-6  text-primary-300" />
                <a href="{{ route('texts.create') }}" class="font-primary text-sm text-primary-300">Adicionar texto</a>
            </x-secondary-button>
        </div>
        <h1 class="font-primary font-medium text-2xl text-primary-1000 py-8">Meus Favoritos</h1>

        <div class="items-center justify-center grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @php
            $user = Auth::user();
            $favoriteTexts = $user->favorites()->with('favorites')->get();
            @endphp

            @if ($favoriteTexts->isEmpty())
            <div class="flex flex-col items-center justify-center w-full text-center p-8">
                <h1 class="font-medium text-lg text-neutral-500 py-2">Nenhum texto favoritado</h1>
                <p class="text-justify text-sm text-neutral-500 py-2">Marque com coração os textos que você deseja acessar facilmente depois.</p>
            </div>
            @else
            @foreach ($favoriteTexts as $text)
            <article class="w-full max-w-[340px] h-[260px] relative bg-primary-100 rounded-lg p-4 shadow-md my-4">
                <header class="flex items-center justify-between my-2">
                    <a href="{{ route('texts.show', $text->id) }}" class="font-primary font-medium text-base text-primary-1000">
                        {{ $text->title }}
                    </a>

                    <div class="w-[60px] h-[30px] flex items-center justify-center bg-primary-200 border border-neutral-100 rounded">
                        <button
                            class="favorite-btn flex items-center space-x-2"
                            data-text-id="{{ $text->id }}"
                            data-favorited="{{ Auth::user()->favorites()->where('text_id', $text->id)->exists() ? 'true' : 'false' }}">
                            <span class="favorite-icon text-xl">
                                {{ Auth::user()->favorites()->where('text_id', $text->id)->exists() ? '❤️' : '🤍' }}
                            </span>
                            <span class="favorites-count text-gray-600 text-lg">
                                {{ $text->favorites_count }}
                            </span>
                        </button>
                    </div>
                </header>

                <div class="grid grid-cols-2">
                    <p class="text-sm text-gray-500 truncate">{{ $text->user->name }}</p>
                    <p class="text-sm text-gray-500">- {{ $text->created_at->translatedFormat('M, j \d\e Y') }}</p>
                </div>

                <ul>
                    @php
                    $tags = json_decode($text->tag, true);
                    @endphp
                    @if (is_array($tags))
                    @foreach (array_slice($tags, 0, 4) as $tag)
                    <li class="inline-block bg-neutral-100 font-secondary font-semibold text-sm text-primary-900 py-1 px-3 mt-4 mb-2 rounded-full">
                        {{ $tag['value'] }}
                    </li>
                    @endforeach
                    @else
                    <li>Tags não correspondente!</li>
                    @endif
                </ul>
                <p class="mt-2 text-sm text-gray-700 text-justify">{{ Str::limit($text->content, 160, '...') }}</p> <!--Limita até 25 caracteres do texto -->
                @if ($text->audio_path)
                <audio controls>
                    <source src="{{ asset('storage/' . $text->audio_path) }}" type="audio/mpeg">
                </audio>
                @endif
            </article>
            @endforeach
            @endif
        </div>

        @if (!$favoriteTexts->isEmpty())
        <div class="w-full flex justify-end mt-2 px-14">
            <a href="{{ route('favorites.index') }}" class="text-center text-primary-1000 font-medium">Ver mais</a>
        </div>
        @endif
    </section>

    <section class="py-6">
        <h1 class="font-primary font-medium text-2xl text-primary-1000 py-8">Meus Textos</h1>
        <div class="items-center justify-center grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @if ($userTexts->isEmpty())
            <div class="flex flex-col items-center justify-center w-full text-center p-8">
                <h1 class="font-medium text-lg text-neutral-500 py-2">Nenhum texto adicionado</h1>
                <p class="text-justify text-sm text-neutral-500 py-2">Adicione algum texto para visualizar.</p>
            </div>
            @else

            @foreach ($userTexts as $text)
            <article class="w-full max-w-[340px] h-[260px] relative bg-primary-100 rounded-lg p-4 shadow-md my-4">
                <header class="flex items-center justify-between my-2">
                    <a href="{{ route('texts.show', $text->id) }}" class="font-primary font-medium text-base text-primary-1000">
                        {{ $text->title }}
                    </a>

                    <div class="w-[60px] h-[30px] flex items-center justify-center bg-primary-200 border border-neutral-100 rounded">
                        <button
                            class="favorite-btn flex items-center space-x-2"
                            data-text-id="{{ $text->id }}"
                            data-favorited="{{ Auth::user()->favorites()->where('text_id', $text->id)->exists() ? 'true' : 'false' }}">
                            <span class="favorite-icon text-xl">
                                {{ Auth::user()->favorites()->where('text_id', $text->id)->exists() ? '❤️' : '🤍' }}
                            </span>
                            <span class="favorites-count text-gray-600 text-lg">
                                {{ $text->favorites_count }}
                            </span>
                        </button>
                    </div>
                </header>

                <div class="grid grid-cols-2">
                    <p class="text-sm text-gray-500 truncate">{{ $text->user->name }}</p>
                    <p class="text-sm text-gray-500">- {{ $text->created_at->translatedFormat('M, j \d\e Y') }}</p>
                </div>

                <ul>
                    @php
                    $tags = json_decode($text->tag, true);
                    @endphp
                    @if (is_array($tags))
                    @foreach (array_slice($tags, 0, 4) as $tag)
                    <li class="inline-block bg-neutral-100 font-secondary font-semibold text-sm text-primary-900 py-1 px-3 mt-4 mb-2 rounded-full">
                        {{ $tag['value'] }}
                    </li>
                    @endforeach
                    @else
                    <li>tags não correspondente (MUDAR ISSO pra quando não tiver na lista, nem guradar no banco)</li>
                    @endif
                </ul>
                <p class="mt-2 text-sm text-gray-700 text-justify">{{ Str::limit($text->content, 160, '...') }}</p> <!--Limita até 25 caracteres do texto -->
                @if ($text->audio_path)
                <audio controls>
                    <source src="{{ asset('storage/' . $text->audio_path) }}" type="audio/mpeg">
                </audio>
                @endif
            </article>
            @endforeach
            @endif
            </div>
            <div class="w-full flex justify-end mt-2 px-14">
                <a href="{{ route('favorites.index') }}" class="text-center text-primary-1000 font-medium">Ver mais</a>
            </div>
    </section>

    <section class="pt-3 pb-14">
        <h1 class="font-primary font-medium text-2xl text-primary-1000 py-8">Textos</h1>

        <div class="items-center justify-center grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($texts as $text)
            <article class="w-full max-w-[340px] h-[260px] relative bg-primary-100 rounded-lg p-4 shadow-md my-4">
                <header class="flex items-center justify-between my-2">
                    <a href="{{ route('texts.show', $text->id) }}" class="font-primary font-medium text-base text-primary-1000 truncate">
                        {{ $text->title }}
                    </a>

                    <div class="w-[60px] h-[30px] flex items-center justify-center bg-primary-200 border border-neutral-100 rounded">
                        <button
                            class="favorite-btn flex items-center space-x-2"
                            data-text-id="{{ $text->id }}"
                            data-favorited="{{ Auth::user()->favorites()->where('text_id', $text->id)->exists() ? 'true' : 'false' }}">
                            <span class="favorite-icon text-xl">
                                {{ Auth::user()->favorites()->where('text_id', $text->id)->exists() ? '❤️' : '🤍' }}
                            </span>
                            <span class="favorites-count text-gray-600 text-lg">
                                {{ $text->favorites_count }}
                            </span>
                        </button>
                    </div>
                </header>

                <div class="grid grid-cols-2">
                    <p class="text-sm text-gray-500 truncate">{{ $text->user->name }}</p>
                    <p class="text-sm text-gray-500">- {{ $text->created_at->translatedFormat('M, j \d\e Y') }}</p>
                </div>

                <ul>
                    @php
                    $tags = json_decode($text->tag, true);
                    @endphp
                    @if (is_array($tags))
                    @foreach (array_slice($tags, 0, 4) as $tag)
                    <li class="inline-block bg-neutral-100 font-secondary font-semibold text-sm text-primary-900 py-1 px-3 mt-4 mb-2 rounded-full">
                        {{ $tag['value'] }}
                    </li>
                    @endforeach
                    @else
                    <li>Tags não correspondente!</li>
                    @endif
                </ul>
                <p class="mt-2 text-sm text-gray-700 text-justify">{{ Str::limit($text->content, 160, '...') }}</p> <!--Limita até 25 caracteres do texto -->
                @if ($text->audio_path)
                <audio controls>
                    <source src="{{ asset('storage/' . $text->audio_path) }}" type="audio/mpeg">
                </audio>
                @endif
            </article>
            @endforeach
        </div>

        <div class="w-full flex justify-end mt-2 px-14">
            <a href="{{ route('texts.index') }}" class="text-center text-primary-1000 font-medium">Ver mais</a>
        </div>
    </section>
</div>
@endsection
