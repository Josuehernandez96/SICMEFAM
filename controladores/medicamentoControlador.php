<?php
if ($peticionAjax) {
	require_once "../modelos/medicamentoModelo.php";
} else {
	require_once "./modelos/medicamentoModelo.php";
}

class medicamentoControlador extends medicamentoModelo
{

	public function modificar_inventario_controlador()
	{


		$idinventario = mainModel::limpiar_cadena($_POST['idinventario']);

		$fecha = mainModel::limpiar_cadena($_POST['fecha']);
		$fecha = str_replace("/", "-", $fecha);
		$fecha = date("Y-m-d", strtotime($fecha));

		$ubicacion = mainModel::limpiar_cadena($_POST['ubicacion']);
		$cantidad = mainModel::limpiar_cadena($_POST['cantidad']);
		$proveedor = mainModel::limpiar_cadena($_POST['proveedor']);

		$dataAD = [
			"idinventario" => $idinventario,
			"fecha" => $fecha,
			"cantidad" => $cantidad,
			"proveedor" => $proveedor,
			"ubicacion" => $ubicacion
		];

		$modificarInventario = medicamentoModelo::modificar_inventario_modelo($dataAD);

		if ($modificarInventario->rowCount() >= 1) {
			$consulta = mainModel::ejecutar_consulta_simple("SELECT*FROM
			tinventario_medicamento
			INNER JOIN tmedicamento ON tinventario_medicamento.idmedicamento = tmedicamento.idmedicamento 
			WHERE idreferencia_medicamento='$idinventario'");

			foreach ($consulta as $row) {
				$nombre = $row['nombre_medicamento'];
			}

			$alerta = [
				"Alerta" => "limpiarmedicamento",
				"Titulo" => "Medicamento Modificado con exito ",
				"Texto" => "",
				"Tipo" => "success",
				"form" => "formmodinv",
				"modal" => "modal-modificarinv"
			];

			$fechaActual = date("Y-m-d H:i:s");



			$datosBitacora = [

				"fechahora" => $fechaActual,
				"accion" => "Modifico datos al inventario del medicamento " . $nombre,
				"modulo" => "MEDICAMENTO",
				"idusuario" => $_SESSION['idusuario_sbp']

			];

			$Abitacora = mainModel::guardar_bitacora($datosBitacora);
		} else {

			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Sin cambios",
				"Texto" => "",
				"Tipo" => "error"

			];
		}



		return  mainModel::sweet_alert($alerta);
	}

	public function modificar_medicamento_controlador()
	{

		$idmedicamento = mainModel::limpiar_cadena($_POST['idmedicamento']);

		$nombre = mainModel::limpiar_cadena($_POST['nombre']);
		$presentacion = mainModel::limpiar_cadena($_POST['presentacion']);
		$contenido = mainModel::limpiar_cadena($_POST['contenido']);
		$medidas = mainModel::limpiar_cadena($_POST['medidas']);

		$stockmin = mainModel::limpiar_cadena($_POST['stockmin']);
		$administracion = mainModel::limpiar_cadena($_POST['administracion']);

		$tipo = mainModel::limpiar_cadena($_POST['tipom']);



		$dataAD = [
			"idmedicamento" => $idmedicamento,
			"nombre" => $nombre,
			"presentacion" => $presentacion,
			"contenido" => $contenido,
			"medidas" => $medidas,
			"stockmin" => $stockmin,
			"administracion" => $administracion,
			"tipo" => $tipo
		];

		$modificarMedicamento = medicamentoModelo::modificar_medicamento_modelo($dataAD);

		if ($modificarMedicamento->rowCount() >= 1) {

			$alerta = [
				"Alerta" => "limpiarmedicamento",
				"Titulo" => "Medicamento Modificado con exito ",
				"Texto" => "",
				"Tipo" => "success",
				"form" => "formmed",
				"modal" => "modal-modificarmedic"
			];

			$fechaActual = date("Y-m-d H:i:s");



			$datosBitacora = [

				"fechahora" => $fechaActual,
				"accion" => "Modifico datos del medicamento con nombre " . $nombre,
				"modulo" => "MEDICAMENTO",
				"idusuario" => $_SESSION['idusuario_sbp']

			];

			$Abitacora = mainModel::guardar_bitacora($datosBitacora);
		} else {

			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Sin cambios",
				"Texto" => "",
				"Tipo" => "error"

			];
		}



