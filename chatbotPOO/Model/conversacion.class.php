<?php
require_once __DIR__ . '/conexion.php';

class Conversacion {
    private $id;
    private $preguntaUsuario;
    private $respuestaBot;
    private $fechaHora;

    public function __construct($preguntaUsuario = null, $respuestaBot = null, $id = null, $fechaHora = null) {
        $this->id = $id;
        $this->preguntaUsuario = $preguntaUsuario;
        $this->respuestaBot = $respuestaBot;
        $this->fechaHora = $fechaHora;
    }

    // Getters
    public function getId() { return $this->id; }
    public function getPreguntaUsuario() { return $this->preguntaUsuario; }
    public function getRespuestaBot() { return $this->respuestaBot; }
    public function getFechaHora() { return $this->fechaHora; }

    // Guardar conversación en la DB
    public function guardar() {
        $conn = Conexion::getConexion();
        $stmt = $conn->prepare("INSERT INTO conversaciones (pregunta_usuario, respuesta_bot, fecha_hora) VALUES (?, ?, NOW())");
        $stmt->bind_param("ss", $this->preguntaUsuario, $this->respuestaBot);
        return $stmt->execute();
    }

    // Listar todas las conversaciones como objetos
    public static function listarConversaciones() {
        $conn = Conexion::getConexion();
        $result = $conn->query("SELECT * FROM conversaciones ORDER BY fecha_hora DESC");
        $lista = [];

        while ($row = $result->fetch_assoc()) {
            $lista[] = new Conversacion(
                $row['pregunta_usuario'],
                $row['respuesta_bot'],
                $row['id'],
                $row['fecha_hora']
            );
        }
        return $lista;
    }
}
?>
