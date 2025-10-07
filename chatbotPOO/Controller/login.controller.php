<?php
require_once "../Model/usuario.class.php";
session_start();

// Verifica si se enviaron datos por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["usuario"] ?? "";   // <-- cambiamos 'email' por 'usuario'
    $password = $_POST["password"] ?? "";

    $usuarioModel = new Usuarios();
    $usuario = $usuarioModel->validarLoginPorNombre($nombre, $password); // usamos nueva función
    if ($usuario) {
        // Guardar datos en sesión
        $_SESSION["usuario_id"] = $usuario["id"];
        $_SESSION["usuario_nombre"] = $usuario["nombre"];
        $_SESSION["usuario_rol"] = $usuario["rol_id"];

        header("Location: ../indexAdmin.php");
        exit;
    } else {
        echo "❌ Usuario o contraseña incorrectos";
    }
}
?>
