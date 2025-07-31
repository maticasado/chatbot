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

<?php
require_once "../Model/categoria.class.php";
$categorias = Categoria::obtenerTodas();
?>
<html lang="es">
<h2 style="text-align: center;">Lista de Categoria</h2>
<div style="text-align: center; margin-bottom: 10px;">
    <a href="formAltaCategoria.php">Nueva Categoria</a>
</div>
<?php
if($categorias == null){
    echo "No hay categorias";
}else{
?>  
<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($categorias as $categoria){ ?>
    <tr>
    <td><?= $categoria->getId() ?></td>
    <td><?= $categoria->getNombre() ?></td>
    <td>
        <a href="formEditarCategoria.php?id=<?= $categoria->getId() ?>&nombre=<?= urlencode($categoria->getNombre()) ?>">Editar</a>
        <form action="../controller/categoria.controller.php" method="post" style="display:inline;">
            <input type="hidden" name="operacion" value="eliminar">
            <input type="hidden" name="id" value="<?= $categoria->getId() ?>">
            <input type="submit" onclick="return confirm('¿Está seguro de eliminar esta categoria?')" value="Eliminar">
        </form>
    </td>

    </tr>
    <?php } ?>
</table>
<?php
}
?>

