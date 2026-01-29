<?php

session_start();

require_once '../config/conexao.php';
require_once '../models/Usuario.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: login.php");
    exit;
}

$email = $_POST['email'];
$senha = $_POST['senha'];

if (empty($email) || empty($senha)) {
    header("Location: login.php?login=campos");
    exit;
}


$database = new Conexao();
$conexao = $database->conectar();

$usuario = new Usuario($conexao);

$usuario = $usuario->login($email, $senha);

if ($usuario) {
    session_regenerate_id(true);

    $_SESSION['usuario_id'] = $usuario['id'];
    $_SESSION['usuario_nome'] = $usuario['nome'];
    $_SESSION['usuario_tipo'] = $usuario['tipo'];

    if ($usuario['tipo'] === 'medico') {
        header("Location: dashboard.php");
    } else {
        header("Location: ../public/dashboard_paciente.php");
    }

    exit;

} else {
    header("Location: login.php?login=erro");
    exit;
}






?>