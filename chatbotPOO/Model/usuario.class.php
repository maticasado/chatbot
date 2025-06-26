<?php
include "database.class.php";

class Usuarios {
    // Atributos
    private $id;
    private $nombre;
    private $email;
    private $password;
    private $rol_id;
    private $conexion;

    // Métodos
    public function __construct($id = null, $nombre = null, $email = null, $password = null, $rol_id = null) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->password = $password;
        $this->rol_id = $rol_id;
        $this->conexion = Database::getInstance()->getConnection();
    }

    public function guardar() {
        $sql = "INSERT INTO `usuarios` (`nombre`, `email`, `password`, `rol_id`) VALUES (?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->nombre, $this->email, $this->password, $this->rol_id]);
    }

    public function actualizar() {
        $sql = "UPDATE usuarios SET nombre = ?, email = ?, password = ?, rol = ? WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->nombre, $this->email, $this->password, $this->rol, $this->id]);
    }

    public function eliminar() {
        $sql = "DELETE FROM usuarios WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);       
        return $stmt->execute([$this->id]); 
    }

    public static function obtenerTodos() { 
        $conexion = Database::getInstance()->getConnection();
        $stmt = $conexion->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerPorId() {
        $sql = "SELECT * FROM usuarios WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->id]);
    }

    public static function obtenerPorEmail() {
        $sql = "SELECT * FROM usuarios WHERE email = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->email]);  
    }

    public static function verificarLogin() {
        $sql = "SELECT * FROM usuarios WHERE email = ? AND password = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->email, $this->password]); 
    }
}

?>
