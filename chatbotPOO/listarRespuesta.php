<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión de Consultas</title>
    <link rel="stylesheet" href="css/styleIndex.css"></link>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
   
</head>
<body>

    <header>
        <h1>CodeGol</h1>
    </header>

    <nav>
        <a href="index.php">Inicio</a>
        <a href="Categoria/listarCategoria.php"> Categoria</a>
        <a href="listarPregunta.php"> Pregunta</a>
        <a href="listarRespuesta.php"> Respuesta</a>
    </nav>
<?php
include_once "Model/respuesta.class.php";
$respuestas = Respuesta::obtenerTodas();
?>

<h2 style="text-align: center;">Lista de Respuestas</h2>
<div style="text-align: center; margin-bottom: 10px;">
    <a href="formAltaRespuesta.php">Nueva Respuesta</a>
</div>

<?php
if ($respuestas == null) {
    echo "No hay respuestas.";
} else {
?>
<table border="1" cellpadding="5" cellspacing="0" style="margin: auto;">
    <tr>
        <th>ID</th>
        <th>Respuesta</th>
        <th>Pregunta (ID)</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($respuestas as $respuesta) { ?>
    <tr>
        <td><?= $respuesta['id'] ?></td>
        <td><?= $respuesta['respuesta'] ?></td>
        <td><?= $respuesta['pregunta_id'] ?></td>
        <td>
            <a href="formEditarRespuesta.php?id=<?= $respuesta['id'] ?>">Editar</a>
            <form action="Controller/respuesta.controller.php" method="post" style="display: inline;">
                <input type="hidden" name="operacion" value="eliminar">
                <input type="hidden" name="id" value="<?= $respuesta['id'] ?>">
                <input type="submit" onclick="return confirm('¿Está seguro de eliminar esta respuesta?')" value="Eliminar">
            </form>
        </td>
    </tr>
    <?php } ?>
</table>
<?php } ?>
