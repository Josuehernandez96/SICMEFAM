<?php

if ($peticionAjax) {

	require_once "../core/mainModel.php";
} else {
	require_once "./core/mainModel.php";
}

class usuarioModelo extends mainModel
{

	protected function agregar_usuario_modelo($datos)
	{
		$fechaActual = date("Y-m-d");

		$sql = mainModel::conectar()->prepare("INSERT INTO `tusuario`(`idusuario`, `nombre`,
             `contrasena`, `correo`, `tipo`, `codigo_recuperacion`, `estado`, `fechacreacion`,`nombrep`) 
            VALUES (NULL,:nombre,:clave,:correo,:rol,'',1,'" . $fechaActual . "',:nombrep)");


		$sql->bindParam(":nombrep", $datos['nombrep']);
		$sql->bindParam(":nombre", $datos['nombre']);
		$sql->bindParam(":clave", $datos['clave']);
		$sql->bindParam(":correo", $datos['correo']);
		$sql->bindParam(":rol", $datos['rol']);


		$sql->execute();


		return $sql;
	}

	protected function eliminar_cuenta_modelo($datos)
	{

		$sql = mainModel::conectar()->prepare("UPDATE `tusuario` SET `estado` = '0' WHERE `tusuario`.`idusuario` = :idusuario; ");
		$sql->bindParam(":idusuario", $datos['idusuario']);

		$sql->execute();


		return $sql;
	}

	protected function obtener_usuario_modelo($idusuario)
	{

		$sql = mainModel::ejecutar_consulta_simple("SELECT * FROM tusuario where idusuario=" . $idusuario . "");

		return $sql;
	}

	protected function modificar_usuario_modelo($datos)
	{

		if ($datos['es'] == 1) {
			$sql = mainModel::conectar()->prepare("UPDATE `tusuario` 
		SET `nombre` = :nombre, `contrasena` = :clave, `correo` = :correo, `nombrep` = :nombrep WHERE `tusuario`.`idusuario` = :idusuario; ");

			$sql->bindParam(":idusuario", $datos['idusuario']);
			$sql->bindParam(":nombrep", $datos['nombrep']);

			$sql->bindParam(":nombre", $datos['nombre']);
			$sql->bindParam(":clave", $datos['clave']);
			$sql->bindParam(":correo", $datos['correo']);
		}else {

			$sql = mainModel::conectar()->prepare("UPDATE `tusuario` 
		SET `nombre` = :nombre, `correo` = :correo, `nombrep` = :nombrep WHERE `tusuario`.`idusuario` = :idusuario; ");

			$sql->bindParam(":idusuario", $datos['idusuario']);
			$sql->bindParam(":nombrep", $datos['nombrep']);

			$sql->bindParam(":nombre", $datos['nombre']);
			
			$sql->bindParam(":correo", $datos['correo']);

		}


		$sql->execute();


		return $sql;
	}
}
