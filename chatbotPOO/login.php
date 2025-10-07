<?php
session_start();

// Verificar si ya está logueado
if (isset($_SESSION['usuario_id'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - CodeGol</title>
    <link rel="stylesheet" href="css/styleIndex.css">
    <link rel="stylesheet" href="css/styleLogin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

<header>
    <a href="inicio.php" class="login-btn"><i class="fas fa-arrow-left"></i> Volver al Inicio</a>
    <div class="logo-container">
        <div class="logo">
            <i class="fas fa-robot"></i>
        </div>
        <div>
            <h1>CodeGol</h1>
        </div>
    </div>
</header>

<main>
    <div class="login-container">
        <div class="login-form">
            <div class="login-icon">
                <i class="fas fa-lock"></i>
            </div>
            <h2>Iniciar Sesión</h2>

            <?php if (isset($_GET['error'])): ?>
                <div class="error-message">
                    <i class="fas fa-exclamation-circle"></i> <?= htmlspecialchars($_GET['error']) ?>
                </div>
            <?php endif; ?>
            
            <form method="POST" action="Controller/login.controller.php">
                <div class="form-group">
                    <label for="usuario"><i class="fas fa-user"></i> Usuario</label>
                    <input type="text" id="usuario" name="usuario" required placeholder="Ingresa tu usuario">
                </div>
                
                <div class="form-group">
                    <label for="password"><i class="fas fa-key"></i> Contraseña</label>
                    <input type="password" id="password" name="password" required placeholder="Ingresa tu contraseña">
                </div>
                
                <button type="submit" class="btn-login"><i class="fas fa-sign-in-alt"></i> Ingresar</button>
            </form>
            
            <div class="login-links">
                <a href="#"><i class="fas fa-question-circle"></i> ¿Olvidaste tu contraseña?</a>
            </div>
        </div>
    </div>
</main>

<footer>
    <p>&copy; 2025 - 7°I - E.P.E.T N°3 - Todos los derechos reservados.</p>
</footer>

</body>
</html>
