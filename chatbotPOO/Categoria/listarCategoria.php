<?php
require "../Model/categoria.class.php";
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
        <td><?= $categoria['id'] ?></td>
        <td><?= $categoria['nombre'] ?></td>
        <td>
        <a href="formEditarCategoria.php?id=<?= $categoria['id'] ?>&nombre=<?= urlencode($categoria['nombre']) ?>">Editar</a>
            <form action="controller/categoria.controller.php" method="post">
                <input type="hidden" name="operacion" value="eliminar">
                <input type="hidden" name="id" value="<?= $categoria['id'] ?>">
                <input type="submit" onclick="return confirm('¿Está seguro de eliminar esta categoria?')" value="Eliminar">
            </form>
        </td>
    </tr>
    <?php } ?>
</table>
<?php
}
?>

