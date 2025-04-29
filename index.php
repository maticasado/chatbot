<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión de Consultas</title>
    <link rel="stylesheet" href="css/styleIndex.css">
    <link rel="stylesheet" href= css/styleChat.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
   
</head>
<body>

    <header>
        <h1>CodeGol</h1>
    </header>

    <nav>
        <a href="index.php">Home</a>
        <a href="formAltaConsulta.php">Hacer una pregunta</a>
        <a href="listarConsulta.php">Preguntas hechas</a>
    </nav>

    <main>
        <section class="chatbot">
            <h3>Presentamos a tu asistente virtual: CodeGol🤖</h3>
            <p>Hola, soy CodeGol, tu asistente virtual. Estoy aquí para ayudarte a gestionar tus dudas sobre tu computadora. ¡No dudes en preguntarme lo que necesites!</p>
        </section>

        <section>
        <div class="chat-container">
            <h1>(logo de codegol)Chatea con CodeGol Aqui:</h1>
    <div class="chat-box">
        <div class="chat-message bot">
            Hola, ¿en qué puedo ayudarte?
        </div>
        <div class="chat-message user">
            Necesito ayuda con mi computadora.
        </div>
        <!-- Más mensajes pueden ir aquí dinámicamente -->
    </div>
    <form class="chat-input" method="POST" action="procesarMensaje.php">
        <input type="text" name="mensaje" placeholder="Escribe algo aquí..." required />
        <button type="submit">Enviar</button>
    </form>
    </div>

        </section>
    </main>

    <footer>
        <p>&copy; 2025 Sistema de Gestión de Consultas - Todos los derechos reservados.</p>
    </footer>

</body>
<script>
    $(document).ready(function(){
        $("#send-btn").on("click", function(){

        });
    });
</script>
</html>
