<?php
include "database.class.php";

class Respuesta {
    private $id;
    private $respuesta;
    private $pregunta;
    private $conexion;

    public function __construct($id = null, $respuesta = null, $pregunta = null) {
        $this->id = $id;
        $this->respuesta = $respuesta;
        $this->pregunta = $pregunta;
        $this->conexion = Database::getInstance()->getConnection();
    }

    public function guardar() {
        $sql = "INSERT INTO respuesta (respuesta, pregunta_id) VALUES (?, ?)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->respuesta, $this->pregunta]);
    }

    public static function obtenerTodas() {
        $conexion = Database::getInstance()->getConnection();
        $sql = "SELECT * FROM respuesta";
        $stmt = $conexion->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function obtenerPorId($id) {
        $conexion = Database::getInstance()->getConnection();
        $sql = "SELECT * FROM respuesta WHERE id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$id]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($resultado) {
            return new Respuesta($resultado['id'], $resultado['respuesta'], $resultado['pregunta_id']);
        }
        return null;
    }

    public function actualizar() {
        $sql = "UPDATE respuesta SET respuesta = ?, pregunta_id = ? WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->respuesta, $this->pregunta, $this->id]);
    }

    public function eliminar() {
        $sql = "DELETE FROM respuesta WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->id]);
    }

    public function getId() {
        return $this->id;
    }

    public function getRespuesta() {
        return $this->respuesta;
    }

    public function getPregunta() {
        return $this->pregunta;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setRespuesta($respuesta) {
        $this->respuesta = $respuesta;
    }

    public function setPregunta($pregunta) {
        $this->pregunta = $pregunta;
    }
}
?>
