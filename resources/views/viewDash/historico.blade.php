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
                <!-- Secção Histórico de Consumo -->
<div class="container-fluid py-4 px-3 px-lg-5">
    <div class="row justify-content-center">
        <div class="col-12 col-xxl-10">

            <!-- Cabeçalho com toggle -->
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4">
                <h4 class="text-white mb-3 mb-md-0">Histórico de Consumo</h4>

                <div class="btn-group btn-group-toggle" role="group" aria-label="Período">
                    <input type="radio" class="btn-check" name="periodo" id="semanal" autocomplete="off">
                    <label class="btn btn-outline-secondary px-4 py-2 rounded-start" for="semanal">Semanal</label>

                    <input type="radio" class="btn-check" name="periodo" id="mensal" autocomplete="off" checked>
                    <label class="btn btn-success px-4 py-2 rounded-end" for="mensal">
                        Mensal
                        <span class="ms-2">•</span> <!-- círculo verde simulado -->
                    </label>
                </div>
            </div>

            <!-- Card do gráfico -->
            <div class="card bg-dark border-0 rounded-4 shadow overflow-hidden" style="background: #1e2338;">
                <div class="card-body p-4 p-lg-5">
                    <div style="position: relative; height: 420px; width: 100%;">
                        <canvas id="consumoMensalChart"></canvas>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Estilos específicos para combinar com a imagem -->
<style>
    .btn-success {
        background-color: #198754 !important;
        border-color: #198754 !important;
    }
    .btn-outline-secondary {
        color: #adb5bd;
        border-color: #495057;
    }
    .btn-outline-secondary:hover {
        background-color: #343a40;
        color: white;
    }
    .card {
        background: #1e2338 !important;
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


<script>
    document.addEventListener('DOMContentLoaded', () => {
        const ctx = document.getElementById('consumoMensalChart').getContext('2d');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun'],
                datasets: [{
                    label: 'Consumo Mensal (kWh)',
                    data: [14000, 11000, 10500, 12000, 13000, 12500],
                    backgroundColor: '#198754',      // Verde exato da imagem
                    borderColor: '#198754',
                    borderWidth: 0,
                    borderRadius: 6,
                    barThickness: 35,
                    hoverBackgroundColor: '#2ecc71'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { color: 'rgba(255,255,255,0.05)', drawBorder: false },
                        ticks: { color: '#adb5bd', stepSize: 3500 },
                        title: { display: false }
                    },
                    x: {
                        grid: { display: false },
                        ticks: { color: '#adb5bd' }
                    }
                },
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: 'rgba(25,135,84,0.9)',
                        titleColor: '#fff',
                        bodyColor: '#fff',
                        cornerRadius: 6,
                        padding: 12
                    }
                },
                animation: {
                    duration: 1500,
                    easing: 'easeOutQuart'
                }
            }
        });
    });
</script>
