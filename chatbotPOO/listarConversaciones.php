<?php
require_once "Model/conversacion.class.php";

// Eliminar una por ID
if (isset($_GET['eliminar'])) {
    $id = (int) $_GET['eliminar'];
    $lista = Conversacion::obtenerTodas();
    foreach ($lista as $conv) {
        if ($conv->getId() == $id) {
            $conv->eliminar();
            break;
        }
    }
    header("Location: listarConversaciones.php");
    exit;
}

// Eliminar todo
if (isset($_GET['eliminarTodo'])) {
    Conversacion::eliminarTodas();
    header("Location: listarConversaciones.php");
    exit;
}

$historial = Conversacion::obtenerTodas();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Historial de Conversaciones</title>
</head>
<body>
    <h2>Historial de Conversaciones</h2>

    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>Pregunta del Usuario</th>
            <th>Respuesta del Bot</th>
            <th>Fecha</th>
            <th>Acción</th>
        </tr>

        <?php foreach ($historial as $conv): ?>
            <tr>
                <td><?= $conv->getId() ?></td>
                <td><?= htmlspecialchars($conv->getPregunta()) ?></td>
                <td><?= htmlspecialchars($conv->getRespuesta()) ?></td>
                <td><?= $conv->getFecha() ?></td>
                <td>
                    <a href="listarConversaciones.php?eliminar=<?= $conv->getId() ?>"
                       onclick="return confirm('¿Seguro que querés eliminar esta conversación?');">
                       Eliminar
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <br>
    <a href="index.php">Volver al inicio</a>

    <?php if (!empty($historial)): ?>
        <br><br>
        <form method="get" action="listarConversaciones.php" onsubmit="return confirm('¿Seguro que querés eliminar TODO el historial?');">
            <button type="submit" name="eliminarTodo">Eliminar TODO el historial</button>
        </form>
    <?php endif; ?>
</body>
</html>
