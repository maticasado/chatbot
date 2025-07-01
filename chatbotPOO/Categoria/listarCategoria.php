<?php
include "../Controller/categoria.controller.php";
?>
<html>
<head>
    <title>Listar Categoria</title>
</head>
<body>
    <h1>Listar Categoria</h1>
    <form action="listarCategoria.php" method="post">
        <input type="submit" name="operacion" value="Listar">
        <input type="submit" name="operacion" value="Nueva">
        <input type="submit" name="operacion" value="Eliminar">
    </form>
    <?php
    if (isset($_POST['operacion'])) {
        include "../Controller/categoria.controller.php";
    }
    ?>
</body>
</html>