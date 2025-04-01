<?php
//conectar a base de dato
include("conexion.php");

//armar la consulta
$sql="SELECT * FROM consultas WHERE id=(:id)";

//ejecutar la consulta 
$stmt= $pdo->prepare($sql);
$stmt->execute(['id'=> $_GET['id']]);

//mostrar los datos
if( $consulta = $stmt-> fetch(PDO::FETCH_ASSOC) ) {
?>
<form name="formEditarConsulta" method ="POST" action="editarConsulta.php" class="form"
    <label> Id: <label>
        <input type="text" name= "id" value="<?=$consulta['id'];?>" readonly> <br/>
    <label> Pregunta </label>
<input class="form-control" type="text" name="pregunta" value="<?=$consulta['pregunta'];?>"><br/>
    <label> Respuesta </label>
<input class="form-control" type="text" name="respuesta" value="<?=$consulta['respuesta'];?>"><br/>
    <select name = "categoria">
        <option value ="<?=$consulta ['categoria'];?>" selected> <?=$consulta['categoria'];?></option>
        <option value = 'sistema operativo'> Sistema operativo </option>
        <option value = 'software'> Software  </option>
        <option value = 'hardware'> Hardware </option>
        <option value = 'seguridad'> Seguridad </option>
        <option value = 'conectividad'> Conectividad </option>
    </select>
<input type="submit" value="Aceptar">
</form>

<?php
}
else
{
    echo "el registro seleccionado, no existe";
    echo "<a href='listarConsulta.php'>";
}
?>