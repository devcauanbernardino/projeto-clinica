<?php
require_once '../../config/conexao.php';
session_start();

/*
  Aqui futuramente você pode filtrar apenas
  consultas do médico logado
*/
// $sql = $pdo->query("
//     SELECT c.id, p.nome AS paciente, c.data_consulta
//     FROM consultas c
//     INNER JOIN pacientes p ON p.id = c.paciente_id
//     ORDER BY c.data_consulta DESC
// ");

// $consultas = $sql->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Novo Exame | MedFlow</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Ícones -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">

    <!-- CSS do sistema -->
    <link rel="stylesheet" href="../../assets/css/dashboard.css">
    <link rel="stylesheet" href="../../assets/css/sidebar_ad.css">
    <link rel="stylesheet" href="../../assets/css/inputs.css">

    <link rel="shortcut icon" href="../../assets/img/logo-sem-fundo.png" type="image/x-icon">
</head>

<body class="d-flex">

    <!-- SIDEBAR -->
    <?php include '../../includes/side_bar_ad.php'; ?>

    <!-- CONTEÚDO -->
    <main class="main-content  p-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold">Cadastrar Exame</h2>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body">

                <form action="salvar_exame.php" method="POST" enctype="multipart/form-data">

                    <!-- CONSULTA -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Consulta</label>
                        <select name="consulta_id" class="form-select" required>
                            <option value="">Selecione a consulta</option>

                            <?php foreach ($consultas as $consulta): ?>
                                <option value="<?= $consulta['id']; ?>">
                                    <?= $consulta['paciente']; ?> —
                                    <?= date('d/m/Y', strtotime($consulta['data_consulta'])); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- TIPO DO EXAME -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tipo do exame</label>
                        <input type="text" name="tipo_exame" class="form-control"
                               placeholder="Ex: Hemograma, Raio-X, Ultrassom" required>
                    </div>

                    <!-- OBSERVAÇÕES -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Observações</label>
                        <textarea name="observacoes" rows="4"
                                  class="form-control"
                                  placeholder="Observações clínicas do exame..."></textarea>
                    </div>

                    <!-- ARQUIVO -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Arquivo do exame</label>
                        <input type="file" name="arquivo" class="form-control"
                               accept=".pdf,.jpg,.jpeg,.png" required>
                        <small class="text-muted">
                            Formatos aceitos: PDF, JPG, PNG
                        </small>
                    </div>

                    <!-- BOTÕES -->
                    <div class="d-flex justify-content-end gap-2">
                        <a href="dashboard_medico.php" class="btn btn-outline-secondary">
                            Cancelar
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <span class="material-symbols-outlined align-middle">upload</span>
                            Salvar exame
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </main>

</body>
</html>
