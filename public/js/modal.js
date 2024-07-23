// Função para mostrar o modal com uma mensagem
function showModal(message) {
    document.getElementById('modalMessage').textContent = message; // Define a mensagem
    var modal = new bootstrap.Modal(document.getElementById('messageModal')); // Cria uma nova instância do modal
    modal.show(); // Mostra o modal
}

// Exemplo de como você pode chamar a função showModal com uma mensagem
document.addEventListener('DOMContentLoaded', function () {
    // Certifique-se de que as mensagens sejam convertidas corretamente
    var successMessage = @json(session('success', '')); // Obtém a mensagem de sucesso
    var errorMessage = @json(session('error', '')); // Obtém a mensagem de erro

    if (successMessage) {
        showModal(successMessage); // Mostra o modal com a mensagem de sucesso
    } else if (errorMessage) {
        showModal(errorMessage); // Mostra o modal com a mensagem de erro
    }
});
