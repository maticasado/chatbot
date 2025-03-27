<?php
include("conexion.php");  
$sql="INSERT INTO consultas (pregunta, respuesta, categoria) VALUES (:pregunta,:respuesta,:categoria)";
$stmt= $pdo ->prepare($sql);
if($stmt->execute([
    'pregunta'=> $_POST['pregunta'],
    'respuesta'=> $_POST['respuesta'],
    'categoria'=> $_POST['categoria']
] ) ){
    echo"El registro se cargo correctamente";
}
else {
    echo"El registro no pudo cargarse";
}
echo "<br/><a name='volver' href='listarConsulta.php'>Volver</a>"

?>  