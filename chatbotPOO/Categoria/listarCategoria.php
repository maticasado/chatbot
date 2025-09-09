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
    <link rel="stylesheet" href="../css/styleIndex.css">
    <link rel="stylesheet" href="../css/listarStyle.css">
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
    <a href="../chat.php"><i class="fas fa-home"></i> Inicio</a>
    <a href="Categoria/listarCategoria.php"><i class="fas fa-folder"></i> Categoria</a>
    <a href="../listarPregunta.php"><i class="fas fa-question-circle"></i> Pregunta</a>
    <a href="../listarRespuesta.php"><i class="fas fa-comment"></i> Respuesta</a>
</nav>

    <div class="container">
        <h2 class="page-title">Lista de Categorías</h2>
        
        <div class="search-box">
            <a href="formAltaCategoria.php" class="btn-new">
                <i class="fas fa-plus"></i> Nueva Categoría
            </a>
            <input type="text" id="searchInput" class="search-input" placeholder="Buscar categoría...">
        </div>

        <?php
        require_once "../Model/categoria.class.php";
        $categorias = Categoria::obtenerTodas();
        
        if($categorias == null){
            echo '<div class="no-data">No hay categorías registradas</div>';
        } else {
        ?>  
        <table class="data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categorias as $categoria){ ?>
                <tr>
                    <td><?= $categoria->getId() ?></td>
                    <td><?= $categoria->getNombre() ?></td>
                    <td class="action-buttons">
                        <a href="formEditarCategoria.php?id=<?= $categoria->getId() ?>" class="btn-edit">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <form action="../controller/categoria.controller.php" method="post" style="display:inline;">
                            <input type="hidden" name="operacion" value="eliminar">
                            <input type="hidden" name="id" value="<?= $categoria->getId() ?>">
                            <button type="submit" class="btn-delete" onclick="return confirm('¿Está seguro de eliminar esta categoría?')">
                                <i class="fas fa-trash"></i> Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php } ?>
    </div>

    <script>
        // Funcionalidad de búsqueda
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