<?php
class Conexion {
    private static $host = "localhost";
    private static $user = "root";
    private static $pass = "";
    private static $db   = "chatbot_2"; // <-- CAMBIAR

    public static function getConexion() {
        $conn = new mysqli(self::$host, self::$user, self::$pass, self::$db);
        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }
        return $conn;
    }
}
?>
