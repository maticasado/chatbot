<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión de Consultas</title>
    <link rel="stylesheet" href="../css/styleIndex.css"></link>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
   
</head>
<body>

    <header>
        <h1>CodeGol</h1>
    </header>

    <nav>
        <a href="../index.php">Inicio</a>
        <a href="listarCategoria.php"> Categoria</a>
        <a href="../listarPregunta.php"> Pregunta</a>
        <a href="../listarRespuesta.php"> Respuesta</a>
    </nav>
<form name= "formAltaCategoria" action="../Controller/categoria.controller.php" method="post">
    <input type="hidden" name="operacion" value="guardar"/>
    <label>Nombre:</label>
    <input type="text" name="nombre" required>
    <input type="submit" name="operacion" value="guardar">
</form>