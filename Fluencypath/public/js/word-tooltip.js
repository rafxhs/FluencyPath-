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
                    tooltip.innerHTML = "Esta palavra ainda não está disponível!  &#128517;";
                } else {
                    let audioButton = data.audio
                        ? `<button onclick="new Audio('${data.audio}').play()">🔊 Ouvir</button>`
                        : "";

                    tooltip.innerHTML = `
                        <strong>${data.word}</strong> <br>
                        Pronuncia: <em>${data.pronunciation || "Pronúncia não disponível."}</em> <br>
                        Tradução: ${data.translation}<br>
                        ${audioButton}
                        <br><button id="add-flashcard" class="bg-blue-500 text-white p-2 rounded mt-2">➕ Adicionar aos Flashcards</button>
                    `;

                    // Adiciona evento ao botão
                    document.getElementById("add-flashcard").addEventListener("click", async function () {
                        let sentenceElement = word.closest(".sentence");
                        let sentenceText = sentenceElement ? sentenceElement.innerText : "Sem contexto disponível";

                        let flashcardData = {
                            word: data.word,
                            sentence_en: sentenceText,
                            pronunciation: data.pronunciation,
                            translation: data.translation
                        };

                        let saveResponse = await fetch("/flashcards", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
                            },
                            body: JSON.stringify(flashcardData)
                        });

                        let result = await saveResponse.json();
                        alert(result.message);
                        tooltip.classList.add("hidden");
                    });
                }

                tooltip.classList.remove("hidden");

                // Ajusta a posição do tooltip próximo à palavra clicada
                let rect = this.getBoundingClientRect();
                tooltip.style.left = `${rect.left + window.scrollX}px`;
                tooltip.style.top = `${rect.bottom + window.scrollY + 10}px`;

                // Esconde o tooltip após 8 segundos
                setTimeout(() => tooltip.classList.add("hidden"), 8000);
            } catch (error) {
                tooltip.innerHTML = "Erro ao buscar a palavra";
                tooltip.classList.remove("hidden");
                setTimeout(() => tooltip.classList.add("hidden"), 3000);
            }
        });
    });
});
