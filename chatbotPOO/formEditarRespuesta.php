<?php
include "Model/respuesta.class.php";

if (isset($_GET['id'])) {
    $respuesta = Respuesta::obtenerPorId($_GET['id']);
    if (!$respuesta) {
        echo "No se ha encontrado la respuesta.";
        exit;
    }
?>

<h2>Editar Respuesta</h2>
<form name="formEditarRespuesta" method="post" action="Controller/respuesta.controller.php">
    <input type="hidden" name="operacion" value="actualizar"/>
    <label for="id">ID:</label>
    <input type="text" name="id" value="<?= $respuesta->getId(); ?>" readonly>
    <label>Respuesta:</label>
    <input type="text" name="respuesta" value="<?= $respuesta->getRespuesta(); ?>" required>
    <label>Pregunta (ID):</label>
    <input type="number" name="pregunta" value="<?= $respuesta->getPregunta(); ?>" required>
    <input type="submit" value="Aceptar">
</form>

<a href="listarRespuesta.php">Volver</a>
<?php
} else {
    echo "No se ha encontrado la respuesta.";
}
?>
