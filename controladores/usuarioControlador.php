<?php
if ($peticionAjax) {
	require_once "../modelos/usuarioModelo.php";
} else {
	require_once "./modelos/usuarioModelo.php";
}

class usuarioControlador extends usuarioModelo
{

	//Controlador para agregar administrador
	public function eliminar_cuenta_controlador()
	{


		$idusuario = mainModel::limpiar_cadena($_POST['idusuario']);

		$dataAD = [
			"idusuario" => $idusuario
		];

		$guardarEstado = usuarioModelo::eliminar_cuenta_modelo($dataAD);

		if ($guardarEstado->rowCount() >= 1) {


			$consulta = mainModel::ejecutar_consulta_simple("SELECT nombre FROM tusuario WHERE idusuario='$idusuario'");
			foreach ($consulta as $row) {
				$nombreu = $row['nombre'];
			}
			$textoestado = "Se dio de baja al usuario";
			$textoerror = "No de pudo dar de baja";


			$alerta = [
				"Alerta" => "limpiar",
				"Titulo" => $textoestado,
				"Texto" => $nombreu,
				"Tipo" => "success",
				"form" => "formusu"
			];

			$fechaActual = date("Y-m-d H:i:s");

					

			$datosBitacora = [

				"fechahora" => $fechaActual,
				"accion" => "Elimino al usuario ".$nombreu,
				"modulo" => "USUARIO",
				"idusuario" => $_SESSION['idusuario_sbp']

			];

			$Abitacora = mainModel::guardar_bitacora($datosBitacora);

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
	//Controlador para agregar administrador
	public function agregar_usuario_controlador()
	{




		$nombrep = mainModel::limpiar_cadena($_POST['nombrep']);
		$nombre = mainModel::limpiar_cadena($_POST['nombre']);
		$correo = mainModel::limpiar_cadena($_POST['correo']);
		$clav = mainModel::limpiar_cadena($_POST['clave']);
		$clave = mainModel::encryption($clav);
		$rol = mainModel::limpiar_cadena($_POST['rol']);

		$dataRES = [
			"nombrep" => $nombrep,

			"nombre" => $nombre,
			"clave" => $clave,
			"correo" => $correo,
			"rol" => $rol
		];

		$consulta2 = mainModel::ejecutar_consulta_simple("
			SELECT nombre FROM tusuario WHERE nombre='$nombre' AND estado=1");
		$ec = $consulta2->rowCount();
		if ($ec >= 1) {

			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Usuario ya existe",
				"Texto" => "Cambie el nombre de usuario",
				"Tipo" => "error"

			];
		} else {

			$consulta3 = mainModel::ejecutar_consulta_simple("
			SELECT correo FROM tusuario WHERE correo='$correo'AND estado=1");
			$ec = $consulta3->rowCount();
			if ($ec >= 1) {

				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Correo ya existe",
					"Texto" => "Cambie el correo",
					"Tipo" => "error"

				];
			} else {
				$guardarUsuario = usuarioModelo::agregar_usuario_modelo($dataRES);


				if ($guardarUsuario->rowCount() == 1) {

					$alerta = [
						"Alerta" => "limpiarusuario",
						"Titulo" => "Usuario Registrado con exito ",
						"Texto" => "",
						"Tipo" => "success",
						"form" => "formusu",
						"modal" => "modal-rgusuario"
					];

					$fechaActual = date("Y-m-d H:i:s");

					

					$datosBitacora = [

						"fechahora" => $fechaActual,
						"accion" => "Registro al usuario ".$nombre,
						"modulo" => "USUARIO",
						"idusuario" => $_SESSION['idusuario_sbp']

					];

					$Abitacora = mainModel::guardar_bitacora($datosBitacora);

				} else {

					$alerta = [
						"Alerta" => "simple",
						"Titulo" => "Ocurrio un error",
						"Texto" => "No se ha podido registrar al usuario",
						"Tipo" => "error"

					];
				}
			}
		}



		return  mainModel::sweet_alert($alerta);
	}

	public function obtener_usuario_controlador()
	{


		$usuario = usuarioModelo::obtener_usuario_modelo($_POST["idusuario"]);
		$std = new stdClass();
		foreach ($usuario as $row) {
			$clave = mainModel::decryption($row['contrasena']);
			$std->nombrep = $row['nombrep'];
			$std->nombreusuario = $row['nombre'];
			$std->clave1 = $clave;
			$std->correousuario = $row['correo'];
			$std->tipo = $row['tipo'];
		}

		$json = json_encode($std);




		return $json;
	}

	public function modificar_usuario_controlador()
	{
		$idusuario = mainModel::limpiar_cadena($_POST['idusuario']);

		$nombrep = mainModel::limpiar_cadena($_POST['nombrep']);
		$nombre = mainModel::limpiar_cadena($_POST['nombreusuario']);
		$clave1 = mainModel::limpiar_cadena($_POST['clave1']);
		$eschequeado = mainModel::limpiar_cadena($_POST['eschequeado']);

		$clave1 = mainModel::encryption($clave1);
		$correo = mainModel::limpiar_cadena($_POST['correousuario']);



		$consulta2 = mainModel::ejecutar_consulta_simple("
			SELECT * FROM tusuario WHERE tusuario.nombre='$nombre' AND tusuario.idusuario!='$idusuario' AND estado=1");
		$ec = $consulta2->rowCount();

		if ($ec >= 1) {

			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Usuario ya existente",
				"Texto" => "El usuario ya esta asociado a otra cuenta",
				"Tipo" => "error"

			];
		} else {

			$consulta3 = mainModel::ejecutar_consulta_simple("SELECT * FROM tusuario WHERE tusuario.correo='$correo' AND idusuario!='$idusuario' AND estado=1");
			$ec = $consulta3->rowCount();
			if ($ec >= 1) {

				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Correo existente",
					"Texto" => "El correo ingresado ya pertenece a un usuario",
					"Tipo" => "error"
				];
			} else {


				$dataAD = [
					"idusuario" => $idusuario,
					"nombrep" => $nombrep,
					"nombre" => $nombre,
					"clave" => $clave1,
					"es" => $eschequeado,

					"correo" => $correo

				];

				$modificarUsuario = usuarioModelo::modificar_usuario_modelo($dataAD);

				if ($modificarUsuario->rowCount() >= 1) {

					$alerta = [
						"Alerta" => "limpiarusuario",
						"Titulo" => "Usuario Modificado con exito",
						"Texto" => "",
						"Tipo" => "success",
						"form" => "formusu",
						"modal" => "modal-rgusuario"
					];

					$fechaActual = date("Y-m-d H:i:s");

					

					$datosBitacora = [

						"fechahora" => $fechaActual,
						"accion" => "Modifico datos del usuario ".$nombre,
						"modulo" => "USUARIO",
						"idusuario" => $_SESSION['idusuario_sbp']

					];

					$Abitacora = mainModel::guardar_bitacora($datosBitacora);


					if ($_SESSION['idusuario_sbp'] == $dataAD['idusuario']) {
						$_SESSION['usuario_sbp'] = $dataAD['nombre'];
						$_SESSION['nombre_sbp'] = $dataAD['nombrep'];
					}
				} else {

					$alerta = [
						"Alerta" => "simple",
						"Titulo" => "Sin cambios",
						"Texto" => "",
						"Tipo" => "error"

					];
				}
			}
		}


		return  mainModel::sweet_alert($alerta);
	}



	//Controlador para paginar administrador
	public function acordeon_admin_controlador()
	{
		$conexion = mainModel::conectar();

		$datos = $conexion->query("SELECT * FROM tusuario WHERE estado=1 AND tipo='admin'");

		foreach ($datos as $row) {
			$fecha = $row['fechacreacion'];
			$fecha = date("d/m/Y", strtotime($fecha));


			echo ' <div class="panel-body">
		<div class="col-xs-12">

			<!-- div.table-responsive -->

			<!-- div.dataTables_borderWrap -->
			<div>
				<div id="dynamic-table_wrapper" style="background:#ffff" class="dataTables_wrapper form-inline no-footer">

					<!--inicio Filtros de Tabla-->


					<div class="clearfix" style="padding: 10px">

						<div class="pull-right">
							<span class="green middle bolder">Opciones: &nbsp;</span>

							<div class="btn-toolbar inline middle no-margin">
								<div data-toggle="buttons" class="btn-group no-margin">



									<button class="btn btn-success btn-white btn-round btn-lg tooltip-info " onclick="ExtraerDatosMod(' . $row['idusuario'] . ')" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#modal-rgusuario" data-rel="tooltip" title="Modificar"><i class="fa fa-edit"></i></button>';
									

			if ($_SESSION['idusuario_sbp'] != $row['idusuario']) {

				echo '<button class="btn btn-danger btn-white btn-round btn-lg tooltip-info" data-rel="tooltip" onclick= "eliminar(' . $row['idusuario'] . ')" title="Eliminar"><i class="fa fa-trash"></i></button>
									';
			}
			echo '</div>
							</div>
						</div>

					</div>

					<div>
						<div id="user-profile-1" class="user-profile row">
							<div class="hr hr16 dotted"></div>
							<div class="col-xs-12 col-sm-3 center">
								<div>
									<span class="profile-picture">
										<img id="avatar" class="editable img-responsive" style="height: 120px" alt="Alexs Avatar" src="';echo SERVERURL.'vistas/assets/images/avatars/avatar6.png" />
									</span>

									<div class="space-2"></div>
								


								</div>






							</div>

							<div class="col-xs-12 col-sm-9" style="margin-top: 15px;">


								<div class="space-7"></div>

								<div class="profile-user-info profile-user-info-striped">
								<div class="profile-info-row">
										<div class="profile-info-name"> Nombre </div>

										<div class="profile-info-value">
											<span class="editable" id="username">' . $row['nombrep'] . '</span>
										</div>
									</div>
									<div class="profile-info-row">
										<div class="profile-info-name"> Usuario </div>

										<div class="profile-info-value">
											<span class="editable" id="username">' . $row['nombre'] . '</span>
										</div>
									</div>

									<div class="profile-info-row">
										<div class="profile-info-name"> Correo </div>

										<div class="profile-info-value">
											<span class="editable" id="username">' . $row['correo'] . '</span>
										</div>
									</div>





									<div class="profile-info-row">
										<div class="profile-info-name">Creacion </div>

										<div class="profile-info-value">
											<span class="editable" id="signup">' . $fecha . '</span>
										</div>
									</div>

									


								</div>




							</div>
						</div>
					</div>




				</div>
			</div>
		</div>
	</div>';
		}
	}

	public function acordeon_limitado_controlador()
	{

		$conexion = mainModel::conectar();

		$datos = $conexion->query("SELECT * FROM tusuario WHERE estado=1 AND tipo='secret'");

		foreach ($datos as $row) {
			$fecha = $row['fechacreacion'];
			$fecha = date("d/m/Y", strtotime($fecha));


			echo ' <div class="panel-body">
		<div class="col-xs-12">

			<!-- div.table-responsive -->

			<!-- div.dataTables_borderWrap -->
			<div>
				<div id="dynamic-table_wrapper" style="background:#ffff" class="dataTables_wrapper form-inline no-footer">

					<!--inicio Filtros de Tabla-->


					<div class="clearfix" style="padding: 10px">

						<div class="pull-right">
							<span class="green middle bolder">Opciones: &nbsp;</span>

							<div class="btn-toolbar inline middle no-margin">
								<div data-toggle="buttons" class="btn-group no-margin">

									<button class="btn btn-success btn-white btn-round btn-lg tooltip-info " onclick="ExtraerDatosMod(' . $row['idusuario'] . ')" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#modal-rgusuario" data-rel="tooltip" title="Modificar"><i class="fa fa-edit"></i></button>

									<button class="btn btn-danger btn-white btn-round btn-lg tooltip-info" data-rel="tooltip" onclick= "eliminar(' . $row['idusuario'] . ')" title="Eliminar"><i class="fa fa-trash"></i></button>

								</div>
							</div>
						</div>

					</div>

					<div>
						<div id="user-profile-1" class="user-profile row">
							<div class="hr hr16 dotted"></div>
							<div class="col-xs-12 col-sm-3 center">
								<div>
									<span class="profile-picture">
										<img id="avatar" class="editable img-responsive" style="height: 120px" alt="Alexs Avatar" src="';echo SERVERURL.'vistas/assets/images/avatars/avatar6.png" />
									</span>

									<div class="space-2"></div>
								


								</div>






							</div>

							<div class="col-xs-12 col-sm-9" style="margin-top: 15px;">


								<div class="space-7"></div>

								<div class="profile-user-info profile-user-info-striped">
									
								<div class="profile-info-row">
								<div class="profile-info-name"> Nombre </div>

								<div class="profile-info-value">
									<span class="editable" id="username">' . $row['nombrep'] . '</span>
								</div>
							</div>


								<div class="profile-info-row">
										<div class="profile-info-name"> Usuario </div>

										<div class="profile-info-value">
											<span class="editable" id="username">' . $row['nombre'] . '</span>
										</div>
									</div>

									<div class="profile-info-row">
										<div class="profile-info-name"> Correo </div>

										<div class="profile-info-value">
											<span class="editable" id="username">' . $row['correo'] . '</span>
										</div>
									</div>





									<div class="profile-info-row">
										<div class="profile-info-name">Creacion </div>

										<div class="profile-info-value">
											<span class="editable" id="signup">' . $fecha . '</span>
										</div>
									</div>

									


								</div>




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
