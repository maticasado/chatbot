<?php
include "../Model/rol.class.php";

    if ($operacion=="guardar") {
        $rol= new Rol(null, $_POST['nombre']);
        $result=$rol->guardar();
    }else if($operacion=="actualizar"){
        $rol= new Rol($_POST['id'], $_POST['nombre']);
        $result=$rol->acturalizar();
    }else if($operacion=="eliminar"){
        $rol= new Rol($_POST['id'], null);
        $result=$rol->eliminar();
    }
    
    if($result){
        print"<br> La operacion se ejecuto con exito.";
    }else{
        print"<br> La operacion no se ejecuto correctamente";
    }
    print "<a href='listarRoles.php'>Volver</a>"


?>