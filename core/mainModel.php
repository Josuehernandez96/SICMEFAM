<?php
if ($peticionAjax) {

	require_once "../core/configAPP.php";
} else {
	require_once "./core/configAPP.php";
}
class mainModel
{
	protected function conectar()
	{
		$enlace = new PDO(SGBD, USER, PASS);
		return $enlace;
	}
	protected function ejecutar_consulta_simple($consulta)
	{
		$respuesta = self::conectar()->prepare($consulta);
		$respuesta->execute();
		return $respuesta;
	}

	protected function generar_codigo_medicamento()
	{

		$codigo = "";
		$sql = self::conectar()->query("SELECT COUNT(*) AS correlativo FROM tmedicamento");
		foreach ($sql as $row) {
			$codigo = $row['correlativo'];
		}
		return $codigo;
	}



	protected function agregar_cuenta($datos)
	{
		$sql = self::conectar()->prepare("INSERT INTO cuenta(CuentaCodigo,CuentaPrivilegio,CuentaUsuario,CuentaClave,CuentaEmail,CuentaEstado,CuentaTipo,CuentaGenero,CuentaFoto) VALUES(:Codigo,:Privilegio,:Usuario,:Clave,:Email,:Estado,:Tipo,:Genero,:Foto)");
		$sql->bindparam(":Codigo", $datos['Codigo']);
		$sql->bindparam(":Privilegio", $datos['Privilegio']);
		$sql->bindparam(":Usuario", $datos['Usuario']);
		$sql->bindparam(":Clave", $datos['Clave']);
		$sql->bindparam(":Email", $datos['Email']);
		$sql->bindparam(":Estado", $datos['Estado']);
		$sql->bindparam(":Tipo", $datos['Tipo']);
		$sql->bindparam(":Genero", $datos['Genero']);
		$sql->bindparam(":Foto", $datos['Foto']);
		$sql->execute();
		return $sql;
	}

	protected function insertar_codigo_recuperacion_cuenta($datos)
	{
		$sql = self::conectar()->prepare("UPDATE `tabusuario` SET `contrasena` = :codigo WHERE `tabusuario`.`idusuario` = :idusuario; ");
		$sql->bindparam(":codigo", $datos['codigo']);
		$sql->bindparam(":idusuario", $datos['idusuario']);
		
		$sql->execute();
		return $sql->rowCount();
	}

	protected function eliminar_cuenta($codigo)
	{
		$sql = self::conectar()->prepare("DELETE FROM cuenta WHERE CuentaCodigo=:Codigo");
		$sql->bindparam(":Codigo", $codigo);
		$sql->execute();
		return $sql;
	}
	public function encryption($string)
	{
		$output = FALSE;
		$key = hash('sha256', SECRET_KEY);
		$iv = substr(hash('sha256', SECRET_IV), 0, 16);
		$output = openssl_encrypt($string, METHOD, $key, 0, $iv);
		$output = base64_encode($output);
		return $output;
	}

