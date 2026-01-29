<?php

require_once '../config/conexao.php';
require_once '../models/Usuario.php';


$database = new Conexao();
$conexao = $database->conectar();
$usuario = new Usuario($conexao);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $tipo = $_POST['tipo'];

    $confirmar = $_POST['confirmar_senha'];

    if (empty($nome) || empty($email) || empty($senha) || empty($tipo)) { //Campos vazios
        header("Location: cadastrar.php?cadastro=prenchacampos");
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { //Validar email
        header("Location: cadastrar.php?cadastro=emailinvalido");
        exit;
    }

    if ($senha !== $confirmar) {
        header("Location: cadastrar.php?cadastro=naocoincidam");
        exit;
    }

    if ($usuario->emailExiste($email)) {
        header("Location: cadastrar.php?cadastro=emailexiste");
        exit;
    }

}


if ($usuario->cadastrar($nome, $email, $senha, $tipo)) {
    header("Location: login.php?cadastro=sucesso");
} else {
    header("Location: cadastrar.php?cadastro=erro");
}
;







?>