<?php
// usuario.class.php
require_once __DIR__ . '/database.class.php';

class Usuarios {
    private $id;
    private $nombre;
    private $email;
    private $password;
    private $rol_id;
    private $conexion;

    public function __construct($id = null, $nombre = null, $email = null, $password = null, $rol_id = null) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->password = $password;
        $this->rol_id = $rol_id;
        $this->conexion = Database::getPDO(); // obtiene PDO desde Database
    }

    public function guardar() {
        $sql = "INSERT INTO usuarios (nombre, email, password, rol_id) VALUES (?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->nombre, $this->email, $this->password, $this->rol_id]);
    }

    public function actualizar() {
        $sql = "UPDATE usuarios SET nombre = ?, email = ?, password = ?, rol_id = ? WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->nombre, $this->email, $this->password, $this->rol_id, $this->id]);
    }

    public function eliminar() {
        $sql = "DELETE FROM usuarios WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->id]);
    }

    public static function obtenerTodos() {
        $conexion = Database::getPDO();
        $sql = "SELECT * FROM usuarios";
        $stmt = $conexion->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function obtenerPorId($id) {
        $conexion = Database::getPDO();
        $sql = "SELECT * FROM usuarios WHERE id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public static function obtenerPorEmail($email) {
        $conexion = Database::getPDO();
        $sql = "SELECT * FROM usuarios WHERE email = ? LIMIT 1";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    /**
     * Valida login:
     * - busca por email
     * - si encuentra usuario, intenta verificar contraseña:
     *    1) si el valor de la BD parece un hash (bcrypt/argon2), usa password_verify
     *    2) si no, compara en texto plano (útil para práctica)
     * Retorna el array asociativo del usuario si ok, o false si no.
     */
    public function validarLogin($email, $password) {
        $usuario = self::obtenerPorEmail($email);
        if (!$usuario) return false;

        $stored = $usuario['password'];

        // Si el stored password parece ser un hash de password_hash (común: empieza con $2y$ o $2a$ o $argon2$)
        if ( (strlen($stored) > 20 && (substr($stored,0,4) === '$2y$' || substr($stored,0,4) === '$2a$' || strpos($stored,'argon2') !== false)) ) {
            if (password_verify($password, $stored)) return $usuario;
            return false;
        }

        // fallback: comparación en texto plano (práctica)
        if ($stored === $password) return $usuario;

        return false;
    }
    public function validarLoginPorNombre($nombre, $password) {
        $sql = "SELECT * FROM usuarios WHERE nombre = ? AND password = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([$nombre, $password]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        return $usuario ?: false;
    }
    

    // Getters
    public function getId() { return $this->id; }
    public function getNombre() { return $this->nombre; }
    public function getEmail() { return $this->email; }
    public function getPassword() { return $this->password; }
    public function getRolId() { return $this->rol_id; }
}
?>
