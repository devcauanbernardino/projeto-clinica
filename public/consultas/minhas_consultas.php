<?php
require_once '../../auth/auth_paciente.php';
require_once '../../config/conexao.php';

$paciente_id = $_SESSION['usuario_id'];

$db = new Conexao();
$conexao = $db->conectar();

// Buscar consultas do paciente
$stmt = $conexao->prepare("
    SELECT c.id, c.data_consulta, c.hora_consulta, u.nome AS medico, e.nome AS especialidade, c.status
    FROM consultas c
    JOIN usuarios u ON c.medico_id = u.id
    JOIN especialidades e ON c.especialidade_id = e.id
    WHERE c.paciente_id = :paciente_id
    ORDER BY c.data_consulta DESC, c.hora_consulta DESC
");

$stmt->execute([':paciente_id' => $paciente_id]);
$consultas = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Minhas Consultas | MedFlow</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="../../assets/css/sidebar_p.css" />
    <link rel="shortcut icon" href="../../assets/img/logo-sem-fundo.png" type="image/x-icon">
</head>

<body>

    <?php require_once '../../includes/side_bar_p.php'; ?>

    <main class="main-content px-4 py-4">

        <!-- HEADER -->
        <div class="d-flex justify-content-between align-items-end mb-5">
            <div>
                <h1 class="fw-bold mb-1">Minhas Consultas</h1>
                <p class="text-soft mb-0">
                    Gerencie seus agendamentos e acompanhe seu histórico médico.
                </p>
            </div>

            <button class="btn btn-primary-medflow px-4 py-2">
                <span class="material-symbols-outlined me-1">add_circle</span>
                Novo Agendamento
            </button>
        </div>

        <!-- TABS -->
        <ul class="nav nav-tabs mb-4">
            <li class="nav-item">
                <a class="nav-link active" href="#">Próximas Consultas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Histórico</a>
            </li>
        </ul>

        <!-- TABELA -->
        <div class="table-container mb-5">
            <div class="table-responsive">
                <table class="table table-dark table-hover table-borderless align-middle mb-0">
                    <thead>
                        <tr>
                            <th class="px-4 py-3">Data</th>
                            <th class="px-4 py-3">Horário</th>
                            <th class="px-4 py-3">Médico</th>
                            <th class="px-4 py-3">Especialidade</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3 text-end">Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($consultas as $c): ?>
                            <tr>
                                <td class="px-4 py-3"><?= date('d/m/Y', strtotime($c['data_consulta'])) ?></td>
                                <td class="px-4 py-3"><?= substr($c['hora_consulta'], 0, 5) ?></td>
                                <td class="px-4 py-3"><?= htmlspecialchars($c['medico']) ?></td>
                                <td class="px-4 py-3">
                                    <span class="badge rounded-pill"
                                        style="background: rgba(19,236,200,.1); color: var(--medflow-teal);">
                                        <?= htmlspecialchars($c['especialidade']) ?>
                                    </span>
                                </td>
                                <td class="px-4 py-3">
                                    <?php
                                    switch ($c['status']) {
                                        case 'pendente':
                                            echo '<span class="badge bg-primary">Pendente</span>';
                                            break;
                                        case 'concluida':
                                            echo '<span class="badge bg-success">Concluída</span>';
                                            break;
                                        case 'cancelada':
                                            echo '<span class="badge bg-danger">Cancelada</span>';
                                            break;
                                        default:
                                            echo '<span class="badge bg-secondary">Desconhecido</span>';
                                    }
                                    ?>
                                </td>
                                <td class="px-4 py-3 text-end">
                                    <?php if ($c['status'] == 'agendada'): ?>
                                        <button class="btn btn-link text-teal btn-sm fw-bold">Detalhes</button>
                                        <button class="btn btn-link text-danger btn-sm fw-bold ms-2">Cancelar</button>
                                    <?php else: ?>
                                        <button class="btn btn-link text-teal btn-sm fw-bold">Resumo</button>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>
            </div>
        </div>

        <!-- CARDS INFORMATIVOS -->
        <div class="row g-4 mb-5">
            <div class="col-md-4">
                <div class="card p-4">
                    <h6 class="fw-bold text-teal mb-2">
                        <span class="material-symbols-outlined me-1">notifications_active</span>
                        Lembrete
                    </h6>
                    <p class="small mb-0">
                        Você tem uma consulta agendada para daqui a 3 dias.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card p-4">
                    <h6 class="fw-bold text-teal mb-2">
                        <span class="material-symbols-outlined me-1">description</span>
                        Exames
                    </h6>
                    <p class="small mb-0">
                        Existem exames disponíveis para visualização.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card p-4 border border-teal" style="background: rgba(19,236,200,.05)">
                    <h6 class="fw-bold text-teal mb-2">
                        <span class="material-symbols-outlined me-1">support_agent</span>
                        Precisa de ajuda?
                    </h6>
                    <p class="small mb-0">
                        Nossa equipe está disponível 24h para suporte.
                    </p>
                </div>
            </div>
        </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>