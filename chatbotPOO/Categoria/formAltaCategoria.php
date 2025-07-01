<form action="altaCategoria.php" method="post">
    <label>Nombre:</label>
    <input type="text" name="nombre" value="<?php echo $_POST['nombre']; ?>">
    <br>
    <label>Descripcion:</label>
    <input type="text" name="descripcion" value="<?php echo $_POST['descripcion']; ?>">
    <br>
    <input type="submit" name="operacion" value="Alta">
    <input type="submit" name="operacion" value="Cancelar">
</form>