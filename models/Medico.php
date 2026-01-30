<?php 

class Medico {
    private $conn;
    private $table = "medicos";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function cadastrarMedico($usuario_id, $crm, $especialidade_id, $telefone) {
        $query = "INSERT INTO {$this->table} (usuario_id, crm, especialidade_id, telefone) VALUES (:usuario_id, :crm, :especialidade, :telefone)";
        $stmt = $this->conn->prepare($query);

        return $stmt->execute([
            ':usuario_id' => $usuario_id,
            ':crm' => $crm,
            ':especialidade' => $especialidade_id,
            ':telefone' => $telefone
        ]);

    }
    // buscar medico pelo id do usuario
    public function buscarPorUsuario($usuario_id){

        $sql = "SELECT * FROM {$this->table}
                WHERE usuario_id = :usuario_id
                LIMIT 1";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':usuario_id' => $usuario_id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    // listar todos (útil pro futuro painel admin)
    public function listar(){

        $sql = "SELECT * FROM {$this->table}";
        $stmt = $this->conn->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}




?>