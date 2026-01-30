<?php

require_once '../config/conexao.php';
require_once '../models/Usuario.php';
require_once '../models/Medico.php';
require_once '../models/Paciente.php';

$database = new Conexao();
$conexao = $database->conectar();

$usuario = new Usuario($conexao);
$medico = new Medico($conexao);
// $paciente = new Paciente($conexao);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $confirmar = $_POST['confirmar_senha'];
    $tipo = $_POST['tipo'];

    // medico
    $crm = $_POST['crm'] ?? null;
    $especialidade_id = $_POST['especialidade_id'] ?? null;
    $telefone = $_POST['telefone'] ?? null;

    // validações básicas
    if (empty($nome) || empty($email) || empty($senha) || empty($tipo)) {
        header("Location: cadastrar.php?cadastro=preenchacampos");
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: cadastrar.php?cadastro=emailinvalido");
        exit;
    }

    if ($senha !== $confirmar) {
        header("Location: cadastrar.php?cadastro=senhasdiferentes");
        exit;
    }

    if ($usuario->emailExiste($email)) {
        header("Location: cadastrar.php?cadastro=emailexiste");
        exit;
    }

    try {

        $conexao->beginTransaction();

        $usuarioId = $usuario->cadastrar($nome, $email, $senha, $tipo);

        if (!$usuarioId) {
            throw new Exception("Erro ao cadastrar usuário");
        }

        // separação correta das responsabilidades
        if ($tipo === 'medico') {

            if (empty($crm) || empty($especialidade_id) || empty($telefone)) {
                throw new Exception("Campos do médico não preenchidos");
            }

            $medico->cadastrarMedico($usuarioId, $crm, $especialidade_id, $telefone);

        } else {

            //usuario->cadastrarPaciente($usuarioId);
        }

        $conexao->commit();

        header("Location: login.php?cadastro=sucesso");
        exit;

    } catch (Exception $e) {

        $conexao->rollBack();


        header("Location: login.php?cadastro=erro");
        //ATIVE ISSO PRA DEBUG (depois pode tirar)
        die($e->getMessage());
    }
}
