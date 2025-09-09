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
include_once "Model/respuesta.class.php";
$respuestas = Respuesta::obtenerTodas();
?>

<h2 style="text-align: center;">Lista de Respuestas</h2>

<div class="search-container">
    <div class="search-box">
        <i class="fas fa-search"></i>
        <input type="text" id="searchInput" placeholder="Buscar respuesta...">
    </div>
    <a href="formAltaRespuesta.php" class="btn-new">Nueva Respuesta</a>
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
                <th>ID</th>
                <th>Respuesta</th>
                <th>Pregunta (ID)</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($respuestas as $respuesta) { ?>
            <tr>
                <td><?= $respuesta['id'] ?></td>
                <td><?= $respuesta['respuesta'] ?></td>
                <td><?= $respuesta['pregunta_id'] ?></td>
                <td>
                    <a href="formEditarRespuesta.php?id=<?= $respuesta['id'] ?>" class="action-btn edit-btn" title="Editar">☑</a>
                    <form action="Controller/respuesta.controller.php" method="post" class="action-form">
                        <input type="hidden" name="operacion" value="eliminar">
                        <input type="hidden" name="id" value="<?= $respuesta['id'] ?>">
                        <button type="submit" onclick="return confirm('¿Está seguro de eliminar esta respuesta?')" class="action-btn delete-btn" title="Eliminar">█</button>
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