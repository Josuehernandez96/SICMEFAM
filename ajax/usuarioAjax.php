<?php
$peticionAjax=true;
require_once "../core/configGeneral.php";

if(isset($_POST["accion"])){
    
if($_POST["accion"]=="save"){
require_once "../controladores/usuarioControlador.php";

$insUsuario = new UsuarioControlador();
echo $insUsuario->agregar_usuario_controlador();  
 
}
if($_POST["accion"]=="eliminar"){
        
    require_once "../controladores/usuarioControlador.php";
    $insAdmin = new usuarioControlador();
    echo $insAdmin->eliminar_cuenta_controlador();
}
if($_POST["accion"]=="tablaadmin"){
        
    require_once "../controladores/usuarioControlador.php";
    $insAdmin = new usuarioControlador();
    echo $insAdmin->acordeon_admin_controlador();
}
if($_POST["accion"]=="tablasecret"){
        
    require_once "../controladores/usuarioControlador.php";
    $insAdmin = new usuarioControlador();

    echo $insAdmin->acordeon_limitado_controlador();
}
if($_POST["accion"]=="obtenerdatos"){

    require_once "../controladores/usuarioControlador.php";
        $insAdmin = new usuarioControlador();
        echo $insAdmin->obtener_usuario_controlador();   
    
    }

    if($_POST["accion"]=="modificar"){
        require_once "../controladores/usuarioControlador.php";
        
        $insAdmin = new usuarioControlador();
        echo $insAdmin->modificar_usuario_controlador();  
         
        }

}
?>