<?php
// prontuario.php
// Futuramente aqui você pode validar sessão do paciente
?>

<!DOCTYPE html>

<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prontuário | MedFlow</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">

    <!-- CSS do Dashboard -->
    <link rel="stylesheet" href="../assets/css/sidebar_p.css">

    <link rel="shortcut icon" href="../assets/img/logo-sem-fundo.png" type="image/x-icon">


</head>

<body>

    <!-- SIDEBAR -->

    <?php include '../includes/side_bar_p.php'; ?>

    <!-- CONTEÚDO PRINCIPAL -->

    <div class="main-content p-4">


        <!-- HEADER -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold mb-0">Prontuário Médico</h2>
                <p class="text-soft mb-0">Histórico completo das suas consultas</p>
            </div>
        </div>

        <!-- LISTA DE PRONTUÁRIOS -->
        <div class="row g-4">

            <!-- CARD PRONTUÁRIO -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <h5 class="fw-bold mb-1">Consulta - Clínica Geral</h5>
                                <small class="text-soft">Dr. João Almeida • 12/01/2026</small>
                            </div>
                            <span class="badge bg-success">Finalizada</span>
                        </div>

                        <hr>

                        <div class="mb-3">
                            <h6 class="fw-bold">Queixa Principal</h6>
                            <p class="text-soft mb-0">Dor de cabeça frequente e fadiga.</p>
                        </div>

                        <div class="mb-3">
                            <h6 class="fw-bold">Diagnóstico</h6>
                            <p class="text-soft mb-0">Cefaleia tensional.</p>
                        </div>

                        <div class="mb-3">
                            <h6 class="fw-bold">Prescrição</h6>
                            <ul class="text-soft mb-0">
                                <li>Paracetamol 750mg – 8/8h por 5 dias</li>
                                <li>Repouso e hidratação</li>
                            </ul>
                        </div>

                        <div>
                            <h6 class="fw-bold">Observações</h6>
                            <p class="text-soft mb-0">Retornar caso os sintomas persistam.</p>
                        </div>

                    </div>
                </div>
            </div>

            <!-- OUTRO CARD (EXEMPLO) -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <h5 class="fw-bold mb-1">Consulta - Cardiologia</h5>
                                <small class="text-soft">Dra. Mariana Lopes • 22/11/2025</small>
                            </div>
                            <span class="badge bg-success">Finalizada</span>
                        </div>

                        <hr>

                        <div class="mb-3">
                            <h6 class="fw-bold">Queixa Principal</h6>
                            <p class="text-soft mb-0">Palpitações e falta de ar.</p>
                        </div>

                        <div class="mb-3">
                            <h6 class="fw-bold">Diagnóstico</h6>
                            <p class="text-soft mb-0">Arritmia leve.</p>
                        </div>

                        <div class="mb-3">
                            <h6 class="fw-bold">Prescrição</h6>
                            <ul class="text-soft mb-0">
                                <li>Betabloqueador conforme prescrição</li>
                            </ul>
                        </div>

                        <div>
                            <h6 class="fw-bold">Observações</h6>
                            <p class="text-soft mb-0">Solicitado exame de Holter.</p>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>