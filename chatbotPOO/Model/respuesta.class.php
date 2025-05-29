<?php

class Respuesta {
    // Atributos
    private int $id;
    private string $respuesta;
    private Pregunta $pregunta;
    private Database $conexion;

    // Métodos
    public function __construct() {}

    public function guardar() {}

    public function obtenerTodas() {}

    public function obtenerPorId() {}

    public function actualizar() {}

    public function eliminar() {}
}

?>
