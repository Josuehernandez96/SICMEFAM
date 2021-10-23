<?php

if ($peticionAjax) {

	require_once "../core/mainModel.php";
} else {
	require_once "./core/mainModel.php";
}

/**
 * 
 */
class loginModelo extends mainModel
{
	protected function iniciar_sesion_modelo($datos)
	{
		$sql = mainModel::conectar()->prepare("SELECT * FROM tabusuario WHERE nombre=:usuario AND contrasena=:clave  AND estado= 1");
		$sql->bindParam(':usuario', $datos['usuario']);
		$sql->bindParam(':clave', $datos['clave']);
		$sql->execute();
		return $sql;
	}

	protected function cerrar_sesion_modelo($datos)
	{
		if ($datos['usuario'] != "" && $datos['Token_S'] == $datos['Token']) {

			$fechaActual = date("Y-m-d");

			$horaActual = date("H:i") . ":00";
			

			$datosBitacora = [

				"fechahora" => $fechaActual.' '.$horaActual,
				"accion" => "Cierre de sesión",
				"modulo" => "LOGIN",
				"idusuario" => $_SESSION['idusuario_sbp']

			];

			$Abitacora = mainModel::guardar_bitacora($datosBitacora);

			

			if ($Abitacora->rowCount() == 1) {
				session_unset();
				session_destroy();
				echo "1";
			} else {
				echo "0";
			}
		} else {
			echo "0";
		}
		
	}
}
