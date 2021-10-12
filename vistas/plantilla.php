<!DOCTYPE html>
<html lang="en">

<?php

require_once "./controladores/vistasControlador.php";

$vt = new vistasControlador();
$vst = $vt->obtener_vista_controlador();
$vct = $vt->obtener_css_controlador();
if ($vct == "login" || $vct == "404") {

    if ($vct == "login") {
        require_once "contenido/css/css-login.php";
    } else {
        require_once "contenido/css/css-404.php";
    }
} else {
    include_once $vct;
}

?>



<body class="no-skin" id="cuerpo">

    <input type="hidden" id="dir" name="dir" value="<?php echo SERVERURL; ?>">

    <?php
    $peticionAjax = false;

    if ($vst == "login" || $vst == "404") {

        if ($vst == "login") {
            require_once "contenido/vista-login.php";
        } else {
            require_once "contenido/vista-404.php";
        }
    } else {
        session_start(['name' => 'SBP']);
        require_once "./controladores/loginControlador.php";
        $inslogin = new loginControlador();

        if (!isset($_SESSION['token_sbp']) || !isset($_SESSION['usuario_sbp'])) {

            $inslogin->forzar_cierre_sesion_controlador();
        }


        ?>

        <!--barra superior de pagina -->

        <?php include 'modulos/barrasuperior.php'; ?>

        <!--Fin barra superior (logo y notificaciones) -->

        <div class="main-container ace-save-state" id="main-container">

            <!--Inicio menu superior de pagina -->


            <?php include 'modulos/menusuperior.php'; ?>

            <!--Fin menu superior de pagina -->


            <!--inicio contenido de la pagina -->

            <div class="main-content">
                <div class="main-content-inner">
                    <?php 
                        require_once $vst;   
                    ?>

                    
                </div>
            </div>



            <!--fin contenido de la pagina -->

            <!--inicio pie de pagina -->

        <?php include 'modulos/piepagina.php';
            include 'contenido/modales/modal-acerca.php';
        } ?>
        <script src="<?php echo SERVERURL; ?>vistas/assets/js/general.js">
        </script>

        <div id="respuesta"></div>

        <!--fin pie de pagina -->

        </div>









</body>

</html>