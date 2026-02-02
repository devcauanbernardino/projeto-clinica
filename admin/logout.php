<?php
session_start();

// Limpa todas as variáveis de sessão
$_SESSION = [];

// Destroi a sessão
session_destroy();

// Redireciona para o login
header("Location: login.php");
exit;
?>