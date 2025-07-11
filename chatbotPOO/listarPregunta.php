<?php
include "Model/pregunta.class.php";
$preguntas = Pregunta::obtenerTodas();
?>

<h2 style="text-align: center;">Lista de Preguntas</h2>
<div style="text-align: center; margin-bottom: 10px;">
    <a href="formAltaPregunta.php">Nueva Pregunta</a>
</div>

<?php
if ($preguntas == null) {
    echo "No hay preguntas.";
} else {
?>
<table border="1" cellpadding="5" cellspacing="0" style="margin: auto;">
    <tr>
        <th>ID</th>
        <th>Pregunta</th>
        <th>Categoría (ID)</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($preguntas as $pregunta) { ?>
    <tr>
        <td><?= $pregunta['id'] ?></td>
        <td><?= $pregunta['pregunta'] ?></td>
        <td><?= $pregunta['categoria_id'] ?></td>
        <td>
            <a href="formEditarPregunta.php?id=<?= $pregunta['id'] ?>">Editar</a>
            <form action="Controller/pregunta.controller.php" method="post" style="display: inline;">
                <input type="hidden" name="operacion" value="eliminar">
                <input type="hidden" name="id" value="<?= $pregunta['id'] ?>">
                <input type="submit" onclick="return confirm('¿Está seguro de eliminar esta pregunta?')" value="Eliminar">
            </form>
        </td>
    </tr>
    <?php } ?>
</table>
<?php } ?>
