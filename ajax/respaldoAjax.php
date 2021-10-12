<?php
$peticionAjax = true;
require_once "../core/configGeneral.php";

if (isset($_POST["accion"])) {
    if ($_POST["accion"] == "eliminar") {

        require_once "../controladores/respaldoControlador.php";
        $insAdmin = new respaldoControlador();
        echo $insAdmin->eliminar_respaldo_controlador();
    }

    if ($_POST["accion"] == "alltabla") {

        require_once "../controladores/respaldoControlador.php";
        $insAdmin = new respaldoControlador();
        echo $insAdmin->paginador_respaldo_controlador();
    }

    if ($_POST["accion"] == "paginado") {

        require_once "../controladores/respaldoControlador.php";
        $insAdmin = new respaldoControlador();
        echo $insAdmin->paginador_respaldo_controlador();
    }
    if ($_POST["accion"] == "save") {

        require_once "../controladores/respaldoControlador.php";
        $insAdmin = new respaldoControlador();
        echo $insAdmin->subir_respaldo_controlador();
    }
}
