<?php

if ($peticionAjax) {

	require_once "../modelos/loginModelo.php";
} else {
	require_once "./modelos/loginModelo.php";
}

/**
 * 
 */
class loginControlador extends loginModelo
{


	public function iniciar_sesion_controlador()
	{
		$usuario = mainModel::limpiar_cadena($_POST['usuario']);
		$clave = mainModel::limpiar_cadena($_POST['clave']);
		$clave = mainModel::encryption($clave);
		$accion = "";

		$datosLogin = [
			"usuario" => $usuario,
			"clave" => $clave
		];

		$datosCuenta = loginModelo::iniciar_sesion_modelo($datosLogin);

		if ($datosCuenta->rowCount() == 1) {
			$row = $datosCuenta->fetch();


            $fechaActual = date("Y-m-d H:i:s");

					
			$datosBitacora = [

				"fechahora" => $fechaActual,
				"accion" => "Inicio de sesión",
				"modulo" => "LOGIN",
				"idusuario" => $row['idusuario']

			];
			$insertarBitacora = mainModel::guardar_bitacora($datosBitacora);
			if ($insertarBitacora->rowCount() >= 1) {
				session_start(['name' => 'SBP']);
				$_SESSION['idusuario_sbp'] = $row['idusuario'];
				$_SESSION['usuario_sbp'] = $row['nombre'];
				$_SESSION['nombre_sbp'] = $row['nombrep'];
				$_SESSION['tipo_sbp'] = $row['tipo'];
				$_SESSION['token_sbp'] = md5(uniqid(mt_rand(), true));
				$_SESSION["rgnuevo"]="0";


				if ($row['tipo'] == "admin") {
					$url = "inicio";
					$accion = '<script> location.href="' . SERVERURL . '' . $url . '"</script>';
				} else {
					$url = "inicio";
					$accion = '<script> location.href="' . SERVERURL . '' . $url . '"</script>';
				}
			} else {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrio un Error Inesperado",
					"Texto" => "No se ha podido iniciar la sesión por problemas técnicos, por favor intente nuevamente",
					"Tipo" => "error"
				];
				$accion = mainModel::sweet_alert($alerta);
			}
		} else {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrio un Error Inesperado",
				"Texto" => "El nombre de usuario y contraseña no son correctos o su cuenta puede estar deshabilitada",
				"Tipo" => "error"
			];
			$accion = mainModel::sweet_alert($alerta);
		}
		return $accion;
	}


	public function cerrar_sesion_controlador()
	{
		session_start(['name' => 'SBP']);
		$token = mainModel::decryption($_POST['Token']);
		$datos = [
			"usuario" => $_SESSION['usuario_sbp'],
			"Token_S" => $_SESSION['token_sbp'],
			"Token" => $token


		];
		loginModelo::cerrar_sesion_modelo($datos);
	}



	public function forzar_cierre_sesion_controlador()
	{
		session_destroy();
		return header("Location: " . SERVERURL . "");
	}

	public function recuperar_usuario_controlador()
	{
		require_once '../PHPMailer/PHPMailerAutoload.php';

		$mail = new PHPMailer();
		$mail->isSMTP();
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = 'tls'; //Modificar
		$mail->Host = 'smtp.gmail.com'; //Modificar
		$mail->Port = 587; //Modificar

		$mail->Username = 'sicmedicrecuperar@gmail.com'; //Modificar
		$mail->Password = 'sicmedic123'; //Modificar

		$mail->setFrom('sicmedicrecuperar@gmail.com', 'SICMEDIC'); //Modificar
		//	$mail->addAddress($email, $nombre);
		$correo = mainModel::limpiar_cadena($_POST['correo']);


		$consulta3 = mainModel::ejecutar_consulta_simple("SELECT * FROM tabusuario WHERE tabusuario.correo= '$correo' AND estado=1");
		$ec = $consulta3->rowCount();
		$idusuario="12345";
		foreach ($consulta3 as $row) {
			$idusuario=$row['idusuario'];
			$nombrep = $row['nombrep'];
			$nombre = $row['nombre'];

			$clave = mainModel::generar_codigo_aleatorio('R', '10', rand(1, 30));
		}

		if ($ec >= 1) {



			$mail->addAddress($correo, ' ');

			$mail->Subject = 'Recuperar Password-SICMEDIC';
			$mail->Body    = "Hola $nombrep: <br /><br />Solicitaste recuperacion de contrase&ntilde;a. <br/><br/><a>NOMBRE DE USUARIO: $nombre<br/>NUEVA CONTRASE&Ntilde;A : $clave <br/><br/>Si tu contrase&ntilde;a es dificil de recordar te recomendamos cambiarla";
			$mail->IsHTML(true);

			if ($mail->send()) {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "ENVIADO",
					"Texto" => "revisa el correo donde se indicaran los pasos a seguir",
					"Tipo" => "success"
				];
				$datos = [

					"idusuario" => $idusuario,
					"codigo" => mainModel::encryption($clave),


				];
				mainModel::insertar_codigo_recuperacion_cuenta($datos);
			} else {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrio un Error Inesperado",
					"Texto" => "Revise su conexion a internet",
					"Tipo" => "error"
				];
			}
		} else {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "No Enviado",
				"Texto" => "El correo ingresado no pertenece a ninguna cuenta o puede estar deshabilitada",
				"Tipo" => "error"

			];
		}

		return mainModel::sweet_alert($alerta);
	}



	public function verificar_correo_controlador()
	{
		session_start(['name' => 'SBP']);
		$token = mainModel::decryption($_POST['Token']);
		$datos = [
			"usuario" => $_SESSION['usuario_sbp'],
			"Token_S" => $_SESSION['token_sbp'],
			"Token" => $token


		];
		loginModelo::cerrar_sesion_modelo($datos);
	}
}
