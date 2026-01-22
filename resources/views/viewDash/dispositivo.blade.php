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

                <!-- Contadores em tempo real -->
                <div class="container-fluid py-4">
                    <div class="row g-4 mb-5">

                        <!-- Dispositivos Ligados -->
                       {{--  <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="card-stat p-4 text-center bg-gradient-dark rounded-4 shadow">
                                <div class="d-flex justify-content-center align-items-center mb-3">
                                    <i class="bi bi-power fs-3 text-success me-3"></i>
                                </div>
                                <p class="small text-muted mb-1 text-center">Dispositivos Ligados</p>
                                <h3 class="fw-bold mb-0 text-success ligados-count">{{ $ligados ?? 0 }}</h3>
                            </div>
                        </div> --}}

                        <!-- Dispositivos Desligados -->
                       {{--  <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="card-stat p-4 text-center bg-gradient-dark rounded-4 shadow">
                                <div class="d-flex justify-content-center align-items-center mb-3">
                                    <i class="bi bi-power fs-3 text-secondary me-3"></i>
                                </div>
                                <p class="small text-muted mb-1 text-center">Dispositivos Desligados</p>
                                <h3 class="fw-bold mb-0 text-secondary desligados-count">{{ $desligados ?? 0 }}</h3>
                            </div>
                        </div> --}}

                        <!-- Total de Dispositivos -->
                        {{-- <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="card-stat p-4 text-center bg-gradient-dark rounded-4 shadow">
                                <div class="d-flex justify-content-center align-items-center mb-3">
                                    <i class="bi bi-plug fs-3 text-primary me-3"></i>
                                </div>
                                <p class="small text-muted mb-1 text-center">Total de Dispositivos</p>
                                <h3 class="fw-bold mb-0 text-primary total-count">{{ $totalDispositivos ?? 0 }}</h3>
                            </div>
                        </div> --}}

                    </div>

                    <!-- Botão + Lista de Dispositivos -->
                    <button type="button" class="btn btn-success d-block mb-4" 
                            data-bs-toggle="modal" 
                            data-bs-target="#modalAdicionarDispositivo">
                        Adicionar dispositivo <i class="bi bi-plus-lg ms-2"></i>
                    </button>

                    <div class="row g-4">
                        @forelse ($dispositivos as $dispositivo)
                            <div class="col-lg-4 col-md-6" style="margin-bottom: 1.5rem">
                                <div class="card device-card bg-dark text-white border-0 shadow-lg h-100 rounded-4">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-lightbulb-fill fs-3 me-3 text-warning"></i>
                                                <h5 class="mb-0">{{ $dispositivo->nome }}</h5>
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input device-toggle"
                                                       type="checkbox"
                                                       id="device-{{ $dispositivo->id }}"
                                                       {{ $dispositivo->ativo ? 'checked' : '' }}
                                                       data-device-id="{{ $dispositivo->id }}">
                                                <label class="form-check-label" for="device-{{ $dispositivo->id }}"></label>
                                            </div>
                                        </div>

                                        <p class="text-muted small mb-1">{{ $dispositivo->tipo }}</p>

                                        <div class="mb-3">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <p class="small mb-0 text-muted">Potência</p>
                                                <span class="small mb-0 text-white">{{ $dispositivo->consumo_base }}W</span>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <p class="small mb-0 text-muted">Consumo hoje</p>
                                                <span class="small mb-0 text-white">0,87 kWh</span>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <p class="small mb-0 text-muted">Tempo ligado</p>
                                                <span class="small mb-0 text-white">6,8h</span>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <span class="badge bg-success">Eficiência: Alta</span>
                                            <span class="badge {{ $dispositivo->ativo ? 'bg-success' : 'bg-secondary' }}"
                                                  id="status-{{ $dispositivo->id }}">
                                                {{ $dispositivo->ativo ? 'Ligado' : 'Desligado' }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center py-5 text-muted">
                                <i class="bi bi-plug fs-1"></i>
                                <p class="mt-3">Nenhum dispositivo registado ainda.</p>
                            </div>
                        @endforelse
                    </div>
                </div>

                <!-- Modal de Adicionar Dispositivo -->
                <div class="modal fade " id="modalAdicionarDispositivo" tabindex="-1" aria-labelledby="modalAdicionarDispositivoLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg ">
                        <div class="modal-content border-0 shadow-lg rounded-4" style="background-color:#0f162b">
                            <div class="modal-header border-0 pb-0 px-5 pt-4">
                                <h5 class="modal-title fw-bold" id="modalAdicionarDispositivoLabel">Adicionar Novo Dispositivo</h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar">x</button>
                            </div>
                            <div class="modal-body px-5 pb-5">
                                <form method="POST" action="{{ route('devices.store') }}" id="formAdicionarDispositivo">
                                    @csrf
                                    <div class="row g-4">
                                        <div class="col-md-12">
                                            <label for="nome" class="form-label text-white fw-medium">Nome do dispositivo</label>
                                            <input type="text" name="nome" id="nome" class="form-control bg-white text-white border-0" placeholder="ex: Lâmpada Sala" required autofocus>
                                            @error('nome') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                                        </div><br>

                                        <div class="col-md-12 mt-4 mb-4">
                                            <label for="tipo" class="form-label text-white fw-medium">Tipo</label><br>
                                            <select name="tipo" id="tipo" class="form-select  border-0 form-control" required>
                                                <option value="">Selecione...</option>
                                                <option value="Iluminação">Iluminação</option>
                                                <option value="Eletrodoméstico">Eletrodoméstico</option>
                                                <option value="Climatização">Climatização</option>
                                                <option value="Informática">Informática</option>
                                                <option value="Outros">Outros</option>
                                            </select>
                                            @error('tipo') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                                        </div>

                                        <div class="col-12">
                                            <label for="consumo_base" class="form-label text-white fw-medium">Consumo base (Watts)</label>
                                            <input type="number" name="consumo_base" id="consumo_base" class="form-control bg-white text-white border-0" placeholder="ex: 12" min="1" required>
                                            @error('consumo_base') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                                        </div>

                                        <div class="col-12 mt-4">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" name="ativo" id="ativo" value="1" checked>
                                                <label class="form-check-label text-white" for="ativo">Ativar dispositivo imediatamente</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-5 text-end">
                                        <button type="button" class="btn btn-danger me-3" data-bs-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-success px-4">Salvar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Estilos -->
                <style>
                    .device-card {
                        border-radius: 16px;
                        background: linear-gradient(145deg, #1a1f3d, #0f162b);
                        transition: transform 0.2s, box-shadow 0.2s;
                    }
                    .device-card:hover {
                        transform: translateY(-5px);
                        box-shadow: 0 15px 35px rgba(0, 123, 255, 0.15) !important;
                    }
                    .form-check-input:checked {
                        background-color: #00c853;
                        border-color: #00c853;
                    }
                    .badge.bg-success { background-color: #198754 !important; }
                    .badge.bg-secondary { background-color: #6c757d !important; }
                    .text-warning { color: #ffc107 !important; }
                    .card-stat { background: linear-gradient(145deg, #1a1f3d, #0f162b); border-radius: 16px; }
                    .bg-gradient-dark { background: linear-gradient(145deg, #1a1f3d, #0f162b); }
                </style>

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
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- JavaScript para Toggle + Atualização em Tempo Real -->
    <script>
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('.form-check-input').forEach(checkbox => {
            checkbox.addEventListener('change', function(e) {
                const deviceId = this.getAttribute('data-device-id');
                const originalChecked = this.checked; // estado antes do clique

                // Envia AJAX
                fetch(`{{ url('/devices') }}/${deviceId}/toggle`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ ativo: originalChecked ? 1 : 0 })
                })
                .then(response => {
                    if (!response.ok) throw new Error(`HTTP ${response.status}`);
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        // Atualiza BADGE
                        const badge = document.getElementById('status-' + deviceId);
                        if (badge) {
                            badge.textContent = data.ativo ? 'Ativo' : 'Inativo';
                            badge.className = 'badge ' + (data.ativo ? 'bg-success' : 'bg-secondary');
                        }

                        // Atualiza CHECKBOX
                        this.checked = data.ativo;

                        // Atualiza os contadores em tempo real (sem recarregar)
                        let ligEl = document.querySelector('.ligados-count');
                        let desEl = document.querySelector('.desligados-count');
                        let totEl = document.querySelector('.total-count');

                        if (ligEl && desEl && totEl) {
                            let ligAtual = parseInt(ligEl.textContent) || 0;
                            let desAtual = parseInt(desEl.textContent) || 0;

                            if (data.ativo) {
                                // Ligou: +1 ligado, -1 desligado
                                ligEl.textContent = ligAtual + 1;
                                desEl.textContent = desAtual - 1;
                            } else {
                                // Desligou: -1 ligado, +1 desligado
                                ligEl.textContent = ligAtual - 1;
                                desEl.textContent = desAtual + 1;
                            }
                        }

                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            title: data.message,
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true
                        });
                    } else {
                        this.checked = !originalChecked; // Reverte
                        Swal.fire({
                            icon: 'error',
                            title: 'Erro',
                            text: data.message || 'Não foi possível atualizar.'
                        });
                    }
                })
                .catch(error => {
                    this.checked = !originalChecked; // Reverte
                    console.error('Erro no toggle:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Falha',
                        text: 'Erro de conexão. Tenta novamente.'
                    });
                });
            });
        });
    });
    </script>

@endsection