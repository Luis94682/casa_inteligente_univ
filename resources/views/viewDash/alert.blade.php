@extends('viewDash._appDash')

@section('content')
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('viewDash.asideDash')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column" style="background-color:#081f2a">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('viewDash.navDash')
                <!-- End of Topbar -->

                <!-- Secção de Informátivos / Alertas -->
                <div class="container-fluid py-4">
                    <div class="row justify-content-center">
                        <div class="col-xl-12 col-lg-10 col-md-12">

                            <!-- Cabeçalho dinâmico -->
                            <div class="d-flex align-items-center mb-3">
                                <i class="bi bi-bell-fill text-primary me-2 fs-4"></i>
                                <h5 class="mb-0 text-white">
                                    Informátivos <span id="alert-count" class="badge bg-primary ms-2">0</span>
                                </h5>
                            </div>

                            <!-- Lista de alertas carregada via AJAX -->
                            <div id="alertas-list">
                                <div class="text-center py-5 text-muted">
                                    <div class="spinner-border text-primary" role="status"></div>
                                    <p class="mt-3">A carregar informativos...</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright © SmartHome 2026</span>
                    </div>
                </div>
            </footer>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- JavaScript para carregar alertas dinamicamente -->
   <script>
async function loadAlertas() {
    try {
        console.log('Iniciando fetch para alertas...');
        const url = '{{ route("alertas.index") }}';
        console.log('URL:', url);

        const response = await fetch(url, {
            headers: { 'Accept': 'application/json' }
        });

        console.log('Status:', response.status);
        console.log('OK:', response.ok);

        if (!response.ok) {
            const textError = await response.text();
            console.log('Erro HTTP - Resposta:', textError);
            throw new Error(`HTTP ${response.status}`);
        }

        const text = await response.text();
        console.log('Resposta crua:', text);

        let alertas;
        try {
            alertas = JSON.parse(text);
            console.log('JSON parseado:', alertas);
        } catch (parseError) {
            console.error('Erro parse JSON:', parseError);
            throw new Error('Resposta inválida');
        }

        const list = document.getElementById('alertas-list');
        const countEl = document.getElementById('alert-count');

        list.innerHTML = '';

        if (!Array.isArray(alertas) || alertas.length === 0) {
            list.innerHTML = `
                <div class="alert alert-secondary text-center rounded-4">
                    Nenhum informativo no momento
                </div>
            `;
            countEl.textContent = '0';
            countEl.classList.add('d-none');
            return;
        }

        countEl.textContent = alertas.length;
        countEl.classList.remove('d-none');

        alertas.forEach(alerta => {
            const card = document.createElement('div');
            card.className = `alert alert-${alerta.nivel || 'info'} d-flex align-items-center justify-content-between rounded-4 p-4 mb-3 shadow-sm border-0 ${alerta.lido ? 'opacity-50' : ''}`;
            card.style.background = 'linear-gradient(90deg, #0f162b 0%, #1a1f3d 100%)';
            card.style.border = '1px solid rgba(13,110,253,0.2)';

            card.innerHTML = `
                <div class="d-flex align-items-center flex-grow-1">
                    <div class="bg-primary rounded-circle p-2 me-3" style="width:40px;height:40px;display:flex;align-items:center;justify-content:center;">
                        <i class="bi bi-info-circle-fill text-white fs-5"></i>
                    </div>
                    <div>
                        <p class="mb-1 fw-medium text-white">${alerta.mensagem}</p>
                        <small class="text-muted">${new Date(alerta.data_alerta).toLocaleString('pt-AO', { dateStyle: 'short', timeStyle: 'short' })}</small>
                    </div>
                </div>
                ${!alerta.lido ? `<button type="button" class="btn-close btn-close-white ms-3 marcar-lido" data-id="${alerta.id}" aria-label="Fechar"></button>` : ''}
            `;

            list.appendChild(card);
        });

        // Evento marcar lido
        document.querySelectorAll('.marcar-lido').forEach(btn => {
            btn.addEventListener('click', async function() {
                const id = this.dataset.id;
                try {
                    const res = await fetch(`/alertas/${id}/marcar-lido`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        }
                    });
                    const data = await res.json();
                    if (data.success) {
                        this.closest('.alert').classList.add('opacity-50');
                        this.remove();
                        let count = parseInt(countEl.textContent) - 1;
                        countEl.textContent = count;
                        if (count === 0) countEl.classList.add('d-none');
                    }
                } catch (err) {
                    console.error('Erro marcar lido:', err);
                }
            });
        });

    } catch (error) {
        console.error('Erro geral:', error);
        document.getElementById('alertas-list').innerHTML = `
            <div class="alert alert-danger text-center rounded-4">
                Erro ao carregar: ${error.message}
            </div>
        `;
    }
}

loadAlertas();
setInterval(loadAlertas, 15000);
</script>

@endsection