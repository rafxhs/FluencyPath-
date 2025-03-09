// Script responsavel pela sincronização entre audio e texto - Importado no Show.blade.php

document.addEventListener("DOMContentLoaded", function () {
    let waveSurfer;
    let initialized = false;
    let sentenceTimestamps = [];
    let sentences = document.querySelectorAll(".sentence");
    const playButton = document.getElementById("playButton");

    function initializeWavesurfer() {
        waveSurfer = WaveSurfer.create({
            container: "#waveform",
            waveColor: "gray",
            progressColor: "black",
            cursorColor: "red",
            height: 3,
        });

         // Pega o caminho do áudio diretamente do botão Play
         let audioPath = playButton.getAttribute("data-audio");

         if (!audioPath) {
             console.error("Erro: Caminho do áudio não encontrado.");
             return;
         }
 
        console.log("Carregando áudio:", audioPath);
        waveSurfer.load(audioPath); 

        // Pega a duração (tempo) do audio
        waveSurfer.on("ready", function () {
            let totalDuration = waveSurfer.getDuration();
            calculateTimestamps(totalDuration);
        });

        // Adiciona as ondas com o waveSurfer
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

    function calculateTimestamps(totalDuration) {
        let numSentences = sentences.length;
        let totalWords = 0;
        let wordsPerSentence = [];

        // Conta o número total de palavras
        sentences.forEach(sentence => {
            let words = sentence.textContent.trim().split(/\s+/).length;
            wordsPerSentence.push(words);
            totalWords += words;
        });

        let accumulatedTime = 0;

        // Distribuir o tempo proporcionalmente ao número de palavras
        sentenceTimestamps = []; // Atualizando a variável global
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