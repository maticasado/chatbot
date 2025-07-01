<?php

class Categoria {
    // Atributos
    private int $id;
    private string $nombre;
    private Database $conexion;

    // Métodos
    public function __construct() {}

    public function guardar() {
        $this->conexion = new Database();
        $this->conexion->conectar();
        $query = "INSERT INTO categoria (nombre, descripcion) VALUES (:nombre, :descripcion)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':descripcion', $this->descripcion);
        $stmt->execute();
        return $stmt->rowCount();   
    }

    public static function obtenerTodas() {
        $this->conexion = new Database();
        $this->conexion->conectar();
        $query = "SELECT * FROM categoria";
        $stmt = $this->conexion->prepare($query);
        $stmt->execute();   
        return $stmt->fetchAll();
    }

    public static function obtenerPorId($id) {
        $this->conexion = new Database();
        $this->conexion->conectar();
        $query = "SELECT * FROM categoria WHERE id = :id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function actualizar() {
        $this->conexion = new Database();
        $this->conexion->conectar();
        $query = "UPDATE categoria SET nombre = :nombre, descripcion = :descripcion WHERE id = :id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':descripcion', $this->descripcion);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function eliminar() {
        $this->conexion = new Database();
        $this->conexion->conectar();
        $query = "DELETE FROM categoria WHERE id = :id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
        return $stmt->rowCount();
    }
}

?>
