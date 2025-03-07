// Script responsavel por gerenciar API's Usadas no Flascard - Importado no flashcards/index.blade.php

document.addEventListener("DOMContentLoaded", async function () {
    const flashcards = document.querySelectorAll("[data-word]");

    for (const flashcard of flashcards) {
        const word = flashcard.getAttribute("data-word");
        const sentenceEnElement = flashcard.querySelector(".sentence-en");
        const sentencePtElement = flashcard.querySelector(".sentence-pt");

        try {
            // Faz a busca na API do dictionaryapi.dev
            const response = await fetch(`https://api.dictionaryapi.dev/api/v2/entries/en/${word}`);
            const data = await response.json();

            if (Array.isArray(data) && data.length > 0) {
                let exampleSentence = null;

                // Percorre os significados para encontrar um exemplo (frase)
                for (const meaning of data[0].meanings) {
                    for (const definition of meaning.definitions) {
                        if (definition.example) {
                            exampleSentence = definition.example;
                            break;
                        }
                    }
                    if (exampleSentence) break;
                }

                // Se encontrou uma frase de exemplo, usa essa frase
                if (exampleSentence) {
                    sentenceEnElement.textContent = exampleSentence;
                }
            }
        } catch (error) {
            console.error(`Erro ao buscar frase para "${word}":`, error);
        }

        // API de tradução MyMemory
        const sentenceEn = sentenceEnElement.textContent.trim(); // Pega a frase correta
        if (sentenceEn) {
            try {
                const translationResponse = await fetch(
                    `https://api.mymemory.translated.net/get?q=${encodeURIComponent(sentenceEn)}&langpair=en|pt`
                );
                const translationData = await translationResponse.json();
                
                if (translationData.responseData.translatedText) {
                    sentencePtElement.textContent = translationData.responseData.translatedText;
                }
            } catch (error) {
                console.error(`Erro ao traduzir frase "${sentenceEn}":`, error);
            }
        }
        
    }
});

// Função para o funcionamento da leitura e das frases e palvras em ingles
function speakText(event, button) {
    event.stopPropagation(); // Evita que o card vire

    let flashcard = button.closest('.relative'); // O card inteiro
    let frontCard = flashcard.querySelector('.backface-hidden:not(.rotate-y-180)'); // Frente do card
    let backCard = flashcard.querySelector('.rotate-y-180'); // Verso do card
    let textToSpeak = "";

    if (button.closest('.rotate-y-180')) {
        // Está no verso -> pegar a frase
        let sentenceElement = backCard.querySelector('.sentence-en');
        if (sentenceElement) {
            textToSpeak = sentenceElement.textContent.trim();
        }
    } else {
        // Está na frente -> pegar a palavra
        let wordElement = frontCard.querySelector('h5'); // O <h5> elemnto onde esta a a palavra
        if (wordElement) {
            textToSpeak = wordElement.textContent.trim();
        }
    }

    if (textToSpeak) {
        const utterance = new SpeechSynthesisUtterance(textToSpeak);
        utterance.lang = 'en-US'; // Define o idioma para inglês americano
        utterance.rate = 1; // Velocidade normal
        speechSynthesis.speak(utterance);
    } else {
        console.error('Nenhum texto encontrado para leitura.');
    }
}
