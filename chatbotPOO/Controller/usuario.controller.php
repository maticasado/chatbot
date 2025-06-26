<?php
include "../Model/usuario.class.php";
$operacion=$_POST['operacion'];
 if ($operacion=="guardar") {
        $usuario= new Usuarios(null, $_POST['nombre'], $_POST['email'], $_POST['password'], $_POST['rol']);
        $result=$usuario->guardar();
    }else if($operacion=="actualizar"){
        $usuario= new Usuarios($_POST['id'], $_POST['nombre'], $_POST['email'], $_POST['password'], $_POST['rol']);
        $result=$usuario->actualizar();
    }else if($operacion=="eliminar"){
        $usuario= new Usuarios($_POST['id'], null, null, null, null);
        $result=$usuario->eliminar();
    }
    
    if($result){
        print"<br> La operacion se ejecuto con exito.";
    }else{
        print"<br> La operacion no se ejecuto correctamente";
    }
    print "<a href='../listarUsuario.php'>Volver</a>"

?>