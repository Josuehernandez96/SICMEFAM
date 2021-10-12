<?php

if ($peticionAjax) {

	require_once "../core/mainModel.php";
} else {
	require_once "./core/mainModel.php";
}

class consultaModelo extends mainModel
{

	protected function crear_consulta_modelo($datos)
	{
		$conexion = mainModel::conectar();
		$sql = $conexion->prepare("INSERT INTO `tconsulta` (`idconsulta`, `idpaciente`,
		 `fecha_hora_consulta`, `razon_consulta`, `antecedentes_consulta`, `diagnostico_consutla`, 
		 `observaciones_consulta`, `ordenexamen_consulta`, `recomendacion`) 
		VALUES (NULL, :idpaciente, :fechahora, :razon, :antecedentes, :diagnostico, :observacion, :ordenexamen, :recomendacion);");

		$sql->bindParam(":idpaciente", $datos['idpaciente']);
		$sql->bindParam(":fechahora", $datos['fechahora']);
		$sql->bindParam(":razon", $datos['motivo']);
		$sql->bindParam(":antecedentes", $datos['antecedentes']);
		$sql->bindParam(":diagnostico", $datos['diagnostico']);
		$sql->bindParam(":observacion", $datos['observacion']);
		$sql->bindParam(":ordenexamen", $datos['ordenexamen']);
		$sql->bindParam(":recomendacion", $datos['recomendacion']);
		$sql->execute();

		$retorno = [
			"ultima" => $conexion->lastInsertId(),
			"afectados" => $sql->rowCount()

		];

		return $retorno;
	}

