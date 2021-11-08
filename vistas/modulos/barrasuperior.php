<?php if ($_SESSION['tipo_sbp'] == "secret" && $_REQUEST["view"] == "paciente" ) {
    return header("Location: " . SERVERURL . "inicio");
}
if ($_SESSION['tipo_sbp'] == "secret" && $_REQUEST["view"] == "consulta" ) {
    return header("Location: " . SERVERURL . "inicio");
}
if ($_SESSION['tipo_sbp'] == "secret" && $_REQUEST["view"] == "medicamento" ) {
    return header("Location: " . SERVERURL . "inicio");
}
if ($_SESSION['tipo_sbp'] == "secret" && $_REQUEST["view"] == "usuario" ) {
    return header("Location: " . SERVERURL . "inicio");
}


?>


<div id="navbar" class="navbar navbar-default    navbar-collapse       h-navbar ace-save-state" style="background-color: #0494AD">
    <div class="navbar-container ace-save-state" id="navbar-container">

        <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
            <span class="sr-only">Toggle sidebar</span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>
        </button>

        <div class="navbar-header pull-left">
            <a href="index.html" class="navbar-brand" >
                <small>
                    <img src="<?php echo SERVERURL; ?>vistas/cmfam.png" style="width: 50px;height: 35px;">
                    SICMEFAM
                </small>
            </a>

        </div>

        <div class="navbar-buttons navbar-header pull-right  collapse navbar-collapse" role="navigation">
            <ul class="nav ace-nav">

                <!--Notificacione de Medicamentos -->

                <!--Notificacione de citas -->

                

                <!--opciones de usuario-->

                <li class="light-blue dropdown-modal user-min">
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                        <img class="nav-user-photo" src="<?php echo SERVERURL; ?>vistas/assets/images/avatars/avatar6.png" alt="Jason's Photo" />
                        <span class="user-info">
                            <small>Usuario : <?php echo $_SESSION['usuario_sbp'] ?></small>

                        </span>

                        <i class="ace-icon fa fa-caret-down"></i>
                    </a>

                    <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-green dropdown-caret dropdown-close">





                        <li>
                            <a onclick="cerrarsesion('<?php echo $inslogin->encryption($_SESSION['token_sbp']); ?>')">
                                <i class="ace-icon fa fa-power-off"></i> Cerrar Sesion
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

        <nav role="navigation" class="navbar-menu pull-left collapse navbar-collapse">

        </nav>
        <input type="hidden" name="token" value="<?php echo $_SESSION['token_sbp'];?>">
    </div>

</div>