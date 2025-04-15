<?php
// Nos conectamos a la base de datos
include("conexion.php");  

// Armamos la consulta SQL
$sql = "DELETE FROM consultas WHERE id=:id";

// Ejecutamos la consulta
$stmt = $pdo->prepare($sql);
if ($stmt->execute([
    "id" => $_GET["id"]
])) {
    $mensaje = "✅ El registro se eliminó correctamente.";
} else {
    $mensaje = "❌ El registro no pudo eliminarse.";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado de la Eliminación</title>
    <link rel="stylesheet" href="css/styleEliminarConsulta.css">
</head>
<body>

    <header>
        <h1>Resultado de la Eliminación</h1>
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
