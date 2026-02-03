<?php 
require_once '../../auth/auth_paciente.php';
require_once '../../config/conexao.php';

session_start();

$paciente_id = $_SESSION['usuario_id'];

$medicoId = $_POST['medico_id'];
$especialidade_id = $_POST['especialidade_id'];
$data = $_POST['data'];
$hora = $_POST['hora'];

$db = new Conexao();
$conexao = $db->conectar();

$sql = "INSERT INTO consultas (paciente_id,  medico_id, especialidade_id, data_consulta, hora_consulta)
        VALUES (:paciente_id, :medico_id, :especialidade_id, :data, :hora)";

$stmt = $conexao->prepare($sql);
$stmt->execute([
    ':paciente_id' => $paciente_id,
    ':medico_id' => $medicoId,
    ':especialidade_id' => $especialidade_id,
    ':data' => $data,
    ':hora' => $hora
]);


header('Location: minhas_consultas.php?status=sucesso');
exit;

?>




