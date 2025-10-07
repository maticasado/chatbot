<?php
// database.class.php
class Database {
    private static $instance = null;
    private $connection;

    private $host = 'localhost';
    private $db   = 'chatbot_2';   // <-- asegurate que la BD con el admin exista aquí
    private $user = 'root';
    private $pass = '';

    private function __construct() {
        $dsn = "mysql:host={$this->host};dbname={$this->db};charset=utf8mb4";
        try {
            $this->connection = new PDO($dsn, $this->user, $this->pass);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->exec("SET NAMES utf8mb4");
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }

    // Singleton
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    // Devuelve la conexión PDO (instancia)
    public function getConnection() {
        return $this->connection;
    }

    // Helper estático para obtener PDO directamente
    public static function getPDO() {
        return self::getInstance()->getConnection();
    }
}
?>
