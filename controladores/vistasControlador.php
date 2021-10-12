<?php
require_once "./modelos/vistasModelo.php";
class vistasControlador extends vistasModelo{
    public function obtener_plantilla(){
        return require_once "./vistas/plantilla.php";
    }
    public function obtener_vista_controlador(){
        if(isset($_GET["view"])){ 
        $ruta=explode("/",$_GET["view"]); 
        $respuesta=vistasModelo::obtener_vistas_modelo($ruta[0]);
        }else{
        $respuesta="login";
        }
        return $respuesta;
    }
    public function obtener_css_controlador(){
        if(isset($_GET["view"])){ 
        $ruta=explode("/",$_GET["view"]); 
        $respuesta=vistasModelo::obtener_css_modelo($ruta[0]);
        }else{
        $respuesta="login";
        }
        return $respuesta;
    }
    
}