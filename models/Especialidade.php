<?php

class Especialidade {

    private $conn;
    private $table = "especialidades";

    public function __construct($db){
        $this->conn = $db;
    }

    // Buscar pelo nome
    public function buscarOuCriar($nome){

        // tenta buscar
        $sql = "SELECT id FROM {$this->table} WHERE nome = :nome LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':nome' => $nome]);

        $especialidade = $stmt->fetch(PDO::FETCH_ASSOC);

        if($especialidade){
            return $especialidade['id'];
        }

        // se não existir → cria
        $insert = "INSERT INTO {$this->table} (nome) VALUES (:nome)";
        $stmt = $this->conn->prepare($insert);
        $stmt->execute([':nome' => $nome]);

        return $this->conn->lastInsertId();
    }
}
?>