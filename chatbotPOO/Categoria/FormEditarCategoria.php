<form action="../Controller/categoria.controller.php" method="post">
    <label>Nombre:</label>
    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
    <input type="text" name="nombre" value="<?php echo $_GET['nombre'] ?? ''; ?>">
    <br>
    <input type="submit" name="operacion" value="Actualizar">
    <input type="submit" name="operacion" value="Cancelar">
</form>
