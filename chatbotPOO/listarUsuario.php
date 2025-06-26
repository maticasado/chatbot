<?php
include"Model/usuario.class.php";

$usuarios = Usuarios::obtenerTodos(); // <- Este método debe obtener todos los usuarios con sus datos y roles
?>

<h2 style="text-align: center;">Lista de Usuarios</h2>
<div style="text-align: center; margin-bottom: 10px;">
    <a href="formAltaUsuario.php">Nuevo Usuario</a>
</div>

<?php if (!$usuarios): ?>
    <p>No hay usuarios cargados.</p>
<?php else: ?>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Contraseña</th>
            <th>Rol</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td><?= htmlspecialchars($usuario['id']) ?></td>
                <td><?= htmlspecialchars($usuario['nombre']) ?></td>
                <td><?= htmlspecialchars($usuario['email'] ?? 'N/D') ?></td>
                <td><?= htmlspecialchars($usuario['password'] ?? 'N/D') ?></td>
                <td><?= htmlspecialchars($usuario['rol'] ?? 'N/D') ?></td>
                <td>
                    <a href="formEditarUsuario.php?id=<?= $usuario['id'] ?>">Editar</a>
                    <form action="Controller/usuario.controller.php" method="post" style="display:inline;">
                        <input type="hidden" name="operacion" value="eliminar">
                        <input type="hidden" name="id" value="<?= $usuario['id'] ?>">
                        <input type="submit" onclick="return confirm('¿Está seguro de eliminar este usuario?')" value="Eliminar">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>
