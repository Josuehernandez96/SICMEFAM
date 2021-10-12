<?php
$peticionAjax = true;
require_once "../core/configGeneral.php";

if (isset($_POST["accion"])) {

    if ($_POST["accion"] == "save") {
        require_once "../controladores/medicamentoControlador.php";

        $insmedicamento = new medicamentoControlador();
        echo $insmedicamento->agregar_medicamento_controlador();
    }
    if ($_POST["accion"] == "agregarinv") {
        require_once "../controladores/medicamentoControlador.php";

        $insmedicamento = new medicamentoControlador();
        echo $insmedicamento->agregar_nuevoinventario_controlador();
    }
    if ($_POST["accion"] == "eliminar") {

        require_once "../controladores/medicamentoControlador.php";
        $insAdmin = new medicamentoControlador();
        echo $insAdmin->eliminar_inventariomed_controlador();
    }
    if ($_POST["accion"] == "eliminarmed") {

        require_once "../controladores/medicamentoControlador.php";
        $insAdmin = new medicamentoControlador();
        echo $insAdmin->eliminar_medicamento_controlador();
    }
    if ($_POST["accion"] == "actualizar") {

        require_once "../controladores/medicamentoControlador.php";
        $insAdmin = new medicamentoControlador();
        echo $insAdmin->paginador_medicamentos_controlador();
    }
    if ($_POST["accion"] == "obtenerdatosinventario") {

        require_once "../controladores/medicamentoControlador.php";
        $insAdmin = new medicamentoControlador();

        echo $insAdmin->obtener_inventario_controlador();
    }
    if ($_POST["accion"] == "obtenerdatosmedicamento") {

        require_once "../controladores/medicamentoControlador.php";
        $insAdmin = new medicamentoControlador();
        echo $insAdmin->obtener_medicamento_controlador();
    }

    if ($_POST["accion"] == "modificar") {
        require_once "../controladores/medicamentoControlador.php";

        $insAdmin = new medicamentoControlador();
        echo $insAdmin->modificar_medicamento_controlador();
    }


    if ($_POST["accion"] == "modificarinv") {
        require_once "../controladores/medicamentoControlador.php";

        $insAdmin = new medicamentoControlador();
        echo $insAdmin->modificar_inventario_controlador();
    }

    if ($_POST["accion"] == "alltabla") {

        require_once "../controladores/medicamentoControlador.php";
        $insAdmin = new medicamentoControlador();
        echo $insAdmin->paginador_medicamentos_controlador();
    }

    if ($_POST["accion"] == "paginado") {

        require_once "../controladores/medicamentoControlador.php";
        $insAdmin = new medicamentoControlador();
        echo $insAdmin->paginador_medicamentos_controlador();
    }
    if ($_POST["accion"] == "proveedoresnuevo") {

        require_once "../controladores/medicamentoControlador.php";
        $insAdmin = new medicamentoControlador();
        echo $insAdmin->selector_proveedor_controlador();
    }
    if ($_POST["accion"] == "proveedores") {

        require_once "../controladores/medicamentoControlador.php";
        $insAdmin = new medicamentoControlador();
        echo $insAdmin->selector_proveedor_controladorinv();
    }
}