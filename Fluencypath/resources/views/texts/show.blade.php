@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/app.css') }}">

<div class="container">
    <h1 class="my-4">Texto</h1>
    <div class="card" style="border: 1px solid #ccc; padding: 15px; margin: 15px; width: 50%">
        <h3>{{ $texts->title }}</h3>
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

        <h4>Áudio</h4>
        <div id="waveform"></div>
        <button id="playButton">▶️ Play</button>

        <h4>Texto Sincronizado</h4>
        <p id="text-content">
            @php
                // Divide o texto usando . ? ! ou ,
                $sentences = preg_split('/(?<=[.!?, ])\s+|(?=[A-Z])/', $texts->content, -1, PREG_SPLIT_NO_EMPTY);

                // Se não encontrou nenhuma separação, trata como uma única frase
                if (count($sentences) === 0) {
                    $sentences = [$texts->content];
                }
            @endphp

            @foreach ($sentences as $index => $sentence)
                <span class="sentence" data-index="{{ $index }}">{{ $sentence }} </span>
            @endforeach
        </p>
    </div>

    <a href="{{ route('texts.index') }}" style="text-decoration: none; color: blue;">Voltar</a>
</div>

<!-- SCRIPT DO WAVESURFER -->
<script src="https://unpkg.com/wavesurfer.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
    let waveSurfer;
    let initialized = false;
    let sentenceTimestamps = [];
    let sentences = document.querySelectorAll(".sentence");

    function initializeWavesurfer() {
        waveSurfer = WaveSurfer.create({
            container: "#waveform",
            waveColor: "violet",
            progressColor: "purple",
            cursorColor: "red",
            height: 80,
        });

        waveSurfer.load("{{ Storage::url($texts->audio->file_path) }}");

        waveSurfer.on("ready", function () {
            let totalDuration = waveSurfer.getDuration();
            calculateTimestamps(totalDuration);
        });

        waveSurfer.on("audioprocess", function () {
            highlightCurrentSentence(waveSurfer.getCurrentTime());
        });

        waveSurfer.on("finish", function () {
            playButton.innerText = "▶️ Play";
        });

        initialized = true;
    }

    const playButton = document.getElementById("playButton");

    playButton.addEventListener("click", function () {
        if (!initialized) {
            initializeWavesurfer();
        }

        if (waveSurfer.isPlaying()) {
            waveSurfer.pause();
            this.innerText = "▶️ Play";
        } else {
            waveSurfer.play();
            this.innerText = "⏸️ Pause";
        }
    });

    function calculateTimestamps(totalDuration) {
        let numSentences = sentences.length;
        let totalWords = 0;
        let wordsPerSentence = [];

        // Contar o número total de palavras
        sentences.forEach(sentence => {
            let words = sentence.textContent.trim().split(/\s+/).length;
            wordsPerSentence.push(words);
            totalWords += words;
        });

        let accumulatedTime = 0;

        // Distribuir o tempo proporcionalmente ao número de palavras
        sentenceTimestamps = []; // Agora está atualizando a variável global
        wordsPerSentence.forEach((words, index) => {
            let sentenceDuration = (words / totalWords) * totalDuration;
            sentenceDuration += 0.5; // Adiciona meio segundo extra para cada frase

            sentenceTimestamps.push(accumulatedTime);
            accumulatedTime += sentenceDuration;
        });

        console.log("Timestamps ajustados:", sentenceTimestamps);
    }

    function highlightCurrentSentence(currentTime) {
        sentences.forEach((sentence, index) => {
            if (
                currentTime >= sentenceTimestamps[index] &&
                (index === sentenceTimestamps.length - 1 || currentTime < sentenceTimestamps[index + 1])
            ) {
                sentence.classList.add("highlight");
            } else {
                sentence.classList.remove("highlight");
            }
        });
    }
});

</script>

<!-- CSS PARA DESTACAR FRASES -->
<style>
    .sentence {
        transition: background-color 0.2s ease-in-out;
    }
    .sentence.highlight {
        background-color: lightblue;
    }
</style>
@endsection
