<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Minhas Consultas - MedFlow</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="../assets/css/sidebar.css" />
    <link rel="shortcut icon" href="../assets/img/logo-sem-fundo.png" type="image/x-icon">
    <style>
        body {
            background-color: #1a1d20;
            color: #f8f9fa;
            font-family: 'Manrope', sans-serif;
            min-height: 100vh;
        }

        :root {
            --medflow-teal: #13ecc8;
            --medflow-sidebar: #111417;
            --medflow-border: #2d3238;
        }

        .nav-link {
            color: #9db9b4;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 4px;
        }

        .nav-link:hover {
            color: var(--medflow-teal);
            background-color: rgba(19, 236, 200, 0.05);
        }


        .btn-primary-medflow {
            background-color: var(--medflow-teal);
            border-color: var(--medflow-teal);
            font-weight: 700;
        }

        .btn-primary-medflow:hover {
            background-color: #0fd6b5;
            border-color: #0fd6b5;
        }

        .nav-tabs {
            border-bottom: 1px solid var(--medflow-border);
        }

        .nav-tabs .nav-link {
            border: none;
            color: #9db9b4;
            background: transparent;
            padding: 1rem 1.5rem;
            margin-bottom: 0;
        }

        .nav-tabs .nav-link.active {
            color: var(--medflow-teal);
            background: transparent;
            border-bottom: 3px solid var(--medflow-teal);
            border-radius: 0;
        }

        .table-container {
            background-color: var(--medflow-sidebar);
            border: 1px solid var(--medflow-border);
            border-radius: 12px;
            overflow: hidden;
        }

        .material-symbols-outlined {
            font-size: 20px;
            vertical-align: middle;
        }

        .card-custom {
            background-color: var(--medflow-sidebar);
            border: 1px solid var(--medflow-border);
            border-radius: 12px;
        }

        .pagination .page-link {
            background-color: transparent;
            border-color: var(--medflow-border);
            color: #9db9b4;
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <?php require_once '../includes/side_bar_p.php' ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-5 py-4">
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-decoration-none" href="#">Início</a></li>
                        <li aria-current="page" class="breadcrumb-item active text-white">Consultas</li>
                    </ol>
                </nav>
                <div class="d-flex justify-content-between align-items-end mb-5">
                    <div>
                        <h1 class="fw-black display-5 mb-2">Minhas Consultas</h1>
                        <p class="mb-0">Gerencie seus agendamentos e histórico médico em um só lugar.</p>
                    </div>
                    <button class="btn btn-primary-medflow px-4 py-2">
                        <span class="material-symbols-outlined me-1">add_circle</span>
                        Novo Agendamento
                    </button>
                </div>
                <ul class="nav nav-tabs mb-4">
                    <li class="nav-item">
                        <a aria-current="page" class="nav-link active" href="#">Próximas Consultas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Histórico de Consultas</a>
                    </li>
                </ul>
                <div class="table-container mb-4">
                    <div class="table-responsive">
                        <table class="table table-dark table-hover table-borderless mb-0 align-middle">
                            <thead class="bg-dark">
                                <tr style="border-bottom: 1px solid var(--medflow-border);">
                                    <th class="px-4 py-3 fw-semibold text-white">Data</th>
                                    <th class="px-4 py-3 fw-semibold text-white">Horário</th>
                                    <th class="px-4 py-3 fw-semibold text-white">Médico</th>
                                    <th class="px-4 py-3 fw-semibold text-white">Especialidade</th>
                                    <th class="px-4 py-3 fw-semibold text-white">Status</th>
                                    <th class="px-4 py-3 fw-semibold text-end">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="px-4 py-4">15/11/2023</td>
                                    <td class="px-4 py-4">14:30</td>
                                    <td class="px-4 py-4">
                                        <div class="d-flex align-items-center">
                                            <div class="bg-dark border border-secondary rounded-circle d-flex align-items-center justify-content-center me-2"
                                                style="width: 32px; height: 32px;">
                                                <span class="material-symbols-outlined text-teal"
                                                    style="font-size: 18px;">medical_services</span>
                                            </div>
                                            <span class="fw-medium">Dr. Ricardo Silva</span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-4">
                                        <span class="badge rounded-pill"
                                            style="background-color: rgba(19, 236, 200, 0.1); color: var(--medflow-teal);">CARDIOLOGIA</span>
                                    </td>
                                    <td class="px-4 py-4">
                                        <span class="badge rounded-pill bg-primary px-3 py-2">Agendada</span>
                                    </td>
                                    <td class="px-4 py-4 text-end">
                                        <button class="btn btn-link text-teal text-decoration-none fw-bold btn-sm">Ver
                                            Detalhes</button>
                                        <button
                                            class="btn btn-link text-danger text-decoration-none fw-bold btn-sm ms-2">Cancelar</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-4">10/11/2023</td>
                                    <td class="px-4 py-4">09:00</td>
                                    <td class="px-4 py-4">
                                        <div class="d-flex align-items-center">
                                            <div class="bg-dark border border-secondary rounded-circle d-flex align-items-center justify-content-center me-2"
                                                style="width: 32px; height: 32px;">
                                                <span class="material-symbols-outlined text-teal"
                                                    style="font-size: 18px;">medical_services</span>
                                            </div>
                                            <span class="fw-medium">Dra. Ana Beatriz</span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-4">
                                        <span class="badge rounded-pill"
                                            style="background-color: rgba(19, 236, 200, 0.1); color: var(--medflow-teal);">DERMATOLOGIA</span>
                                    </td>
                                    <td class="px-4 py-4">
                                        <span class="badge rounded-pill bg-success px-3 py-2">Concluída</span>
                                    </td>
                                    <td class="px-4 py-4 text-end">
                                        <button class="btn btn-link text-teal text-decoration-none fw-bold btn-sm">Ver
                                            Resumo</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-4">05/11/2023</td>
                                    <td class="px-4 py-4">16:15</td>
                                    <td class="px-4 py-4">
                                        <div class="d-flex align-items-center">
                                            <div class="bg-dark border border-secondary rounded-circle d-flex align-items-center justify-content-center me-2"
                                                style="width: 32px; height: 32px;">
                                                <span class="material-symbols-outlined text-teal"
                                                    style="font-size: 18px;">medical_services</span>
                                            </div>
                                            <span class="fw-medium">Dr. Carlos Mendes</span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-4">
                                        <span class="badge rounded-pill"
                                            style="background-color: rgba(19, 236, 200, 0.1); color: var(--medflow-teal);">ORTOPEDIA</span>
                                    </td>
                                    <td class="px-4 py-4">
                                        <span class="badge rounded-pill bg-danger px-3 py-2">Cancelada</span>
                                    </td>
                                    <td class="px-4 py-4 text-end">
                                        <button
                                            class="btn btn-link text-teal text-decoration-none fw-bold btn-sm">Justificativa</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-between align-items-center px-4 py-3 bg-dark bg-opacity-25 border-top"
                        style="border-color: var(--medflow-border) !important;">
                        <div class="small">Exibindo 3 de 24 consultas</div>
                        <nav aria-label="Navegação de página">
                            <ul class="pagination pagination-sm m-0">
                                <li class="page-item disabled"><a class="page-link" href="#"><span
                                            class="material-symbols-outlined">chevron_left</span></a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#"><span
                                            class="material-symbols-outlined">chevron_right</span></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="row g-4 mb-5">
                    <div class="col-md-4">
                        <div class="card-custom p-4">
                            <div class="d-flex align-items-center gap-3 mb-2">
                                <span class="material-symbols-outlined text-teal">notifications_active</span>
                                <h6 class="m-0 fw-bold">Lembrete</h6>
                            </div>
                            <p class="small mb-0">Você tem uma consulta agendada para daqui a 3 dias com o
                                Dr. Ricardo.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card-custom p-4">
                            <div class="d-flex align-items-center gap-3 mb-2">
                                <span class="material-symbols-outlined text-teal">description</span>
                                <h6 class="m-0 fw-bold">Exames Pendentes</h6>
                            </div>
                            <p class="small mb-0">Há 2 resultados de exames prontos para visualização em seu
                                perfil.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card-custom p-4"
                            style="background-color: rgba(19, 236, 200, 0.05); border-color: rgba(19, 236, 200, 0.2);">
                            <div class="d-flex align-items-center gap-3 mb-2">
                                <span class="material-symbols-outlined text-teal">support_agent</span>
                                <h6 class="m-0 fw-bold text-teal">Precisa de ajuda?</h6>
                            </div>
                            <p class="small mb-0">Nossa central de atendimento está disponível 24h para
                                reagendamentos.</p>
                        </div>
                    </div>
                </div>
                <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top"
                    style="border-color: var(--medflow-border) !important;">
                    <p class="col-md-4 mb-0">© 2026 MedFlow - Gestão Hospitalar</p>
                    <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                        <li class="ms-3"><a class="small text-decoration-none hover-teal" href="#">Termos</a>
                        </li>
                        <li class="ms-3"><a class="small text-decoration-none hover-teal"
                                href="#">Privacidade</a></li>
                        <li class="ms-3"><a class="small text-decoration-none hover-teal"
                                href="#">Suporte</a></li>
                    </ul>
                </footer>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>