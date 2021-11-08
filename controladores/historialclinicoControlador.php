<?php
if ($peticionAjax) {
	require_once "../modelos/pacienteModelo.php";
} else {
	require_once "./modelos/pacienteModelo.php";
}

class historialclinicoControlador extends pacienteModelo
{
	//Controlador para agregar administrador
	public function agregar_paciente_controlador()
	{

		$tieneresponsable = mainModel::limpiar_cadena($_POST['tieneresponsable']);
		$nombre = mainModel::limpiar_cadena($_POST['pacnombre']);
		$apellido = mainModel::limpiar_cadena($_POST['pacapellido']);
		$nexpediente = mainModel::generar_expediente_clinico(substr($nombre, 0, 1), substr($apellido, 0, 1));
		$sexo = "";
		$fecha = mainModel::limpiar_cadena($_POST['pacfecha']);
		$fecha = str_replace("/", "-", $fecha);
		$fecha = date("Y-m-d", strtotime($fecha));
		$dui = mainModel::limpiar_cadena($_POST['pacdui']);
		$direccion = mainModel::limpiar_cadena($_POST['pacdireccion']);
		$correo = mainModel::limpiar_cadena($_POST['paccorreo']);
		$telefonop = mainModel::limpiar_cadena($_POST['pactelefonop']);
		$telefonos = mainModel::limpiar_cadena($_POST['pactelefonos']);

		$resnombre = mainModel::limpiar_cadena($_POST['resnombre']);
		$resapellido = mainModel::limpiar_cadena($_POST['resapellido']);
		$resrelacion = mainModel::limpiar_cadena($_POST['resrelacion']);
		$resdui = mainModel::limpiar_cadena($_POST['resdui']);
		$restelefonop = mainModel::limpiar_cadena($_POST['restelefonop']);
		$restelefonos = mainModel::limpiar_cadena($_POST['restelefonos']);
		$edad = intval($_POST["edad"], 10);






		if ($_POST['pacsexo'] == 'F') {
			$sexo = "FEMENINO";
		}

		if ($_POST['pacsexo'] == 'M') {
			$sexo = "MASCULINO";
		}



		$consulta2 = mainModel::ejecutar_consulta_simple("
			SELECT dui_paciente FROM tpaciente WHERE dui_paciente='$dui' AND dui_paciente !=''");
		$ec = $consulta2->rowCount();
		if ($ec >= 1) {

			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Coincidencia de DUI",
				"Texto" => "Por Favor Cambie DUI",
				"Tipo" => "error"

			];
		} else {



			$consulta2 = mainModel::ejecutar_consulta_simple("SELECT correo_paciente FROM tpaciente WHERE tpaciente.correo_paciente='$correo' AND correo_paciente!=''");
			$ec = $consulta2->rowCount();
			if ($ec >= 1) {

				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Coincidencia de Correo",
					"Texto" => "Por Favor Cambie Correo",
					"Tipo" => "error"

				];
			} else {


				$dataAD = [
					"n_expediente" => $nexpediente,
					"nombre" => $nombre,
					"apellido" => $apellido,
					"sexo" => $sexo,
					"fecha" => $fecha,
					"dui" => $dui,
					"direccion" => $direccion,
					"correo" => $correo,
					"telefonop" => $telefonop,
					"telefonos" => $telefonos
				];

				$guardarPaciente = pacienteModelo::agregar_paciente_modelo($dataAD);

				if ($guardarPaciente->rowCount() >= 1) {

					if ($tieneresponsable == 1) {


						$id = mainModel::obtener_identificador_clinico($nexpediente);

						$dataRES = [
							"idpaciente" => $id,
							"resnombre" => $resnombre,
							"resapellido" => $resapellido,
							"resrelacion" => $resrelacion,
							"resdui" => $resdui,
							"restelefonop" => $restelefonop,
							"restelefonos" => $restelefonos
						];



						$guardarResponsable = pacienteModelo::agregar_responsable_modelo($dataRES);

						if ($guardarResponsable->rowCount() >= 1) {

							$alerta = [
								"Alerta" => "limpiar",
								"Titulo" => "Paciente Registrado ",
								"Texto" => "",
								"Tipo" => "success",
								"form" => "formpac",
								"modal" => "modal-rgpaciente"
							];

							session_start(['name' => 'SBP']);


							$fechaActual = date("Y-m-d H:i:s");



							$datosBitacora = [

								"fechahora" => $fechaActual,
								"accion" => "Registro paciente con Expediente " . $nexpediente,
								"modulo" => "PACIENTE",
								"idusuario" => $_SESSION['idusuario_sbp']

							];
							$insertarBitacora = mainModel::guardar_bitacora($datosBitacora);
						} else {


							$alerta = [
								"Alerta" => "simple",
								"Titulo" => "Ocurrio un Error Inesperado",
								"Texto" => "",
								"Tipo" => "error"

							];
						}
					} else {
						$alerta = [
							"Alerta" => "limpiar",
							"Titulo" => "Paciente Registrado",
							"Texto" => "",
							"Tipo" => "success",
							"form" => "formpac",
							"modal" => "modal-rgpaciente"
						];
					}
				} else {

					$alerta = [
						"Alerta" => "simple",
						"Titulo" => "Ocurrio un Error Inesperado",
						"Texto" => "No hemos podido registrar el Paciente",
						"Tipo" => "error"

					];
				}
			}
		}










