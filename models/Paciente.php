<?php 

class Paciente {
    private $conn;
    private $table = "pacientes";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function cadastrarPaciente($usuario_id, $cpf, $data_nascimento, $telefone) {
        $query = "INSERT INTO {$this->table} (usuario_id, cpf, data_nascimento, telefone) VALUES (:usuario_id, :cpf, :data_nascimento, :telefone)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':usuario_id' => $usuario_id,
            ':cpf' => $cpf,
            ':data_nascimento' => $data_nascimento,
            ':telefone' => $telefone
        ]);

    }

}




?>