<?php
$pagina_atual = basename($_SERVER['PHP_SELF']);
?>

<!-- SIDEBAR_PACIENTE -->
<aside class="sidebar d-flex flex-column p-4">

    <div class="d-flex align-items-center mb-5">
        <img src="../assets/img/logo-sem-fundo.png" width="48" class="me-2">
        <div>
            <h4 class="mb-0 fw-bold">MedFlow</h4>
            <small class="text-uppercase text-soft fw-bold" style="font-size: 10px; letter-spacing: 1px;">
                Portal do Paciente
            </small>
        </div>
    </div>

    <nav class="nav nav-pills flex-column mb-auto">
        <a class="nav-link mb-2 <?= $pagina_atual === 'dashboard_paciente.php' ? 'active' : ''?>" href="../public/dashboard_paciente.php" data-page="dashboard">
            <span class="material-symbols-outlined">home</span> Início
        </a>

        <a class="nav-link mb-2 <?= $pagina_atual === 'minhas_consultas.php' ? 'active' : '' ?>" href="minhas_consultas.php" data-page="consultas">
            <span class="material-symbols-outlined">calendar_month</span> Minhas Consultas
        </a>

        <a class="nav-link mb-2 <?= $pagina_atual === 'prontuario.php' ? 'active' : '' ?>" href="prontuario.php" data-page="prontuario">
            <span class="material-symbols-outlined">description</span> Prontuário
        </a>

        <a class="nav-link mb-2 <?= $pagina_atual === 'exames.php' ? 'active' : '' ?>" href="exames.php" data-page="exames">
            <span class="material-symbols-outlined">lab_panel</span> Exames
        </a>

        <a class="nav-link <?= $pagina_atual === 'perfil.php' ? 'active' : '' ?>" href="perfil.php" data-page="perfil">
            <span class="material-symbols-outlined">person</span> Perfil
        </a>
    </nav>

    <div class="profile-section d-flex align-items-center mt-4">
        <img class="rounded-circle me-3" src="https://i.pravatar.cc/100" width="40" height="40">

        <div>
            <p class="mb-0 fw-bold small">Ricardo Silva</p>
            <p class="mb-0 text-soft" style="font-size: 11px;">Paciente</p>
        </div>
    </div>

    <ul class="nav flex-column mt-3">
        <li class="nav-item">
            <a class="nav-link text-danger" href="../admin/logout.php">
                <span class="material-symbols-outlined">logout</span>
                Sair
            </a>
        </li>
    </ul>

</aside>