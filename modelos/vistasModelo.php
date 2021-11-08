<?php
class vistasModelo{
    protected function obtener_vistas_modelo($vista){
        
        $listaBlanca=["inicio","paciente","historialclinico","cita","404","usuario","medicamento","consulta","respaldo","bitacora","personal"];
        
        if(in_array($vista,$listaBlanca)){
            if(is_file("./vistas/contenido/vista-".$vista.".php")){
                $contenido="./vistas/contenido/vista-".$vista.".php";
            }else{
                $contenido="404";
            }
        }elseif($vista=="login"){
            $contenido="login";
        }elseif($vista=="index"){
            $contenido="login";
        } else{
            $contenido="404";
        } 
        return $contenido;
    }

    protected function obtener_css_modelo($vista){
        $listaBlanca=["inicio","paciente","historialclinico","cita","medicamento","usuario","consulta","respaldo","bitacora","personal"];
        if(in_array($vista,$listaBlanca)){
            if(is_file("./vistas/contenido/css/css-".$vista.".php")){
                $contenido="./vistas/contenido/css/css-".$vista.".php";
            }else{
                $contenido="404";
            }
        }elseif($vista=="login"){
            $contenido="login";
        }elseif($vista=="index"){
            $contenido="login";
        } else{
            $contenido="404";
        }
        return $contenido;
    }

    
}
