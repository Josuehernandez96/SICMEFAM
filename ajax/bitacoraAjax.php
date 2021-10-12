<?php
$peticionAjax = true;
require_once "../core/configGeneral.php";

if (isset($_POST["accion"])) {

    if ($_POST["accion"] == "actualizar") {

        require_once "../controladores/bitacoraControlador.php";
        $insAdmin = new bitacoraControlador();
        echo $insAdmin->paginador_bitacora_controlador();
    }

    if ($_POST["accion"] == "paginado") {

        require_once "../controladores/bitacoraControlador.php";
        $insAdmin = new bitacoraControlador();
        echo $insAdmin->paginador_bitacora_controlador();
    }
}