<?php
// Conectar a la base de datos
include("conexion.php");

// Armar la consulta
$sql = "SELECT * FROM consultas WHERE id=(:id)";

// Ejecutar la consulta
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $_GET['id']]);

// Mostrar los datos
if ($consulta = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Consulta</title>
    <link rel="stylesheet" href="css/styleformEditarConsulta.css">
</head>
<body>

    <header>
        <h1>Editar Consulta</h1>
    </header>

    <nav>
        <a href="index.php">Home</a>
        <a href="formAltaConsulta.php">Hacer una pregunta</a>
        <a href="listarConsulta.php">Preguntas hechas</a>
    </nav>

    <main>
        <section class="form-container">
            <form name="formEditarConsulta" method="POST" action="editarConsulta.php" class="form">
                <label> Id: </label>
                <input type="text" name="id" value="<?=$consulta['id'];?>" readonly><br/>

                <label> Pregunta </label>
                <input class="form-control" type="text" name="pregunta" value="<?=$consulta['pregunta'];?>"><br/>

                <label> Respuesta </label>
                <input class="form-control" type="text" name="respuesta" value="<?=$consulta['respuesta'];?>"><br/>

                <label> Categoría </label>
                <select name="categoria">
                    <option value="<?=$consulta['categoria'];?>" selected><?=$consulta['categoria'];?></option>
                    <option value="sistema operativo">Sistema operativo</option>
                    <option value="software">Software</option>
                    <option value="hardware">Hardware</option>
                    <option value="seguridad">Seguridad</option>
                    <option value="conectividad">Conectividad</option>
                </select><br/>

                <input type="submit" value="Actualizar Consulta">
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 Sistema de Gestión de Consultas - Todos los derechos reservados.</p>
    </footer>

</body>
</html>
<?php
} else {
    echo "El registro seleccionado no existe.";
    echo "<a href='listarConsulta.php'>Volver al listado</a>";
}
?>
