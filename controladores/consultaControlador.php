<?php
if ($peticionAjax) {
    require_once "../modelos/consultaModelo.php";
} else {
    require_once "./modelos/consultaModelo.php";
}

class consultaControlador extends consultaModelo
{
    //Controlador para agregar administrador



    public function crear_consulta_controlador()
    {
        //Valores de signos vitales
        session_start(['name' => 'SBP']);
        $idpaciente = mainModel::limpiar_cadena($_SESSION['idpaciente']);
        $presion = mainModel::limpiar_cadena($_POST['presion']);
        $frecuencia = mainModel::limpiar_cadena($_POST['frecuencia']);
        $temperatura = mainModel::limpiar_cadena($_POST['temperatura']);
        $peso = mainModel::limpiar_cadena($_POST['peso']);
        $estatura = mainModel::limpiar_cadena($_POST['estatura']);
        $frecuenciares = mainModel::limpiar_cadena($_POST['frecuenciares']);
        //Valores de consultas
        $motivo = mainModel::limpiar_cadena($_POST['motivo']);
        $antecedente = mainModel::limpiar_cadena($_POST['antecedente']);
        $observacion = mainModel::limpiar_cadena($_POST['observacion']);
        $diagnostico = mainModel::limpiar_cadena($_POST['diagnostico']);
        $ordenexamen = mainModel::limpiar_cadena($_POST['ordenexamen']);
        $recomendacion = mainModel::limpiar_cadena($_POST['recomendacion']);
        $fecha = date("Y") . "-" . date("m") . "-" . date("d");
        $hora = date("H:i:s");

        $datosCon = [
            "idpaciente" => $idpaciente,
            "motivo" => $motivo,
            "antecedentes" => $antecedente,
            "observacion" => $observacion,
            "diagnostico" => $diagnostico,
            "ordenexamen" => $ordenexamen,
            "fechahora" => $fecha . " " . $hora,
            "recomendacion" =>$recomendacion
        ];

        $insCon = consultaModelo::crear_consulta_modelo($datosCon);

        if ($insCon["afectados"] == 1) {
            $insConx = consultaModelo::insertar_examenes_clinicos_modelo($insCon["ultima"]);

            $datosCon = [
                "idconsulta" => $insCon["ultima"],
                "presion" => $presion,
                "frecuencia" => $frecuencia,
                "temperatura" => $temperatura,
                "peso" => $peso,
                "estatura" => $estatura,
                "frecuenciares" => $frecuenciares

            ];

            $insCony = consultaModelo::insertar_signos_vitales_modelo($datosCon);
        }



        consultaModelo::capturando_receta_modelo($insCon["ultima"]);



        return $insCon["afectados"];
    }

    public function obtener_medicamentos_controlador()
    {

        $conexion = mainModel::conectar();

        $presentacion = $conexion->query("SELECT tipo FROM `tmedicamento` ");

        //echo '<select   name="state"  data-placeholder="buscar paciente">';
        echo '<select class="chosen-select form-control" style="width: 100%" id="medicamento" onchange="agregar()" style="width: 830px;
        height: 30px;" data-placeholder="Eliga Un Medicamento...">';

        echo '<option selected="" value=""></option>';




        foreach ($presentacion as $roww) {

            echo '<optgroup style="background: #d7cccc;" label="' . $roww["tipo"] . '">';

            $datos = $conexion->query("SELECT * FROM tinventario_medicamento  INNER JOIN tmedicamento ON tinventario_medicamento.idmedicamento = tmedicamento.idmedicamento WHERE tmedicamento.tipo='" . $roww['tipo'] . "' ");



            foreach ($datos as $row) {

                $fecha = str_replace("/", "-", $row['fecha_vencim_medicamento']);
                $fecha = date("d/m/Y", strtotime($fecha));

                echo '<option title="' . $row['cantidad_medicamento'] . ' unidades disponibles / vence : ' . $fecha . ' ubicacion : ' . $row['ubicacion'] . '" value="' . $row['idreferencia_medicamento'] . '">' . $row['nombre_medicamento'] . ' ' . $row['presentacion_medicamento'] . ' ' . $row['concentracion_medicamento'] . $row['unidad'] . '</option>';
            }
            echo '</optgroup>';
        }
        echo '</select>';
    }

    public function paginador_historial_consulta_controlador()
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
        

        /**/
        
        $fechas = consultaModelo::obtener_consultas_modelo($fechaini,$fechafin);



