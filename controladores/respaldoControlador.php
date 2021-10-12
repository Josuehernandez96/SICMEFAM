<?php
if ($peticionAjax) {
    require_once "../modelos/proveedorModelo.php";
} else {
    require_once "./modelos/proveedorModelo.php";
}
class respaldoControlador extends proveedorModelo
{
    public function subir_respaldo_controlador()
    {


        if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK) {
            // get details of the uploaded file
            $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
            $fileName = $_FILES['uploadedFile']['name'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));
            // check if file has one of the following extensions
            $allowedfileExtensions = array('sql');
            if (in_array($fileExtension, $allowedfileExtensions)) {
                // directory in which the uploaded file will be moved
                $uploadFileDir = '../myphp-backup-files/';
                $dest_path = $uploadFileDir . $fileName;
                if (file_exists($dest_path)) {
                    $alerta = [
                        "Alerta" => "simple",
                        "Titulo" => "ERROR",
                        "Texto" => "Ya existe un respaldo con este nombre",
                        "Tipo" => "error"

                    ];
                } else {
                    if (move_uploaded_file($fileTmpPath, $dest_path)) {
                        $alerta = [
                            "Alerta" => "recargar",
                            "Titulo" => "EXITO",
                            "Texto" => "Archivo Subido Exitosamente",
                            "Tipo" => "success"

                        ];

                        $fechaActual = date("Y-m-d H:i:s");

					

                        $datosBitacora = [
            
                            "fechahora" => $fechaActual,
                            "accion" => "Subio un archivo de respaldo con nombre ".$fileName,
                            "modulo" => "RESPALDO",
                            "idusuario" => $_SESSION['idusuario_sbp']
            
                        ];
            
                        $Abitacora = mainModel::guardar_bitacora($datosBitacora);
            
                    } else {
                        $alerta = [
                            "Alerta" => "simple",
                            "Titulo" => "ERROR",
                            "Texto" => "No fue posible subir el archivo",
                            "Tipo" => "error"

                        ];
                    }
                }
            } else {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "ERROR",
                    "Texto" => "Solo se permiten tipos .sql",
                    "Tipo" => "error"

                ];
            }
        } else {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "ERROR",
                "Texto" => "Ocurrio un error inesperado",
                "Tipo" => "error"

            ];
        }

        return  mainModel::sweet_alert($alerta);
    }

    public function eliminar_respaldo_controlador()
    {
        $archivo = mainModel::limpiar_cadena($_POST['archivo']);
        $respaldo = ("../myphp-backup-files/$archivo");

        if (!unlink($respaldo)) {


            $alerta = [
                "Alerta" => "recargar",
                "Titulo" => "Ocurrio un error inesperado",
                "Texto" => "No se pudo encontrar el archivo",
                "Tipo" => "error"
            ];
        } else {

            $alerta = [
                "Alerta" => "recargar",
                "Titulo" => "Exito",
                "Texto" => "Archivo eliminado",
                "Tipo" => "success"

            ];

            $fechaActual = date("Y-m-d H:i:s");

					

			$datosBitacora = [

				"fechahora" => $fechaActual,
				"accion" => "Elimino archivo de respaldo con nombre ".$archivo,
				"modulo" => "RESPALDO",
				"idusuario" => $_SESSION['idusuario_sbp']

			];

			$Abitacora = mainModel::guardar_bitacora($datosBitacora);

        }

        return  mainModel::sweet_alert($alerta);
    }

    //Controlador para paginar respaldo
    public function paginador_respaldo_controlador()
    {
        echo '<table id="dynamic-table" class="table table-striped table-bordered table-hover">

                                                <thead>
                                                    <tr role="row" style="background: #ffff">
                                                        <th style="width: 70%"><strong>ARCHIVO</strong></th>
                                                        <th style="width: 17%"><strong>CREADO </strong></th>
                                                        <th style="width: 10%"><strong>ACCION</strong></th>

                                                    </tr>
                                                </thead>

                                                <tbody>';


        $directorio = opendir("./myphp-backup-files"); //ruta actual
        while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
        {
            if (is_dir($archivo)) //verificamos si es o no un directorio
            {
                // echo "[".$archivo . "]<br />"; //de ser un directorio lo envolvemos entre corchetes
            } else {

                echo '<tr role="row" class="odd active">


                      <td>
                        <a href="myphp-backup-files/' . $archivo . '" class="info tooltip-info " data-placement="right"><i class="ace-icon fa fa-folder-open-o bigger-140"></i>' . $archivo . '</a>
                      </td>
                      ';
                echo '
                       <td>';
                echo date("d/m/Y h:i:s a", filemtime("./myphp-backup-files" . "/" . $archivo));
                echo '</td>

                <td>
                                                            <div class="hidden-sm hidden-xs action-buttons">




                                                                <a class="green tooltip-info" href="#" data-rel="tooltip" title="restaurar" onclick=restore("' . $archivo . '")>
                                                                    <i class="ace-icon fa fa-undo bigger-180"></i>
                                                                </a>

                                                                <a class="red tooltip-info" href="#" data-rel="tooltip" title="Eliminar " onclick=eliminar("' . $archivo . '")>
                                                                    <i class="ace-icon fa fa-trash bigger-180"></i>
                                                                </a>
                                                            </div>

           
                                                        </td>

                                                    </tr>';
            }
        }

        echo '           </tbody>
                                            </table>
                                            
                                           ';
    }
}
