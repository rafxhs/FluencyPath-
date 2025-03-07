// Script responsavel pelo card de detalhes ao clicar na palavra do texto - Importado no Show.blade.php

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
                    tooltip.innerHTML = "Esta palavra ainda não está disponível! &#128517;";
                } else {
                    let audioButton = data.audio
                        ? `<button onclick="new Audio('${data.audio}').play()"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.114 5.636a9 9 0 0 1 0 12.728M16.463 8.288a5.25 5.25 0 0 1 0 7.424M6.75 8.25l4.72-4.72a.75.75 0 0 1 1.28.53v15.88a.75.75 0 0 1-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.009 9.009 0 0 1 2.25 12c0-.83.112-1.633.322-2.396C2.806 8.756 3.63 8.25 4.51 8.25H6.75Z" />
                        </svg></button>`
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
