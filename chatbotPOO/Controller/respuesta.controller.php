<?php
include_once (__DIR__ . '/../Model/respuesta.class.php');

$operacion = $_POST['operacion'];
$result = false;

if ($operacion == "guardar") {
    $respuesta = new Respuesta(null, $_POST['respuesta'], $_POST['pregunta']);
    $result = $respuesta->guardar();
} else if ($operacion == "actualizar") {
    $respuesta = new Respuesta($_POST['id'], $_POST['respuesta'], $_POST['pregunta']);
    $result = $respuesta->actualizar();
} else if ($operacion == "eliminar") {
    $respuesta = new Respuesta($_POST['id'], null, null);
    $result = $respuesta->eliminar();
}

if ($result) {
    echo "<br>La operación se ejecutó con éxito.";
} else {
    echo "<br>La operación no se ejecutó correctamente.";
}
echo "<br><a href='../listarRespuesta.php'>Volver</a>";
?>
