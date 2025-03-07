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

                // Percorre os significados para encontrar um exemplo
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

        // Agora chama a API de tradução MyMemory
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

function speakText(event, button,) {
    event.stopPropagation(); // Evita virar o card

    // Encontra a frase correta no DOM (a frase vinda da API)
    let sentenceElement = button.closest('.backface-hidden').querySelector('.sentence-en');

    if (sentenceElement ) {
        let sentence = sentenceElement.textContent.trim();
        if (sentence) {
            const utterance = new SpeechSynthesisUtterance(sentence);
            utterance.lang = 'en-US'; // Define o idioma para inglês americano
            utterance.rate = 1; // Velocidade normal
            speechSynthesis.speak(utterance);
        } else {
            console.error('Nenhuma frase encontrada para leitura.');
        }
    } else {
        console.error('Elemento da frase não encontrado.');
    }
}
