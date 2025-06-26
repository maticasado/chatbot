<?php

class Database {
    // Instancia única (singleton)
    private static $instancia = null;

    // Atributos de conexión
    private $nombre = "chatbot_2";
    private $servidor = "localhost";
    private $usuario = "root";
    private $clave = "";
    private $conexion;

    // Constructor privado: establece conexión usando PDO
    public function __construct() {
        try {
            $dsn = "mysql:host={$this->servidor};dbname={$this->nombre};charset=utf8";
            $this->conexion = new PDO($dsn, $this->usuario, $this->clave);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // corregido ATR_ERRMODE
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage()); // corregido $e_> por $e->
        }
    }

    // Patrón singleton: retorna una sola instancia de Database
    public static function getInstance() {
        if (!self::$instancia) {
            self::$instancia = new Database();
        }
        return self::$instancia;
    }

    // Devuelve la conexión PDO
    public function getConnection() {
        return $this->conexion;
    }

    // Métodos vacíos para ejecutar consultas
    public function execute() {}

    public function query() {}
}
?>
