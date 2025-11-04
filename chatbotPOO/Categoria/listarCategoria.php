<?php
session_start();
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
    <title>Lista de Categorías - CodeGol</title>
    <link rel="stylesheet" href="../css/styleIndex.css">
    <link rel="stylesheet" href="../css/listarStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<header role="banner">
    <a href="<?php echo isset($_SESSION['usuario_id']) ? '../logout.php' : '../login.php'; ?>" class="login-btn" aria-label="<?php echo isset($_SESSION['usuario_id']) ? 'Cerrar sesión' : 'Iniciar sesión'; ?>">
        <i class="fas <?php echo isset($_SESSION['usuario_id']) ? 'fa-sign-out-alt' : 'fa-sign-in-alt'; ?>" aria-hidden="true"></i> 
        <?php echo isset($_SESSION['usuario_id']) ? 'Cerrar Sesión' : 'Iniciar Sesión'; ?>
    </a>

    <div class="logo-container">
        <div class="logo" aria-hidden="true">
            <i class="fas fa-robot"></i>
        </div>
        <div>
            <h1>CodeGol</h1>
            <p class="tagline">Tu asistente virtual de confianza</p>
        </div>
    </div>
</header>

<nav role="navigation" aria-label="Menú principal">
    <a href="../chat.php"><i class="fas fa-home" aria-hidden="true"></i> Inicio</a>
    <a href="listarCategoria.php" aria-current="page"><i class="fas fa-folder" aria-hidden="true"></i> Categoría</a>
    <a href="../listarPregunta.php"><i class="fas fa-question-circle" aria-hidden="true"></i> Pregunta</a>
    <a href="../listarRespuesta.php"><i class="fas fa-comment" aria-hidden="true"></i> Respuesta</a>
</nav>

<main role="main">
    <div class="container">
        <h2 class="page-title"><i class="fas fa-list" aria-hidden="true"></i> Lista de Categorías</h2>
        
        <div class="search-box">
            <a href="formAltaCategoria.php" class="btn-new" aria-label="Agregar nueva categoría">
                <i class="fas fa-plus" aria-hidden="true"></i> Nueva Categoría
            </a>

            <label for="searchInput" class="sr-only">Buscar categoría</label>
            <input 
                type="text" 
                id="searchInput" 
                class="search-input" 
                placeholder="Buscar categoría..." 
                aria-label="Buscar categoría por nombre"
            >
        </div>

        <?php
        require_once "../Model/categoria.class.php";
        $categorias = Categoria::obtenerTodas();
        
        if ($categorias == null) {
            echo '<div class="no-data" role="status">No hay categorías registradas</div>';
        } else {
        ?>  
        <table class="data-table" role="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categorias as $categoria) { ?>
                <tr>
                    <td><?= htmlspecialchars($categoria->getId()) ?></td>
                    <td><?= htmlspecialchars($categoria->getNombre()) ?></td>
                    <td class="action-buttons">
                        <a href="formEditarCategoria.php?id=<?= $categoria->getId() ?>" class="btn-edit" aria-label="Editar categoría <?= htmlspecialchars($categoria->getNombre()) ?>">
                            <i class="fas fa-edit" aria-hidden="true"></i> Editar
                        </a>
                        <form action="../controller/categoria.controller.php" method="post" style="display:inline;">
                            <input type="hidden" name="operacion" value="eliminar">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($categoria->getId()) ?>">
                            <button type="submit" class="btn-delete" aria-label="Eliminar categoría <?= htmlspecialchars($categoria->getNombre()) ?>" onclick="return confirm('¿Está seguro de eliminar esta categoría?')">
                                <i class="fas fa-trash" aria-hidden="true"></i> Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php } ?>
    </div>
</main>

<footer role="contentinfo">
    <p>&copy; 2025 - 7°I - E.P.E.T N°3 - Todos los derechos reservados.</p>
</footer>

<script>
$(document).ready(function(){
    $("#searchInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $(".data-table tbody tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});
</script>

</body>
</html>
