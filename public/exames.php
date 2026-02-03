<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Meus Exames | MedFlow</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="../assets/css/sidebar_p.css" />
    <link rel="shortcut icon" href="../assets/img/logo-sem-fundo.png" type="image/x-icon">
</head>

<body>

    <?php require_once '../includes/side_bar_p.php'; ?>

    <main class="main-content px-4 py-4">

        <!-- HEADER -->
        <div class="mb-5">
            <h1 class="fw-bold mb-1">Meus Exames</h1>
            <p class="text-soft mb-0">
                Visualize, acompanhe e faça download dos seus exames médicos.
            </p>
        </div>

        <!-- CARDS RESUMO -->
        <div class="row g-4 mb-5">

            <!-- EXAMES DISPONÍVEIS -->
            <div class="col-md-6">
                <div class="card p-4 h-100">
                    <h6 class="fw-bold text-teal mb-2">
                        <span class="material-symbols-outlined me-1">lab_panel</span>
                        Exames Disponíveis
                    </h6>
                    <p class="display-6 fw-bold mb-0">3</p>
                    <p class="small text-soft mb-0">Prontos para visualização</p>
                </div>
            </div>

            <!-- EM ANÁLISE -->
            <div class="col-md-6">
                <div class="card p-4 h-100">
                    <h6 class="fw-bold text-teal mb-2">
                        <span class="material-symbols-outlined me-1">hourglass_top</span>
                        Em Análise
                    </h6>
                    <p class="display-6 fw-bold mb-0">1</p>
                    <p class="small text-soft mb-0">Aguardando resultado</p>
                </div>
            </div>

             <!-- TABELA DE EXAMES -->
        <div class="table-container mb-5">
            <div class="table-responsive">
                <table class="table table-dark table-hover table-borderless align-middle mb-0">
                    <thead>
                        <tr>
                            <th class="px-4 py-3">Exame</th>
                            <th class="px-4 py-3">Data</th>
                            <th class="px-4 py-3">Médico</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3 text-end">Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td class="px-4 py-3">Hemograma Completo</td>
                            <td class="px-4 py-3">12/11/2026</td>
                            <td class="px-4 py-3">Dr. Ricardo Silva</td>
                            <td class="px-4 py-3">
                                <span class="badge bg-success">Disponível</span>
                            </td>
                            <td class="px-4 py-3 text-end">
                                <button class="btn btn-link text-teal fw-bold btn-sm">
                                    <span class="material-symbols-outlined me-1">visibility</span>
                                    Visualizar
                                </button>
                                <button class="btn btn-link text-teal fw-bold btn-sm ms-2">
                                    <span class="material-symbols-outlined me-1">download</span>
                                    Download
                                </button>
                            </td>
                        </tr>

                        <tr>
                            <td class="px-4 py-3">Raio-X do Tórax</td>
                            <td class="px-4 py-3">05/11/2026</td>
                            <td class="px-4 py-3">Dra. Ana Beatriz</td>
                            <td class="px-4 py-3">
                                <span class="badge bg-success">Disponível</span>
                            </td>
                            <td class="px-4 py-3 text-end">
                                <button class="btn btn-link text-teal fw-bold btn-sm">
                                    Visualizar
                                </button>
                                <button class="btn btn-link text-teal fw-bold btn-sm ms-2">
                                    Download
                                </button>
                            </td>
                        </tr>

                        <tr>
                            <td class="px-4 py-3">Ressonância Magnética</td>
                            <td class="px-4 py-3">18/11/2026</td>
                            <td class="px-4 py-3">Dr. Carlos Mendes</td>
                            <td class="px-4 py-3">
                                <span class="badge bg-warning text-dark">Em Análise</span>
                            </td>
                            <td class="px-4 py-3 text-end">
                                <span class="text-soft small">Indisponível</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

            <!-- SUPORTE -->
            <div class="col-12">
                <div class="card p-4 d-flex flex-md-row align-items-center justify-content-between"
                    style="background: rgba(19,236,200,.05); border-color: rgba(19,236,200,.25);">

                    <div>
                        <h6 class="fw-bold text-teal mb-1">
                            <span class="material-symbols-outlined me-1">support_agent</span>
                            Precisa de ajuda?
                        </h6>
                        <p class="small mb-0 text-soft">
                            Dúvidas sobre exames? Nossa equipe de suporte está disponível 24h para te ajudar.
                        </p>
                    </div>

                    <a href="#" class="btn btn-outline-success btn-sm mt-3 mt-md-0">
                        Falar com suporte
                    </a>
                </div>
            </div>

        </div>


       

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>