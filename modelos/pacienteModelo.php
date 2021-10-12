<?php 
	
	if($peticionAjax){

		require_once "../core/mainModel.php";
	}else{
		require_once "./core/mainModel.php";
	}

	class pacienteModelo extends mainModel{
		protected function agregar_paciente_modelo($datos){
			$conexion = mainModel::conectar();
			$sql=$conexion->prepare("INSERT INTO `tpaciente`
			(`n_expediente`, `nombre_paciente`, `apellido_paciente`, `sexo_paciente`,
			 `fecha_nacimiento`, `dui_paciente`, `correo_paciente`, `telefonop_paciente`, 
			 `telefonos_paciente`, `direccion_paciente`, `estado`)
			  VALUES (:n_expediente, :nombre_paciente, :apellido_paciente, :sexo_paciente, :fecha_nacimiento, :dui_paciente,
			   :correo_paciente, :telefonop_paciente, :telefonos_paciente, :direccion_paciente, 1)");

			$sql->bindParam(":n_expediente",$datos['n_expediente']);
			$sql->bindParam(":nombre_paciente",$datos['nombre']);
			$sql->bindParam(":apellido_paciente",$datos['apellido']);
			$sql->bindParam(":sexo_paciente",$datos['sexo']);
			$sql->bindParam(":fecha_nacimiento",$datos['fecha']);
			$sql->bindParam(":dui_paciente",$datos['dui']);
			$sql->bindParam(":correo_paciente",$datos['correo']);
			$sql->bindParam(":telefonop_paciente",$datos['telefonop']);
			$sql->bindParam(":telefonos_paciente",$datos['telefonos']);
			$sql->bindParam(":direccion_paciente",$datos['direccion']);
			$sql->bindParam(":correo_paciente",$datos['correo']);
			$sql->execute();

			

			session_start(['name' => 'SBP']);
						
		    $_SESSION["idpaciente"]=$conexion->lastInsertId();

			
			
               
			return $sql;
		}

		protected function modificar_paciente_modelo($datos){
		
			$sql=mainModel::conectar()->prepare("UPDATE `tpaciente` SET 
			`nombre_paciente` = :nombre_paciente
			, `apellido_paciente` = :apellido_paciente
			, `sexo_paciente` = :sexo_paciente
			, `fecha_nacimiento` = :fecha_nacimiento
			, `dui_paciente` = :dui_paciente
			, `correo_paciente` = :correo_paciente
			, `telefonop_paciente` = :telefonop_paciente
			, `telefonos_paciente` = :telefonos_paciente
			, `direccion_paciente` = :direccion_paciente WHERE `tpaciente`.`idpaciente` = :idpaciente; ");

			$sql->bindParam(":idpaciente",$datos['idpaciente']);
			$sql->bindParam(":nombre_paciente",$datos['nombre']);
			$sql->bindParam(":apellido_paciente",$datos['apellido']);
			$sql->bindParam(":sexo_paciente",$datos['sexo']);
			$sql->bindParam(":fecha_nacimiento",$datos['fecha']);
			$sql->bindParam(":dui_paciente",$datos['dui']);
			$sql->bindParam(":correo_paciente",$datos['correo']);
			$sql->bindParam(":telefonop_paciente",$datos['telefonop']);
			$sql->bindParam(":telefonos_paciente",$datos['telefonos']);
			$sql->bindParam(":direccion_paciente",$datos['direccion']);
			$sql->bindParam(":correo_paciente",$datos['correo']);
			$sql->execute();
			
               
			return $sql;
		}

		protected function agregar_responsable_modelo($datos){
		
			$sql=mainModel::conectar()->prepare("INSERT INTO `tresponsable` (`idresponsable`, `nombre_responsable`, `apellido_responsable`, `relacion_responsable`, `dui_responsable`, `telefonoP_responsable`, `telefonoS_responsable`, `idpaciente`) 
			VALUES (NULL, :resnombre, :resapellido, :resrelacion, :resdui, :restelefonop, :restelefonos, :idpaciente);");

			$sql->bindParam(":resnombre",$datos['resnombre']);
			$sql->bindParam(":resapellido",$datos['resapellido']);
			$sql->bindParam(":resrelacion",$datos['resrelacion']);
			$sql->bindParam(":resdui",$datos['resdui']);
			$sql->bindParam(":restelefonop",$datos['restelefonop']);
			$sql->bindParam(":restelefonos",$datos['restelefonos']);
			$sql->bindParam(":idpaciente",$datos['idpaciente']);
			$sql->execute();
			
               
			return $sql;
		}

		protected function cambiar_estado_paciente_modelo($datos){
		
			$sql=mainModel::conectar()->prepare("UPDATE `tpaciente` SET `estado` = :estado WHERE `tpaciente`.`idpaciente` = :idpaciente;");


			$sql->bindParam(":idpaciente",$datos['idpaciente']);
			$sql->bindParam(":estado",$datos['estado']);
			
			$sql->execute();
			
               
			return $sql;
		}


		protected function obtener_paciente_modelo($idpaciente){
		
			$sql=mainModel::ejecutar_consulta_simple("SELECT * FROM tpaciente where idpaciente=".$idpaciente."");
			
			return $sql;
		}

		protected function obtener_responsable_modelo($idpaciente){
		
			$sql=mainModel::ejecutar_consulta_simple("SELECT * FROM tresponsable where idpaciente=".$idpaciente."");
			
			return $sql;
		}


		protected function modificar_responsable_modelo($datos){
		
			$sql=mainModel::conectar()->prepare("UPDATE `tresponsable` SET `nombre_responsable` = :resnombre
			, `apellido_responsable` = :resapellido, `relacion_responsable` = :resrelacion, 
			`dui_responsable` = :resdui, `telefonoP_responsable` = :restelefonop,
			 `telefonoS_responsable` = :restelefonos WHERE `tresponsable`.`idpaciente` = :idpaciente;  ");

			
			$sql->bindParam(":resnombre",$datos['resnombre']);
			$sql->bindParam(":resapellido",$datos['resapellido']);
			$sql->bindParam(":resdui",$datos['resdui']);
			$sql->bindParam(":resrelacion",$datos['resrelacion']);
			$sql->bindParam(":restelefonop",$datos['restelefonop']);
			$sql->bindParam(":restelefonos",$datos['restelefonos']);
			$sql->bindParam(":idpaciente",$datos['idpaciente']);
			$sql->execute();
			
               
			return $sql;
		}



		



		
	}