<?php 
$menu1 = "";
$submenu11 = "";
$submenu12 = "";

$menu2 = "";
$submenu4 = "";
$submenu5 = "";
$submenu13 = "";

$menu3 = "";

$menu4 = "";

$menu5 = "";
$submenu1 = "";
$submenu2 = "";
$submenu3 = "";

$menu6 = "";
$submenu6 = "";
$submenu14 = "";

$menu7 = "";
$submenu7 = "";
$submenu8 = "";

$menu8 = "";
$submenu9 = "";
$submenu10 = "";
$submenu11 = "";


if ($_REQUEST["view"] == "citasmedicas") {
    $menu1 = "active";
}
if ($_REQUEST["view"] == "listadocitamedica") {
    $menu1 = "active";
    $submenu11 = "active";
}
if ($_REQUEST["view"] == "reportecitamedica") {
    $menu1 = "active";
    $submenu12 = "active";
}



if ($_REQUEST["view"] == "consultamedica") {
    $menu2 = "active";
}
if ($_REQUEST["view"] == "signosvitales") {
    $menu2 = "active";
    $submenu4 = "active";
}
if ($_REQUEST["view"] == "listadoconsulta") {
    $menu2 = "active";
    $submenu5 = "active";
}
if ($_REQUEST["view"] == "reporteconsultamedica") {
    $menu2 = "active";
    $submenu13 = "active";
}



if ($_REQUEST["view"] == "inicio") {
    $menu4 = "active";
}


if ($_REQUEST["view"] == "paciente") {
    $menu4 = "active";
}
if ($_REQUEST["view"] == "paciente") {
    $menu5 = "active";
    $submenu1 = "active";
}
if ($_REQUEST["view"] == "historialclinico") {
    $menu5 = "active";
    $submenu2 = "active";
}

if ($_REQUEST["view"] == "expediente") {
    $menu5 = "active";
    $submenu3 = "active";
}

if ($_REQUEST["view"] == "personal") {
    $menu6 = "active";
}
if ($_REQUEST["view"] == "personal") {
    $menu6 = "active";
    $submenu6 = "active";
}
if ($_REQUEST["view"] == "reportepersonal") {
    $menu6 = "active";
    $submenu14 = "active";
}



if ($_REQUEST["view"] == "inventario") {
    $menu7 = "active";
}
if ($_REQUEST["view"] == "listadomedicamento") {
    $menu7 = "active";
    $submenu7 = "active";
}
if ($_REQUEST["view"] == "reporteinventario") {
    $menu7 = "active";
    $submenu8 = "active";
}


if ($_REQUEST["view"] == "listadousuario") {
    $menu8 = "active";
}
if ($_REQUEST["view"] == "listadousuario") {
    $menu8 = "active";
    $submenu9 = "active";
}
if ($_REQUEST["view"] == "reporteusuario") {
    $menu8 = "active";
    $submenu10 = "active";
}
if ($_REQUEST["view"] == "bitacora") {
    $menu8 = "active";
    $submenu11 = "active";
}
?>

<script type="text/javascript">
    try {
        ace.settings.loadState('main-container')
    } catch (e) {}
</script>

<div id="sidebar" class="sidebar      h-sidebar                navbar-collapse collapse          ace-save-state">
    <script type="text/javascript">
        try {
            ace.settings.loadState('sidebar')
        } catch (e) {}
    </script>
    <ul class="nav nav-list">



