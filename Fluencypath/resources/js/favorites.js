// Seleciona todos os botões de favorito
document.querySelectorAll('.favorite-btn').forEach(button => {
    button.addEventListener('click', function () {
        const textId = this.dataset.textId; // ID do texto
        const isFavorited = this.dataset.favorited === 'true'; // Verifica se está favoritado
        const favoriteIcon = this.querySelector('.favorite-icon'); // Ícone do coração
        const favoritesCount = this.querySelector('.favorites-count'); // Contador de favoritos

        // Obtém o CSRF Token do meta tag
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // Faz a requisição para o endpoint de favoritos
        fetch(`/texts/${textId}/favorite`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
            },
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Erro na requisição');
                }
                return response.json();
            })
            .then(data => {
                // Atualiza o ícone do coração e o contador de favoritos com base na resposta
                if (data.favorited) {
                    favoriteIcon.textContent = '❤️'; // Ícone preenchido
                    this.dataset.favorited = 'true';
                } else {
                    favoriteIcon.textContent = '🤍'; // Ícone vazio
                    this.dataset.favorited = 'false';
                }
                favoritesCount.textContent = data.favorites_count; // Atualiza o contador
            })
            .catch(error => {
                console.error('Erro:', error); // Log do erro
                alert('Ocorreu um erro ao atualizar os favoritos. Tente novamente.'); // Alerta para o usuário
            });
    });
});
