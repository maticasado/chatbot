<?php
require_once "database.class.php";

class Categoria {
    private $id;
    private $nombre;
    private $descripcion;

    public function __construct($id = null, $nombre = null, $descripcion = null) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
    }

    public function guardar() {
    $sql = "INSERT INTO categorias (nombre, descripcion) VALUES (?, ?)";
        $stmt = $conexion->prepare($sql);
        //$stmt->bindParam(':nombre', $this->nombre);
        //$stmt->bindParam(':descripcion', $this->descripcion);
        return $stmt->execute([this->nombre, this->descripcion]);
        //return $stmt->rowCount();   
    }

    public static function obtenerTodas() {
        $sql = "SELECT * FROM categorias";
        $conexion = Database::getConnection();
        $stmt = $conexion->prepare($sql);
        $stmt->execute();   
        return $stmt->fetchAll();
    }

    public static function obtenerPorId($id) {
        $conexion = Database::getConnection();
        $sql = "SELECT * FROM categorias WHERE id = :id";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function actualizar() {
        $db = new Database();
        $conexion = $db->getPDO();
        $sql = "UPDATE categorias SET nombre = :nombre, descripcion = :descripcion WHERE id = :id";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':descripcion', $this->descripcion);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function eliminar() {
        $db = new Database();
        $conexion = $db->getPDO();
        $sql = "DELETE FROM categorias WHERE id = :id";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
        return $stmt->rowCount();
    }
}
?>
