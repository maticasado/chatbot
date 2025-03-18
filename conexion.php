<?php
// Definimos constantes para los datos de conexión a la base de datos
define("SERVIDOR", "localhost");  // Servidor donde está alojada la base de datos (en este caso, local)
define("USUARIO", "root");        // Usuario de la base de datos (por defecto en XAMPP y similares es "root")
define("PASSWORD", "");      // Contraseña del usuario (aquí "clave", pero podría ser otra o estar vacía)
define("DB", "chatbot_db"); // Nombre de la base de datos a la que queremos conectarnos

try {
    // Creamos una nueva conexión PDO usando MySQL como motor de base de datos
    $pdo = new PDO(
        "mysql:host=" . SERVIDOR . ";dbname=" . DB . ";charset=utf8", // Configuración de conexión
        USUARIO,   // Usuario de la base de datos
        PASSWORD   // Contraseña del usuario
    );

    // Configuramos PDO para que lance excepciones en caso de error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Si la conexión es exitosa, imprimimos un mensaje
    echo "Conexión exitosa";
} catch (PDOException $e) {
    // Si ocurre un error en la conexión, capturamos la excepción y mostramos el mensaje de error
    echo "Error de conexión: " . $e->getMessage();
}
?>
