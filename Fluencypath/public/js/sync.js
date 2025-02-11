import WaveSurfer from 'wavesurfer.js';

document.addEventListener("DOMContentLoaded", function () {
    const waveSurfer = WaveSurfer.create({
        container: "#waveform",
        waveColor: "violet",
        progressColor: "purple",
        cursorColor: "red",
        height: 80,
    });

    // Carregar o áudio
    waveSurfer.load("{{ Storage::url($texts->audio->file_path) }}");

    const playButton = document.getElementById("playButton");
    const sentences = document.querySelectorAll(".sentence");

    let totalDuration = 0;
    waveSurfer.on("ready", function () {
        totalDuration = waveSurfer.getDuration();
        calculateTimestamps();
    });

    // Estimativa de tempo para cada frase
    let sentenceTimestamps = [];
    function calculateTimestamps() {
        let numSentences = sentences.length;
        let avgTimePerSentence = totalDuration / numSentences;

        sentenceTimestamps = sentences.length > 0
            ? sentences.map((_, index) => index * avgTimePerSentence)
            : [];

        console.log("Timestamps calculados:", sentenceTimestamps);
    }

    function highlightCurrentSentence(currentTime) {
        sentences.forEach((sentence, index) => {
            if (currentTime >= sentenceTimestamps[index] &&
                (index === sentenceTimestamps.length - 1 || currentTime < sentenceTimestamps[index + 1])) {
                sentence.classList.add("highlight");
            } else {
                sentence.classList.remove("highlight");
            }
        });
    }

    waveSurfer.on("audioprocess", function () {
        highlightCurrentSentence(waveSurfer.getCurrentTime());
    });

    playButton.addEventListener("click", function () {
        if (waveSurfer.isPlaying()) {
            waveSurfer.pause();
            this.innerText = "▶️ Play";
        } else {
            waveSurfer.play();
            this.innerText = "⏸️ Pause";
        }
    });

    waveSurfer.on("finish", function () {
        playButton.innerText = "▶️ Play";
    });
});
