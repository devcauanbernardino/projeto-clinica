<?php
session_start();

if (
    !isset($_SESSION['usuario_id']) ||
    !isset($_SESSION['tipo']) ||
    $_SESSION['tipo'] !== 'paciente'
) {
    header('Location: ../public/dashboard_paciente.php');
    exit;
}

?>
