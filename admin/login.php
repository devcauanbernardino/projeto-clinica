<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Login MedFlow</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700;800&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="../assets/css/admin-login.css" />
    <link rel="shortcut icon" href="../assets/img/logo-sem-fundo.png" type="image/x-icon">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 d-flex flex-column align-items-center">
                <div class="text-center mb-4">
                    <div class="brand-logo mx-auto mb-3 d-flex align-items-center justify-content-center">
                        <img src="../assets/img/logo-sem-fundo.png" alt="Logo MedFlow" class="logo-img" width="80px">
                    </div>

                    <h2 class="fw-extrabold mb-1">MedFlow</h2>
                    <h5 class="text-secondary fw-normal">Bem-vindo de volta</h5>
                </div>
                <?php
                if (isset($_GET['cadastro'])) {

                    if ($_GET['cadastro'] == 'sucesso') {
                        echo "<div class='alert alert-success'>
                Conta criada com sucesso! Faça seu login.
              </div>";
                    }

                }
                ?>
                <?php
                if (isset($_GET['login'])) {

                    if ($_GET['login'] === 'erro') {
                        echo "<div class='alert alert-danger'>Email ou senha inválidos.</div>";
                    }

                    if ($_GET['login'] === 'campos') {
                        echo "<div class='alert alert-warning'>Preencha todos os campos.</div>";
                    }
                }
                ?>

                <?php if (isset($_GET['erro']) && $_GET['erro'] === 'login_required'): ?>
                    <div class="alert alert-warning">
                        Você precisa estar logado para acessar essa página.
                    </div>
                <?php endif; ?>

                <div class="card bg-dark text-light login-card">
                    <div class="card-body p-4 p-md-5">
                        <form action="processa_login.php" method="post">
                            <div class="mb-4">
                                <label class="form-label small fw-bold" for="email">E-mail</label>
                                <input class="form-control" id="email" placeholder="exemplo@medflow.com.br" required=""
                                    type="email" name="email" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label small fw-bold" for="senha">Senha</label>
                                <div class="input-group">
                                    <input class="form-control" id="senha" placeholder="Sua senha" required=""
                                        type="password" name="senha" />
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" id="lembrar" type="checkbox" />
                                    <label class="form-check-label small" for="lembrar">Lembrar de mim</label>
                                </div>
                                <a class="link-teal small" href="#">Esqueci minha senha</a>
                            </div>
                            <div class="d-grid gap-2 mb-3">
                                <button class="btn btn-primary-brand btn-lg" type="submit">Entrar</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer bg-transparent border-top border-secondary text-center py-3">
                        <p class="mb-0 footer-text">
                            Não tem uma conta?
                            <a class="link-teal" href="cadastrar.php">Criar uma conta</a>
                        </p>
                    </div>
                </div>
                <div class="mt-4 d-flex align-items-center justify-content-center opacity-50">
                    <div class="d-flex align-items-center me-3">
                        <span class="material-symbols-outlined me-1 fs-6">security</span>
                        <span class="small text-uppercase ls-wide">Acesso Seguro</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>