	protected function guardar_bitacora($datos)
	{
		$sql = self::conectar()->prepare("INSERT INTO `tabbitacora`
		 (`idbitacora`, `fecha_hora_accion`, `accion_bitacora`, `modulo_bitacora`, `idusuario`) 
		VALUES (NULL, :fechahora, :accion, :modulo, :idusuario);");

		$sql->bindparam(":fechahora", $datos['fechahora']);
		$sql->bindparam(":accion", $datos['accion']);
		$sql->bindparam(":modulo", $datos['modulo']);
		$sql->bindparam(":idusuario", $datos['idusuario']);
		$sql->execute();

		return $sql;
	}

	protected function actualizar_bitacora($codigo, $hora)
	{
		$sql = self::conectar()->prepare("UPDATE bitacora SET BitacoraHoraFinal=:Hora WHERE BitacoraCodigo=:Codigo");
		$sql->bindparam(":Hora", $hora);
		$sql->bindparam(":Codigo", $codigo);
		$sql->execute();
		return $sql;
	}

	protected function eliminar_bitacora($codigo)
	{
		$sql = self::conectar()->prepare("DELETE FROM bitacora WHERE CuentaCodigo=:Codigo");
		$sql->bindparam(":Codigo", $codigo);
		$sql->execute();
		return $sql;
	}

	protected function decryption($string)
	{
		$key = hash('sha256', SECRET_KEY);
		$iv = substr(hash('sha256', SECRET_IV), 0, 16);
		$output = openssl_decrypt(base64_decode($string), METHOD, $key, 0, $iv);
		return $output;
	}

	protected function generar_codigo_aleatorio($letra, $longitud, $num)
	{
		for ($i = 1; $i <= $longitud; $i++) {
			$numero = rand(0, 9);
			$letra .= $numero;
		}
		return $letra . $num;
	}


	protected function generar_expediente_clinico($letranombre, $letraapellido)
	{

		$nexpediente = "";
		$sql = self::conectar()->query("SELECT COUNT(*)+1 AS correlativo FROM tpaciente");
		foreach ($sql as $row) {
			if ($row["correlativo"] < 10) {
				$nexpediente = $letranombre . $letraapellido . '00' . $row['correlativo'];
			}
			if ($row["correlativo"] > 10 || $row["correlativo"] < 100) {
				$nexpediente = $letranombre . $letraapellido . '0' . $row['correlativo'];
			}
		}
		return $nexpediente;
	}


	protected function obtener_identificador_clinico($n_expediente)
	{

		$identificador = "";
		$sql = self::conectar()->query("SELECT idpaciente as id_expediente FROM tpaciente WHERE n_expediente='" . $n_expediente . "' ");
		foreach ($sql as $row) {
			$identificador = $row['id_expediente'];
		}
		return $identificador;
	}



	protected function limpiar_cadena($cadena)
	{
		$cadena = trim($cadena);
		$cadena = stripcslashes($cadena);
		$cadena = str_ireplace("<script>", "", $cadena);
		$cadena = str_ireplace("</script>", "", $cadena);
		$cadena = str_ireplace("<script src", "", $cadena);
		$cadena = str_ireplace("<script type", "", $cadena);
		$cadena = str_ireplace("SELECT * FROM", "", $cadena);
		$cadena = str_ireplace("DELETE * FROM", "", $cadena);
		$cadena = str_ireplace("INSERT INTO", "", $cadena);
		$cadena = str_ireplace("--", "", $cadena);
		$cadena = str_ireplace("^", "", $cadena);
		$cadena = str_ireplace("[", "", $cadena);
		$cadena = str_ireplace("]", "", $cadena);
		$cadena = str_ireplace("==", "", $cadena);
		$cadena = str_ireplace(";", "", $cadena);
		return $cadena;
	}

	protected function sweet_alert($datos)
	{
		if ($datos['Alerta'] == "simple") {
			$alerta = "
					<script>
					error=1;
					swal(
					  '" . $datos['Titulo'] . "',
					  '" . $datos['Texto'] . "',
					  '" . $datos['Tipo'] . "',
					  );
					</script>
				";
		} elseif ($datos['Alerta'] == "recargar") {
			$alerta = "
					<script>
						swal({
							title: '" . $datos['Titulo'] . "',
							text: '" . $datos['Texto'] . "',
							type: '" . $datos['Tipo'] . "',
							confirmButtonText:'Aceptar',
							confirmButtonColor: '#2aa5a5'
							}).then(function(){
								location.reload();
							});
					</script> 
				";
		} elseif ($datos['Alerta'] == "limpiar") {
			$alerta = "
					<script>
					cancelar();
						swal({
							title: '" . $datos['Titulo'] . "',
							text: '" . $datos['Texto'] . "',
							type: '" . $datos['Tipo'] . "',
							confirmButtonText:'Aceptar',
							confirmButtonColor: '#2aa5a5'
							}).then(function(){
							});
					</script> 
				";
		} elseif ($datos['Alerta'] == "limpiarcita") {
			$alerta = "
					<script>

					cancelar();
				

						swal({
							title: '" . $datos['Titulo'] . "',
							text: '" . $datos['Texto'] . "',
							type: '" . $datos['Tipo'] . "',
							confirmButtonText:'Aceptar',
							confirmButtonColor: '#2aa5a5'
							}).then(function(){
								
							});
					</script> 
				";
		} elseif ($datos['Alerta'] == "limpiarusuario") {
			$alerta = "
				<script>

				cancelar();
			 
					swal({
						title: '" . $datos['Titulo'] . "',
						text: '" . $datos['Texto'] . "',
						type: '" . $datos['Tipo'] . "',
						confirmButtonText:'Aceptar'
						}).then(function(){
							cancelar();
							$('#" . $datos["modal"] . "').modal('hide');
						
							
						});
				</script> 
			";
		} elseif ($datos['Alerta'] == "limpiarmedicamento") {
			$alerta = "
				<script>
			 
					swal({
						title: '" . $datos['Titulo'] . "',
						text: '" . $datos['Texto'] . "',
						type: '" . $datos['Tipo'] . "',
						confirmButtonText:'Aceptar'
						}).then(function(){
							cancelar();
							$('#" . $datos["modal"] . "').modal('hide');
							actualizar();
						});
				</script> 
			";
		}
		return $alerta;
	}
}
