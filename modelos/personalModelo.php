<?php 
	
	if($peticionAjax){

		require_once "../core/mainModel.php";
	}else{
		require_once "./core/mainModel.php";
	}

	class personalModelo extends mainModel{
		protected function agregar_personal_modelo($datos){
			$conexion = mainModel::conectar();
			$sql=$conexion->prepare("INSERT INTO `tpersonal`
			(`dui_personal`, `nombre_personal`, `apellido_personal`,
			 `telefono_personal`, `sexo`, `direccion`, `correo`, 
			 `fecha_ingreso`, `salario`, `cargo`)
			  VALUES (:dui_personal, :nombre_personal, :apellido_personal, :telefono_personal, :sexo,
			   :direccion, :correo, :fecha_ingreso, :salario, :cargo)");

			$sql->bindParam(":dui_personal",$datos['dui']);
			$sql->bindParam(":nombre_persona",$datos['nombre']);
			$sql->bindParam(":apellido_personal",$datos['apellido']);
			$sql->bindParam(":telefono_personal",$datos['telefono']);
			$sql->bindParam(":sexo",$datos['sexo']);
			$sql->bindParam(":direccion",$datos['direccion']);
			$sql->bindParam(":correo",$datos['correo']);
			$sql->bindParam(":fecha_ingreso",$datos['ingreso']);
			$sql->bindParam(":salario",$datos['salario']);
			$sql->bindParam(":cargo",$datos['cargo']);
			$sql->execute();

			

			session_start(['name' => 'SBP']);
						
		    $_SESSION["idpersonal"]=$conexion->lastInsertId();

			
			
               
			return $sql;
		}

		protected function modificar_personal_modelo($datos){
		
			$sql=mainModel::conectar()->prepare("UPDATE `tpersonal` SET 
			`dui_personal` = :dui_personal
			, `nombre_personal` = :nombre_personal
			, `apellido_personal` = :apellido_personal
			, `telefono_personal` = :telefono_personal
			, `sexo` = :sexo
			, `direccion` = :direccion
			, `correo` = :correo
			, `fecha_ingreso` = :fecha_ingreso
			, `salario` = :salario
			, `cargo` = :cargo WHERE `tpersonal`.`idpersonal` = :idpersonal; ");

			$sql->bindParam(":idpersonal",$datos['idpersonal']);
			$sql->bindParam(":dui_personal",$datos['dui']);
			$sql->bindParam(":nombre_personal",$datos['nombre']);
			$sql->bindParam(":apellido_personal",$datos['apellido']);
			$sql->bindParam(":telefono_personal",$datos['telefono']);
			$sql->bindParam(":sexo",$datos['sexo']);
			$sql->bindParam(":direccion",$datos['direccion']);
			$sql->bindParam(":correo",$datos['correo']);
			$sql->bindParam(":fecha_ingreso",$datos['ingreso']);
			$sql->bindParam(":salario",$datos['salario']);
			$sql->bindParam(":cargo",$datos['cargo']);
			$sql->execute();
			
               
			return $sql;
		}

	/*	protected function agregar_responsable_modelo($datos){
		
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
*/
		protected function cambiar_estado_personal_modelo($datos){
		
			$sql=mainModel::conectar()->prepare("UPDATE `tpersonal` SET `estado` = :estado WHERE `tpersonal`.`idpersonal` = :idpersonal;");


			$sql->bindParam(":idpersonal",$datos['idpersonal']);
			$sql->bindParam(":estado",$datos['estado']);
			
			$sql->execute();
			
               
			return $sql;
		}


		protected function obtener_personal_modelo($idpersonal){
		
			$sql=mainModel::ejecutar_consulta_simple("SELECT * FROM tpersonal where idpersonal=".$idpersonal."");
			
			return $sql;
		}

		protected function obtener_responsable_modelo($idpersonal){
		
			$sql=mainModel::ejecutar_consulta_simple("SELECT * FROM tresponsable where idpersonal=".$idpersonal."");
			
			return $sql;
		}


	/*	protected function modificar_responsable_modelo($datos){
		
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



		

*/

		
	}