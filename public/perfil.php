<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Meu Perfil | MedFlow</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&display=swap" rel="stylesheet">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">

    <!-- CSS do sistema -->
    <link rel="stylesheet" href="../assets/css/sidebar_p.css">

    <link rel="shortcut icon" href="../assets/img/logo-sem-fundo.png" type="image/x-icon">
</head>

<body>

    <?php require_once '../includes/side_bar_p.php'; ?>

    <main class="main-content px-4 py-4" style="margin-left: 260px;">

        <!-- HEADER -->
        <div class="mb-5">
            <h1 class="fw-bold mb-1">
                <span class="material-symbols-outlined me-1">person</span>
                Meu Perfil
            </h1>
            <p class="text-soft mb-0">
                Gerencie suas informações pessoais e segurança da conta.
            </p>
        </div>

        <!-- INFORMAÇÕES PESSOAIS -->
        <div class="card p-4 mb-5">
            <h5 class="fw-bold mb-4">Informações Pessoais</h5>

            <form>
                <div class="row g-4">

                    <div class="col-md-6">
                        <label class="form-label">Nome completo</label>
                        <input type="text" class="form-control" placeholder="Seu nome completo">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">E-mail</label>
                        <input type="email" class="form-control" disabled placeholder="email@exemplo.com">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">CPF</label>
                        <input type="text" class="form-control" disabled placeholder="000.000.000-00">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Data de nascimento</label>
                        <input type="date" class="form-control" disabled>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Telefone</label>
                        <input type="text" class="form-control" placeholder="(00) 00000-0000">
                    </div>

                    <div class="col-12">
                        <label class="form-label">Endereço</label>
                        <input type="text" class="form-control" placeholder="Rua, número, bairro">
                    </div>

                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-success px-4">
                            Salvar alterações
                        </button>
                    </div>

                </div>
            </form>
        </div>

        <!-- SEGURANÇA -->
        <div class="card p-4">
            <h5 class="fw-bold mb-4">Segurança</h5>

            <form>
                <div class="row g-4">

                    <div class="col-md-4">
                        <label class="form-label">Senha atual</label>
                        <input type="password" class="form-control">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Nova senha</label>
                        <input type="password" class="form-control">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Confirmar nova senha</label>
                        <input type="password" class="form-control">
                    </div>

                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-outline-success px-4">
                            Atualizar senha
                        </button>
                    </div>

                </div>
            </form>
        </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>