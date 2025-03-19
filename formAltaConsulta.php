<head>
<link rel="stylesheet" href="css/styleForm.css">
</head>

<form name="formAltaConsulta" method ="POST" action="altaConsulta.php" class="form"
    <label> Pregunta </label>
<input class="form-control" type="text" name="pregunta"><br/>
    <label> Respuesta </label>
<input class="form-control" type="text" name="respuesta"><br/>
    <select name = "Categoria">
    <option value = 'sistema operativo'> Sistema operativo </option>
    <option value = 'software'> Software  </option>
    <option value = 'hardware'> Hardware </option>
    <option value = 'seguridad'> Seguridad </option>
    <option value = 'conectividad'> Conectividad </option>

<input type="submit" value="Aceptar">
<input type="submit" value="Cancelar">
</form>