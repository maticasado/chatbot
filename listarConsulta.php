<?php 
//1- Conectamos con la database
include ("conexion.php");
//2- Armamos la consulta
$sql="SELECT * FROM consultas";
//3- Ejecutamos la consulta 
$consultas=$stmt= $pdo->query($sql);
//4. Mostramos datos proveninetes de la database
foreach($consultas as $consulta ){
    echo"<b>Pregunta</b>",$consulta['pregunta']."<br/>";
    echo"<b>Respuesta</b>",$consulta['respuesta']."<br/>";
    echo"<b>Categoria</b>",$consulta['categoria']."<br/>";
    echo"<br/>";
    echo"<a name='actualizar' href=formEditarConsulta.php?id=".$consulta['id']."'>Actualizar</a>";
    echo"<br/>"; 
}
?>