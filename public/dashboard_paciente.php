<?php
session_start();

if (!isset($_SESSION['usuario_id']) || $_SESSION['usuario_tipo'] !== 'paciente') {
    header('Location: ../auth/login.php');
    exit;
}

require_once '../config/conexao.php';

$database = new Conexao();
$conexao = $database->conectar();

$usuarioId = $_SESSION['usuario_id'];

// DADOS DO PACIENTE
$sqlPaciente = $conexao->prepare("
    SELECT nome 
    FROM usuarios 
    WHERE id = :id
");

$sqlPaciente->bindParam(':id', $usuarioId);
$sqlPaciente->execute();

$paciente = $sqlPaciente->fetch(PDO::FETCH_ASSOC);

$sqlConsulta = $conexao->prepare("
    SELECT c.data_consulta, c.hora_consulta, e.nome AS especialidade, u.nome AS medico
    FROM consultas c
    JOIN especialidades e ON e.id = c.especialidade_id
    JOIN usuarios u ON u.id = c.medico_id
    WHERE c.paciente_id = :id
      AND c.data_consulta >= CURDATE()
    ORDER BY c.data_consulta ASC
    LIMIT 1
");
$sqlConsulta->bindParam(':id', $usuarioId);
$sqlConsulta->execute();

$proximaConsulta = $sqlConsulta->fetch(PDO::FETCH_ASSOC);

$sqlExames = $conexao->prepare("
    SELECT COUNT(*) 
    FROM exames 
    WHERE paciente_id = :id AND status = 'pendente'
");
$sqlExames->bindParam(':id', $usuarioId);
$sqlExames->execute();

$examesPendentes = $sqlExames->fetchColumn();

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Dashboard do Paciente MedFlow</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="../assets/css/sidebar_p.css" />
    <link rel="shortcut icon" href="../assets/img/logo-sem-fundo.png" type="image/x-icon">
</head>

<body>

    <?php require_once '../includes/side_bar_p.php' ?>

    <!-- MAIN -->
    <main class="main-content">

        <header
            class="p-4 border-bottom border-light border-opacity-10 d-flex justify-content-between align-items-center sticky-top"
            style="background-color: rgba(26, 29, 32, 0.9); backdrop-filter: blur(10px);">

            <div>
                <h2 class="fw-extrabold mb-1">
                    Olá, <?= htmlspecialchars($paciente['nome']) ?>!
                </h2>

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

                        <?php if ($proximaConsulta): ?>
                            <h4 class="fw-bold">
                                <?= date('d/m', strtotime($proximaConsulta['data_consulta'])) ?> —
                                <?= substr($proximaConsulta['hora_consulta'], 0, 5) ?>
                            </h4>
                            <span class="text-brand">
                                <?= $proximaConsulta['medico'] ?> • <?= $proximaConsulta['especialidade'] ?>
                            </span>
                        <?php else: ?>
                            <h4 class="fw-bold">Nenhuma agendada</h4>
                            <span class="text-soft">Agende uma consulta</span>
                        <?php endif; ?>

                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card p-4">
                        <h6 class="text-soft">Exames Pendentes</h6>
                        <h4 class="fw-bold"><?= $examesPendentes ?> exame(s)</h4>
                        <a href="exames.php" class="text-brand">Ver resultados</a>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card p-4">
                        <h6 class="text-soft">Receitas Ativas</h6>
                        <h4 class="fw-bold">3 medicamentos</h4>
                        <a href="prontuario.php" class="text-brand">Visualizar</a>
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