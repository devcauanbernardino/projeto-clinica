<?php
require_once '../config/conexao.php';

$database = new Conexao();
$conn = $database->conectar();

$sql = "SELECT id, nome FROM especialidades ORDER BY nome";
$stmt = $conn->prepare($sql);
$stmt->execute();

$especialidades = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Cadastro MedFlow</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="../assets/css/admin-login.css" />
    <link rel="shortcut icon" href="../assets/img/logo-sem-fundo.png" type="image/x-icon">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 d-flex flex-column align-items-center">

                <!-- Logo -->
                <div class="text-center mb-4">
                    <div class="brand-logo mx-auto mb-3 d-flex align-items-center justify-content-center">
                        <img src="../assets/img/logo-sem-fundo.png" alt="Logo MedFlow" width="80">
                    </div>
                    <h2 class="fw-extrabold mb-1">MedFlow</h2>
                    <h5 class="text-secondary fw-normal">Crie sua conta</h5>
                </div>

                <!-- Card -->
                <div class="card bg-dark text-light login-card">
                    <div class="card-body p-4 p-md-5">

                        <form method="POST" action="processa_cadastro.php">

                            <div class="mb-4">
                                <label class="form-label small fw-bold">Tipo de conta</label>
                                <select name="tipo" class="form-control" required>
                                    <option value="">Selecione</option>
                                    <option value="paciente">Paciente</option>
                                    <option value="medico">Médico</option>
                                </select>
                            </div>

                            <div id="camposPaciente" class="d-none">
                                <div class="mb-3">
                                    <label class="form-label small fw-bold">Nome completo</label>
                                    <input type="text" name="nome" class="form-control" placeholder="Seu nome completo">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-bold">CPF</label>
                                    <input type="text" name="cpf" class="form-control" placeholder="CPF">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-bold">Data de nascimento</label>
                                    <input type="date" name="data" class="form-control">
                                </div>
                                <div class="col-12 mb-3">
                                    <label class="form-label small fw-bold">Telefone</label>
                                    <input type="text" name="telefone" class="form-control"
                                        placeholder="(99) 9999-9999">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-bold">E-mail</label>
                                    <input type="email" name="email" class="form-control"
                                        placeholder="exemplo@medflow.com.br">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-bold">Senha</label>
                                    <input type="password" name="senha" class="form-control"
                                        placeholder="Crie uma senha">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-bold">Confirmar senha</label>
                                    <input type="password" name="confirmar_senha" class="form-control"
                                        placeholder="Repita a senha">
                                </div>
                            </div>

                            <div id="camposMedico" class="d-none">

                                <hr class="my-4">

                                <h6 class="fw-bold mb-3">Dados profissionais</h6>

                                <div class="row">
                                    <div class="mb-3">
                                        <label class="form-label small fw-bold">Nome completo</label>
                                        <input type="text" name="nome" class="form-control"
                                            placeholder="Seu nome completo">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label small fw-bold">E-mail</label>
                                        <input type="email" name="email" class="form-control"
                                            placeholder="exemplo@medflow.com.br">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label small fw-bold">Senha</label>
                                        <input type="password" name="senha" class="form-control"
                                            placeholder="Crie uma senha">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label small fw-bold">Confirmar senha</label>
                                        <input type="password" name="confirmar_senha" class="form-control"
                                            placeholder="Repita a senha">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label small fw-bold">CRM</label>
                                        <input type="text" name="crm" class="form-control" placeholder="CRM-SP 12345">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label small fw-bold">Especialidade</label>
                                        <select name="especialidade_id" class="form-control">
                                            <option value="">Selecione uma especialidade</option>

                                            <?php foreach ($especialidades as $esp): ?>
                                                <option value="<?= $esp['id'] ?>">
                                                    <?= htmlspecialchars($esp['nome']) ?>
                                                </option>
                                            <?php endforeach; ?>

                                        </select>
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label class="form-label small fw-bold">Telefone</label>
                                        <input type="text" name="telefone" class="form-control" placeholder="(99) 9999-9999">
                                    </div>

                                </div>


                            </div>

                            <?php

                            $mensagens = [
                                'preenchacampos' => ['tipo' => 'warning', 'msg' => 'Preencha todos os campos.'],
                                'emailinvalido' => ['tipo' => 'danger', 'msg' => 'Digite um e-mail válido.'],
                                'naocoincidem' => ['tipo' => 'danger', 'msg' => 'As senhas não coincidem.'],
                                'emailexiste' => ['tipo' => 'danger', 'msg' => 'Este e-mail já está cadastrado.'],
                                'erro' => ['tipo' => 'danger', 'msg' => 'Erro ao criar conta.']
                            ];

                            if (isset($_GET['cadastro']) && isset($mensagens[$_GET['cadastro']])) {

                                $alerta = $mensagens[$_GET['cadastro']];

                                echo "<div class='alert alert-{$alerta['tipo']}'>{$alerta['msg']}</div>";
                            }
                            ?>

                            <div class="d-grid gap-2 mb-3">
                                <button class="btn btn-primary-brand btn-lg" type="submit">
                                    Criar conta
                                </button>
                            </div>

                            <div class="text-center">
                                <a href="login.php" class="link-teal small">
                                    Já tem uma conta? Entrar
                                </a>
                            </div>

                        </form>

                    </div>
                </div>

                <!-- Rodapé -->
                <div class="mt-4 d-flex align-items-center justify-content-center opacity-50">
                    <span class="material-symbols-outlined me-1 fs-6">security</span>
                    <span class="small text-uppercase">Cadastro seguro</span>
                </div>

            </div>
        </div>
    </div>
    <script>
        const tipoConta = document.querySelector('select[name="tipo"]')
        const camposMedico = document.getElementById('camposMedico')
        const camposPaciente = document.getElementById('camposPaciente')

        const inputsMedico = camposMedico.querySelectorAll('input, select')
        const inputsPaciente = camposPaciente.querySelectorAll('input')

        tipoConta.addEventListener('change', () => {

            if (tipoConta.value === 'medico') {
                camposMedico.classList.remove('d-none')
                camposPaciente.classList.add('d-none')

                inputsMedico.forEach(i => i.disabled = false)
                inputsPaciente.forEach(i => i.disabled = true)
            }

            if (tipoConta.value === 'paciente') {
                camposPaciente.classList.remove('d-none')
                camposMedico.classList.add('d-none')

                inputsPaciente.forEach(i => i.disabled = false)
                inputsMedico.forEach(i => i.disabled = true)
            }
        })
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>