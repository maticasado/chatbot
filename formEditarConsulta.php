<?php
include("conexion.php");

$sql="SELECT * FROM consultas WHERE id=(:id)";
$stmt= $pdo->prepare($sql);
if( $stmt->execute(['id'=> $_GET['id']])) {
?>
<form name="formEditarConsulta" method ="POST" action="editarConsulta.php" class="form"
    <label> Id: <label>
        <input type="text" name= "id" readonly> <br/>
    <label> Pregunta </label>
<input class="form-control" type="text" name="pregunta"><br/>
    <label> Respuesta </label>
<input class="form-control" type="text" name="respuesta"><br/>
    <select name = "categoria">
        <option value = 'sistema operativo'> Sistema operativo </option>
        <option value = 'software'> Software  </option>
        <option value = 'hardware'> Hardware </option>
        <option value = 'seguridad'> Seguridad </option>
        <option value = 'conectividad'> Conectividad </option>
    </select>
<input type="submit" value="Aceptar">
</form>

<?php
}else{
    echo "el registro seleccionado, no existe";
}
?>