<?php
require_once "../Model/database.class.php";
require_once "../Model/pregunta.class.php";
require_once "../Model/respuesta.class.php";
require_once "../Model/conversacion.class.php";

$mensajeUsuario = $_POST['text'] ?? '';

// Buscar una pregunta similar
$conexion = Database::getPDO();

$sql = "SELECT r.respuesta FROM preguntas p 
        JOIN respuesta r ON p.id = r.pregunta_id 
        WHERE p.pregunta LIKE ? LIMIT 1";

$stmt = $conexion->prepare($sql);
$stmt->execute(["%$mensajeUsuario%"]);
$respuesta = $stmt->fetchColumn();

if (!$respuesta) {
    $respuesta = "Lo siento, no entiendo tu pregunta. ¿Podés reformularla?";
}

// Guardar conversación
$sqlInsert = "INSERT INTO conversaciones (pregunta_usuario, respuesta_bot, fecha_hora) 
              VALUES (?, ?, NOW())";

$stmt = $conexion->prepare($sqlInsert);
$stmt->execute([$mensajeUsuario, $respuesta]);

echo $respuesta;
