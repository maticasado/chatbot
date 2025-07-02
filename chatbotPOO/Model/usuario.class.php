<?php
require_once "database.class.php";

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
        $sql = "UPDATE usuarios SET nombre = ?, email = ?, password = ?, rol_id = ? WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->nombre, $this->email, $this->password, $this->rol_id, $this->id]);
    }

    public function eliminar() {
        $sql = "DELETE FROM usuarios WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);       
        return $stmt->execute([$this->id]); 
    }

    public static function obtenerTodos() { 
        $conexion = Database::getInstance()->getConnection();
        $sql ="SELECT * FROM usuarios";
        $stmt = $conexion->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function obtenerPorId($id) {
        $sql = "SELECT * FROM usuarios WHERE id = ?";
        $conexion = Database::getInstance()->getConnection();
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$id]); 
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        if($resultado)  {
            return new Usuarios($resultado['id'], $resultado['nombre'], $resultado['email'], $resultado['password'], $resultado['rol_id']);
        }       
        return null;
    }


    public static function obtenerPorEmail($email) {
        $sql = "SELECT * FROM usuarios WHERE email = ? LIMIT 1";
        $conexion = Database::getInstance()->getConnection();
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$email]); 
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        if($resultado)  {
            return new Usuarios($resultado['id'], $resultado['nombre'], $resultado['email'], $resultado['password'], $resultado['rol_id']);
        }       
        return null;
    }
    
    public static function verificarLogin($email, $password) {
        $usuario = self::obtenerPorEmail($email);
        if ($usuario) {
            // Comparar la contraseña ingresada con el hash en la BD
            if (password_verify($password, $usuario->password)) {
                return $usuario; // Login correcto
            }
        }
        return false; // Login fallido
    }

    public function getId() {
        return $this->id;
    }
    public function getNombre() {
        return $this->nombre;
    }
    public function getEmail() {
        return $this->email;
    }
    public function getPassword() {
        return $this->password;
    }
    public function getRolId() {
        return $this->rol_id;
    }
}

?>
