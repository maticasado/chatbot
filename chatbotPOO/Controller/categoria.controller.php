    <?php
    include "../Model/categoria.class.php";
    $operacion=$_POST['operacion'];
     if ($operacion=="guardar") {
            $categoria= new Categoria(null, $_POST['nombre'], $_POST['descripcion']);
            $result=$categoria->guardar();
        }else if($operacion=="actualizar"){
            $categoria= new Categoria($_POST['id'], $_POST['nombre'], $_POST['descripcion']);
            $result=$categoria->actualizar();
        }else if($operacion=="eliminar"){
            $categoria= new Categoria($_POST['id'], null, null);
            $result=$categoria->eliminar();
        }
        
        if($result){
            print"<br> La operacion se ejecuto con exito.";
        }else{
            print"<br> La operacion no se ejecuto correctamente";
        }
        print "<a href='../Categoria/listarCategoria.php'>Volver</a>"
?>