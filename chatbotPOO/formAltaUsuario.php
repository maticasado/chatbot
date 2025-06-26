<form name="formAltaUsuario" method="post" action="Controller/usuario.controller.php">
    <input type="hidden" name="operacion" value="guardar"/>
    <label>Nombre:</label>
    <input type="text" name="nombre" required>
    <label>Email:</label>
    <input type="email" name="email" required>
    <label>Contraseña:</label>
    <input type="password" name="password" required>
    <label>Rol:</label>
    <select name="rol">
        <?php
            include "Model/rol.class.php";
            $roles = Rol::obtenerTodxs();
            foreach ($roles as $rol) {
                echo "<option value='" . $rol['id'] . "'>" . $rol['nombre'] . "</option>";
            }
        ?>
    </select>
    <input type="submit" value="Aceptar">

</form>