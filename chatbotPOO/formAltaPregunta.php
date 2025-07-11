<form name="formAltaPregunta" method="post" action="Controller/pregunta.controller.php">
    <input type="hidden" name="operacion" value="guardar"/>
    <label>Pregunta:</label>
    <input type="text" name="pregunta" required>
    <label>Categoría (ID):</label>
    <input type="number" name="categoria" required>
    <input type="submit" value="Aceptar">
</form>
    