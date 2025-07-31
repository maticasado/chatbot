<?php
include_once (__DIR__ . '/../Model/pregunta.class.php');

$operacion = $_POST['operacion'];
$result = false;

if ($operacion == "guardar") {
    $pregunta = new Pregunta(null, $_POST['pregunta'], $_POST['categoria']);
    $result = $pregunta->guardar();
} else if ($operacion == "actualizar") {
    $pregunta = new Pregunta($_POST['id'], $_POST['pregunta'], $_POST['categoria']);
    $result = $pregunta->actualizar();
} else if ($operacion == "eliminar") {
    $pregunta = new Pregunta($_POST['id'], null, null);
    $result = $pregunta->eliminar();
}

if ($result) {
    echo "<br>La operación se ejecutó con éxito.";
} else {
    echo "<br>La operación no se ejecutó correctamente.";
}
echo "<br><a href='../listarPregunta.php'>Volver</a>";
?>
