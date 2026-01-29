<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Dashboard do Paciente MedFlow</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet" />

    <style>
        :root {
            --brand-primary: #13ecc8;
            --brand-dark-teal: #0d2b26;
            --bg-dark-soft: #1a1d20;
            --card-dark: #212529;
            --text-muted: #9db9b4;
        }

        body {
            font-family: 'Manrope', sans-serif;
            background-color: var(--bg-dark-soft);
            color: #ffffff;
            overflow-x: hidden;
        }

        /* SIDEBAR */

        .sidebar {
            min-width: 260px;
            max-width: 260px;
            background-color: var(--brand-dark-teal);
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            border-right: 1px solid rgba(255, 255, 255, 0.05);
        }

        .main-content {
            margin-left: 260px;
            min-height: 100vh;
        }

        .nav-pills .nav-link {
            color: var(--text-muted);
            border-radius: 8px;
            padding: 12px 20px;
            margin-bottom: 5px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .nav-pills .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.05);
            color: #ffffff;
        }

        .nav-pills .nav-link.active {
            background-color: rgba(19, 236, 200, 0.1);
            color: var(--brand-primary);
            border-left: 3px solid var(--brand-primary);
        }

        /* CARDS */

        .card {
            background-color: var(--card-dark);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            color: #ffffff;
            transition: 0.25s;
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.35);
        }

        .card-title {
            font-weight: 700;
        }

        /* BUTTON */

        .btn-brand {
            background-color: var(--brand-primary);
            color: #0d2b26;
            font-weight: 700;
            border: none;
            padding: 10px 24px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .btn-brand:hover {
            background-color: #0fd9b8;
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(19, 236, 200, 0.35);
        }

        .text-brand {
            color: var(--brand-primary);
        }

        .text-soft {
            color: var(--text-muted);
        }

        /* PROFILE */

        .profile-section {
            background-color: rgba(255, 255, 255, 0.03);
            border-radius: 12px;
            padding: 15px;
            border: 1px solid rgba(255,255,255,0.05);
            margin-top: auto;
        }

        /* HEADER */

        header {
            box-shadow: 0 4px 20px rgba(0,0,0,0.25);
        }

        @media (max-width: 991.98px) {
            .sidebar {
                display: none;
            }

            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>

    <!-- SIDEBAR -->
    <aside class="sidebar d-flex flex-column p-4">

        <div class="d-flex align-items-center mb-5">
            <img src="../assets/img/logo-sem-fundo.png" width="48" class="me-2">
            <div>
                <h4 class="mb-0 fw-bold">MedFlow</h4>
                <small class="text-uppercase text-soft fw-bold"
                    style="font-size: 10px; letter-spacing: 1px;">
                    Portal do Paciente
                </small>
            </div>
        </div>

        <nav class="nav nav-pills flex-column mb-auto">
            <a class="nav-link active" href="#">
                <span class="material-symbols-outlined">home</span> Início
            </a>

            <a class="nav-link" href="#">
                <span class="material-symbols-outlined">calendar_month</span> Minhas Consultas
            </a>

            <a class="nav-link" href="#">
                <span class="material-symbols-outlined">description</span> Prontuário
            </a>

            <a class="nav-link" href="#">
                <span class="material-symbols-outlined">lab_panel</span> Exames
            </a>

            <a class="nav-link" href="#">
                <span class="material-symbols-outlined">person</span> Perfil
            </a>
        </nav>

        <div class="profile-section d-flex align-items-center mt-4">
            <img class="rounded-circle me-3"
                src="https://i.pravatar.cc/100"
                width="40" height="40">

            <div>
                <p class="mb-0 fw-bold small">Ricardo Silva</p>
                <p class="mb-0 text-soft" style="font-size: 11px;">Paciente</p>
            </div>
        </div>

    </aside>

    <!-- MAIN -->
    <main class="main-content">

        <header
            class="p-4 border-bottom border-light border-opacity-10 d-flex justify-content-between align-items-center sticky-top"
            style="background-color: rgba(26, 29, 32, 0.9); backdrop-filter: blur(10px);">

            <div>
                <h2 class="fw-extrabold mb-1">Olá, Ricardo!</h2>
                <p class="text-soft mb-0 small">
                    Bem-vindo ao seu painel de saúde MedFlow.
                </p>
            </div>

            <button class="btn btn-brand">
                Agendar Consulta
            </button>

        </header>

        <div class="container-fluid p-4">

            <!-- CARDS RESUMO -->

            <div class="row g-4 mb-4">

                <div class="col-lg-4">
                    <div class="card p-4">
                        <h6 class="text-soft">Próxima Consulta</h6>
                        <h4 class="fw-bold">15 Out — 14:30</h4>
                        <span class="text-brand">Dr. Adriano • Cardiologia</span>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card p-4">
                        <h6 class="text-soft">Exames Pendentes</h6>
                        <h4 class="fw-bold">2 exames</h4>
                        <span class="text-brand">Ver resultados</span>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card p-4">
                        <h6 class="text-soft">Receitas Ativas</h6>
                        <h4 class="fw-bold">3 medicamentos</h4>
                        <span class="text-brand">Visualizar</span>
                    </div>
                </div>

            </div>

            <!-- CARD GRANDE -->

            <div class="card p-5 mb-4">

                <h3 class="fw-bold mb-3">
                    Precisa de atendimento?
                </h3>

                <p class="text-soft">
                    Nossos especialistas estão prontos para te atender.
                    Agende uma consulta presencial ou online em poucos segundos.
                </p>

                <button class="btn btn-brand mt-2">
                    Agendar Nova Consulta
                </button>

            </div>

        </div>

    </main>

</body>

</html>
