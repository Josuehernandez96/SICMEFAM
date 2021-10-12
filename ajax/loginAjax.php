<?php
$peticionAjax=true;
require_once "../core/configGeneral.php";

if(isset($_POST["accion"])){

    if($_POST["accion"]=="loguear"){
        
        require_once "../controladores/loginControlador.php";
        $insAdmin = new loginControlador();
        echo $insAdmin->iniciar_sesion_controlador();
       
    }
    if($_POST["accion"]=="cerrarlogin"){
        
        require_once "../controladores/loginControlador.php";
        $insAdmin = new loginControlador();
        $insAdmin->cerrar_sesion_controlador();
       
    }
    if($_POST["accion"]=="recuperar"){
        
        require_once "../controladores/loginControlador.php";
        $insAdmin = new loginControlador();
        echo $insAdmin->recuperar_usuario_controlador();
       
    }


   
}
?>