<?php
$pagina_atual = basename($_SERVER['PHP_SELF']);

require_once __DIR__ . '/../config/paths.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$nomePaciente = $_SESSION['usuario_nome'] ?? 'medico';



?>
<!-- SIDEBAR -->
<aside class="sidebar d-flex flex-column p-4">

    <div class="d-flex align-items-center mb-5">
        <img src="<?= IMG_LOGO ?>" width="48" class="me-2">
        <div>
            <h4 class="mb-0 fw-bold fs-4">MedFlow</h4>
            <small class="text-uppercase text-soft fw-bold" style="font-size: 10px; letter-spacing: 1px;">
                Portal do Médico
            </small>
        </div>
    </div>

    <nav class="nav nav-pills flex-column mb-auto">

        <a class="nav-link <?= $pagina_atual === 'dashboard.php' ? 'active' : '' ?>" href="<?= ADMIN_URL ?>dashboard.php">
            <span class="material-symbols-outlined">dashboard</span>
            Dashboard
        </a>

        <a class="nav-link <?= $pagina_atual === 'consultas.php' ? 'active' : '' ?>" href="<?= ADMIN_URL ?>consultas.php">
            <span class="material-symbols-outlined">calendar_month</span>
            Consultas
        </a>

        <a class="nav-link <?= $pagina_atual === 'pacientes.php' ? 'active' : '' ?>" href="pacientes.php">
            <span class="material-symbols-outlined">group</span>
            Pacientes
        </a>

        <!-- EXAMES -->
        <a class="nav-link <?= $pagina_atual === 'criar_exames.php' ? 'active' : '' ?>" href="exames/criar_exames.php">
            <span class="material-symbols-outlined">upload_file</span>
            Enviar Exame
        </a>

        <a class="nav-link <?= $pagina_atual === 'pendentes.php' ? 'active' : '' ?>" href="exames/pendentes.php">
            <span class="material-symbols-outlined">pending_actions</span>
            Exames Pendentes
        </a>

        <a class="nav-link <?= $pagina_atual === 'concluidos.php' ? 'active' : '' ?>" href="exames/concluidos.php">
            <span class="material-symbols-outlined">task_alt</span>
            Exames Concluídos
        </a>

        <a class="nav-link <?= $pagina_atual === 'perfil.php' ? 'active' : '' ?>" href="perfil.php">
            <span class="material-symbols-outlined">person</span>
            Meu Perfil
        </a>

    </nav>

    <div class="profile-section d-flex align-items-center mt-4">
        <img class="rounded-circle me-3" src="https://i.pravatar.cc/100" width="40" height="40">
        <div>
            <p class="mb-0 fw-bold small">Ricardo Silva</p>
            <p class="mb-0 text-soft" style="font-size: 11px;">Médico</p>
        </div>
    </div>

    <hr class="my-3" style="border-color: var(--medflow-border);" />

    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link text-danger" href="logout.php">
                <span class="material-symbols-outlined">logout</span>
                Sair
            </a>
        </li>
    </ul>

</aside>
