
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
                    tooltip.innerHTML = "Esta palavra ainda não esta diponivel!  &#128517;";
                } else {
                    let audioButton = data.audio
                        ? `<button onclick="new Audio('${data.audio}').play()">🔊 Ouvir</button>`
                        : "";

                    tooltip.innerHTML = `
                        <strong>${data.word}</strong> <br>
                        Pronuncia: <em>${data.pronunciation || "Pronúncia não dísponivel."}</em> <br>
                        Tradução: ${data.translation}<br>
                        ${audioButton}
                    `;
                }

                tooltip.classList.remove("hidden");
                
                // Ajusta a posição do tooltip próximo à palavra clicada
                let rect = this.getBoundingClientRect();
                tooltip.style.left = `${rect.left + window.scrollX}px`;
                tooltip.style.top = `${rect.bottom + window.scrollY + 10}px`;

            // Esconde o tooltip(card) após 8 segundos
               setTimeout(() => tooltip.classList.add("hidden"), 8000);
            } catch (error) {
                tooltip.innerHTML = "Erro ao buscar a palavra";
                tooltip.classList.remove("hidden");
                setTimeout(() => tooltip.classList.add("hidden"), 3000);
            }
        });
    });
});
