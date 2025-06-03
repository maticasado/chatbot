<?php

class Usuarios {
    // Atributos
    private int $id;
    private string $nombre;
    private string $email;
    private string $password;
    private string $rol;
    private Database $conexion;

    // Métodos
    public function __construct() {}

    public function guardar() {}

    public function obtenerTodos() {}

    public function obtenerPorId() {}

    public function obtenerPorEmail() {}

    public function verificarLogin() {}
}

?>
