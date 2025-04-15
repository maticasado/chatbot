<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Consultas</title>
    <link rel="stylesheet" href="css/styleListar.css">
</head>
<body>

    <header>
        <h1>Listado de Consultas</h1>
    </header>

    <nav>
        <a href="index.php">Home</a>
        <a href="formAltaConsulta.php">Hacer una pregunta</a>
        <a href="listarConsulta.php">Preguntas hechas</a>
    </nav>

    <main>
        <section class="consulta-list">
            <?php 
                // 1- Conectamos con la database
                include ("conexion.php");

                // 2- Armamos la consulta
                $sql = "SELECT * FROM consultas";

                // 3- Ejecutamos la consulta 
                $consultas = $stmt = $pdo->query($sql);

                // 4- Mostramos datos provenientes de la database
                foreach($consultas as $consulta){
                    echo "<div class='consulta'>";
                    echo "<p><strong>Pregunta:</strong> " . $consulta['pregunta'] . "</p>";
                    echo "<p><strong>Respuesta:</strong> " . $consulta['respuesta'] . "</p>";
                    echo "<p><strong>Categoría:</strong> " . $consulta['categoria'] . "</p>";
                    echo "<div class='acciones'>";
                    echo "<a class='btn' href='formEditarConsulta.php?id=" . $consulta['id'] . "'>Actualizar</a>";
                    echo "<a class='btn eliminar' href='eliminarConsulta.php?id=" . $consulta['id'] . "'>Eliminar</a>";
                    echo "</div>";
                    echo "</div>";
                }
            ?>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 Sistema de Gestión de Consultas - Todos los derechos reservados.</p>
    </footer>

</body>
</html>
