<?php
include "Model/pregunta.class.php";

if (isset($_GET['id'])) {
    $pregunta = Pregunta::obtenerPorId($_GET['id']);
    if (!$pregunta) {
        echo "No se ha encontrado la pregunta.";
        exit;
    }
?>

<h2>Editar Pregunta</h2>
<form name="formEditarPregunta" method="post" action="Controller/pregunta.controller.php">
    <input type="hidden" name="operacion" value="actualizar"/>
    <label for="id">ID:</label>
    <input type="text" name="id" value="<?= $pregunta->getId(); ?>" readonly>
    <label>Pregunta:</label>
    <input type="text" name="pregunta" value="<?= $pregunta->getPregunta(); ?>" required>
    <label>Categoría (ID):</label>
    <input type="number" name="categoria" value="<?= $pregunta->getCategoria(); ?>" required>
    <input type="submit" value="Aceptar">
</form>

<a href="listarPregunta.php">Volver</a>
<?php
} else {
    echo "No se ha encontrado la pregunta.";
}
?>
