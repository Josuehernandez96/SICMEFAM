<?php
if ($peticionAjax) {
    require_once "../modelos/bitacoraModelo.php";
} else {
    require_once "./modelos/bitacoraModelo.php";
}


class bitacoraControlador extends bitacoraModelo
{
    public function paginador_bitacora_controlador()
    {



        $fechaini = mainModel::limpiar_cadena(isset($_POST['fechaini']) ? $_POST['fechaini'] : '');
        $fechafin = mainModel::limpiar_cadena(isset($_POST['fechafin']) ? $_POST['fechafin'] : '');

        if ($fechaini == '' && $fechafin == '') {
            $fechaini = date("Y") . date("m") . date("d");
            $fechafin = date("Y") . date("m") . date("d");
        } else {

            $fechaini = str_replace("/", "-", $fechaini);
            $fechaini = date("Y-m-d", strtotime($fechaini));
            $fechaini = str_replace("-", "", $fechaini);
            $fechafin = str_replace("/", "-", $fechafin);
            $fechafin = date("Y-m-d", strtotime($fechafin));
            $fechafin = str_replace("-", "", $fechafin);
        }
        $busqueda = isset($_REQUEST["busqueda"]) ? $_REQUEST["busqueda"] : 'Todo';
        $usuario = isset($_REQUEST["usuario"]) ? $_REQUEST["usuario"] : 'admin';

        /**/
        
        $fechas = bitacoraModelo::obtener_fechas_bitacora_modelo($fechaini, $fechafin,$usuario, $busqueda);



        echo '<div id="accordion" class="accordion-style1 panel-group">';
        if ($fechas->rowCount() == 0) {
            echo '<div style="text-align:center"> <label>NO SE ENCONTRARON ACCIONES ESTE DIA</label></div>';
            echo '</div>';
        } else {
            $contador = 1;
            foreach ($fechas as $row) {

                echo '<div class="panel panel-default">

            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne' . $contador . '">
                    <i class="bigger-110 ace-icon fa fa-angle-down" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i>
                        &nbsp;' . $row["fechas"] . '
                    </a>
                </h4>
            </div>

            <div class="panel-collapse collapse in" id="collapseOne' . $contador . '">
                <div class="panel-body">
                    <div id="timeline-1' . $contador . '">
                        <div>
                            <div class="col-xs-12">
                                <!-- /.timeline-container -->

                                <div class="timeline-container">';

                self::items_controlador($fechaini, $fechafin, $busqueda, $usuario, $row["fechas"]);


                echo '<!-- /.timeline-items -->
                                </div><!-- /.timeline-container -->


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>';
                $contador = $contador + 1;
            }
        }
        echo  '</div>';
    }



    public function items_controlador($fechaini, $fechafin, $busqueda, $usuario, $fecha)
    {
        $conexion = mainModel::conectar();
        if ($busqueda == 'Todo') {
            $datos = $conexion->query("SELECT
                            tbitacora.idbitacora as id,
                            DATE_FORMAT(fecha_hora_accion,'%d/%m/%Y') as fecha,
                            DATE_FORMAT(fecha_hora_accion,'%h:%i:%s %p') as hora,
                            tbitacora.accion_bitacora as accion,
                            tbitacora.modulo_bitacora as modulo,
                            tusuario.nombre as nombre,
                            tbitacora.idusuario as idusuario,
                            tusuario.tipo as tipo
                            FROM
                            tbitacora
                            INNER JOIN tusuario ON tbitacora.idusuario = tusuario.idusuario 
                            WHERE tipo = '" . $usuario . "' AND DATE(fecha_hora_accion)>='" . $fechaini . "' AND DATE(fecha_hora_accion)<='" . $fechafin . "' ORDER BY fecha_hora_accion DESC");
        } else {

            $datos = $conexion->query("SELECT
                            tbitacora.idbitacora as id,
                            DATE_FORMAT(fecha_hora_accion,'%d/%m/%Y') as fecha,
                            DATE_FORMAT(fecha_hora_accion,'%h:%i:%s %p') as hora,
                            tbitacora.accion_bitacora as accion,
                            tbitacora.modulo_bitacora as modulo,
                            tusuario.nombre as nombre,
                            tbitacora.idusuario as idusuario,
                            tusuario.tipo as tipo
                            FROM
                            tbitacora
                            INNER JOIN tusuario ON tbitacora.idusuario = tusuario.idusuario 
                            WHERE tipo = '" . $usuario . "' AND DATE(fecha_hora_accion)>='" . $fechaini . "'
                            AND DATE(fecha_hora_accion)<='" . $fechafin . "'
                            AND modulo_bitacora = '" . $busqueda . "' ORDER BY fecha_hora_accion DESC");
        }


        foreach ($datos as $row2) {

            if ($row2["fecha"] == $fecha) {

                $icono = "";
                if ($row2["modulo"] == "LOGIN") {
                    $icono = "fa fa-key green btn btn-info";
                }
                if ($row2["modulo"] == "RESPALDO") {
                    $icono = "fa fa-save green btn btn-pink";
                }
                if ($row2["modulo"] == "USUARIO") {
                    $icono = "fa fa-user green btn btn-warning";
                }
                if ($row2["modulo"] == "MEDICAMENTO") {
                    $icono = "fa fa-medkit  btn btn-danger";
                }
                if ($row2["modulo"] == "CITA") {
                    $icono = "fa fa-calendar-check-o btn btn-success";
                }
                if ($row2["modulo"] == "PACIENTE") {
                    $icono = "fa fa-users green btn btn-purple";
                }
                if ($row2["modulo"] == "CONSULTA") {
                    $icono = "fa fa-folder-open green btn btn-grey";
                }




                echo '          <div class="timeline-items">
                                <div class="timeline-item clearfix">
                                    <div class="timeline-info">
                                        <i class="timeline-indicator ace-icon ' . $icono . ' no-hover"></i>
                                    </div>

                                    <div class="widget-box transparent">
                                        <div class="widget-header widget-header-small">
                                            <h5 class="widget-title smaller">' . $row2['modulo'] . '</h5>

                                            <span class="widget-toolbar">
                                                <i class="ace-icon fa fa-clock-o bigger-110"></i>
                                                ' . $row2['hora'] . '
                                            </span>
                                        </div>

                                        <div class="widget-body">
                                            <div class="widget-main">
                                                <div class="clearfix">
                                                    <div class="pull-left">
                                                        ' . $row2['nombre'] . ' ' . $row2['accion'] . '.

                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>






                            </div>';
            }
        }
    }
}

	//Controlador para paginar bitacora
