<?php

if ($peticionAjax) {

	require_once "../core/mainModel.php";
} else {
	require_once "./core/mainModel.php";
}

class bitacoraModelo extends mainModel
{
	protected function obtener_fechas_bitacora_modelo($fechaini, $fechafin, $usuario, $busqueda)
	{

		if ($busqueda == 'Todo') {
			$sql = mainModel::ejecutar_consulta_simple("SELECT DISTINCT (DATE_FORMAT(fecha_hora_accion,'%d/%m/%Y')) as fechas
			FROM tbitacora
			INNER JOIN tusuario ON tbitacora.idusuario = tusuario.idusuario
			WHERE DATE(fecha_hora_accion)>='" . $fechaini . "' AND DATE(fecha_hora_accion)<='" . $fechafin . "' 
			AND tipo = '" . $usuario . "'
			ORDER BY
			tbitacora.fecha_hora_accion DESC");
		} else {
			$sql = mainModel::ejecutar_consulta_simple("SELECT DISTINCT (DATE_FORMAT(fecha_hora_accion,'%d/%m/%Y')) as fechas
		FROM tbitacora
		INNER JOIN tusuario ON tbitacora.idusuario = tusuario.idusuario
		WHERE DATE(fecha_hora_accion)>='" . $fechaini . "' AND DATE(fecha_hora_accion)<='" . $fechafin . "' 
		AND tipo = '" . $usuario . "' AND modulo_bitacora= '" . $busqueda . "'
		ORDER BY
		tbitacora.fecha_hora_accion DESC");
		}

		return $sql;
	}
}
