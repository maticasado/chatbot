<?php
include "database.class.php";

class Pregunta {
    private $id;
    private $pregunta;
    private $categoria;
    private $conexion;

    public function __construct($id = null, $pregunta = null, $categoria = null) {
        $this->id = $id;
        $this->pregunta = $pregunta;
        $this->categoria = $categoria;
        $this->conexion = Database::getInstance()->getConnection();
    }

    public function guardar() {
        $sql = "INSERT INTO preguntas (pregunta, categoria_id) VALUES (?, ?)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->pregunta, $this->categoria]);
    }

    public static function obtenerTodas() {
        $conexion = Database::getInstance()->getConnection();
        $sql = "SELECT * FROM preguntas";
        $stmt = $conexion->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function obtenerPorId($id) {
        $conexion = Database::getInstance()->getConnection();
        $sql = "SELECT * FROM preguntas WHERE id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$id]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($resultado) {
            return new Pregunta($resultado['id'], $resultado['pregunta'], $resultado['categoria_id']);
        }
        return null;
    }

    public function actualizar() {
        $sql = "UPDATE preguntas SET pregunta = ?, categoria_id = ? WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->pregunta, $this->categoria, $this->id]);
    }

    public function eliminar() {
        $sql = "DELETE FROM preguntas WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->id]);
    }

    public function getId() {
        return $this->id;
    }

    public function getPregunta() {
        return $this->pregunta;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setPregunta($pregunta) {
        $this->pregunta = $pregunta;
    }

    public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }
}
?>
