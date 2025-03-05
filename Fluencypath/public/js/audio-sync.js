document.addEventListener("DOMContentLoaded", function () {
    let waveSurfer;
    let initialized = false;
    let sentenceTimestamps = [];
    let sentences = document.querySelectorAll(".sentence");
    const playButton = document.getElementById("playButton");

    // Obtém os timestamps do JSON embutido no HTML
    let timestampsJson = document.getElementById("timestamps-data");
    if (timestampsJson) {
        sentenceTimestamps = JSON.parse(timestampsJson.textContent);
    } else {
        console.error("Erro: Nenhum dado de timestamps encontrado.");
    }

    // Inicializa o Wavesurfer e carrega o áudio
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

    // Destaque das frases de texto conforme os timestamps
    function highlightCurrentSentence(currentTime) {
        sentences.forEach((sentence, index) => {
            let start = sentenceTimestamps[index]?.start || 0;
            let end = sentenceTimestamps[index]?.end || 0;

            if (currentTime >= start && currentTime < end) {
                sentence.classList.add("highlight");
            } else {
                sentence.classList.remove("highlight");
            }
        });
    }
});
