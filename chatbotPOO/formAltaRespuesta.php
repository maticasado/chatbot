<form name="formAltaRespuesta" method="post" action="Controller/respuesta.controller.php">
    <input type="hidden" name="operacion" value="guardar"/>
    <label>Respuesta:</label>
    <input type="text" name="respuesta" required>
    <label>Pregunta (ID):</label>
    <input type="number" name="pregunta" required>
    <input type="submit" value="Aceptar">
</form>
