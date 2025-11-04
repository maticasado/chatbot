<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Categoría - CodeGol</title>
    <link rel="stylesheet" href="../css/styleIndex.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>

    <!-- ENCABEZADO -->
    <header role="banner">
        <div class="logo-container">
            <div class="logo" aria-hidden="true">
                <i class="fas fa-robot"></i>
            </div>
            <div>
                <h1 id="siteTitle">CodeGol</h1>
                <p class="tagline">Tu asistente virtual de confianza</p>
            </div>
        </div>
    </header>

    <!-- MENÚ PRINCIPAL -->
    <nav role="navigation" aria-label="Menú principal">
        <a href="../index.php">
            <i class="fas fa-home" aria-hidden="true"></i> Inicio
        </a>
        <a href="listarCategoria.php" aria-current="page">
            <i class="fas fa-folder" aria-hidden="true"></i> Categoría
        </a>
        <a href="../listarPregunta.php">
            <i class="fas fa-question-circle" aria-hidden="true"></i> Pregunta
        </a>
        <a href="../listarRespuesta.php">
            <i class="fas fa-comment" aria-hidden="true"></i> Respuesta
        </a>
    </nav>

    <!-- CONTENIDO PRINCIPAL -->
    <main role="main">
        <div class="container">
            <h2 id="formularioCategorias" class="page-title">
                <i class="fas fa-plus" aria-hidden="true"></i> Nueva Categoría
            </h2>

            <form name="formAltaCategoria" 
                  action="../Controller/categoria.controller.php" 
                  method="post"
                  aria-labelledby="formularioCategorias">

                <input type="hidden" name="operacion" value="guardar">

                <!-- Campo de nombre -->
                <div class="form-group">
                    <label for="nombreCategoria">Nombre:</label>
                    <input 
                        type="text" 
                        id="nombreCategoria" 
                        name="nombre" 
                        required 
                        placeholder="Ejemplo: Hardware"
                        aria-required="true"
                        aria-label="Nombre de la categoría">
                </div>

                <!-- Botón guardar -->
                <button type="submit" 
                        class="btn-save" 
                        aria-label="Guardar nueva categoría"
                        title="Guardar nueva categoría">
                    <i class="fas fa-save" aria-hidden="true"></i> Guardar
                </button>
            </form>
        </div>
    </main>

    <!-- PIE DE PÁGINA -->
    <footer role="contentinfo">
        <p>&copy; 2025 - 7°I - E.P.E.T N°3 - Todos los derechos reservados.</p>
    </footer>

</body>
</html>
