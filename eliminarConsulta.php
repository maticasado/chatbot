<?php
// nos conectamos a la base de datos
include("conexion.php");  
//Armamos la consulta sql 
$sql="DELETE FROM consultas WHERE id=:id";
//ejecutar la consulta
$stmt= $pdo ->prepare($sql);
if($stmt->execute([
    "id"=> $_GET ["id"]
] ) ){
    echo"El registro se Eliminó correctamente";
}
else {
    echo"El registro no pudo eliminarse";
}
echo "<br/><a name='volver' href='listarConsulta.php'>Volver</a>"

?>  