		return  mainModel::sweet_alert($alerta);
	}

	public function obtener_inventario_controlador()
	{

		$inventario = medicamentoModelo::obtener_inventario_modelo($_POST["idinventario"]);
		$std = new stdClass();
		foreach ($inventario as $row) {

			$std->fechai = $row['fecha_ingreso_medicamento'];
			$std->fechav = $row['fecha_vencim_medicamento'];
			$std->ubicacion = $row['ubicacion'];
			$std->cantidad = $row['cantidad_medicamento'];
			$std->proveedor = $row['idproveedor'];
			$idproveedor = $row['idproveedor'];
		}
		$consulta = medicamentoModelo::obtener_estadoproveedor_modelo($idproveedor);
		foreach ($consulta as $row2) {
			$std->estado = $row2['estadop'];
			$std->nombre = $row2['nombre'];
		}
		$json = json_encode($std);




		return $json;
	}

	public function obtener_medicamento_controlador()
	{
		$medicamento = medicamentoModelo::obtener_medicamento_modelo($_POST["idmedicamento"]);
		$std = new stdClass();
		foreach ($medicamento as $row) {
			$std->nombremed = $row['nombre_medicamento'];
			$std->presentacion = $row['presentacion_medicamento'];
			$std->contenido = $row['concentracion_medicamento'];
			$std->medidas = $row['unidad'];
			$std->administracion = $row['via_admin_medicamento'];
			$std->tipo = $row['tipo'];
			$std->stockmin = $row['stock_minimo_medicamento'];
		}

		$json = json_encode($std);




		return $json;
	}

	public function eliminar_medicamento_controlador()
	{


		$idmedicamento = mainModel::limpiar_cadena($_POST['idmedicamento']);


		$guardarEstado = medicamentoModelo::eliminar_medicamento_modelo($idmedicamento);

		if ($guardarEstado->rowCount() >= 1) {

			$consulta = mainModel::ejecutar_consulta_simple("SELECT *  FROM tmedicamento WHERE idmedicamento='$idmedicamento'");
			foreach ($consulta as $row) {
				$nombre = $row['nombre_medicamento'];
				$contenido = $row['concentracion_medicamento'];

				$unidad = $row['unidad'];
			}
			$textoestado = "Se dio de baja al medicamento";
			$textoerror = "No de pudo dar de baja";


			$alerta = [
				"Alerta" => "limpiarmedicamento",
				"Titulo" => $textoestado,
				"Texto" => " ",
				"Tipo" => "success",
				"form" => "formmed"
			];

			$fechaActual = date("Y-m-d H:i:s");



			$datosBitacora = [

				"fechahora" => $fechaActual,
				"accion" => "Elimino al medicamento con nombre " . $nombre . " " . $contenido . $unidad,
				"modulo" => "MEDICAMENTO",
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



	public function eliminar_inventariomed_controlador()
	{

		$idinventario = mainModel::limpiar_cadena($_POST['idinventario']);


		$guardarEstado = medicamentoModelo::eliminar_inventario_modelo($idinventario);

		if ($guardarEstado->rowCount() >= 1) {

			$consulta = mainModel::ejecutar_consulta_simple("SELECT*FROM
			tinventario_medicamento
			INNER JOIN tmedicamento ON tinventario_medicamento.idmedicamento = tmedicamento.idmedicamento 
			WHERE idreferencia_medicamento='$idinventario'");

			foreach ($consulta as $row) {
				$nombre = $row['nombre_medicamento'];
				$contenido = $row['concentracion_medicamento'];
				$cantidad = $row['cantidad_medicamento'];
				$unidad = $row['unidad'];
			}
			$textoestado = "Se dio de baja al medicamento";
			$textoerror = "No de pudo dar de baja";


			$alerta = [
				"Alerta" => "limpiarmedicamento",
				"Titulo" => $textoestado,
				"Texto" => " ",
				"Tipo" => "success",
				"form" => "formmed"
			];

			$fechaActual = date("Y-m-d H:i:s");



			$datosBitacora = [

				"fechahora" => $fechaActual,
				"accion" => "Elimino " . $cantidad . " unidades del inventario de " . $nombre . " " . $contenido . " " . $unidad,
				"modulo" => "MEDICAMENTO",
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

	public function selector_proveedor_controlador()
	{

		$conexion = mainModel::conectar();

		$datos = $conexion->query("SELECT * FROM tproveedor WHERE estadop =1");

		echo '<select id="proveedor" name="state" style="width: 275px" data-placeholder="buscar proveedor">
				<option value="" selected="">[eliga un proveedor]</option>';
		foreach ($datos as $row) {

			echo '<option value="' . $row['idproveedor'] . '">' . $row['nombre'] . '</option>';
		}
		echo '</select>';
	}

	public function selector_proveedor_controladorinv()
	{

		$conexion = mainModel::conectar();

		$datos = $conexion->query("SELECT * FROM tproveedor where estadop =1");

		echo '<select id="proveedormodinv" name="state" style="width: 275px" data-placeholder="buscar proveedor">
				<option value="" selected="">[eliga un proveedor]</option>';
		foreach ($datos as $row) {

			echo '<option value="' . $row['idproveedor'] . '">' . $row['nombre'] . '</option>';
		}
		echo '</select>';
	}


	public function agregar_medicamento_controlador()
	{




		$nombre = mainModel::limpiar_cadena($_POST['nombre']);
		$cantidad = mainModel::limpiar_cadena($_POST['cantidad']);
		$presentacion = mainModel::limpiar_cadena($_POST['presentacion']);
		$contenido = mainModel::limpiar_cadena($_POST['contenido']);
		$medidas = mainModel::limpiar_cadena($_POST['medidas']);
		$fechaingreso = mainModel::limpiar_cadena($_POST['fechaingreso']);
		$fechaingreso = str_replace("/", "-", $fechaingreso);
		$fechaingreso = date("Y-m-d", strtotime($fechaingreso));


		$fechavencimiento = mainModel::limpiar_cadena($_POST['fechavencimiento']);
		$fechavencimiento = str_replace("/", "-", $fechavencimiento);
		$fechavencimiento = date("Y-m-d", strtotime($fechavencimiento));

		$stock = mainModel::limpiar_cadena($_POST['stock']);
		$ubicacion = mainModel::limpiar_cadena($_POST['ubicacion']);
		$administracion = mainModel::limpiar_cadena($_POST['administracion']);

		$tipo = mainModel::limpiar_cadena($_POST['tipom']);
		$proveedor = mainModel::limpiar_cadena($_POST['proveedor']);


		$dataMED = [
			"nombre" => $nombre,
			"presentacion" => $presentacion,
			"administracion" => $administracion,
			"tipo" => $tipo,
			"contenido" => $contenido,
			"medidas" => $medidas,
			"stock" => $stock


		];






		$guardarMedicamento = medicamentoModelo::agregar_medicamento_modelo($dataMED);


		if ($guardarMedicamento->rowCount() == 1) {

			$id = mainModel::generar_codigo_medicamento();
			$dataINV = [
				"id" => $id,
				"cantidad" => $cantidad,
				"fechaingreso" => $fechaingreso,
				"idproveedor" => $proveedor,
				"fechavencimiento" => $fechavencimiento,
				"ubicacion" => $ubicacion

			];


			$guardarInventario = medicamentoModelo::agregar_inventario_modelo($dataINV);

			if ($guardarInventario->rowCount() == 1) {

				$alerta = [
					"Alerta" => "limpiarmedicamento",
					"Titulo" => "Medicamento Agregado con exito ",
					"Texto" => "",
					"Tipo" => "success",
					"form" => "formmed",
					"modal" => "modal-rgmedicamento"
				];

				$fechaActual = date("Y-m-d H:i:s");



				$datosBitacora = [

					"fechahora" => $fechaActual,
					"accion" => "Registro nuevo medicamento con nombre " . $nombre . " " . $contenido . $medidas . " " . $presentacion . " y " . $cantidad . " unidades",
					"modulo" => "MEDICAMENTO",
					"idusuario" => $_SESSION['idusuario_sbp']

				];

				$Abitacora = mainModel::guardar_bitacora($datosBitacora);
			} else {

				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrio un error",
					"Texto" => "No se ha podido registrar al medicamento",
					"Tipo" => "error"

				];
			}
		} else {

			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrio un error",
				"Texto" => "No se ha podido registrar al medicamento",
				"Tipo" => "error"

			];
		}

		return  mainModel::sweet_alert($alerta);
	}

	public function agregar_nuevoinventario_controlador()
	{



		$id = mainModel::limpiar_cadena($_POST['idmedicamento']);

		$fecha = mainModel::limpiar_cadena($_POST['fecha']);
		$fecha = str_replace("/", "-", $fecha);
		$fecha = date("Y-m-d", strtotime($fecha));

		$fechaingreso = date("Y-m-d");
		$ubicacion = mainModel::limpiar_cadena($_POST['ubicacion']);
		$cantidad = mainModel::limpiar_cadena($_POST['cantidad']);
		$proveedor = mainModel::limpiar_cadena($_POST['proveedor']);

		$dataAD = [
			"id" => $id,
			"fecha" => $fecha,
			"cantidad" => $cantidad,
			"proveedor" => $proveedor,
			"fechaingreso" => $fechaingreso,
			"ubicacion" => $ubicacion
		];

		$agregarInventario = medicamentoModelo::agregar_nuevoinventario_modelo($dataAD);

		if ($agregarInventario->rowCount() >= 1) {

			$consulta = mainModel::ejecutar_consulta_simple("SELECT *  FROM tmedicamento WHERE idmedicamento='$id'");
			foreach ($consulta as $row) {
				$nombre = $row['nombre_medicamento'];
				$contenido = $row['concentracion_medicamento'];

				$unidad = $row['unidad'];
			}

			$alerta = [
				"Alerta" => "limpiarmedicamento",
				"Titulo" => "Medicamento Agregado con exito ",
				"Texto" => "",
				"Tipo" => "success",
				"form" => "formmodinv",
				"modal" => "modal-modificarinv"
			];
			$fechaActual = date("Y-m-d H:i:s");



			$datosBitacora = [

				"fechahora" => $fechaActual,
				"accion" => "Registro " . $cantidad . " unidades de " . $nombre . " " . $contenido . $unidad,
				"modulo" => "MEDICAMENTO",
				"idusuario" => $_SESSION['idusuario_sbp']

			];

			$Abitacora = mainModel::guardar_bitacora($datosBitacora);
		} else {

			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Sin cambios",
				"Texto" => "",
				"Tipo" => "error"

			];
		}



		return  mainModel::sweet_alert($alerta);
	}



	public function paginador_medicamentos_controlador()
	{
		$busqueda = isset($_REQUEST["busqueda"]) ? $_REQUEST["busqueda"] : '';
		$porpagina = isset($_REQUEST["porpagina"]) ? $_REQUEST["porpagina"] : 10;
		$pagina = isset($_REQUEST["pagina"]) ? $_REQUEST["pagina"] : 1;

		if ($busqueda == '') {
			$consulta = mainModel::ejecutar_consulta_simple("SELECT * FROM tmedicamento WHERE tmedicamento.estado= 1");
		} else {
			$consulta = mainModel::ejecutar_consulta_simple("SELECT * FROM tmedicamento WHERE nombre_medicamento LIKE '%" . $busqueda . "%' AND  tmedicamento.estado= 1 
			OR presentacion_medicamento LIKE '%" . $busqueda . "%' AND  tmedicamento.estado= 1
			OR via_admin_medicamento LIKE '%" . $busqueda . "%' AND  tmedicamento.estado= 1
			OR tipo LIKE '%" . $busqueda . "%' AND  tmedicamento.estado= 1
			OR CONCAT(concentracion_medicamento,' ',unidad) LIKE '%" . $busqueda . "%' AND  tmedicamento.estado= 1");
		}


		$totalregistros = $consulta->rowCount();
		$totalpaginas = ceil($totalregistros / $porpagina);
		$desde = ($pagina - 1) * $porpagina;

		$conexion = mainModel::conectar();

		if ($busqueda == '') {
			$datos = $conexion->query("SELECT * FROM tmedicamento WHERE estado !=0 ORDER BY tmedicamento.idmedicamento DESC  LIMIT " . $desde . "," . $porpagina . "");
		} else {

			$datos = $conexion->query("SELECT * FROM tmedicamento WHERE nombre_medicamento LIKE '%" . $busqueda . "%' AND  tmedicamento.estado= 1 
			OR presentacion_medicamento LIKE '%" . $busqueda . "%' AND  tmedicamento.estado= 1 
			OR via_admin_medicamento LIKE '%" . $busqueda . "%' AND  tmedicamento.estado= 1
			OR tipo LIKE '%" . $busqueda . "%' AND  tmedicamento.estado= 1
			OR CONCAT(concentracion_medicamento,' ',unidad) LIKE '%" . $busqueda . "%' AND  tmedicamento.estado= 1
			 ORDER BY  tmedicamento.idmedicamento DESC  LIMIT " . $desde . "," . $porpagina . "");
		}



		echo '
		<span class="label label" style="background: #d77676;">BAJO EL STOCK MINIMO / VENCIDO</span>
		
		<table id="simple-table" class="table  table-bordered table-hover">
		<thead >
			<tr style="background:#ffff">
			<th class="detail-col"></th>
				<th class="detail-col" style="width: 20%;" >NOMBRE</th>
				<th>TOTAL</th>
				<th>PRESENTACIÓN</th>
				<th>TIPO</th>
				<th>ADMINISTRACIÓN</th>
				<th>CONTENIDO</th>
				<th class="hidden-480">ACCIÓN</th>

			</tr>
		</thead>
		<tbody style="background:#f5f5f5">';
		if ($datos->rowCount() == 0) {
			echo '<tr><td colspan="7" style="text-align:center">No se encontraron registros de medicamentos</td></tr>';
			echo '</tr></tbody></table>';
		} else {
			foreach ($datos as $row) {

				$id = $row['idmedicamento'];
				$total = medicamentoModelo::obtener_total_medicamentos($id);
				echo '
		
		
		<tr>
				<td class="center" >
					<div class="action-buttons">
						<a class="green bigger-140 show-details-btn "
							title="Mostrar Detalles">
							<i class="ace-icon fa fa-angle-double-down" ></i>
							<span class="sr-only">Details</span>
						</a>
					</div>
				</td>

				<td>
					<a href="#">' . $row['nombre_medicamento'] . '</a>
				</td>';

				foreach ($total as $t) {
					if ($t['cantidad'] <= $row['stock_minimo_medicamento'] && $t['cantidad'] != "") {
						echo
							'<td style="background-color:#d77676;color:#ffff;font-size: 15px">' . $t['cantidad'];
					} else {
						if ($t['cantidad']) {
							echo "<td>" . $t['cantidad'];
						} else {
							echo '<td style="background-color:#d77676;color:#ffff;font-size: 15px">0';
						}
					}
				}

				echo ' unidades </td>
				<td class="hidden-480">' . $row['presentacion_medicamento'] . '</td>
				<td>' . $row['tipo'] . '</td>
				<td>' . $row['via_admin_medicamento'] . '</td>

				<td class="hidden-480">
					<span>' . $row['concentracion_medicamento'] . ' ' . $row['unidad'] . '</span>
				</td>

				<td>
					<div class="hidden-sm hidden-xs btn-group">
					<a class="green tooltip-info" href="#"
					data-rel="tooltip"
					title="Modificar"  data-backdrop="static" data-keyboard="false" data-toggle="modal"
					data-target="#modal-modificarmedic" onclick="ExtraerDatosMod(' . $row['idmedicamento'] . ')">
					<i
						class="ace-icon fa fa-pencil bigger-180"></i>
					</a>

					<a class="red tooltip-info" href="#"
					data-rel="tooltip" title="Dar Baja" onclick= "eliminarmed(' . $row['idmedicamento'] . ')">
					<i
					class="ace-icon fa fa-arrow-down bigger-180"></i>
					</a>
					</div>

					<div class="hidden-md hidden-lg">
						<div class="inline pos-rel">
							<button class="btn btn-minier btn-primary dropdown-toggle"
								data-toggle="dropdown" data-position="auto">
								<i class="ace-icon fa fa-cog icon-only bigger-110"></i>
							</button>

							<ul
								class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
								<li>
									<a href="#" class="tooltip-info" data-rel="tooltip"
										title="View">
										<span class="blue">
											<i
												class="ace-icon fa fa-search-plus bigger-120"></i>
										</span>
									</a>
								</li>

								<li>
									<a href="#" class="tooltip-success"
										data-rel="tooltip" title="Edit">
										<span class="green">
											<i
												class="ace-icon fa fa-pencil-square-o bigger-120"></i>
										</span>
									</a>
								</li>

								<li>
									<a href="#" class="tooltip-error" data-rel="tooltip"
										title="Delete">
										<span class="red">
											<i
												class="ace-icon fa fa-trash-o bigger-120"></i>
										</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</td>
			</tr>


			<tr class="detail-row">
				<td colspan="8" style="background: #fff;">
					<div class="table-detail">
					
					<table id="simple-table" class="table  table-bordered table-hover">
					<thead>
						<tr style="background:#ffff">
							<th class="detail-col" style="width: 20%;" >FECHA DE INGRESO</th>
							<th style="width: 10%">FECHA DE VENCIMIENTO</th>
							<th>UBICACION</th>
							
							<th>CANTIDAD</th>
							<th>PROVEEDOR</th>
							<th class="hidden-480" style="width: 10%"><a class="dt-button buttons-collection buttons-colvis btn btn-white btn-primary btn-bold" aria-controls="dynamic-table" data-original-title="" title="" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#modal-modificarinv" onclick="nuevoregistro(' . $row['idmedicamento'] . ')">
							<span>
							<img src="';
				echo SERVERURL;
				echo 'vistas/btn-nuevo.png" style="width: 30px;height: 30px;">&nbsp;Agregar</span>
						</span></a></th>
			
						</tr>
					</thead>
					<tbody>';


				$id = $row['idmedicamento'];
				$datos2 = $conexion->query("SELECT
					tproveedor.nombre as nombrep,
					tinventario_medicamento.idreferencia_medicamento as referencia,
					DATE_FORMAT(tinventario_medicamento.fecha_ingreso_medicamento, '%d/%m/%Y') as ingreso,
					tinventario_medicamento.cantidad_medicamento as cantidad,
					DATE_FORMAT(tinventario_medicamento.fecha_vencim_medicamento, '%d/%m/%Y') as fechav,
					tinventario_medicamento.idmedicamento as idmedicamento,
					tinventario_medicamento.ubicacion as ubicacion
					FROM
					tproveedor
					INNER JOIN tinventario_medicamento ON tinventario_medicamento.idproveedor = tproveedor.idproveedor WHERE idmedicamento =$id and estado!=0
					
					 ");


				foreach ($datos2 as $row2) {

					echo '
					
					
					<tr style="background:#ffff">

			
							<td>
								<a href="#">' . $row2['ingreso'] . '</a>
							</td>';
					$fecha = str_replace("/", "-", $row2['fechav']);
					$fecha = date("Y-m-d", strtotime($fecha));
					$fecha = str_replace("-", "", $fecha);
					$actual = date("Y") . date("m") . date("d");
					if ($fecha <= $actual) {
						echo '
							<td style="background-color:#d77676;color:#ffff;font-size: 15px">' . $row2['fechav'] . '</td>';
					}else{
						echo'<td>' . $row2['fechav'] . '</td>';
						
					}

					echo '<td>' . $row2['ubicacion'] . '</td>
							<td>' . $row2['cantidad'] . ' unidades</td>
							<td>' . $row2['nombrep'] . '</td>
			
						
			
							<td>
								<div class="hidden-sm hidden-xs btn-group">
								<a class="green tooltip-info" href="#"
								data-rel="tooltip"
								title="Modificar"  data-backdrop="static" data-keyboard="false" data-toggle="modal"
								data-target="#modal-modificarinv" onclick="ExtraerDatosinv(' . $row2['referencia'] . ')">
								<i
									class="ace-icon fa fa-pencil bigger-180"></i>
							</a>
			
							<a class="red tooltip-info" href="#"
							data-rel="tooltip" title="Dar Baja" onclick= "eliminar(' . $row2['referencia'] . ')">
							<i
								class="ace-icon fa fa-arrow-down bigger-180"></i>
						</a>
								</div>
			
								<div class="hidden-md hidden-lg">
									<div class="inline pos-rel">
										<button class="btn btn-minier btn-primary dropdown-toggle"
											data-toggle="dropdown" data-position="auto">
											<i class="ace-icon fa fa-cog icon-only bigger-110"></i>
										</button>
			
										<ul
											class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
											<li>
												<a href="#" class="tooltip-info" data-rel="tooltip"
													title="View">
													<span class="blue">
														<i
															class="ace-icon fa fa-search-plus bigger-120"></i>
													</span>
												</a>
											</li>
			
											<li>
												<a href="#" class="tooltip-success"
													data-rel="tooltip" title="Edit">
													<span class="green">
														<i
															class="ace-icon fa fa-pencil-square-o bigger-120"></i>
													</span>
												</a>
											</li>
			
											<li>
												<a href="#" class="tooltip-error" data-rel="tooltip"
													title="Delete">
													<span class="red">
														<i
															class="ace-icon fa fa-trash-o bigger-120"></i>
													</span>
												</a>
											</li>
										</ul>
									</div>
								</div>
							</td>
						</tr>
			
			
						<tr class="detail-row">
							<td colspan="8">
								<div class="table-detail">
								
								</div>
							</td>
						</tr>
			
			
			
			';
				}

				echo '</tbody>
				</table>
			';


				echo '</div>
				</td>
			</tr>



';
			}



			echo '</tbody>
	</table>
';
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
</div>
<script type="text/javascript">
$(".show-details-btn").on("click", function(e) {
	e.preventDefault();
	$(this).closest("tr").next().toggleClass("open");
	$(this).find(ace.vars[".icon"]).toggleClass("fa-angle-double-down").toggleClass("fa-angle-double-up");
});
</script>';
		}
	}
}
