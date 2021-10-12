<?php

if ($peticionAjax) {

	require_once "../core/mainModel.php";
} else {
	require_once "./core/mainModel.php";
}

class proveedorModelo extends mainModel
{

	protected function agregar_proveedor_modelo($datos)
	{

		$sql = mainModel::conectar()->prepare("INSERT INTO `tproveedor`(`idproveedor`, `nombre`,
             `contacto`, `telefono`, `estadop`) 
            VALUES (NULL,:nombre,:contacto,:telefono, 1)");

		$sql->bindParam(":nombre", $datos['nombre']);
		$sql->bindParam(":contacto", $datos['contacto']);
		$sql->bindParam(":telefono", $datos['telefono']);


		$sql->execute();


		return $sql;
	}

	protected function eliminar_proveedor_modelo($datos)
	{

		$sql = mainModel::conectar()->prepare("UPDATE `tproveedor` SET `estadop` = '0' WHERE `tproveedor`.`idproveedor` = :idproveedor; ");
		$sql->bindParam(":idproveedor", $datos['idproveedor']);

		$sql->execute();


		return $sql;
	}

}
