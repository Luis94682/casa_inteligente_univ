
document.addEventListener('DOMContentLoaded', () => {
    // Seleciona todos os checkboxes com a classe device-toggle
    document.querySelectorAll('.form-check-input').forEach(checkbox => {
        checkbox.addEventListener('change', function(e) {
            const deviceId = this.getAttribute('data-device-id');
            const isChecked = this.checked; // true = ligado, false = desligado

            // Envia requisição AJAX
            fetch(`{{ url('/devices') }}/${deviceId}/toggle`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ ativo: isChecked ? 1 : 0 })
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Erro na resposta do servidor');
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    // Atualiza o badge de status
                    const badge = document.querySelector(`#status-${deviceId}`);
                    if (badge) {
                        badge.textContent = data.ativo ? 'Ativo' : 'Inativo';
                        badge.className = `badge ${data.ativo ? 'bg-success' : 'bg-secondary'}`;
                    }

                    // SweetAlert de sucesso
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: data.message,
                        showConfirmButton: false,
                        timer: 2500,
                        timerProgressBar: true
                    });
                } else {
                    // Erro do servidor (ex.: acesso negado)
                    this.checked = !isChecked; // Reverte o toggle
                    Swal.fire({
                        icon: 'error',
                        title: 'Erro',
                        text: data.message || 'Não foi possível atualizar o estado.'
                    });
                }
            })
            .catch(error => {
                // Erro de rede ou JSON inválido
                this.checked = !isChecked; // Reverte
                console.error('Erro AJAX:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Falha na conexão',
                    text: 'Verifica a tua internet ou tenta novamente.'
                });
            });
        });
    });
});
