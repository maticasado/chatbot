<?php
include_once "Model/usuario.class.php";

if (isset($_GET['id'])) {
    $usuario = usuarios::obtenerPorId($_GET['id']);
    if (!$usuario) {
        echo "No se ha encontrado el usuario";
        exit;
    }
?>

<h2>Editar Usuario</h2>
<form name="formEditarUsuario" method="post" action="Controller/usuario.controller.php">
    <input type="hidden" name="operacion" value="actualizar"/>
    <input type="hidden" name="id" value="<?= $usuario->getId(); ?>">

    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" value="<?= $usuario->getNombre(); ?>" required>

    <label for="email">Email:</label>
    <input type="email" name="email" value="<?= $usuario->getEmail(); ?>" required>

    <label for="password">Nueva Contraseña (opcional):</label>
    <input type="password" name="password">

    <label for="rol">Rol ID:</label>
    <select name="rol">
        <?php
            include "Model/rol.class.php";
            $roles = Rol::obtenerTodxs();
            foreach ($roles as $rol) {
                echo "<option value='" . $rol['id'] . "'>" . $rol['nombre'] . "</option>";
            }
        ?>
    </select>
</form>

<a href="listarUsuario.php">Volver</a>

<?php
} else {
    echo "No se ha especificado un usuario";
}
?>