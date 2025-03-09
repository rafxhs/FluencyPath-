@extends('layouts.app')

<!-- CSS - sincronização de audio e detalhe das palavras -->
<link rel="stylesheet" href="{{ asset('css/app.css') }}"><link/>

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
    <div class="card" style="border: 1px solid #ccc; padding: 15px; margin: 15px; width: 50%">
        <h3>{{ $texts->title }}</h3>

        <!-- TAGS -->
        <p>
            Tags:
            @php
            $tags = json_decode($texts->tag, true);
            @endphp
            @if (is_array($tags))
            @foreach ($tags as $tag)
            <span style="display: inline-block; background-color: #e0e0e0; color: #333; padding: 5px 10px; margin: 5px; border-radius: 5px;">
                {{ $tag['value'] }}
            </span>
            @endforeach
            @else
            <span>tags não correspondente</span>
            @endif
        </p>
        <!-- AUDIO -->
        <h4>Áudio</h4>
        <div id="waveform"></div>
        <button id="playButton" data-audio="{{ Storage::url($texts->audio->file_path) }}">▶️ Play</button>


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

                <p id="text-content">
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
    </div>

    <a href="{{ route('texts.index') }}" style="text-decoration: none; color: blue;">Voltar</a>
    </div>

    <!-- Importa o Wavesurfer -->
    <script src="https://unpkg.com/wavesurfer.js"></script>
    <!-- Importa o script para a sincronização -->
    <script src="{{ asset('/js/audio-sync.js') }}"></script>
    <!-- Importa o script do card das palras -->
    <script src="{{ asset('/js/word-tooltip.js') }}"></script>

<div id="tooltip" class="hidden absolute bg-white p-3 shadow-md border rounded-md"></div>
@endsection
