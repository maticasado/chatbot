<form name= "formAltaCategoria" action="../Controller/categoria.controller.php" method="post">
    <input type="hidden" name="operacion" value="guardar"/>
    <label>Nombre:</label>
    <input type="text" name="nombre" required>
    <label>Descripcion:</label>
    <input type="text" name="descripcion" required>
    <input type="submit" name="operacion" value="Guardar">
</form>