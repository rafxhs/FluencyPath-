@extends('layouts.app')

<!-- CSS - sincronização de audio e detalhe das palavras -->
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link />

@section('content')

<section class="container max-w-7xl mx-auto px-4 sm:px-10 lg:px-10">
    <div class="card" style="padding: 15px; margin: 15px;">
        <nav aria-label="breadcrumb" class="pb-10">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li>
                    <div class="flex items-center">
                        <a href="{{route('texts.index')}}" class="ms-1 font-primary font-medium text-sm text-neutral-400 md:ms-2 dark:hover:text-neutral-300">Textos</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <x-heroicon-s-chevron-right class="w-5 h-4 text-neutral-300" />
                        <span class="ms-1 font-primary font-medium text-sm text-neutral-400 md:ms-2">Erro kkk</span>
                    </div>
                </li>
            </ol>
        </nav>

        <article>
            <header class="grid grid-cols-2 pt-10 pb-2">
                <h3 class="font-primary font-medium text-2xl text-neutral-600">{{ $texts->title }}</h3>

                <div class="inline-flex items-end justify-end gap-2">
                    <button class="h-[40px] flex items-center justify-center bg-primary-100 font-primary font-500 border border-neutral-100 rounded-md text-primary-300  text-center text-sm tracking-wides shadow-lg  px-2 py-2">
                        <x-heroicon-o-star class="w-6 h-6 text-neutral-300 hover:text-secondary-600 focus:text-secondary-600 active:text-secondary-600 focus:outline-none transition ease-in-out duration-150" />
                    </button>

                    <x-tertiary-button>
                        <x-heroicon-s-plus class="w-6 h-6 text-primary-300" />
                        <a href="{{ route('texts.create') }}" class="font-primary text-primary-300">Adicionar texto</a>
                    </x-tertiary-button>


                    @if(( Auth::user() && Auth::user()->is_admin == 'y') || (Auth::user() && Auth::user()->id == $texts->idUser))


                    <x-dropdown-actions align="left">
                        <x-slot name="trigger">
                            <button class="h-[40px] flex items-center justify-center bg-primary-700 font-primary font-500 border border-transparent rounded-md text-primary-300  text-center text-sm tracking-widest hover:bg-primary-400 focus:bg-primary-400 active:bg-primary-900 focus:outline-none transition ease-in-out duration-150 shadow-lg  px-2 py-2">
                                <x-heroicon-s-ellipsis-horizontal class="w-6 h-6 text-primary-300" />
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('texts.edit', $texts->id)" class="inline-flex items-center justify-center font-primary font-medium text-base text-neutral-500 gap-2"><x-heroicon-o-pencil-square class="w-5 h-5 text-neutral-500" /> Editar</x-dropdown-link>
                            <form action="{{ route('texts.destroy', $texts->id) }}" method="POST" onclick="return confirm('Deseja excluir este texto?')" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="flex w-full items-center justify-center px-4 py-2 font-primary font-medium text-start text-sm leading-5 text-neutral-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out gap-2 ">
                                    <x-heroicon-o-trash class="w-5 h-5 text-neutral-500" /> Excluir
                                </button>
                            </form>
                        </x-slot>
                        </x-dropdown-texts>
                        @endif
                </div>
            </header>

            <section class="pb-2">
                <!-- TAGS -->
                <ul>
                    @php
                    $tags = json_decode($texts->tag, true);
                    @endphp
                    @if (is_array($tags))
                    @foreach ($tags as $tag)
                    <li class="inline-block bg-neutral-100 font-secondary font-semibold text-sm text-primary-900 py-1 px-3 mt-4 mb-10 rounded-full">
                        {{ $tag['value'] }}
                    </li>
                    @endforeach
                    @else
                    <li>tags não correspondente</li>
                    @endif
                </ul>
            </section>


            <article class="w-[60%] py-4">
                <!-- AUDIO -->
                <figure class="w-[100%] h-[40px] flex items-center bg-primary-200 border rounded-full p-4 my-4 gap-2">
                    <button id="playButton" data-audio="{{ Storage::url($texts->audio->file_path) }}">▶️</button>
                    <span id="audioTimer" class="font-secondary text-neutral-600 text-base">00:00</span>
                    <div id="waveform" class="w-[80%]"></div>
                </figure>
                <!-- TEXTO -->
                <p id="text-content">
                    @php
                    // Divide o texto em frases usando . ? ! ou ,
                    $sentences = preg_split('/(?<=[.!?, ])\s+|(?=[A-Z])/', $texts->content, -1, PREG_SPLIT_NO_EMPTY);

                        // Se não encontrou nenhuma separação, trata como uma única frase
                        if (count($sentences) === 0) {
                        $sentences = [$texts->content];
                        }
                        @endphp

                        <p id="text-content" class=" bg-primary-200 border rounded-md text-neutral-600 text-justify p-8">
                            @foreach ($sentences as $index => $sentence)
                            <span class="sentence" data-index="{{ $index }}">
                                @php
                                $words = preg_split('/\s+/', trim($sentence), -1, PREG_SPLIT_NO_EMPTY);
                                @endphp
                                @foreach ($words as $word)
                                <span class="word" data-word="{{ strtolower(preg_replace('/[^\p{L}\p{N}]+/u', '', $word)) }}">
                                    {{ $word }}
                                </span>
                                @endforeach
                            </span>
                            @endforeach
                        </p>
            </article>
        </article>
    </div>
    </div>

    <!-- Importa o Wavesurfer -->
    <script src="https://unpkg.com/wavesurfer.js"></script>
    <!-- Importa o script para a sincronização -->
    <script src="{{ asset('/js/audio-sync.js') }}"></script>
    <!-- Importa o script do card das palras -->
    <script src="{{ asset('/js/word-tooltip.js') }}"></script>
    <!-- Importa o script do card das palras -->
    <script src="{{ asset('/js/btn-favorite-tooltip.js') }}"></script>

    <div id="tooltip" class="hidden absolute bg-white p-3 shadow-md border rounded-md"></div>
    @endsection
