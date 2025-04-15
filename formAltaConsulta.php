<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Alta de Consultas</title>
    <link rel="stylesheet" href="css/styleForm.css">
</head>
<body>

    <header>
        <h1>Alta de Consultas</h1>
    </header>

    <nav>
        <a href="index.php">Home</a>
        <a href="formAltaConsulta.php">Hacer una pregunta</a>
        <a href="listarConsulta.php">Preguntas hechas</a>
    </nav>

    <main>
        <h2>Haz una pregunta</h2>

        <form name="formAltaConsulta" method="POST" action="altaConsulta.php" class="form">
            <label> Pregunta </label>
            <input class="form-control" type="text" name="pregunta" required><br/>

            <label> Respuesta </label>
            <input class="form-control" type="text" name="respuesta" required><br/>

            <label> Categoría </label>
            <select name="categoria" class="form-control">
                <option value="sistema operativo">Sistema operativo</option>
                <option value="software">Software</option>
                <option value="hardware">Hardware</option>
                <option value="seguridad">Seguridad</option>
                <option value="conectividad">Conectividad</option>
            </select><br/>

            <input type="submit" value="Aceptar" class="btn-submit">
        </form>
    </main>

    <footer>
        <p>&copy; 2025 Sistema de Gestión de Consultas - Todos los derechos reservados.</p>
    </footer>

</body
