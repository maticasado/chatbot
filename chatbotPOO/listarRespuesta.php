<?php
// Iniciar sesión si es necesario
session_start();

// Verificar si el usuario ha iniciado sesión (opcional)
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
    <link rel="stylesheet" href="css/listarRStyle.css">
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
            <i class="fas fa-robot" aria-hidden="true"></i>
        </div>
        <div>
            <h1>CodeGol</h1>
            <p class="tagline">Tu asistente virtual de confianza</p>
        </div>
    </div>
</header>

<nav>
    <a href="chat.php"><i class="fas fa-home" aria-hidden="true"></i> Inicio</a>
    <a href="Categoria/listarCategoria.php"><i class="fas fa-folder" aria-hidden="true"></i> Categoría</a>
    <a href="listarPregunta.php"><i class="fas fa-question-circle" aria-hidden="true"></i> Pregunta</a>
    <a href="listarRespuesta.php"><i class="fas fa-comment" aria-hidden="true"></i> Respuesta</a>
</nav>

<?php
include_once "Model/respuesta.class.php";
$respuestas = Respuesta::obtenerTodas();
?>

<div class="header-container">
    <h2>Lista de Respuestas</h2>
    <div class="search-container">
        <div class="search-box">
            <label for="searchInput" class="visually-hidden">Buscar respuesta</label>
            <i class="fas fa-search" aria-hidden="true"></i>
            <input 
                type="text" 
                id="searchInput" 
                placeholder="Buscar respuesta..." 
                aria-label="Buscar respuesta"
            >
        </div>
        <a href="formAltaRespuesta.php" class="btn-new" aria-label="Agregar nueva respuesta">
            <i class="fas fa-plus" aria-hidden="true"></i> Nueva Respuesta
        </a>
    </div>
</div>

<?php
if ($respuestas == null) {
    echo "<p style='text-align: center;'>No hay respuestas.</p>";
} else {
?>
<div class="table-container">
    <table>
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Respuesta</th>
                <th scope="col">Pregunta (ID)</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($respuestas as $respuesta) { ?>
            <tr>
                <td><?= htmlspecialchars($respuesta['id']) ?></td>
                <td><?= htmlspecialchars($respuesta['respuesta']) ?></td>
                <td><?= htmlspecialchars($respuesta['pregunta_id']) ?></td>
                <td class="action-buttons">
                    <a href="formEditarRespuesta.php?id=<?= $respuesta['id'] ?>" 
                       class="action-btn edit-btn" 
                       aria-label="Editar respuesta <?= $respuesta['id'] ?>">
                       <i class="fas fa-edit" aria-hidden="true"></i>
                    </a>
                    <form action="Controller/respuesta.controller.php" method="post" class="action-form">
                        <input type="hidden" name="operacion" value="eliminar">
                        <input type="hidden" name="id" value="<?= $respuesta['id'] ?>">
                        <button 
                            type="submit" 
                            onclick="return confirm('¿Está seguro de eliminar esta respuesta?')" 
                            class="action-btn delete-btn"
                            aria-label="Eliminar respuesta <?= $respuesta['id'] ?>">
                            <i class="fas fa-trash" aria-hidden="true"></i>
                        </button>
                    </form>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php } ?>

<script>
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
