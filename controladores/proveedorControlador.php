<?php
if ($peticionAjax) {
	require_once "../modelos/proveedorModelo.php";
} else {
	require_once "./modelos/proveedorModelo.php";
}

class proveedorControlador extends proveedorModelo
{

	//Controlador para agregar proveedor
	public function eliminar_proveedor_controlador()
	{
		$idproveedor = mainModel::limpiar_cadena($_POST['idproveedor']);

		$dataAD = [
			"idproveedor" => $idproveedor
		];

		$guardarEstadop = proveedorModelo::eliminar_proveedor_modelo($dataAD);

		if ($guardarEstadop->rowCount() >= 1) {


			$consulta = mainModel::ejecutar_consulta_simple("SELECT nombre FROM tproveedor WHERE idproveedor='$idproveedor'");
			foreach ($consulta as $row) {
				$nombreu = $row['nombre'];
			}
			$textoestadop = "Se dio de baja al proveedor";
			$textoerror = "No de pudo dar de baja";


			$alerta = [
				"Alerta" => "limpiarusuario",
				"Titulo" => $textoestadop,
				"Texto" => $nombreu,
				"Tipo" => "success",
				"form" => "formpro"
			];
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
	//Controlador para agregar proveedor
	public function agregar_proveedor_controlador()
	{
		$contacto = mainModel::limpiar_cadena($_POST['contacto']);
		$nombre = mainModel::limpiar_cadena($_POST['nombre']);
		$telefono = mainModel::limpiar_cadena($_POST['telefono']);
	
		$dataProv = [
			"contacto" => $contacto,
			"nombre" => $nombre,
			"telefono" => $telefono
		];

		$consulta2 = mainModel::ejecutar_consulta_simple("
			SELECT nombre FROM tproveedor WHERE nombre='$nombre' AND estadop=1");
		$ec = $consulta2->rowCount();
		if ($ec >= 1) {

			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "proveedor ya existe",
				"Texto" => "Cambie el nombre de proveedor",
				"Tipo" => "error"

			];
		} else {

			$consulta3 = mainModel::ejecutar_consulta_simple("
			SELECT telefono FROM tproveedor WHERE telefono='$telefono'AND estadop=1");
			$ec = $consulta3->rowCount();
			if ($ec >= 1) {

				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "telefono ya existe",
					"Texto" => "Cambie el telefono",
					"Tipo" => "error"

				];
			} else {
				$guardarproveedor = proveedorModelo::agregar_proveedor_modelo($dataProv);


				if ($guardarproveedor->rowCount() == 1) {

					$alerta = [
						"Alerta" => "limpiarusuario",
						"Titulo" => "proveedor Registrado con exito ",
						"Texto" => "",
						"Tipo" => "success",
						"form" => "formpro",
						"modal" => "modal-rgproveedor"
					];

				} else {

					$alerta = [
						"Alerta" => "simple",
						"Titulo" => "Ocurrio un error",
						"Texto" => "No se ha podido registrar al proveedor",
						"Tipo" => "error"

					];
				}
			}
		}



		return  mainModel::sweet_alert($alerta);
	}

	//Controlador para paginar proveedor
	public function paginador_proveedor_controlador()
	{

		$busquedap = isset($_REQUEST["busquedap"]) ? $_REQUEST["busquedap"] : '';

		$porpaginap = isset($_REQUEST["porpaginap"]) ? $_REQUEST["porpaginap"] : 10;

		$paginap = isset($_REQUEST["paginap"]) ? $_REQUEST["paginap"] : 1;

		if ($busquedap == '') {

			$consulta = mainModel::ejecutar_consulta_simple("SELECT * FROM tproveedor WHERE tproveedor.estadop= 1  ");
		} else {

			$consulta = mainModel::ejecutar_consulta_simple("SELECT * FROM tproveedor WHERE nombre LIKE '%" . $busquedap . "%' AND  tproveedor.estadop=1 
            OR tproveedor.contacto LIKE '%" . $busquedap . "%' AND tproveedor.estadop=1 ");
		}


		$totalregistros = $consulta->rowCount();
		$totalpaginas = ceil($totalregistros / $porpaginap);
		$desde = ($paginap - 1) * $porpaginap;


		$conexion = mainModel::conectar();


		if ($busquedap == '') {

			$datos = $conexion->query("SELECT * FROM tproveedor WHERE estadop =1 ORDER BY tproveedor.idproveedor DESC  LIMIT " . $desde . "," . $porpaginap . "");
		} else {

			$datos = $conexion->query("SELECT * FROM tproveedor WHERE nombre LIKE '%" . $busquedap . "%' AND  tproveedor.estadop= 1 
			OR contacto LIKE '%" . $busquedap . "%' AND  tproveedor.estadop= 1 
			ORDER BY  tproveedor.idproveedor DESC  LIMIT " . $desde . "," . $porpaginap . "");
		}


		echo '<table id=dynamic-tablep
						class="table table-striped table-bordered table-hover" 
							dataTable no-footer" role="grid">';

		echo '<thead>
					<tr role="row" style="background: #ffff">
					<th style="width: 15%"><strong>PROVEEDOR</strong></th>
					<th style="width: 50%"><strong>NOMBRE CONTACTO</strong></th>
					<td style="width: 1%"><strong>TELEFONO</strong></td>
					<th style="width: 10%"><strong>ACCIÓN</strong></th>
			</tr>
				</thead>
				  
				<tbody>';
		if ($datos->rowCount() == 0) {
			echo '<tr><td colspan="4" style="text-align:center">No se encontraron registros de proveedors</td></tr>';
			echo '</tr></tbody></table>';
		} else {

			foreach ($datos as $row) {

				echo  '<tr role="row" class="odd active">';
				echo  '<td>' . $row['nombre'] . '</td>';

				echo '<td>' . $row['contacto'] . '</td>
					<td style="text-align:center">' . $row['telefono'] . '</td>
							  
					  ';

				echo '<td>
					  <div
					  class="hidden-sm hidden-xs action-buttons"> 
					  ';

					echo "<a class='red tooltip-info' href='#'
						data-rel='tooltip' title='Dar Baja' onclick=cambiarestadop(" . $row['idproveedor'] . ")>
						<i
							class='ace-icon fa fa-arrow-down bigger-180'></i>
					</a>";
				

				echo ' </div></td>';
			}

			echo '</tr></tbody></table>';

			echo '<div class="row tab-content" >
			<div class="col-xs-6">
				';

			if ($totalregistros < $porpaginap) {
				echo '<div class="dataTables_info" id="dynamic-table_infop" role="status" aria-live="polite">
					Mostrando 1 a ' . $totalregistros . ' de ' . $totalregistros . ' registros
				</div>';
			} else {
				echo '<div class="dataTables_info" id="dynamic-table_infop" role="status" aria-live="polite">
					Mostrando 1 a ' . $porpaginap . ' de ' . $totalregistros . ' registros
				</div>';
			}

			echo '</div>';

			echo '
			<div class="col-xs-6">
            <div class="dataTables_paginate paging_simple_numbers" id="dynamic-table_paginatep">
			<ul class="pagination">';

			if ($paginap != 1)
				echo '<li class="paginate_button previous " onclick="paginadorp(' . ($paginap - 1) . ')" aria-controls="dynamic-table" tabindex="0" id="dynamic-table_previousp">
            <a href="#">Previos</a>
			</li>';

			for ($i = 1; $i <= $totalpaginas; $i++) {
				if ($i == $paginap) {
					echo '<li class="paginate_button active disabled" onclick="paginadorp(' . $i . ')" aria-controls="dynamic-table" tabindex="0"><a href="#">' . $i . '</a>
				</li>';
				} else {
					echo '<li class="paginate_button " style="cursor:pointer" onclick="paginadorp(' . $i . ')" aria-controls="dynamic-table" tabindex="0"><a href="#">' . $i . '</a>
				</li>';
				}
			}


			if ($paginap != $totalpaginas) {
				echo '<li class="paginate_button next" onclick="paginadorp(' . ($paginap + 1) . ')" aria-controls="dynamic-table" tabindex="0" 
			id="dynamic-table_nextp"><a>Siguiente</a>
			</li>';
			}

			echo '</ul>
            </div>
            </div>
		</div>';
		}
	}
}
