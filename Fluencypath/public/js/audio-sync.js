// Script responsavel pela sincronização entre audio e texto - Importado no Show.blade.php

document.addEventListener("DOMContentLoaded", function () {
    let waveSurfer;
    let initialized = false;
    let sentenceTimestamps = [];
    let sentences = document.querySelectorAll(".sentence");
    const playButton = document.getElementById("playButton");

    // Inicialização do Wavesurfer e Carregamento do Áudio
    function initializeWavesurfer() {
        waveSurfer = WaveSurfer.create({
            container: "#waveform",
            waveColor: "violet",
            progressColor: "purple",
            cursorColor: "red",
            height: 50,
        });

        let audioPath = playButton.getAttribute("data-audio");

        if (!audioPath) {
            console.error("Erro: Caminho do áudio não encontrado.");
            return;
        }

        console.log("Carregando áudio:", audioPath);
        waveSurfer.load(audioPath);

        waveSurfer.on("ready", function () {
            let totalDuration = waveSurfer.getDuration();
            detectSpeechStart(totalDuration);
        });

        waveSurfer.on("audioprocess", function () {
            highlightCurrentSentence(waveSurfer.getCurrentTime());
        });

        waveSurfer.on("finish", function () {
            playButton.innerText = "▶️ Play";
        });

        initialized = true;
    }

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

    // Detecção do Início da Fala
    function detectSpeechStart(totalDuration) {
        let decodedData = waveSurfer.getDecodedData();
        if (!decodedData) {
            console.error("Erro: Dados de áudio não disponíveis.");
            return;
        }

        let channelData = decodedData.getChannelData(0);
        let threshold = 0.08; // Limiar de volume para considerar como fala
        let sampleRate = decodedData.sampleRate;
        let speechStart = 0;

        for (let i = 0; i < channelData.length; i++) {
            if (Math.abs(channelData[i]) > threshold) {
                speechStart = i / sampleRate;
                break;
            }
        }

        console.log("Início da fala detectado em:", speechStart);
        calculateTimestamps(totalDuration, speechStart);
    }

    function calculateTimestamps(totalDuration, speechStart) {
        let numSentences = sentences.length;
        let totalWords = 0;
        let wordsPerSentence = [];

        sentences.forEach(sentence => {
            let words = sentence.textContent.trim().split(/\s+/).length;
            wordsPerSentence.push(words);
            totalWords += words;
        });

        let accumulatedTime = speechStart;
        sentenceTimestamps = [];

        wordsPerSentence.forEach((words, index) => {
            let sentenceDuration = (words / totalWords) * (totalDuration - speechStart);
            sentenceDuration += 0.5;

            sentenceTimestamps.push(accumulatedTime);
            accumulatedTime += sentenceDuration;
        });

        console.log("Timestamps ajustados:", sentenceTimestamps);
    }

    // Destaque das Frases de Texto
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
