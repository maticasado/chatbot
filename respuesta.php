<?php
//incluimos la conexion con la base de datos 
include("conexion.php");
// reciobo el mensaje y lo guardo en la variable mensaje
$mensaje= $_POST['text'] ??'';
// Armo la consulta 
$sql="SELECT respuesta FROM consultas WHERE pregunta like :pregunta";
// Ejecutamos la consulta 
$stmt= $pdo ->prepare(sql);
$stmt ->execute(['pregunta'=>"%mensaje%"]);
// Si nos trae al menos un resultado
if($stmt->rowCount()>0){
    // Tomamos el primer valor que nos devuelve la consulta a la base de datos.
    $fetch_data= $stmt->fecth(PDO::FECTH_ASSOC);
    $respuesta= $fetch_data['respuesta'];
    // Se la enciamos al cliente, para que se muestre en el chat 
    echo $respuesta;
}else{
    echo "Lo siento, no puedo ayudarte ";
}
?>