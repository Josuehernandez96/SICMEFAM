<?php
$peticionAjax=true;
require_once "../core/configGeneral.php";

if(isset($_POST["accion"])){
if($_POST["accion"]=="save"){
require_once "../controladores/personalControlador.php";

$insAdmin = new personalControlador();
echo $insAdmin->agregar_personal_controlador();  
 
}

if($_POST["accion"]=="modificar"){
    require_once "../controladores/personalControlador.php";
    
    $insAdmin = new personalControlador();
    echo $insAdmin->modificar_personal_controlador();  
     
    }
if($_POST["accion"]=="obtenerdatos"){

    require_once "../controladores/personalControlador.php";
        $insAdmin = new personalControlador();
        echo $insAdmin->obtener_personal_controlador();   
    
    }
    if($_POST["accion"]=="cambiarestado"){
        
        require_once "../controladores/personalControlador.php";
        $insAdmin = new personalControlador();
        echo $insAdmin->cambiar_estado_personal_controlador();
    }

    if($_POST["accion"]=="alltabla"){
        
        require_once "../controladores/personalControlador.php";
        $insAdmin = new personalControlador();
        echo $insAdmin->paginador_administrador_controlador();
    }

    if($_POST["accion"]=="paginado"){

        require_once "../controladores/personalControlador.php";
            $insAdmin = new personalControlador();
            echo $insAdmin->paginador_administrador_controlador();   
        
        }

        if($_POST["accion"]=="irconsulta"){

            require_once "../controladores/personalControlador.php";
                $insAdmin = new personalControlador();
                echo $insAdmin->datos_personal_controlador();   
            
            }
}
?>