<?php
include("conexion.php");  
$sql="UPDATE consultas SET pregunta=:pregunta , respuesta=:respuesta ,categoria=:categoria WHERE id=:id;
$stmt= $pdo ->prepare($sql);
if($stmt->execute([
    "pregunta"=> $_POST["pregunta"],
    "respuesta"=> $_POST["respuesta"],
    "categoria"=> $_POST["categoria"],
    "id"=> $_POST['id']
] ) ){
    echo"El registro se editó correctamente";
}
else {
    echo"El registro no pudo cargarse";
}
echo "<br/><a name='volver' href='listarConsulta.php'>Volver</a>"

?>  