        echo '<div id="accordion" class="accordion-style1 panel-group">';
        if ($fechas->rowCount() == 0) {
            echo '<div style="text-align:center"> <label>NO SE ENCONTRARON CONSULTA </label></div>';
            echo '</div>';
        } else {
            $contador = 1;
            foreach ($fechas as $row) {

                echo '<div class="panel panel-default">

            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed"" data-toggle="collapse"  data-parent="#accordion" href="#collapseOne' . $contador . '">
                    <i class="bigger-110 ace-icon fa fa-angle-down"  data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i>
                        &nbsp;' . $row["fecha_hora_consulta"] . '
                    </a>
                </h4>
            </div>

            <div class="panel-collapse collapse in" id="collapseOne' . $contador . '">
                <div class="panel-body">
                    <div id="timeline-1' . $contador . '">
                        <div>
                            <div class="col-xs-12">

                            <div class="clearfix">

                            <div class="row">
                                <button type="button" onclick="location.href='."'".'http://localhost/SICMEDIC/reportes-pdf/consulta.php?idconsulta='.$row["idconsulta"].''."'".'"  class="pull-right btn btn-success btn-yellow btn-round" style="margin-right: 23px;margin-bottom: 10px" data-dismiss="alert">
                                    <i class="ace-icon fa fa-print bigger-150"></i>
                                </button>
                                <button type="button" class="pull-right btn btn-success btn-primary btn-round" data-toggle="modal" data-target="#modal-modi" style="margin-right: 10px;margin-bottom: 10px" data-dismiss="alert">
                                    <i class="ace-icon fa fa-edit  bigger-150"></i>
                                </button>
                            </div>





                            <div class="col-lg-6">

                                <p class="tab-content">

                                    <strong>
                                        <i class="ace-icon fa fa-heartbeat"></i>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;font-size:15px">
                                                Razon de consulta:<br>
                                            </font>
                                        </font>
                                    </strong>
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">
                                        <textarea style="width:560.3px;height:192.25px" readonly="false">'.$row["razon_consulta"].'</textarea>
                                        </font>
                                    </font>
                                </p>
                                <p class="tab-content" style="height: 252px;">


                                    <strong>
                                        <i class="ace-icon fa fa-check"></i>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">
                                                Mediciones / Signos Vitales <br>
                                            </font>
                                        </font>
                                    </strong>
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">
                                        ';

                                       $insconsulta=mainModel::ejecutar_consulta_simple("SELECT * FROM `tsignosvitales` WHERE tsignosvitales.idconsulta='".$row["idconsulta"]."' ");;
                                       
                                       foreach ($insconsulta as $rowx) {
                                       
                                       
                                       echo'
                                            <br>Presion Arterial:'.$rowx["presion"].'mmg<br><br>Temperatura:'.$rowx["temperatura"].'°c<br><br>Frecuencia Cardiaca:'.$rowx["frecuencia"].'ppm<br><br>Peso:'.$rowx["peso"].' libras <br> <br>estatura:'.$rowx["estatura"].' cms
                                       ';
                                       }
                                       
                                       echo' </font>
                                    </font>
                                </p>

                                <p class="tab-content">
                                    <strong>
                                        <i class="ace-icon fa fa-check"></i>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;font-size:15px">
                                                Antecedentes<br>
                                            </font>
                                        </font>
                                    </strong>
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">
                                            
                                        <textarea style="width:560.3px;height:192.25px" readonly="false">'.$row["antecedentes_consulta"].'</textarea>
                                            

                                        </font>
                                    </font>
                                </p>

                                <p class="tab-content">
                                    <strong>
                                        <i class="ace-icon fa fa-heartbeat"></i>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;font-size:15px">
                                                Diagnostico<br>
                                            </font>
                                        </font>
                                    </strong>
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">
                                        <textarea style="width:560.3px;height:192.25px" readonly="false">'.$row["diagnostico_consutla"].'</textarea>
                                            
                                        </font>
                                    </font>
                                </p>

                               


                            </div>
                            <div class="col-lg-6">

                            <p class="tab-content">
                                    <strong>
                                        <i class="ace-icon fa fa-check"></i>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;font-size:15px">
                                                Observaciones<br>
                                            </font>
                                        </font>
                                    </strong>
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">
                                        <textarea style="width:560.3px;height:192.25px" readonly="false">'.$row["observaciones_consulta"].'</textarea>
                                            

                                        </font>
                                    </font>
                                </p>

                                <p class="tab-content">
                                    <strong>
                                        <i class="ace-icon fa fa-check"></i>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;font-size:15px">
                                                Ordenes de Examen<br>
                                            </font>
                                        </font>
                                    </strong>
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">
                                           <textarea style="width:560.3px;height:192.25px" readonly="false">'.$row["ordenexamen_consulta"].'</textarea>
                                        </font>
                                    </font>
                                </p>


                                <div class="tab-content" style="height: 252px;overflow-y:auto">
                                    <strong>
                                        <i class="ace-icon fa fa-check"></i>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;font-size:15px">
                                                Examenes Realizados<br>
                                                <div class="col-xs-12" >
                                                    <!-- PAGE CONTENT BEGINS -->
                                                    <div>
                                                        <ul class="ace-thumbnails clearfix">
                                                ';  

                                                $insconsultas=mainModel::ejecutar_consulta_simple("SELECT * FROM `texamen` WHERE idconsulta='".$row["idconsulta"]."' ");;
                                                if($insconsultas->rowCount()==0){
                                                    echo "NO HAY ESCANEOS DE EXAMENES";
                                                }else{
                                       foreach ($insconsultas as $rowy) {

                                                echo'

                                                        <li >
                                                        <a href="'.SERVERURL.$rowy["ruta_imagen"].'" target="_blank" data-rel="colorbox" class="cboxElement">
                                                            <img alt="150x150" src="'.SERVERURL.$rowy["ruta_imagen"].'" width="150" height="150">
                                                            <div class="text">
                                                                <div class="inner"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Leyenda de muestra al pasar el mouse</font></font></div>
                                                            </div>
                                                        </a>
                                                    </li>

                                                    ';
                                       }
                                    }
                                                    


                                                    echo '
                                                            
                                                            




                                                        </ul>
                                                    </div><!-- PAGE CONTENT ENDS -->
                                                </div>
                                            </font>
                                        </font>
                                </div>

                                <br>

                                <p class="tab-content"  >
                                    <strong>
                                        <i class="ace-icon fa fa-check"></i>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">
                                                Receta de Medicamentos<br>
                                            </font>
                                        </font>
                                    </strong>

                                    <div style="height: 175px;overflow:auto">

                                    <table id=""  style="width: 100%;" class="table table-striped table-bordered table-hover   dataTable no-footer" role="grid">

                                                                    <thead>
                                                                        <tr role="row" style="background: #ffff">
                                                                            <th style="width: 30%"><strong>Nombre de medicamento</strong></th>
                                                                            <th style="width: 2%"><strong>Cantidad </strong></th>
                                                                            <td style="width: 40%"><strong>Indicaciones</strong></td>
                                                                            
                                                                          
                                                                        </tr>
                                                                    </thead>

                                                                    <tbody>
                                                                    ';

                                                                    $insconsultac=mainModel::ejecutar_consulta_simple("SELECT IF(idmedicamento IS NULL,nombre_medicamento,idmedicamento) as nombre,
                                                                    IF(idmedicamento IS NULL,cantidad_indicada,cantidad_entregada) as cantidad,indicaciones FROM `treceta` WHERE idconsulta='".$row["idconsulta"]."' ");
                                                if($insconsultac->rowCount()==0){
                                                    

                                                    echo '<tr><td colspan="3">Sin Receta</td></tr>';
                                                }else{
                                                    foreach ($insconsultac as $rowz) {

                                                        $insconsultav=mainModel::ejecutar_consulta_simple("SELECT CONCAT(tmedicamento.nombre_medicamento,' ',tmedicamento.concentracion_medicamento,' ',tmedicamento.unidad) AS medicamento FROM `tinventario_medicamento` INNER JOIN tmedicamento ON tinventario_medicamento.idmedicamento = tmedicamento.idmedicamento WHERE tinventario_medicamento.idreferencia_medicamento=".$rowz["nombre"]." ");
                                                        if($insconsultav->rowCount()==0){

                                                            $medicamento=$rowz["nombre"];
                                                        }else{
                                                            foreach ($insconsultav as $rowa) {

                                                            $medicamento=$rowa["medicamento"];
                                                            }
                                                        }
                                                        
                                                        echo '
                                                                    <tr><td>'.$medicamento.'</td><td>'.$rowz["cantidad"].'</td><td colspan="3">'.$rowz["indicaciones"].'</td></tr>
                                                                    ';
                                                                    echo '
                                                                    <tr><td>'.$medicamento.'</td><td>'.$rowz["cantidad"].' </td><td colspan="3">'.$rowz["indicaciones"].'</td></tr>
                                                                    ';
                                                                    
                                                    }
                                                }

                                                                    echo '
                                                                    

                                                                    </tbody>
                                                                </table>
                                                                </div>
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">
                                                 </font>
                                    </font>

                                    
                                </p>












                            </div>




                        </div>
                               


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

    public function actualizar_ultima_Consulta_controlador()
    {
    }
}
