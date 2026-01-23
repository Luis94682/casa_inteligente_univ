// ===============================================
// Dashboard Dinâmico - Monitorização de Dispositivos
// ===============================================

let consumoChart;    // Gráfico de consumo por dispositivo
let eficienciaGauge; // Gauge de eficiência (% de dispositivos ligados)
const gaugeText = document.querySelector('.gauge-text'); // Texto dentro do gauge

/**
 * Atualiza o dashboard: cards, gráfico de consumo e gauge
 */
async function atualizarDashboard() {
    try {
        // -------------------------------
        // 1️⃣ Atualizar Cards
        // -------------------------------
        const resStats = await fetch('/monitorizacao/stats', {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        });
        if (!resStats.ok) throw new Error('Erro ao buscar stats');
        const stats = await resStats.json();

        document.querySelector('.ligados-count').textContent    = stats.ligados;
        document.querySelector('.desligados-count').textContent = stats.desligados;
        document.querySelector('.total-count').textContent      = stats.total;

        // -------------------------------
        // 2️⃣ Atualizar Gráfico de Consumo por Dispositivo
        // -------------------------------
        const resConsumo = await fetch('/monitorizacao/consumo-dispositivos', {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        });
        if (!resConsumo.ok) throw new Error('Erro ao buscar consumo');
        const consumoJson = await resConsumo.json();

        const ctxConsumo = document.getElementById('consumoHoraChart').getContext('2d');

        if (!consumoChart) {
            consumoChart = new Chart(ctxConsumo, {
                type: 'bar',
                data: {
                    labels: consumoJson.labels,
                    datasets: [{
                        label: 'Consumo (kWh)',
                        data: consumoJson.data,
                        backgroundColor: '#0d6efd'
                    }]
                },
                options: {
                    responsive: true,
                    plugins: { legend: { display: false }, tooltip: { mode: 'index' } },
                    scales: {
                        y: { beginAtZero: true, grid: { color: 'rgba(255,255,255,0.08)' } },
                        x: { grid: { color: 'rgba(255,255,255,0.08)' } }
                    }
                }
            });
        } else {
            consumoChart.data.labels            = consumoJson.labels;
            consumoChart.data.datasets[0].data = consumoJson.data;
            consumoChart.update();
        }

        // -------------------------------
        // 3️⃣ Atualizar Gauge de Eficiência
        // -------------------------------
        const ctxGauge = document.getElementById('eficienciaGauge').getContext('2d');
        const eficiencia = stats.total ? Math.round((stats.ligados / stats.total) * 100) : 0;

        if (!eficienciaGauge) {
            eficienciaGauge = new Chart(ctxGauge, {
                type: 'doughnut',
                data: {
                    datasets: [{
                        data: [eficiencia, 100 - eficiencia],
                        backgroundColor: ['#fd7e14', 'rgba(255,255,255,0.08)'],
                        borderWidth: 0,
                        cutout: '75%',
                        rotation: -90,
                        circumference: 180
                    }]
                },
                options: {
                    responsive: true,
                    plugins: { legend: { display: false }, tooltip: { enabled: false } }
                }
            });
        } else {
            eficienciaGauge.data.datasets[0].data = [eficiencia, 100 - eficiencia];
            eficienciaGauge.update();
        }

        // -------------------------------
        // 4️⃣ Atualizar texto do gauge
        // -------------------------------
        if (gaugeText) {
            gaugeText.textContent = eficiencia; // ex: 60, 75, etc.
        }

    } catch (err) {
        console.error('Erro ao atualizar dashboard:', err);
    }
}

// -------------------------------
// Inicialização do Dashboard
// -------------------------------
document.addEventListener('DOMContentLoaded', () => {
    atualizarDashboard();
    setInterval(atualizarDashboard, 5000); // atualiza a cada 5 segundos
});
