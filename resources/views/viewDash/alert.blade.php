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

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- JavaScript para carregar alertas dinamicamente -->
   <script>
async function loadAlertas() {
    try {
        const response = await fetch('{{ route("alertas.index") }}?json=1', {
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        });

        if (!response.ok) throw new Error('Erro ao carregar');

        let alertas = await response.json();

        // Filtrar alertas que ainda não expiraram
        const agora = new Date();
        alertas = alertas.filter(alerta => {
            if (!alerta.expires_at) return true; // sem expiração → mantém
            const expiraEm = new Date(alerta.expires_at);
            return expiraEm > agora; // só mantém se ainda não expirou
        });

        const list = document.getElementById('alertas-list');
        const countEl = document.getElementById('alert-count');

        const naoLidos = alertas.filter(a => !a.lido).length;
        countEl.textContent = naoLidos;
        countEl.classList.toggle('d-none', naoLidos === 0);

        if (alertas.length === 0) {
            list.innerHTML = `
                <div class="card bg-dark text-center p-5 rounded-4 shadow-sm border-0">
                    <i class="bi bi-check-circle-fill text-success fs-1 mb-3"></i>
                    <h5 class="text-white fw-bold mb-2">Está tudo controlado!</h5>
                    <p class="text-muted small mb-0">
                        Não há alertas ou notificações pendentes no momento.<br>
                        Todos os dispositivos estão monitorizados e sob controlo.
                    </p>
                </div>
            `;
            return;
        }

        list.innerHTML = alertas.map(alerta => {
            const isDesligado = alerta.mensagem.toLowerCase().includes('foi desligado');
            return `
                <div class="card mb-3 border-0 rounded-4 shadow-sm ${alerta.lido ? 'opacity-75' : ''}" 
                     style="background: linear-gradient(90deg, #0f162b 0%, #1a1f3d 100%); border-left: 4px solid ${alerta.nivel === 'danger' ? '#dc3545' : '#0d6efd'} !important;">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-start">
                            <div class="d-flex align-items-center flex-grow-1">
                                <div class="me-3">
                                    <i class="bi ${alerta.nivel === 'danger' ? 'bi-exclamation-triangle-fill text-danger' : 'bi-info-circle-fill text-primary'} fs-4"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <p class="mb-1 text-white fw-medium">${alerta.mensagem}</p>
                                    <small class="text-muted">
                                        <i class="bi bi-clock"></i> ${new Date(alerta.data_alerta).toLocaleString('pt-PT')}
                                    </small>
                                </div>
                            </div>
                            <div class="d-flex gap-2">
                                ${!alerta.lido ? `
                                <button class="btn btn-sm btn-outline-success marcar-lido me-2" data-id="${alerta.id}">
                                    <i class="bi bi-check-lg"></i> OK
                                </button>` : ''}
                                ${isDesligado ? `
                                <button class="btn btn-sm btn-outline-danger remover-alerta" data-id="${alerta.id}">
                                    <i class="fa-solid fa-trash"></i> Remover
                                </button>` : ''}
                            </div>
                        </div>
                    </div>
                </div>
            `;
        }).join('');

        // Marcar como lido
        document.querySelectorAll('.marcar-lido').forEach(btn => {
            btn.addEventListener('click', async function() {
                const id = this.dataset.id;
                try {
                    const res = await fetch(`/alertas/${id}/marcar-lido`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        }
                    });

                    if (res.ok) {
                        this.closest('.card').classList.add('opacity-75');
                        this.remove();
                        const current = parseInt(countEl.textContent);
                        countEl.textContent = current - 1;
                    }
                } catch (err) {
                    console.error('Erro:', err);
                }
            });
        });

        // Remover alerta permanentemente
        document.querySelectorAll('.remover-alerta').forEach(btn => {
            btn.addEventListener('click', async function() {
                const id = this.dataset.id;
                if (!confirm('Tem certeza que deseja remover este alerta permanentemente?')) return;

                try {
                    const res = await fetch(`/alertas/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        }
                    });

                    if (res.ok) {
                        this.closest('.card').remove();
                        const current = parseInt(countEl.textContent);
                        countEl.textContent = current - 1;
                    }
                } catch (err) {
                    console.error('Erro ao remover:', err);
                }
            });
        });

    } catch (error) {
        document.getElementById('alertas-list').innerHTML = `
            <div class="alert alert-danger rounded-4 text-center">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                Erro ao carregar informativos
            </div>
        `;
    }
}

document.addEventListener('DOMContentLoaded', loadAlertas);
setInterval(loadAlertas, 30000);
</script>

@endsection