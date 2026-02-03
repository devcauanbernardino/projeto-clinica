<?php
session_start();

if (
    !isset($_SESSION['usuario_id']) ||
    !isset($_SESSION['tipo']) ||
    $_SESSION['tipo'] !== 'medico'
) {
    header('Location: ../admin/login.php?erro=login_required');
    exit;
}

?>
