<?php

if ($peticionAjax) {

	require_once "../core/mainModel.php";
} else {
	require_once "./core/mainModel.php";
}

class CitaModelo extends mainModel
{

	protected function agregar_cita_modelo($datos)
	{

		if ($datos["es"] == 2) {

			$sql = mainModel::conectar()->prepare("INSERT INTO `tcita` (`idcita`, `idpaciente`, `nombre_citado`, `telefono_citado`, `fecha_hora_cita`, `estado_cita`) 
			VALUES (NULL, NULL, :nombre_citado, :telefono, :fechahoracita, '1');");
			$sql->bindParam(":nombre_citado", $datos['nombre_citado']);
			$sql->bindParam(":fechahoracita", $datos['fechahoracita']);
			$sql->bindParam(":telefono", $datos['telefono']);
		}

		if ($datos["es"] == 1) {

			$sql = mainModel::conectar()->prepare("INSERT INTO `tcita` (`idcita`, `idpaciente`, `nombre_citado`, `telefono_citado`, `fecha_hora_cita`, `estado_cita`)
            VALUES (NULL, :idpaciente , '', '', :fechahoracita,'1' );");
			$sql->bindParam(":idpaciente", $datos['idpaciente']);
			$sql->bindParam(":fechahoracita", $datos['fechahoracita']);
		}
		$sql->execute();


		return $sql;
	}


	protected function cambiar_estado_cita_modelo($datos)
	{
		$sql = mainModel::conectar()->prepare("UPDATE `tcita` SET `estado_cita` = :estado_cita WHERE `tcita`.`idcita` = :idcita; ");
		$sql->bindParam(":estado_cita", $datos['estado']);
		$sql->bindParam(":idcita", $datos['idcita']);
		$sql->execute();
		return $sql;
	}

	protected function obtener_consulta_en_proceso_modelo(){
		
		$sql=mainModel::ejecutar_consulta_simple("SELECT * FROM tcita WHERE tcita.estado_cita=3 ");
		
		return $sql->rowCount();
	}

	protected function modificar_cita_modelo($datos){
		$sql = mainModel::conectar()->prepare("UPDATE `tcita` SET `idpaciente` = :idpaciente, `nombre_citado` = '', `telefono_citado` = ''
											, `estado_cita` = '1' WHERE `tcita`.`idcita` = :idcita; ");

			$sql->bindParam(":idpaciente", $datos['idpaciente']);
			$sql->bindParam(":idcita", $datos['idcita']);

			$sql->execute();
	}

	protected function cancelar_registro_cita(){

		
	}
}
