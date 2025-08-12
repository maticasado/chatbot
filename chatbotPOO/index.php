<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión de Consultas</title>
    <link rel="stylesheet" href="css/styleIndex.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>

<header>
    <h1>CodeGol</h1>
</header>

<nav>
    <a href="index.php">Inicio</a>
    <a href="Categoria/listarCategoria.php">Categoria</a>
    <a href="listarPregunta.php">Pregunta</a>
    <a href="listarRespuesta.php">Respuesta</a>
</nav>

<main>
    <section class="chatbot">
        <h3>Presentamos a tu asistente virtual: CodeGol🤖</h3>
        <p>Hola, soy CodeGol, tu asistente virtual. Estoy aquí para ayudarte a gestionar tus dudas sobre tu computadora. ¡No dudes en preguntarme lo que necesites!</p>
    </section>

    <section>
        <div class="chat-container">
            <h1>(logo de codegol) Chatea con CodeGol Aquí:</h1>
            <div class="chat-box">
                <div class="chat-message bot">
                    Hola, ¿en qué puedo ayudarte?
                </div>
                <div class="chat-message user">
                    Necesito ayuda con mi computadora.
                </div>
            </div>

            <!-- Formulario -->
            <form class="chat-input" id="chatForm">
                <input id="data" type="text" name="mensaje" placeholder="Escribe algo aquí..." />
                <button id="send-btn" type="submit">Enviar</button>
            </form>
        </div>
    </section>
</main>

<footer>
    <p>&copy; 2025 Sistema de Gestión de Consultas - Todos los derechos reservados.</p>
</footer>

<!-- Script -->
<script>
$(document).ready(function(){
    $("#chatForm").on("submit", function(e){
        e.preventDefault(); // Evita envío por defecto

        let valor = $("#data").val().trim();
        if(valor === ""){
            alert("Por favor, escribe un mensaje antes de enviar.");
            return; // No sigue si está vacío
        }

        // Mensaje del usuario en el chat
        let msg = '<div class="chat-message user">'+ valor +'</div>';
        $(".chat-box").append(msg);
        $("#data").val('');

        // AJAX
        $.ajax({
            url: 'Controller/controlador.php',
            type: 'POST',
            data: { text: valor },
            success: function(result){
                let respuesta = '<div class="chat-message bot">'+ result +'</div>';
                $(".chat-box").append(respuesta);
                $(".chat-box").scrollTop($(".chat-box")[0].scrollHeight);
            }
        });
    });
});
</script>

</body>
</html>
