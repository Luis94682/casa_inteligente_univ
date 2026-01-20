
        // Gráfico de linha - Consumo por Hora
        const ctxLine = document.getElementById('consumoHoraChart').getContext('2d');
        const consumoHoraChart = new Chart(ctxLine, {
            type: 'line',
            data: {
                labels: ['00h', '02h', '04h', '06h', '08h', '10h', '12h', '14h', '16h', '18h', '20h', '22h'],
                datasets: [{
                    label: 'Consumo (kW)',
                    data: [0.1, 0.4, 0.8, 1.4, 1.2, 0.6, 0.9, 1.8, 2.0, 1.7, 1.5, 0.3],
                    borderColor: '#00c853',
                    backgroundColor: 'rgba(0, 200, 83, 0.15)',
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: '#00c853',
                    pointBorderColor: '#fff',
                    pointRadius: 5,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: { beginAtZero: true, grid: { color: 'rgba(255,255,255,0.08)' } },
                    x: { grid: { color: 'rgba(255,255,255,0.08)' } }
                },
                plugins: { legend: { display: false } }
            }
        });

        // Gauge circular (semi-círculo)
        const ctxGauge = document.getElementById('eficienciaGauge').getContext('2d');
        const eficienciaGauge = new Chart(ctxGauge, {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [60, 40],
                    backgroundColor: ['#fd7e14', 'rgba(255,255,255,0.08)'],
                    borderWidth: 0,
                    cutout: '75%',
                    rotation: -90,
                    circumference: 180,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false }, tooltip: { enabled: false } }
            }
        });




