<?php
include_once "../Model/categoria.class.php";
$result = null; 
$operacion=isset($_POST['operacion'])?$_POST['operacion']:null;
 if ($operacion=="guardar") {
        $Categoria= new Categoria(null, $_POST['nombre'], $_POST['descripcion']);
        $result=$Categoria->guardar();
    }else if($operacion=="actualizar"){
        $Categoria= new Categoria($_POST['id'], $_POST['nombre'], $_POST['descripcion']);
        $result=$Categoria->actualizar();
    }else if($operacion=="eliminar"){
        $Categoria= new Categoria($_POST['id'], null);
        $result=$Categoria->eliminar();
    }   
    
    if($result){
        print"<br> La operacion se ejecuto con exito.";
    }else{
        print"<br> La operacion no se ejecuto correctamente";
    }
    print "<a href='../Categoria/listarCategoria.php'>Volver</a>"

?>