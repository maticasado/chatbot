<?php
// Incluye la clase Database
include_once "database.class.php"; 


//Usamos el metodo sin crear el objeto
$roles=ROl::obtenerTodxs();


class Rol {
    // Atributos privados
    private $id;
    private $nombre;
    private $conexion;

    // Constructor: inicializa los atributos y obtiene la conexión a la base de datos
    public function __construct($id = null, $nombre = null) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->conexion = Database::getInstance()->getConnection(); 
    }

    // Método estático para obtener todos los roles de la base de datos
    public static function obtenerTodxs() {
        $conexion = Database::getInstance()->getConnection();  
        $sql = "SELECT * FROM roles";
        $stmt = $conexion->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Guarda un nuevo rol en la base de datos
    public function guardar() {
        $sql = "INSERT INTO roles (nombre) VALUES(?)"; 
        $stmt = $this->conexion->prepare($sql);       
        return $stmt->execute([$this->nombre]);
    }

    // Actualiza un rol existente en la base de datos
    public function actualizar() {
        $sql = "UPDATE roles SET nombre = ? WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->nombre, $this->id]);
    }

    // Elimina un rol de la base de datos
    public function eliminar() {
        $sql = "DELETE FROM roles WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->id]);
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    // Setters
    public function setId($id) { 
        $this->id = $id;
    }

    public function setNombre($nombre) { 
        $this->nombre = $nombre;
    }

    // Método sin implementar
    public static function obtenerPorId($id) {
        $sql = "SELECT * FROM roles WHERE id = ?";
        $conexion = Database::getInstance()->getConnection();
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$id]); 
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        if($resultado)  {
            return new Rol($resultado['id'], $resultado['nombre']);
        }       
        return null;
    }
   
}
?>
