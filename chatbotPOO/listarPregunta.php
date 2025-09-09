<?php
// Iniciar sesión si es necesario
session_start();

// Verificar si el usuario ha iniciado sesión (opcional, dependiendo de tus requisitos)
/*
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}
*/
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat - CodeGol</title>
    <link rel="stylesheet" href="css/styleIndex.css">
    <link rel="stylesheet" href="css/listarPStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<header>
    <a href="<?php echo isset($_SESSION['usuario_id']) ? 'logout.php' : 'login.php'; ?>" class="login-btn">
        <i class="fas <?php echo isset($_SESSION['usuario_id']) ? 'fa-sign-out-alt' : 'fa-sign-in-alt'; ?>"></i> 
        <?php echo isset($_SESSION['usuario_id']) ? 'Cerrar Sesión' : 'Iniciar Sesión'; ?>
    </a>
    <div class="logo-container">
        <div class="logo">
            <i class="fas fa-robot"></i>
        </div>
        <div>
            <h1>CodeGol</h1>
            <p class="tagline">Tu asistente virtual de confianza</p>
        </div>
    </div>
</header>

<nav>
    <a href="chat.php"><i class="fas fa-home"></i> Inicio</a>
    <a href="Categoria/listarCategoria.php"><i class="fas fa-folder"></i> Categoria</a>
    <a href="listarPregunta.php"><i class="fas fa-question-circle"></i> Pregunta</a>
    <a href="listarRespuesta.php"><i class="fas fa-comment"></i> Respuesta</a>
</nav>

<?php
include_once "Model/pregunta.class.php";
$preguntas = Pregunta::obtenerTodas();
?>

<div class="header-container">
    <h2>Lista de Preguntas</h2>
    <div class="search-container">
        <input type="text" id="searchInput" class="search-box" placeholder="Buscar pregunta...">
        <a href="formAltaPregunta.php" class="btn-new">+ Nueva Pregunta</a>
    </div>
</div>

<?php
if ($preguntas == null) {
    echo "<p style='text-align: center;'>No hay preguntas.</p>";
} else {
?>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Pregunta</th>
            <th>Categoría (ID)</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($preguntas as $pregunta) { ?>
        <tr>
            <td><?= $pregunta['id'] ?></td>
            <td><?= $pregunta['pregunta'] ?></td>
            <td><?= $pregunta['categoria_id'] ?></td>
            <td class="action-buttons">
                <a href="formEditarPregunta.php?id=<?= $pregunta['id'] ?>">☑ Editar</a>
                <form action="Controller/pregunta.controller.php" method="post" style="display: inline;">
                    <input type="hidden" name="operacion" value="eliminar">
                    <input type="hidden" name="id" value="<?= $pregunta['id'] ?>">
                    <button type="submit" onclick="return confirm('¿Está seguro de eliminar esta pregunta?')" class="delete-btn">█ Eliminar</button>
                </form>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<?php } ?>

<script>
    // Función de búsqueda
    $(document).ready(function(){
        $("#searchInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("table tbody tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>

</body>
</html>