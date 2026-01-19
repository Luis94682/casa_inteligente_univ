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

                <!-- Begin Page Content -->
                <div class="container-fluid py-4">
                    <div class="row g-4">

                        <!-- Card 1: Lâmpada Sala -->
                        <div class="col-lg-3 col-md-6" style="margin-bottom: 1.5rem">
                            <div class="card device-card bg-dark text-white border-0 shadow-lg h-100">
                                <div class="card-body p-4">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-lightbulb-fill fs-3 me-3 text-warning"></i>
                                            <h5 class="mb-0">Lâmpada Sala</h5>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="lamp1" checked>
                                            <label class="form-check-label" for="lamp1"></label>
                                        </div>
                                    </div>

                                    <p class="text-muted small mb-1">Iluminação</p>

                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="small mb-0 text-muted">Potência</p>
                                            <span class="small mb-0 text-muted" style="color: #fff !important">12W</span>
                                        </div>

                                    </div>

                                     <div class="mb-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="small mb-0 text-muted">Consumo hoje</p>
                                            <span class="small mb-0 text-muted" style="color: #fff !important">0,87 kWh</span>
                                        </div>
                                    </div>
                                     <div class="mb-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="small mb-0 text-muted">Tempo ligado</p>
                                            <span class="small mb-0 text-muted" style="color: #fff !important">6,8h</span>
                                        </div>
                                    </div>

                                   

                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="badge bg-success">Eficiência: Alta</span>
                                        <span class="badge bg-success">Ativo</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6" style="margin-bottom: 1.5rem">
                            <div class="card device-card bg-dark text-white border-0 shadow-lg h-100">
                                <div class="card-body p-4">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-lightbulb-fill fs-3 me-3 text-warning"></i>
                                            <h5 class="mb-0">Lâmpada Sala</h5>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="lamp1" checked>
                                            <label class="form-check-label" for="lamp1"></label>
                                        </div>
                                    </div>

                                    <p class="text-muted small mb-1">Iluminação</p>

                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="small mb-0 text-muted">Potência</p>
                                            <span class="small mb-0 text-muted" style="color: #fff !important">12W</span>
                                        </div>

                                    </div>

                                     <div class="mb-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="small mb-0 text-muted">Consumo hoje</p>
                                            <span class="small mb-0 text-muted" style="color: #fff !important">0,87 kWh</span>
                                        </div>
                                    </div>
                                     <div class="mb-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="small mb-0 text-muted">Tempo ligado</p>
                                            <span class="small mb-0 text-muted" style="color: #fff !important">6,8h</span>
                                        </div>
                                    </div>

                                   

                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="badge bg-success">Eficiência: Alta</span>
                                        <span class="badge bg-success">Ativo</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6" style="margin-bottom: 1.5rem">
                            <div class="card device-card bg-dark text-white border-0 shadow-lg h-100">
                                <div class="card-body p-4">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-lightbulb-fill fs-3 me-3 text-warning"></i>
                                            <h5 class="mb-0">Lâmpada Sala</h5>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="lamp1" checked>
                                            <label class="form-check-label" for="lamp1"></label>
                                        </div>
                                    </div>

                                    <p class="text-muted small mb-1">Iluminação</p>

                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="small mb-0 text-muted">Potência</p>
                                            <span class="small mb-0 text-muted" style="color: #fff !important">12W</span>
                                        </div>

                                    </div>

                                     <div class="mb-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="small mb-0 text-muted">Consumo hoje</p>
                                            <span class="small mb-0 text-muted" style="color: #fff !important">0,87 kWh</span>
                                        </div>
                                    </div>
                                     <div class="mb-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="small mb-0 text-muted">Tempo ligado</p>
                                            <span class="small mb-0 text-muted" style="color: #fff !important">6,8h</span>
                                        </div>
                                    </div>

                                   

                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="badge bg-success">Eficiência: Alta</span>
                                        <span class="badge bg-success">Ativo</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card 2: Lâmpada Quarto 1 (baixa eficiência) -->
                        <div class="col-lg-3 col-md-6" style="margin-bottom: 1.5rem">
                            <div class="card device-card bg-dark text-white border-0 shadow-lg h-100">
                                <div class="card-body p-4">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-lightbulb-fill fs-3 me-3 text-warning"></i>
                                            <h5 class="mb-0">Lâmpada Quarto 1</h5>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="lamp2">
                                            <label class="form-check-label" for="lamp2"></label>
                                        </div>
                                    </div>

                                    <p class="text-muted small mb-1">Iluminação</p>

                                    <div class="mb-3">
                                        <span class="badge bg-secondary">Potência: 66W</span>
                                    </div>

                                    <div class="row mb-3 text-center">
                                        <div class="col-6">
                                            <p class="small mb-0 text-muted">Consumo hoje</p>
                                            <h6 class="mb-0">0,12 kWh</h6>
                                        </div>
                                        <div class="col-6">
                                            <p class="small mb-0 text-muted">Tempo ligado</p>
                                            <h6 class="mb-0">2,8h</h6>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="badge bg-danger">Eficiência: Baixa</span>
                                        <span class="badge bg-secondary">Inativo</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card 3: Lâmpada Quarto 2 -->
                        <div class="col-lg-3 col-md-6" style="margin-bottom: 1.5rem">
                            <div class="card device-card bg-dark text-white border-0 shadow-lg h-100">
                                <div class="card-body p-4">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-lightbulb-fill fs-3 me-3 text-warning"></i>
                                            <h5 class="mb-0">Lâmpada Quarto 2</h5>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="lamp3" checked>
                                            <label class="form-check-label" for="lamp3"></label>
                                        </div>
                                    </div>

                                    <p class="text-muted small mb-1">Iluminação</p>

                                    <div class="mb-3">
                                        <span class="badge bg-secondary">Potência: 12W</span>
                                    </div>

                                    <div class="row mb-3 text-center">
                                        <div class="col-6">
                                            <p class="small mb-0 text-muted">Consumo hoje</p>
                                            <h6 class="mb-0">0,05 kWh</h6>
                                        </div>
                                        <div class="col-6">
                                            <p class="small mb-0 text-muted">Tempo ligado</p>
                                            <h6 class="mb-0">4,8h</h6>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="badge bg-success">Eficiência: Alta</span>
                                        <span class="badge bg-success">Ativo</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card 4: Lâmpada Cozinha -->
                        <div class="col-lg-3 col-md-6" style="margin-bottom: 1.5rem" >
                            <div class="card device-card bg-dark text-white border-0 shadow-lg h-100">
                                <div class="card-body p-4">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-lightbulb-fill fs-3 me-3 text-warning"></i>
                                            <h5 class="mb-0">Lâmpada Cozinha</h5>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="lamp4" checked>
                                            <label class="form-check-label" for="lamp4"></label>
                                        </div>
                                    </div>

                                    <p class="text-muted small mb-1">Iluminação</p>

                                    <div class="mb-3">
                                        <span class="badge bg-secondary">Potência: 15W</span>
                                    </div>

                                    <div class="row mb-3 text-center">
                                        <div class="col-6">
                                            <p class="small mb-0 text-muted">Consumo hoje</p>
                                            <h6 class="mb-0">0,12 kWh</h6>
                                        </div>
                                        <div class="col-6">
                                            <p class="small mb-0 text-muted">Tempo ligado</p>
                                            <h6 class="mb-0">8,8h</h6>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="badge bg-success">Eficiência: Alta</span>
                                        <span class="badge bg-success">Ativo</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

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

                    .badge.bg-danger {
                        background-color: #dc3545 !important;
                    }

                    .badge.bg-success {
                        background-color: #198754 !important;
                    }

                    .text-warning {
                        color: #ffc107 !important;
                    }
                </style>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
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

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
@endsection