	protected function insertar_signos_vitales_modelo($datos)
	{
		$conexion = mainModel::conectar();
		$sql = $conexion->prepare("INSERT INTO `tsignosvitales`
		 (`idsignovital`, `presion`, `frecuencia`, `temperatura`, `peso`, `estatura`, `frecuenciares`, `idconsulta`) 
			VALUES (NULL, :presion, :frecuencia , :temperatura, :peso, :estatura, :frecuenciares, :idconsulta); ");


		$sql->bindParam(":presion", $datos['presion']);
		$sql->bindParam(":frecuencia", $datos['frecuencia']);
		$sql->bindParam(":temperatura", $datos['temperatura']);
		$sql->bindParam(":peso", $datos['peso']);
		$sql->bindParam(":estatura", $datos['estatura']);
		$sql->bindParam(":frecuenciares", $datos['frecuenciares']);
		$sql->bindParam(":idconsulta", $datos['idconsulta']);


		$sql->execute();

		$retorno = [

			"afectados" => $sql->rowCount()

		];

		return $retorno;
	}

	protected function insertar_examenes_clinicos_modelo($idconsulta)
	{


		if (file_exists("../expediente/" . $_SESSION["expediente"])) {

			for ($i = 0; $i < count($_FILES["file"]["name"]); $i++) {

				$archivo = $_FILES["file"];

				$ruta_provisional = $archivo["tmp_name"][$i];

				$nombre_imagen = $archivo["name"][$i];

				$ruta_destino = "expediente/" . $_SESSION["expediente"] . "/" . $nombre_imagen;

				move_uploaded_file($ruta_provisional, "../expediente/" . $_SESSION["expediente"] . "/" . $archivo["name"][$i] . "");

				$dataCon = [
					"idconsulta" => $idconsulta,
					"ruta_imagen" => $ruta_destino
				];
				self::insertar_ruta_modelo($dataCon);
			}
		} else {

			if (mkdir("../expediente/" . $_SESSION["expediente"], 0777, true)) {
				for ($i = 0; $i < count($_FILES["file"]["name"]); $i++) {

					$archivo = $_FILES["file"];

					$ruta_provisional = $archivo["tmp_name"][$i];

					$nombre_imagen = $archivo["name"][$i];

					$ruta_destino = "expediente/" . $_SESSION["expediente"] . "/" . $nombre_imagen;

					move_uploaded_file($ruta_provisional, "../expediente/" . $_SESSION["expediente"] . "/" . $archivo["name"][$i] . "");

					$dataCon = [
						"idconsulta" => $idconsulta,
						"ruta_imagen" => $ruta_destino
					];
					self::insertar_ruta_modelo($dataCon);

					$dataCon = [
						"idconsulta" => $idconsulta,
						"ruta_imagen" => $ruta_destino
					];
					self::insertar_ruta_modelo($dataCon);
				}
			}
		}
	}

	protected function insertar_ruta_modelo($datos)
	{

		$sql = mainModel::conectar()->prepare("INSERT INTO `texamen` (`idexamen`, `ruta_imagen`, `idconsulta`) 
		VALUES (NULL, :ruta_imagen, :idconsulta);");

		$sql->bindParam(":ruta_imagen", $datos['ruta_imagen']);
		$sql->bindParam(":idconsulta", $datos['idconsulta']);
		$sql->execute();
	}

	protected function insertar_receta_modelo($datos)
	{

		if ($datos["esinv"] == 0) {
			$sql = mainModel::conectar()->prepare("INSERT INTO `treceta` 
			(`idreceta`, `idmedicamento`, `nombre_medicamento`, `cantidad_entregada`, 
			`cantidad_indicada`, `indicaciones`, `idconsulta`) 
			VALUES (NULL, NULL, :nombremedicamento, '', :cantidad, :indicaciones, :idconsulta) ");

			$sql->bindParam(":nombremedicamento", $datos['nombremedicamento']);
			$sql->bindParam(":indicaciones", $datos['indicaciones']);
			$sql->bindParam(":cantidad", $datos['cantidad']);
			$sql->bindParam(":idconsulta", $datos['idconsulta']);
			$sql->execute();
		}
		if ($datos["esinv"] == 1) {
			$sql = mainModel::conectar()->prepare("INSERT INTO `treceta`
			 (`idreceta`, `idmedicamento`, `nombre_medicamento`, `cantidad_entregada`,
			  `cantidad_indicada`, `indicaciones`, `idconsulta`) 
			VALUES (NULL, :idmedicamento, '', :cantidad, '', :indicaciones, :idconsulta);");

			$sql->bindParam(":idmedicamento", $datos['idmedicamento']);
			$sql->bindParam(":indicaciones", $datos['indicaciones']);
			$sql->bindParam(":cantidad", $datos['cantidad']);
			$sql->bindParam(":idconsulta", $datos['idconsulta']);
			$sql->execute();
		}
	}

	protected function capturando_receta_modelo($idconsulta)
	{
		$registros = json_decode($_REQUEST["medicamentos"]);
		if(count($registros)!=0){
		foreach ($registros as  $m) {
			
			echo count($registros);
			if($m->esinv==0){

				
				$datosRec = [
					"nombremedicamento" => $m->idmedicamento,
					"cantidad" => $m->cantidad,
					"indicaciones" =>$m->dosis." cada ".$m->frecuenciam." durante ".$m->duracion,
					"idconsulta" => $idconsulta,
					"esinv" => $m->esinv
					
				];
				self::insertar_receta_modelo($datosRec);
		
			}
			if($m->esinv==1){
				
				$datosRec = [
					"idmedicamento" => $m->idmedicamento,
					"cantidad" => $m->cantidad,
					"indicaciones" =>$m->dosis." cada ".$m->frecuenciam." durante ".$m->duracion,
					"idconsulta" => $idconsulta,
					"esinv" => $m->esinv
					
				];
				self::insertar_receta_modelo($datosRec);
				$unidades=self::obtener_unidades_en_inventario_modelo($m->idmedicamento)-$m->cantidad;
				self::disminuir_en_inventario_modelo($m->idmedicamento,$unidades);

			}
		}
	}
	}

	protected function obtener_consultas_modelo($fechainicial,$fechafinal){

		if($fechainicial=="" && $fechafinal==""){

			$sql=mainModel::ejecutar_consulta_simple("SELECT * FROM `tconsulta` WHERE DATE(tconsulta.fecha_hora_consulta)>='".$fechainicial."' AND DATE(tconsulta.fecha_hora_consulta)<='".$fechafinal."' ");
			
		}else{

			$sql=mainModel::ejecutar_consulta_simple("SELECT * FROM `tconsulta` WHERE DATE(tconsulta.fecha_hora_consulta)>='".$fechainicial."' AND DATE(tconsulta.fecha_hora_consulta)<='".$fechafinal."' ");
			
		}
		
		return $sql;


	}

	protected function obtener_unidades_en_inventario_modelo($idreferencia){

		$sql=mainModel::ejecutar_consulta_simple("SELECT `idreferencia_medicamento`,`cantidad_medicamento` as cantidad FROM `tinventario_medicamento` 
		WHERE tinventario_medicamento.idreferencia_medicamento='".$idreferencia."'");
			
		return $sql;

	}

	protected function disminuir_en_inventario_modelo($idreferencia,$cantidad){

		$sql = mainModel::conectar()->prepare("INSERT INTO `treceta` 
			(`idreceta`, `idmedicamento`, `nombre_medicamento`, `cantidad_entregada`, 
			`cantidad_indicada`, `indicaciones`, `idconsulta`) 
			VALUES (NULL, NULL, :nombremedicamento, '', :cantidad, :indicaciones, :idconsulta) ");

			$sql->bindParam(":idreferencia", $idreferencia);
			
			$sql->execute();
			return $sql;
		}

		


		

	

}
