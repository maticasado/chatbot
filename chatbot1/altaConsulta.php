<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado del Alta</title>
    <link rel="stylesheet" href="css/styleAltaConsulta.css">
</head>
<body>

    <header>
        <h1>Resultado del Alta</h1>
    </header>

    <nav>
        <a href="index.php">Home</a>
        <a href="formAltaConsulta.php">Hacer una pregunta</a>
        <a href="listarConsulta.php">Preguntas hechas</a>
    </nav>

    <main>
        <section class="consulta-list">
            <div class="consulta">
                <?php
                    include("conexion.php");

                    $pregunta = $_POST['pregunta'];
                    $respuesta = $_POST['respuesta'];
                    $categoria = $_POST['categoria'];

                    // Intentamos insertar la consulta
                    $sql = "INSERT INTO consultas (pregunta, respuesta, categoria) VALUES (:pregunta, :respuesta, :categoria)";
                    $stmt = $pdo->prepare($sql);

                    if ($stmt->execute([
                        ':pregunta' => $pregunta,
                        ':respuesta' => $respuesta,
                        ':categoria' => $categoria
                    ])) {
                        echo "<p><strong>✅ Consulta cargada correctamente.</strong></p>";
                    } else {
                        echo "<p><strong>❌ Error al cargar la consulta.</strong></p>";
                    }
                ?>
                <div class="acciones">
                    <a href="formAltaConsulta.php" class="btn">Agregar otra</a>
                    <a href="listarConsulta.php" class="btn">Ver Consultas</a>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 Sistema de Gestión de Consultas - Todos los derechos reservados.</p>
    </footer>

</body>
</html>
