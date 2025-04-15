<?php
// Nos conectamos a la base de datos
include("conexion.php");  

// Armamos la consulta SQL
$sql = "UPDATE consultas SET pregunta=:pregunta, respuesta=:respuesta, categoria=:categoria WHERE id=:id";

// Ejecutamos la consulta
$stmt = $pdo->prepare($sql);
if ($stmt->execute([
    "pregunta" => $_POST["pregunta"],
    "respuesta" => $_POST["respuesta"],
    "categoria" => $_POST["categoria"],
    "id" => $_POST["id"]
])) {
    $mensaje = "✅ El registro se editó correctamente.";
} else {
    $mensaje = "❌ El registro no pudo cargarse.";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado de la Edición</title>
    <link rel="stylesheet" href="css/styleEditarConsulta.css">
</head>
<body>

    <header>
        <h1>Resultado de la Edición</h1>
    </header>

    <nav>
        <a href="index.php">Home</a>
        <a href="formAltaConsulta.php">Hacer una pregunta</a>
        <a href="listarConsulta.php">Preguntas hechas</a>
    </nav>

    <main>
        <section class="form-container">
            <div class="resultado">
                <p><?php echo $mensaje; ?></p>
                <a href="listarConsulta.php" class="btn">Volver al listado</a>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 Sistema de Gestión de Consultas - Todos los derechos reservados.</p>
    </footer>

</body>
</html>