		return  mainModel::sweet_alert($alerta);
	}


	public function obtener_paciente_controlador()
	{


		$paciente = pacienteModelo::obtener_paciente_modelo($_POST["idpaciente"]);
		$responsable = pacienteModelo::obtener_responsable_modelo($_POST["idpaciente"]);
		$std = new stdClass();
		foreach ($paciente as $row) {

			$std->pacnombre = $row['nombre_paciente'];
			$std->pacapellido = $row['apellido_paciente'];
			$std->pacsexo = $row['sexo_paciente'];
			$std->pacfecha = $row['fecha_nacimiento'];
			$std->pacdui = $row['dui_paciente'];
			$std->pactelefonop = $row['telefonop_paciente'];
			$std->pactelefonos = $row['telefonos_paciente'];
			$std->paccorreo = $row['correo_paciente'];
			$std->pacdireccion = $row['direccion_paciente'];
			$std->expediente = $row['n_expediente'];
		}
		foreach ($responsable as $row) {

			if ($responsable->rowCount() == 0) {
				$std->resnombre = null;
				$std->resapellido = null;
				$std->resrelacion = null;
				$std->resdui = null;
				$std->restelefonop = null;
				$std->restelefonos = null;
			} else {

				$std->resnombre = $row['nombre_responsable'];
				$std->resapellido = $row['apellido_responsable'];
				$std->resrelacion = $row['relacion_responsable'];
				$std->resdui = $row['dui_responsable'];
				$std->restelefonop = $row['telefonoP_responsable'];
				$std->restelefonos = $row['telefonoS_responsable'];
			}
		}

		$json = json_encode($std);




		return $json;
	}


	public function cambiar_estado_paciente_controlador()
	{


		$idpaciente = mainModel::limpiar_cadena($_POST['idpaciente']);
		$estado = mainModel::limpiar_cadena($_POST['estado']);

		$dataAD = [
			"idpaciente" => $idpaciente,
			"estado" => $estado
		];

		$guardarEstado = pacienteModelo::cambiar_estado_paciente_modelo($dataAD);

		if ($estado == 0) {

			$textoerror = "No Se dio baja al paciente";
		}
		if ($estado == 1) {

			$textoerror = "No Se dio alta al paciente";
		}

		if ($guardarEstado->rowCount() >= 1) {


			$consulta = mainModel::ejecutar_consulta_simple("SELECT CONCAT(nombre_paciente,' ',apellido_paciente) as nombre FROM tpaciente WHERE idpaciente='$idpaciente'");
			foreach ($consulta as $row) {
				$nombrep = $row['nombre'];
			}
			$textoestado = "";
			$textoerror = "";

			if ($estado == 0) {
				$textoestado = "Se dio baja al paciente";
				$textoerror = "No Se dio baja al paciente";

				session_start(['name' => 'SBP']);


				$fechaActual = date("Y-m-d H:i:s");

					

				$datosBitacora = [

					"fechahora" => $fechaActual,
					"accion" => "Da de baja  al paciente  ".$nombrep,
					"modulo" => "PACIENTE",
					"idusuario" => $_SESSION['idusuario_sbp']

				];

				$Abitacora = mainModel::guardar_bitacora($datosBitacora);

			}
			if ($estado == 1) {
				$textoestado = "Se dio alta al paciente";
				$textoerror = "No Se dio alta al paciente";

				session_start(['name' => 'SBP']);


				$fechaActual = date("Y-m-d H:i:s");

					

				$datosBitacora = [

					"fechahora" => $fechaActual,
					"accion" => "Dio de alta al paciente con nombre ".$nombrep,
					"modulo" => "PACIENTE",
					"idusuario" => $_SESSION['idusuario_sbp']

				];

				$Abitacora = mainModel::guardar_bitacora($datosBitacora);

			}

			$alerta = [
				"Alerta" => "limpiar",
				"Titulo" => $textoestado,
				"Texto" => $nombrep,
				"Tipo" => "success",
				"form" => "formpac"
			];
		} else {

			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrio un Error Inesperado",
				"Texto" => $textoerror,
				"Tipo" => "error"

			];
		}
		return  mainModel::sweet_alert($alerta);
	}



	public function modificar_paciente_controlador()
	{
		$tieneresponsable = mainModel::limpiar_cadena($_POST['tieneresponsable']);
		$nombre = mainModel::limpiar_cadena($_POST['pacnombre']);
		$apellido = mainModel::limpiar_cadena($_POST['pacapellido']);
		$nexpediente = mainModel::limpiar_cadena($_POST['expediente']);
		$sexo = "";
		$fecha = mainModel::limpiar_cadena($_POST['pacfecha']);
		$fecha = str_replace("/", "-", $fecha);
		$fecha = date("Y-m-d", strtotime($fecha));
		$dui = mainModel::limpiar_cadena($_POST['pacdui']);
		$direccion = mainModel::limpiar_cadena($_POST['pacdireccion']);
		$correo = mainModel::limpiar_cadena($_POST['paccorreo']);
		$telefonop = mainModel::limpiar_cadena($_POST['pactelefonop']);
		$telefonos = mainModel::limpiar_cadena($_POST['pactelefonos']);
		$idpaciente = mainModel::limpiar_cadena($_POST['idpaciente']);
		$resnombre = mainModel::limpiar_cadena($_POST['resnombre']);
		$resapellido = mainModel::limpiar_cadena($_POST['resapellido']);
		$resrelacion = mainModel::limpiar_cadena($_POST['resrelacion']);
		$resdui = mainModel::limpiar_cadena($_POST['resdui']);
		$restelefonop = mainModel::limpiar_cadena($_POST['restelefonop']);
		$restelefonos = mainModel::limpiar_cadena($_POST['restelefonos']);

		if ($_POST['pacsexo'] == 'F') {
			$sexo = "FEMENINO";
		}

		if ($_POST['pacsexo'] == 'M') {
			$sexo = "MASCULINO";
		}

		$consulta2 = mainModel::ejecutar_consulta_simple("
			SELECT dui_paciente FROM tpaciente WHERE dui_paciente='$dui' AND idpaciente!='$idpaciente' AND dui_paciente !=''");
		$ec = $consulta2->rowCount();
		if ($ec >= 1) {

			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Coincidencia de DUI",
				"Texto" => "Por Favor Cambie DUI",
				"Tipo" => "error"

			];
		} else {



			$consulta2 = mainModel::ejecutar_consulta_simple("SELECT correo_paciente FROM tpaciente WHERE tpaciente.correo_paciente='$correo' AND idpaciente!='$idpaciente' AND correo_paciente!=''");
			$ec = $consulta2->rowCount();
			if ($ec >= 1) {

				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Coincidencia de Correo",
					"Texto" => "Por Favor Cambie Correo Electronico ",
					"Tipo" => "error"

				];
			} else {


				$dataAD = [
					"idpaciente" => $idpaciente,
					"nombre" => $nombre,
					"apellido" => $apellido,
					"sexo" => $sexo,
					"fecha" => $fecha,
					"dui" => $dui,
					"direccion" => $direccion,
					"correo" => $correo,
					"telefonop" => $telefonop,
					"telefonos" => $telefonos
				];

				$modificarPaciente = pacienteModelo::modificar_paciente_modelo($dataAD);

				$dataRES = [
					"idpaciente" => $idpaciente,
					"resnombre" => $resnombre,
					"resapellido" => $resapellido,
					"resrelacion" => $resrelacion,
					"resdui" => $resdui,
					"restelefonop" => $restelefonop,
					"restelefonos" => $restelefonos
				];


				$guardarResponsable = pacienteModelo::modificar_responsable_modelo($dataRES);



				$alerta = [
					"Alerta" => "limpiar",
					"Titulo" => "Paciente Modificado ",
					"Texto" => "",
					"Tipo" => "success",
					"form" => "formpac",
					"modal" => "modal-rgpaciente"
				];

				session_start(['name' => 'SBP']);


				$fechaActual = date("Y-m-d H:i:s");

				



				$datosBitacora = [

					"fechahora" => $fechaActual,
					"accion" => "Modifico datos al paciente " . $nombre." ".$apellido,
					"modulo" => "PACIENTE",
					"idusuario" => $_SESSION['idusuario_sbp']

				];

				$Abitacora = mainModel::guardar_bitacora($datosBitacora);
			}
		}



		return  mainModel::sweet_alert($alerta);
	}



	public function datos_paciente_controlador()
	{
		$accion = "";

		$idpaciente = isset($_REQUEST["idpaciente"]) ? $_REQUEST["idpaciente"] : '';

		$conexion = mainModel::conectar();

		$datos = $conexion->query("SELECT * FROM tpaciente WHERE idpaciente='$idpaciente'");

		session_start(['name' => 'SBP']);

		if ($datos->rowCount() == 1) {
			foreach ($datos as $row) {

				$_SESSION['idpaciente'] = $row['idpaciente'];
				$_SESSION['expediente'] = $row['n_expediente'];
				$_SESSION['nombrecmp'] = $row['nombre_paciente'] . ' ' . $row['apellido_paciente'];
			}
			$accion = '<script> location.href="' . SERVERURL . 'consulta' . '"</script>';
		} else {

			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrio un Error Inesperado",
				"Texto" => "No se puede iniciar consulta",
				"Tipo" => "error"
			];
			$accion = mainModel::sweet_alert($alerta);
		}
		return $accion;
	}





	//Controlador para paginar administrador
	public function paginador_administrador_controlador()
	{

		$busqueda = isset($_REQUEST["busqueda"]) ? $_REQUEST["busqueda"] : '';

		$estado = isset($_REQUEST["estado"]) ? $_REQUEST["estado"] : '1';

		$porpagina = isset($_REQUEST["porpagina"]) ? $_REQUEST["porpagina"] : 10;

		$pagina = isset($_REQUEST["pagina"]) ? $_REQUEST["pagina"] : 1;

		if ($busqueda == '') {

			$consulta = mainModel::ejecutar_consulta_simple("SELECT * FROM tpaciente WHERE tpaciente.estado=" . $estado . "  ");
		} else {

			$consulta = mainModel::ejecutar_consulta_simple("SELECT * FROM tpaciente WHERE CONCAT(nombre_paciente,'',apellido_paciente) LIKE '%" . $busqueda . "%' AND  tpaciente.estado=" . $estado . " OR tpaciente.n_expediente LIKE '%" . $busqueda . "%' AND tpaciente.estado=" . $estado . " ");
		}


		$totalregistros = $consulta->rowCount();
		$totalpaginas = ceil($totalregistros / $porpagina);
		$desde = ($pagina - 1) * $porpagina;


		$conexion = mainModel::conectar();


		if ($busqueda == '') {

			$datos = $conexion->query("SELECT  TIMESTAMPDIFF(YEAR,fecha_nacimiento,CURDATE()) AS edad 
				,idpaciente,CONCAT(nombre_paciente,' ',apellido_paciente)
				 as nombre, n_expediente,estado FROM tpaciente WHERE tpaciente.estado=" . $estado . " ORDER BY tpaciente.idpaciente DESC  LIMIT " . $desde . "," . $porpagina . "");
		} else {

			$datos = $conexion->query("SELECT  TIMESTAMPDIFF(YEAR,fecha_nacimiento,CURDATE()) AS edad 
				,idpaciente,CONCAT(nombre_paciente,' ',apellido_paciente)
				 as nombre, n_expediente,estado FROM tpaciente  WHERE CONCAT(nombre_paciente,' ',apellido_paciente) LIKE '%" . $busqueda . "%' AND  tpaciente.estado=" . $estado . " OR tpaciente.n_expediente LIKE '%" . $busqueda . "%'  AND  tpaciente.estado=" . $estado . "
				 ORDER BY  tpaciente.idpaciente DESC  LIMIT " . $desde . "," . $porpagina . "");
		}


		echo '<table id=dynamic-table
						class="table table-striped table-bordered table-hover" 
							dataTable no-footer" role="grid">';

		echo '<thead>
					<tr role="row" style="background: #ffff">
					<th style="width: 30%"><strong>NOMBRE</strong></th>
					<td style="width: 1%"><strong>EDAD</strong></td>
					<th style="width: 5%"><strong>ACCIÓN</strong></th>
			</tr>
				</thead>
				  
				<tbody>';
		if ($datos->rowCount() == 0) {
			echo '<tr><td colspan="4" style="text-align:center">No se encontraron registros de pacientes</td></tr>';
			echo '</tr></tbody></table>';
		} else {

			foreach ($datos as $row) {

				echo  '<tr role="row" class="odd active">';
				

				echo '<td>' . $row['nombre'] . '</td>
							  <td style="text-align:center">' . $row['edad'] . '</td>
							  
					  ';

				echo '<td>
					  <div
					  class="hidden-sm hidden-xs action-buttons"> 
					  ';

				echo '<a class="info tooltip-info"
					  data-rel="tooltip" title="Mas Datos" onclick="location.href='."'".SERVERURL.'reportes-pdf/reportepaciente.php?idpaciente='.$row["idpaciente"].''."'".'" >
					  <i
						  class="ace-icon fa fa-list bigger-180"></i>
							  </a>';




				if ($row['estado'] == 0) {



					echo "<a class='green tooltip-info' href='#'
						data-rel='tooltip' title='Dar Alta' onclick=cambiarestado(" . $row['idpaciente'] . ",1)>
						<i
							class='ace-icon fa fa-arrow-up bigger-180'></i>
					</a>";
				}
				if ($row['estado'] == 1) {

					/*echo '<a class="info tooltip-info" style="cursor:pointer"  onclick="irconsulta(' . $row['idpaciente'] . ')"
					data-rel="tooltip" title="Ir a Consulta"
					>
					<i
						class="ace-icon fa fa-folder-open-o bigger-180"></i>
					</a>';*/


					/*echo '<a class="green tooltip-info" href="#" onclick=ExtraerDatosMod(' . $row['idpaciente'] . ')
					data-rel="tooltip"
					title="Modificar"  data-backdrop="static" data-keyboard="false" data-toggle="modal"
					data-target="#modal-rgpaciente">
					<i
						class="ace-icon fa fa-pencil bigger-180"></i>
				</a>';*/

					/*echo "<a class='red tooltip-info' href='#'
						data-rel='tooltip' title='Dar Baja' onclick=cambiarestado(" . $row['idpaciente'] . ",0)>
						<i
							class='ace-icon fa fa-arrow-down bigger-180'></i>
					</a>";*/
				}

				echo ' </div></td>';
			}

			echo '</tr></tbody></table>';

			echo '<div class="row tab-content" >
			<div class="col-xs-6">
				';

			if ($totalregistros < $porpagina) {
				echo '<div class="dataTables_info" id="dynamic-table_info" role="status" aria-live="polite">
					Mostrando 1 a ' . $totalregistros . ' de ' . $totalregistros . ' registros
				</div>';
			} else {
				echo '<div class="dataTables_info" id="dynamic-table_info" role="status" aria-live="polite">
					Mostrando 1 a ' . $porpagina . ' de ' . $totalregistros . ' registros
				</div>';
			}

			echo '</div>';

			echo '
			<div class="col-xs-6">
            <div class="dataTables_paginate paging_simple_numbers" id="dynamic-table_paginate">
			<ul class="pagination">';

			if ($pagina != 1)
				echo '<li class="paginate_button previous " onclick="paginador(' . ($pagina - 1) . ')" aria-controls="dynamic-table" tabindex="0" id="dynamic-table_previous">
            <a href="#">Previos</a>
			</li>';

			for ($i = 1; $i <= $totalpaginas; $i++) {
				if ($i == $pagina) {
					echo '<li class="paginate_button active disabled" onclick="paginador(' . $i . ')" aria-controls="dynamic-table" tabindex="0"><a href="#">' . $i . '</a>
				</li>';
				} else {
					echo '<li class="paginate_button " style="cursor:pointer" onclick="paginador(' . $i . ')" aria-controls="dynamic-table" tabindex="0"><a href="#">' . $i . '</a>
				</li>';
				}
			}


			if ($pagina != $totalpaginas) {
				echo '<li class="paginate_button next" onclick="paginador(' . ($pagina + 1) . ')" aria-controls="dynamic-table" tabindex="0" 
			id="dynamic-table_next"><a>Siguiente</a>
			</li>';
			}

			echo '</ul>
            </div>
            </div>
		</div>';
		}
	}
}
