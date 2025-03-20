<head>
<link rel="stylesheet" href="css/styleForm.css">
</head>

<form name="formAltaConsulta" method ="POST" action="altaConsulta.php" class="form"
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