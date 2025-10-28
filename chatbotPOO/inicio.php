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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<header>
    <a href="<?php echo isset($_SESSION['usuario_id']) ? 'logout.php' : 'login.php'; ?>" class="login-btn" aria-label="Acceder a la cuenta">
        <i class="fas <?php echo isset($_SESSION['usuario_id']) ? 'fa-sign-out-alt' : 'fa-sign-in-alt'; ?>"></i> 
        <?php echo isset($_SESSION['usuario_id']) ? 'Cerrar Sesión' : 'Iniciar Sesión'; ?>
    </a>
    <div class="logo-container">
        <div class="logo" aria-label="Logo CodeGol">
            <i class="fas fa-robot"></i>
        </div>
        <div>
            <h1>CodeGol</h1>
            <p class="tagline">Tu asistente virtual de confianza</p>
        </div>
    </div>
</header>

<main>
    <section class="chatbot" aria-labelledby="chatbot-title">
        <div>
            <!-- Corregir jerarquía de encabezados -->
            <h2 id="chatbot-title"><i class="fas fa-comments"></i> Chat con CodeGol</h2>
            <p>Hola, soy CodeGol, tu asistente virtual. Estoy aquí para ayudarte a resolver tus dudas técnicas.</p>
        </div>
    </section>

    <div class="chat-container">
        <div class="chat-box" id="chatBox" role="log">
            <div class="chat-message bot">
                ¡Hola! Soy CodeGol, tu asistente virtual. ¿En qué puedo ayudarte hoy?
            </div>
        </div>

        <form class="chat-input" id="chatForm" role="form">
            <!-- Agregar label accesible para el campo de mensaje -->
            <label for="mensaje" class="sr-only">Escribe tu mensaje aquí:</label>
            <input type="text" id="mensaje" name="mensaje" placeholder="Escribe tu mensaje aquí..." autocomplete="off" aria-label="Campo de mensaje">
            <button type="submit" aria-label="Enviar mensaje">
                <i class="fas fa-paper-plane"></i> Enviar
            </button>
        </form>
    </div>
</main>

<footer>
    <p>&copy; 2025 - 7°I - E.P.E.T N°3 - Todos los derechos reservados.</p>
</footer>

<script>
$(document).ready(function(){
    // Función para hacer scroll al final del chat
    function scrollToBottom() {
        const chatBox = document.getElementById('chatBox');
        chatBox.scrollTop = chatBox.scrollHeight;
    }

    // Enviar mensaje al hacer submit en el formulario
    $("#chatForm").on("submit", function(e){
        e.preventDefault();
        
        let mensaje = $("#mensaje").val().trim();
        if(mensaje === ""){
            alert("Por favor, escribe un mensaje antes de enviar.");
            return;
        }
        
        // Agregar mensaje del usuario al chat
        let userMsg = '<div class="chat-message user">' + mensaje + '</div>';
        $("#chatBox").append(userMsg);
        $("#mensaje").val('');
        scrollToBottom();
        
        // Enviar mensaje al servidor
        $.ajax({
            url: 'Controller/controlador.php',
            type: 'POST',
            data: { text: mensaje },
            success: function(respuesta){
                // Agregar respuesta del bot al chat
                let botMsg = '<div class="chat-message bot">' + respuesta + '</div>';
                $("#chatBox").append(botMsg);
                scrollToBottom();
            },
            error: function(){
                let errorMsg = '<div class="chat-message bot">Lo siento, ha ocurrido un error. Por favor, intenta nuevamente.</div>';
                $("#chatBox").append(errorMsg);
                scrollToBottom();
            }
        });
    });
    
    // Focus en el input al cargar la página
    $("#mensaje").focus();
});
</script>
</body>
</html>
