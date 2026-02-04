<?php
require_once '../../auth/auth_paciente.php';
require_once '../../config/conexao.php';

$db = new Conexao();
$conexao = $db->conectar();

// médicos
$medicos = $conexao->query("
    SELECT id, nome 
    FROM usuarios 
    WHERE tipo = 'medico'
")->fetchAll(PDO::FETCH_ASSOC);

// especialidades
$especialidades = $conexao->query("
    SELECT id, nome 
    FROM especialidades
")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Criar Consultas | MedFlow</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="../../assets/css/sidebar_p.css" />
    <link rel="shortcut icon" href="../../assets/img/logo-sem-fundo.png" type="image/x-icon">
    <link rel="stylesheet" href="../../assets/css/inputs.css" />
</head>

<body>

<?php require_once '../../includes/side_bar_p.php'; ?>

<main class="main-content p-4">

    <h2 class="fw-bold mb-4">Agendar Consulta</h2>

    <form method="POST" action="processa_agendamento.php" class="card p-4" style="max-width: 600px;">

        <div class="mb-3">
            <label class="form-label">Médico</label>
            <select name="medico_id" class="form-select" required>
                <option value="">Selecione</option>
                <?php foreach ($medicos as $m): ?>
                    <option value="<?= $m['id'] ?>"><?= $m['nome'] ?></option>
                <?php endforeach ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Especialidade</label>
            <select name="especialidade_id" class="form-select" required>
                <option value="">Selecione</option>
                <?php foreach ($especialidades as $e): ?>
                    <option value="<?= $e['id'] ?>"><?= $e['nome'] ?></option>
                <?php endforeach ?>
            </select>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Data</label>
                <input type="date" name="data" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Horário</label>
                <input type="time" name="hora" class="form-control" required>
            </div>
        </div>

        <button class="btn btn-brand mt-3">
            Confirmar Agendamento
        </button>

    </form>

</main>

</body>
</html>
