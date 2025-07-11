<?php
require_once "database.class.php";

class Categoria {
    private $id;
    private $nombre;

    public function __construct($id = null, $nombre = null) {
        $this->id = $id;
        $this->nombre = $nombre;
    }

    public function guardar() {
        try {
            $conexion = Database::getConnection();
            $sql = "INSERT INTO categorias (nombre) VALUES (?)";
            $stmt = $conexion->prepare($sql);
            return $stmt->execute([$this->nombre]);
        } catch (PDOException $e) {
            echo "💥 Error en guardar(): " . $e->getMessage();
            return false;
        }
    }

    public function actualizar() {
        try {
            $conexion = Database::getConnection();
            $sql = "UPDATE categorias SET nombre = :nombre WHERE id = :id";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(':nombre', $this->nombre);
            $stmt->bindParam(':id', $this->id);
            $stmt->execute();

            if ($stmt->rowCount() === 0) {
                echo "⚠️ Consulta ejecutada, pero no se modificó nada (quizás el nombre era igual).<br>";
            }

            return true;
        } catch (PDOException $e) {
            echo "💥 Error en actualizar(): " . $e->getMessage();
            return false;
        }
    }

    public function eliminar() {
        try {
            $conexion = Database::getConnection();
            $sql = "DELETE FROM categorias WHERE id = :id";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(':id', $this->id);
            $stmt->execute();
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            echo "💥 Error en eliminar(): " . $e->getMessage();
            return false;
        }
    }

    public static function obtenerTodas() {
        try {
            $conexion = Database::getConnection();
            $sql = "SELECT * FROM categorias";
            $stmt = $conexion->prepare($sql);
            $stmt->execute();   
            $categorias = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $categorias[] = new Categoria($row['id'], $row['nombre']);
            }
            return $categorias;
        } catch (PDOException $e) {
            echo "💥 Error en obtenerTodas(): " . $e->getMessage();
            return [];
        }
    }

    public static function obtenerPorId($id) {
        try {
            $conexion = Database::getConnection();
            $sql = "SELECT * FROM categorias WHERE id = :id";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row) {
                return new Categoria($row['id'], $row['nombre']);
            }
            return null;
        } catch (PDOException $e) {
            echo "💥 Error en obtenerPorId(): " . $e->getMessage();
            return null;
        }
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
}
?>
