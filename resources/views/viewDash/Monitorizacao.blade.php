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
                <div class="container-fluid py-5 px-4 px-lg-5">

                    <!-- Cards superiores -->
                    <div class="row g-4 mb-5">

                        <!-- Consumo Atual -->
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="card-stat p-4">
                                <div class="d-flex justify-content-center align-items-center mb-3">
                                    <i class="bi bi-lightning-charge-fill fs-3 text-green me-3"></i>
                                </div>
                                <p class="small text-muted mb-0">Consumo Atual</p>
                                <h3 class="fw-bold mb-1" style="color: #fff !important">0,53 <small class="text-muted"
                                        style="color: #fff !important">kW</small></h3>
                                <p class="small text-muted mb-0">Em tempo real</p>
                            </div>
                        </div>

                        <!-- Consumo Diário -->
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="card-stat p-4">
                                <div class="d-flex justify-content-between  mb-2">
                                    <p class="small mb-1">Consumo Diário</p>
                                    <span class="badge bg-danger badge-small" style="color: #fff !important">↑ 12%</span>
                                </div>

                                <h3 class="fw-bold mb-1" style="color: #fff !important">10,42 <small class="text-muted"
                                        style="color: #fff !important">kWh</small></h3>
                                <p class="small mb-1">Hoje</p>

                            </div>
                        </div>

                        <!-- Consumo Mensal -->
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="card-stat p-4">
                                <div class="d-flex mb-3">
                                    <i class="bi bi-calendar-event fs-3 text-info me-3"></i>
                                    <p class="small text-muted mb-0">Consumo Atual</p>
                                </div>
                                <h3 class="fw-bold mb-1" style="color: #fff !important">313 <small class="text-muted"
                                        style="color: #fff !important">kWh</small></h3>
                                <p class="small text-muted mb-0">Estimativa</p>
                            </div>
                        </div>

                        <!-- Custo Estimado -->
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="card-stat p-4">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <p class="small text-muted mb-0">Custo Estimado</p>
                                    <span class="badge bg-success badge-small" style="color: #fff !important">↓ 8%</span>
                                </div>
                                <h3 class="fw-bold mb-1" style="color: #fff !important">7.816 <small class="text-muted" style="color: #fff !important">Kz</small></h3>
                                <p class="small mb-1">Este mês</p>

                            </div>
                        </div>

                    </div>

                    <!-- Gráfico + Gauge -->
                    <div class="row g-4">

                        <!-- Gráfico Consumo por Hora -->
                        <div class="col-lg-8">
                            <div class="card-stat p-4">
                                <h5 class="mb-4 text-center">Consumo por Hora</h5>
                                <div class="chart-container">
                                    <canvas id="consumoHoraChart"></canvas>
                                </div>
                                <p class="text-center small text-muted mt-3">
                                    Baseado no consumo e eficiência dos dispositivos
                                </p>
                            </div>
                        </div>

                        <!-- Gauge Pontuação de Eficiência -->
                        <div class="col-lg-4">
                            <div class="card-stat p-5 text-center d-flex flex-column justify-content-center h-100">
                                <h5 class="mb-4">Pontuação de Eficiência</h5>
                                <div class="gauge-container mx-auto">
                                    <canvas id="eficienciaGauge"></canvas>
                                    <div class="gauge-text">60</div>
                                </div>
                                <p class="mt-3 mb-0">
                                    <span class="badge bg-warning text-dark px-4 py-2 fs-6">/100</span>
                                </p>
                                <p class="mt-2 text-success fw-bold fs-5">Bom</p>
                            </div>
                        </div>

                    </div>

                </div>

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
