<?php
$peticionAjax = true;
require_once "../core/configGeneral.php";

if (isset($_POST["accion"])) {

    if ($_POST["accion"] == "save") {
        require_once "../controladores/proveedorControlador.php";

        $insproveedor = new proveedorControlador();
        echo $insproveedor->agregar_proveedor_controlador();
    }
  
    if ($_POST["accion"] == "eliminar") {

        require_once "../controladores/proveedorControlador.php";
        $insAdmin = new proveedorControlador();
        echo $insAdmin->eliminar_proveedor_controlador();
    }
 
    if ($_POST["accion"] == "actualizar") {

        require_once "../controladores/proveedorControlador.php";
        $insAdmin = new proveedorControlador();
        echo $insAdmin->paginador_proveedor_controlador();
    }

    if ($_POST["accion"] == "alltabla") {

        require_once "../controladores/proveedorControlador.php";
        $insAdmin = new proveedorControlador();
        echo $insAdmin->paginador_proveedor_controlador();
    }

    if ($_POST["accion"] == "paginadop") {

        require_once "../controladores/proveedorControlador.php";
        $insAdmin = new proveedorControlador();
        echo $insAdmin->paginador_proveedor_controlador();
    }
}