<?php 

require_once __DIR__ . '/../auth/auth_medico.php';

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Dashboard | MedFlow</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
        rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="shortcut icon" href="../assets/img/logo-sem-fundo.png" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/dashboard.css" />
</head>

<body>

    <?php require_once '../includes/side_bar_ad.php' ?>

    <main class="main-content">
        <header class="d-flex justify-content-between align-items-center mb-5">
            <div>
                <h1 class="h3 fw-bold mb-1 text-white">Dashboard Administrativo</h1>
                <p class="mb-0">Visão geral do desempenho da clínica esta semana.</p>
            </div>
            <div class="d-flex gap-3">
                <button class="btn btn-dark border-secondary bg-opacity-10 d-flex align-items-center gap-2">
                    <span class="material-symbols-outlined fs-5">notifications</span>
                </button>
                <button class="btn btn-primary d-flex align-items-center gap-2 rounded-3">
                    <span class="material-symbols-outlined fs-5">add</span> Novo Registro
                </button>
            </div>
        </header>
        <div class="row g-4 mb-4">
            <div class="col-md-4">
                <div class="card card-kpi p-4 h-100 border-0 shadow-sm">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <span class=" fw-bold small text-uppercase">Total Pacientes</span>
                            <h2 class="fw-bold mt-2 mb-0">1.284</h2>
                        </div>
                        <div class="p-2 rounded-3 bg-teal bg-opacity-10">
                            <span class="material-symbols-outlined text-teal">group</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-1 small fw-bold text-lime">
                        <span class="material-symbols-outlined fs-6">trending_up</span> +3% este mês
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-kpi p-4 h-100 border-0 shadow-sm">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <span class="fw-bold small text-uppercase">Consultas Hoje</span>
                            <h2 class="fw-bold mt-2 mb-0">24</h2>
                        </div>
                        <div class="p-2 rounded-3 bg-teal bg-opacity-10">
                            <span class="material-symbols-outlined text-teal">calendar_today</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-1 small">
                        <span class="fw-bold text-lime">16 restantes</span> • 8 concluídas
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-kpi p-4 h-100 border-0 shadow-sm">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <span class="fw-bold small text-uppercase">Faturamento Semanal</span>
                            <h2 class="fw-bold mt-2 mb-0">R$ 14.250</h2>
                        </div>
                        <div class="p-2 rounded-3 bg-lime bg-opacity-10">
                            <span class="material-symbols-outlined text-lime">payments</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-1 small fw-bold text-lime">
                        <span class="material-symbols-outlined fs-6">trending_up</span> +12% vs. semana anterior
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="card p-4 h-100">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="h5 fw-bold mb-0">Volume de Atendimentos</h3>
                        <select class="form-select form-select-sm bg-dark border-secondary text-white w-auto">
                            <option>Últimos 7 dias</option>
                            <option>Últimos 30 dias</option>
                        </select>
                    </div>
                    <div class="chart-container">
                        <canvas id="attendanceChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="h5 fw-bold mb-0">Agenda de Hoje</h3>
                        <a class="text-decoration-none small fw-bold text-teal" href="#">Ver Agenda Completa</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead>
                                <tr>
                                    <th class="py-3 px-4">Paciente</th>
                                    <th class="py-3 px-2 text-center">Horário</th>
                                    <th class="py-3 px-2">Procedimento</th>
                                    <th class="py-3 px-2 text-center">Status</th>
                                    <th class="py-3 px-4 text-end">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="px-4 py-3">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="bg-primary bg-opacity-20 text-teal fw-bold rounded-circle d-flex align-items-center justify-content-center"
                                                style="width: 32px; height: 32px; font-size: 11px;">SJ</div>
                                            <span class="fw-semibold">Sarah Jenkins</span>
                                        </div>
                                    </td>
                                    <td class="px-2 py-3 text-center fw-medium">09:00</td>
                                    <td class="px-2 py-3">Consulta de Rotina</td>
                                    <td class="px-2 py-3 text-center">
                                        <span
                                            class="badge bg-success bg-opacity-25 text-success rounded-pill">Confirmado</span>
                                    </td>
                                    <td class="px-4 py-3 text-end">
                                        <button class="btn btn-link p-0"><span
                                                class="material-symbols-outlined">more_horiz</span></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="bg-warning bg-opacity-20 text-warning fw-bold rounded-circle d-flex align-items-center justify-content-center"
                                                style="width: 32px; height: 32px; font-size: 11px;">JW</div>
                                            <span class="fw-semibold">James Wilson</span>
                                        </div>
                                    </td>
                                    <td class="px-2 py-3 text-center fw-medium">10:30</td>
                                    <td class="px-2 py-3">Exame de Sangue</td>
                                    <td class="px-2 py-3 text-center">
                                        <span
                                            class="badge bg-warning bg-opacity-25 text-warning rounded-pill">Pendente</span>
                                    </td>
                                    <td class="px-4 py-3 text-end">
                                        <button class="btn btn-link  p-0"><span
                                                class="material-symbols-outlined">more_horiz</span></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="bg-primary bg-opacity-20 text-teal fw-bold rounded-circle d-flex align-items-center justify-content-center"
                                                style="width: 32px; height: 32px; font-size: 11px;">RF</div>
                                            <span class="fw-semibold">Robert Fox</span>
                                        </div>
                                    </td>
                                    <td class="px-2 py-3 text-center fw-medium">11:15</td>
                                    <td class="px-2 py-3">Retorno Cirúrgico</td>
                                    <td class="px-2 py-3 text-center">
                                        <span
                                            class="badge bg-success bg-opacity-25 text-success rounded-pill">Confirmado</span>
                                    </td>
                                    <td class="px-4 py-3 text-end">
                                        <button class="btn btn-link p-0"><span
                                                class="material-symbols-outlined">more_horiz</span></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const ctx = document.getElementById('attendanceChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
                datasets: [{
                    label: 'Atendimentos',
                    data: [18, 25, 22, 28, 24, 12, 5],
                    borderColor: '#009DAE',
                    backgroundColor: 'rgba(0, 157, 174, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: '#009DAE',
                    pointRadius: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { color: 'rgba(255, 255, 255, 0.05)' },
                        ticks: { color: '#adb5bd' }
                    },
                    x: {
                        grid: { display: false },
                        ticks: { color: '#adb5bd' }
                    }
                }
            }
        });
    </script>

</body>

</html>