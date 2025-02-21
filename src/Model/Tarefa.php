<?php

namespace MinhasTarefas\Model;

class Tarefa {
    private $conn;
    private $table_name = "tarefa";

    public $id_tarefa;
    public $id_usuario;
    public $titulo;
    public $descricao;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET id_usuario=:id_usuario, titulo=:titulo, descricao=:descricao";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id_usuario", $this->id_usuario);
        $stmt->bindParam(":titulo", $this->titulo);
        $stmt->bindParam(":descricao", $this->descricao);

        return $stmt->execute();
    }
}

?>
