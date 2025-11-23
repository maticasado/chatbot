<?php
session_start();
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
    <a href="<?php echo isset($_SESSION['usuario_id']) ? 'logout.php' : 'login.php'; ?>" class="login-btn">
        <i class="fas <?php echo isset($_SESSION['usuario_id']) ? 'fa-sign-out-alt' : 'fa-sign-in-alt'; ?>"></i> 
        <?php echo isset($_SESSION['usuario_id']) ? 'Cerrar Sesión' : 'Iniciar Sesión'; ?>
    </a>
    <div class="logo-container">
        <div class="logo"><i class="fas fa-robot"></i></div>
        <div>
            <h1>CodeGol</h1>
            <p class="tagline">Tu asistente virtual de confianza</p>
        </div>
    </div>
</header>

<main>
    <section class="chatbot">
        <h2><i class="fas fa-comments"></i> Chat con CodeGol</h2>
        <p>Hola, soy CodeGol, tu asistente virtual. ¿En qué puedo ayudarte hoy?</p>
    </section>

    <div class="chat-container">
        <div class="chat-box" id="chatBox">
            <div class="chat-message bot">
                ¡Hola! Soy CodeGol, tu asistente virtual. ¿En qué puedo ayudarte hoy?
            </div>
        </div>

        <form class="chat-input" id="chatForm">
            <input type="text" id="mensaje" name="mensaje" placeholder="Escribe tu mensaje aquí..." autocomplete="off">
            
            <button type="submit">
                <i class="fas fa-paper-plane"></i> Enviar
            </button>

            <button type="button" id="hablarBtn">
                <i class="fas fa-microphone"></i> Hablar
            </button>
        </form>
    </div>
</main>

<footer>
    <p>&copy; 2025 - 7°I - E.P.E.T N°3 - Todos los derechos reservados.</p>
</footer>

<!-- ========================= -->
<!--   SCRIPT COMPLETO FINAL   -->
<!-- ========================= -->

<script>
$(document).ready(function(){

    // ==========================
    // FUNCIÓN PARA ENVIAR TEXTO
    // ==========================
    function enviarMensaje() {
        let mensaje = $("#mensaje").val().trim();

        if(mensaje === ""){
            alert("Por favor, escribe un mensaje antes de enviar.");
            return;
        }

        // Muestra mensaje del usuario
        $("#chatBox").append('<div class="chat-message user">' + mensaje + '</div>');
        scrollToBottom();

        // Limpia el input
        $("#mensaje").val('');

        // Enviar al servidor
        $.ajax({
            url: 'Controller/controlador.php',
            type: 'POST',
            data: { text: mensaje },
            success: function(respuesta){
                $("#chatBox").append('<div class="chat-message bot">' + respuesta + '</div>');
                scrollToBottom();
                respuestaBot(respuesta); // HABLA
            },
            error: function(){
                $("#chatBox").append('<div class="chat-message bot">Lo siento, ocurrió un error.</div>');
                scrollToBottom();
            }
        });
    }

    // ==========================
    // AUTOSCROLL
    // ==========================
    function scrollToBottom() {
        let chatBox = document.getElementById("chatBox");
        chatBox.scrollTop = chatBox.scrollHeight;
    }

    // ==========================
    // FORMULARIO ENVÍA MENSAJE
    // ==========================
    $("#chatForm").on("submit", function(e){
        e.preventDefault();
        enviarMensaje();
    });


    // ==========================
    // BOTÓN HABLAR
    // ==========================
    $("#hablarBtn").on("click", function() {
        iniciarReconocimiento();
    });


    // ==========================
    // RECONOCIMIENTO DE VOZ
    // ==========================
    let recognition;

    function iniciarReconocimiento() {

        if (!('webkitSpeechRecognition' in window)) {
            alert("Tu navegador NO soporta reconocimiento de voz.");
            return;
        }

        recognition = new webkitSpeechRecognition();

        recognition.lang = "es-ES";   // puedes usar "es-AR" si querés
        recognition.continuous = false;
        recognition.interimResults = true;

        recognition.onstart = () => console.log("🎤 Escuchando...");

        // --- ARREGLO IMPORTANTE ---
        recognition.onresult = function(event) {
            let resultado = "";

            for (let i = event.resultIndex; i < event.results.length; i++) {
                resultado += event.results[i][0].transcript;
            }

            console.log("Texto detectado:", resultado);

            // ESCRIBIR EN EL INPUT
            $("#mensaje").val(resultado);

            // ENVIAR AUTOMÁTICAMENTE
            if(event.results[event.results.length - 1].isFinal){
                enviarMensaje();
            }
        };

        recognition.onerror = event => console.log("Error:", event.error);

        recognition.start();
    }


    // ==========================
    // RESPUESTA DEL BOT HABLADA
    // ==========================
    function respuestaBot(mensaje) {
        let mensajeVoz = new SpeechSynthesisUtterance(mensaje);
        mensajeVoz.lang = "es-ES";
        window.speechSynthesis.speak(mensajeVoz);
    }

});
</script>

</body>
</html>
