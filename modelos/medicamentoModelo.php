<?php

if ($peticionAjax) {

	require_once "../core/mainModel.php";
} else {
	require_once "./core/mainModel.php";
}

class medicamentoModelo extends mainModel
{

	protected function agregar_nuevoinventario_modelo($datos){

		


		$sql = mainModel::conectar()->prepare("INSERT INTO `tinventario_medicamento`(`idreferencia_medicamento`,
		 `idmedicamento`, `fecha_ingreso_medicamento`, `fecha_vencim_medicamento`, `cantidad_medicamento`, `idproveedor`, `ubicacion`,`estado`)
		  VALUES (NULL,:id,:fechaingreso,:fechavencimiento,:cantidad,:proveedor,:ubicacion,1)");


		$sql->bindParam(":id", $datos['id']);
		$sql->bindParam(":fechaingreso", $datos['fechaingreso']);
		$sql->bindParam(":fechavencimiento", $datos['fecha']);
		$sql->bindParam(":cantidad", $datos['cantidad']);
		$sql->bindParam(":proveedor", $datos['proveedor']);
		$sql->bindParam(":ubicacion", $datos['ubicacion']);
		




		$sql->execute();


		return $sql;
	}

	protected function modificar_inventario_modelo($datosAD){
		

		$sql = mainModel::conectar()->prepare("UPDATE `tinventario_medicamento` SET 
		`fecha_vencim_medicamento`=:fecha,`cantidad_medicamento`=:cantidad,`ubicacion`=:ubicacion,`idproveedor`=:proveedor
		 WHERE `idreferencia_medicamento` = :idinventario");

		$sql->bindParam(":idinventario", $datosAD['idinventario']);
		$sql->bindParam(":cantidad", $datosAD['cantidad']);
		$sql->bindParam(":fecha", $datosAD['fecha']);
		$sql->bindParam(":proveedor", $datosAD['proveedor']);
		$sql->bindParam(":ubicacion", $datosAD['ubicacion']);
		

	$sql->execute();


	return $sql;


	}

	protected function modificar_medicamento_modelo($datos){

			$sql = mainModel::conectar()->prepare("UPDATE `tmedicamento` SET 
			`nombre_medicamento`=:nombre,`presentacion_medicamento`=:presentacion,`via_admin_medicamento`=:administracion,
			`concentracion_medicamento`=:contenido,`stock_minimo_medicamento`=:stockmin,`unidad`=:medidas,`tipo`=:tipo
			 WHERE `tmedicamento`.`idmedicamento` = :idmedicamento");

			$sql->bindParam(":idmedicamento", $datos['idmedicamento']);
			$sql->bindParam(":presentacion", $datos['presentacion']);
			$sql->bindParam(":nombre", $datos['nombre']);
			$sql->bindParam(":administracion", $datos['administracion']);
			
			$sql->bindParam(":tipo", $datos['tipo']);
			$sql->bindParam(":contenido", $datos['contenido']);
			$sql->bindParam(":stockmin", $datos['stockmin']);
			
			$sql->bindParam(":medidas", $datos['medidas']);

		$sql->execute();


		return $sql;
	
	}

	protected function obtener_inventario_modelo($idinventario){
		$sql = mainModel::ejecutar_consulta_simple("SELECT * FROM tinventario_medicamento where idreferencia_medicamento=  $idinventario ");

		return $sql;
	}
	protected function obtener_estadoproveedor_modelo($idproveedor){
		$sql = mainModel::ejecutar_consulta_simple("SELECT * FROM tproveedor where idproveedor=  $idproveedor ");

		return $sql;
	}

	protected function obtener_medicamento_modelo($idmedicamento){
		$sql = mainModel::ejecutar_consulta_simple("SELECT * FROM tmedicamento where idmedicamento=  $idmedicamento ");

		return $sql;
	}

	protected function eliminar_medicamento_modelo($datos){

		$sql = mainModel::conectar()->prepare("UPDATE `tmedicamento` SET `estado` = '0' WHERE `tmedicamento`.`idmedicamento` = $datos");
		
		$sql->execute();

		$sql2 = mainModel::conectar()->prepare("UPDATE tinventario_medicamento SET estado = 0 WHERE idmedicamento = $datos");
		
		$sql2->execute();


		return $sql;
	
	}

	protected function eliminar_inventario_modelo($datos){
		$sql = mainModel::conectar()->prepare("UPDATE `tinventario_medicamento` SET `estado` = '0' WHERE `tinventario_medicamento`.`idreferencia_medicamento` = $datos");
		
		$sql->execute();


		return $sql;
	}

	protected function obtener_total_medicamentos($id)
	{
		$sql = mainModel::conectar()->prepare("SELECT

		SUM(tinventario_medicamento.cantidad_medicamento) AS cantidad
		FROM
		tinventario_medicamento
		WHERE idmedicamento =$id AND estado!=0
		
		");
		$sql->execute();
		return $sql;
	}

	protected function agregar_medicamento_modelo($datos)
	{
		$sql = mainModel::conectar()->prepare("INSERT INTO `tmedicamento`(`idmedicamento`, `nombre_medicamento`,
             `presentacion_medicamento`, `via_admin_medicamento`, `concentracion_medicamento`, `stock_minimo_medicamento`,`unidad`,`tipo`,`estado`) 
            VALUES (null,:nombre,:presentacion,:administracion,:contenido,:stock,:medidas,:tipo,1 )");


		$sql->bindParam(":nombre", $datos['nombre']);
		$sql->bindParam(":presentacion", $datos['presentacion']);
		$sql->bindParam(":administracion", $datos['administracion']);
		$sql->bindParam(":tipo", $datos['tipo']);
		$sql->bindParam(":contenido", $datos['contenido']);
		$sql->bindParam(":medidas", $datos['medidas']);
		$sql->bindParam(":stock", $datos['stock']);




		$sql->execute();


		return $sql;
	}

	protected function agregar_inventario_modelo($datos)
	{


		$sql = mainModel::conectar()->prepare("INSERT INTO `tinventario_medicamento`(`idreferencia_medicamento`,
		 `idmedicamento`, `fecha_ingreso_medicamento`, `fecha_vencim_medicamento`, `cantidad_medicamento`, `idproveedor`, `ubicacion`,`estado`)
		  VALUES (NULL,:id,:fechaingreso,:fechavencimiento,:cantidad,:proveedor,:ubicacion,1)");


		$sql->bindParam(":id", $datos['id']);
		$sql->bindParam(":fechaingreso", $datos['fechaingreso']);
		$sql->bindParam(":fechavencimiento", $datos['fechavencimiento']);
		$sql->bindParam(":cantidad", $datos['cantidad']);
		$sql->bindParam(":proveedor", $datos['idproveedor']);
		$sql->bindParam(":ubicacion", $datos['ubicacion']);
		




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
}