<?php 	if($_SESSION['tipo_sbp']=="admin"){?>
        <li class=" <?php echo $menu4; ?>  hover">
            <a href="#" onclick="location.href='inicio'" class="dropdown-toggle">
                <img src="<?php echo SERVERURL . "vistas/" ?>house.png" style="width: 30px;height: 30px">
                <span class="menu-text">
                    &nbsp&nbsp&nbsp&nbsp &nbspInicio&nbsp&nbsp&nbsp&nbsp&nbsp
                </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
        </li>

        <li class="hover <?php echo $menu5; ?>" >
            <a href="#" onclick="location.href='paciente'" class="dropdown-toggle">
                <img src="<?php echo SERVERURL . "vistas/" ?>cough.png" style="width: 30px;height: 30px">
                <span class="menu-text"> Paciente </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="hover <?php echo $submenu1; ?>">
                    <a href="paciente">
                        <i class="menu-icon fa fa-caret-right"></i> Listado de Pacientes
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="hover <?php echo $submenu2; ?>">
                    <a href="historialclinico">
                        <i class="menu-icon fa fa-caret-right"></i> Historial Clinico
                    </a>

                    <b class="arrow"></b>
                </li>
                <li class="hover <?php echo $submenu3; ?>">
                    <a href="expediente">
                        <i class="menu-icon fa fa-caret-right"></i> Expediente
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>


        <li class="<?php echo $menu1; ?> hover">
            <a href="#" onclick="location.href='citamedica'" class="dropdown-toggle">
                <img src="<?php echo SERVERURL . "vistas/" ?>cita.png" style="width: 30px;height: 30px">
                <span class="menu-text">
                    &nbspCita Medica&nbsp
                </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
          <b class="arrow"></b>

            <ul class="submenu">
                <li class="hover <?php echo $submenu11; ?>">
                    <a href="listadocitamedica">
                        <i class="menu-icon fa fa-caret-right"></i> Listado de Citas
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="hover <?php echo $submenu12; ?>">
                    <a href="reportecitamedica">
                        <i class="menu-icon fa fa-caret-right"></i> Reporte de Citas
                    </a>

                    <b class="arrow"></b>
                </li>
                
            </ul>






        </li>
        <li class="<?php echo $menu2; ?> hover">
            <a href="#" onclick="location.href='consultamedica'" class="dropdown-toggle">
                <img src="<?php echo SERVERURL . "vistas/" ?>consulta.png" style="width: 30px;height: 30px">
                <span class="menu-text">
                    &nbspConsulta Medica&nbsp
                </span>
                 <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="hover <?php echo $submenu4; ?>">
                    <a href="signosvitales">
                        <i class="menu-icon fa fa-caret-right"></i> Signos Vitales
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="hover <?php echo $submenu5; ?>">
                    <a href="listadoconsulta">
                        <i class="menu-icon fa fa-caret-right"></i> Listado de Consultas
                    </a>

                    <b class="arrow"></b>
                </li>
                 <li class="hover <?php echo $submenu13; ?>">
                    <a href="reporteconsultamedica">
                        <i class="menu-icon fa fa-caret-right"></i> Reporte de Consultas 
                    </a>

                    <b class="arrow"></b>
                </li>
                
            </ul>
        </li>

        

        <li class="<?php echo $menu6; ?> hover">
            <a href="#" onclick="location.href='personal'" class="dropdown-toggle">
                <img src="<?php echo SERVERURL . "vistas/" ?>personal.png" style="width: 30px;height: 30px">
                <span class="menu-text">
                    &nbspPersonal&nbsp
                </span>
                 <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="hover <?php echo $submenu6; ?>">
                    <a href="personal">
                        <i class="menu-icon fa fa-caret-right"></i> Listado de Personal
                    </a>

                    <b class="arrow"></b>
                </li>
                <li class="hover <?php echo $submenu14; ?>">
                    <a href="reportes-pdf/reportepersonal.php?idpersonal=.$row["idpersonal]"">
                        <i class="menu-icon fa fa-caret-right"></i> Reporte del Personal
                    </a>

                    <b class="arrow"></b>
                </li>
                
            </ul>
        </li>



        <li class="<?php echo $menu7; ?> hover">
            <a href="#" onclick="location.href='inventario'" class="dropdown-toggle">
                <img src="<?php echo SERVERURL . "vistas/" ?>inventario.png" style="width: 30px;height: 30px">
                <span class="menu-text">
                    &nbspInventario&nbsp
                </span>
                 <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="hover <?php echo $submenu7; ?>">
                    <a href="listadomedicamento">
                        <i class="menu-icon fa fa-caret-right"></i> Listado de Medicamentos
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="hover <?php echo $submenu8; ?>">
                    <a href="reporteinventario">
                        <i class="menu-icon fa fa-caret-right"></i> Reporte Inventario
                    </a>

                    <b class="arrow"></b>
                </li>
                
            </ul>
        </li>

         <li class="<?php echo $menu8; ?> hover">
            <a href="#" onclick="location.href='usuario'" class="dropdown-toggle">
                <img src="<?php echo SERVERURL . "vistas/" ?>seguro.png" style="width: 30px;height: 30px">
                <span class="menu-text">
                    &nbspSeguridad&nbsp
                </span>
                 <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="hover <?php echo $submenu9; ?>">
                    <a href="usuario">
                        <i class="menu-icon fa fa-caret-right"></i> Listado de Usuarios
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="hover <?php echo $submenu10; ?>">
                    <a href="reportes-pdf/reporteusuario.php?idusuario=.$row["idusuario]"">
                        <i class="menu-icon fa fa-caret-right"></i> Reporte de Usuarios
                    </a>
                    
                    <b class="arrow"></b>
                </li>

                <li class="hover <?php echo $submenu11; ?>">
                    <a href="bitacora">
                        <i class="menu-icon fa fa-caret-right"></i> Bitacora
                    </a>

                    <b class="arrow"></b>
                </li>
                
            </ul>
        </li>


        </li>



        

        

<?php } ?>  






    </ul>
    <!-- /.nav-list -->
</div>