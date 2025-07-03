<?php
include_once "../Model/categoria.class.php";

$result = null;
$operacion = isset($_POST['operacion']) ? $_POST['operacion'] : null;

if ($operacion == "guardar") {
    $Categoria = new Categoria(null, $_POST['nombre']);
    $result = $Categoria->guardar();
} else if ($operacion == "actualizar") {
    $Categoria = new Categoria($_POST['id'], $_POST['nombre']);
    $result = $Categoria->actualizar();
} else if ($operacion == "eliminar") {
    $Categoria = new Categoria($_POST['id'], null);
    $result = $Categoria->eliminar();
}

if ($result !== false) {
    echo "<br>✅ La operación se ejecutó correctamente (aunque puede no haber cambios visibles).";
} else {
    echo "<br>❌ La operación falló.";
}

echo "<br><a href='../Categoria/listarCategoria.php'>Volver</a>";
?>
