
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".word").forEach(word => {
        word.addEventListener("click", async function (event) {
            let wordText = this.getAttribute("data-word");
            let tooltip = document.getElementById("tooltip");
            console.log(`Buscando palavra: ${wordText}`); 

            try {
                let response = await fetch(`/word/${wordText}`);
                let data = await response.json();

                if (data.error) {
                    tooltip.innerHTML = "Palavra não encontrada.";
                } else {
                    let audioButton = data.audio
                        ? `<button onclick="new Audio('${data.audio}').play()">🔊 Ouvir</button>`
                        : "";

                    tooltip.innerHTML = `
                        <strong>${data.word}</strong> <br>
                        <span style="font-style: italic;">${data.pronunciation || 'N/A'}</span> <br>
                        ${audioButton}
                    `;
                }

                tooltip.classList.remove("hidden");

                // Posicionar o tooltip ao lado da palavra clicada
                tooltip.style.left = `${event.pageX}px`;
                tooltip.style.top = `${event.pageY + 20}px`;

                // Esconder após 5 segundos
                setTimeout(() => tooltip.classList.add("hidden"), 5000);
            } catch (error) {
                console.log("Erro ao buscar a palavra.");
            }
        });
    });
});
