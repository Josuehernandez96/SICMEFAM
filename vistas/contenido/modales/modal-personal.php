 <!--Modal para registrar informacion de personal nuevo -->

 <div id="modal-rgpersonal" class="modal fade" tabindex="-1">
     <div class="modal-dialog" style="width: 70%">
	 <div class="modal-content">
	     <div class="modal-header no-padding">
		 <div class="table-header" style="background: #0494AD">
		     <button type="button" class="close" data-dismiss="modal" onclick="cancelar()" aria-hidden="true">
			 <span class="white">&times;</span>
		     </button>
		     <strong id="texto"><i class="fa fa-user"></i> Nuevo Personal</strong>
		 </div>
	     </div>

	     <div class="modal-body no-padding" style="background: #fcf8e3">

		 <form id="formpac" name="formper" data-form="save" action="<?php echo SERVERURL ?>/ajax/personalAjax.php" method="POST">

		     <div class="col-sm-12" style="margin-top: 10px">

			 <div class="contenedor" id="perscrool" style="height:340px;overflow-y: auto;">

			     <div id="home" class="">

				 <h3 class="header smaller lighter default">
				     <font style="vertical-align: inherit;">
					 <font style="vertical-align: inherit;"><strong>Datos Generales</strong><a class="pull-right" style="font-size:13px;margin-right:10px">  Datos Obligatorios</a></font>
				     </font>
				 </h3>
				 <div class="well">
				     <div class="row">
					 <div class="form-group col-lg-6">
					     <label for="pernombre">Nombre(s) <a></a></label>
					     <input type="text" class="form-control" name="pernombre" id="pernombre" max="40" placeholder="" onkeypress="return soloLetras(event)" />
					     <div id="pernombre-error" style="display:none;color:red" class="help-block "></div>
					 </div>

					 <div class="form-group col-lg-6">
					     <label for="perapellido">Apellido(s) <a></a></label>
					     <input type="text" class="form-control" id="perapellido" placeholder="" onkeypress="return soloLetras(event)" />
					     <div id="perapellido-error" style="display:none;color:red" class="help-block"></div>
					 </div>
				     </div>

				     <div class="row">

					 <div class="form-group col-lg-6">
					     <label for="persexo"><i class="fa fa-male bigger-110"></i> Sexo <a></a></label>
					     <select class="form-control " id="persexo">
						 <option value=""> Seleccionar sexo</option>
						 <option value="M">Masculino</option>
						 <option value="F">Femenino</option>
					     </select>
					     <div id="persexo-error" style="color:red" class="help-block"></div>

					 </div>

					 <div class="form-group col-lg-6">
					     <label for="pacfecha"><i class="fa fa-calendar bigger-110"></i> Fecha de Nacimiento <a></a></label>
					     <input class="form-control date-picker input-mask-date" id="pacfecha" type="text" data-date-format="dd/mm/yyyy">
					     <div id="pacfecha-error" style="color:red" class="help-block"></div>
					 </div>

				     </div>

				     <input type="hidden" id="fechaactual" value="<?php
										    $fecha = date('d-m-Y');
										    $nuevafecha = strtotime('-6 year', strtotime($fecha));
										    $nuevafecha = date('d-m-Y', $nuevafecha);

										    echo $nuevafecha;

										    ?>" />

				     <input type="hidden" id="actual" value="<?php
										$fecha = date('Y');
										echo $fecha;

										?>" />
				     <input type="hidden" id="pacid" />
				     <div class="row">

					 <div class="form-group col-lg-6">
					     <label for="pacdui"><i class="fa fa-credit-card bigger-110"></i>DUI</label>
					     <input type="text" class="form-control dui" id="pacdui" name="pacdui" placeholder="" />
					 </div>

					 <div class="form-group col-lg-6">
					     <label for="paccorreo"><i class="ace-icon fa fa-envelope"></i> Email </label>
					     <input type="text" class="form-control" id="paccorreo" name="paccorreo" placeholder="" onkeypress="caracteresCorreoValido()" />
					     <div id="paccorreo-error" style="color:red" class="help-block"></div>
					 </div>
				     </div>
				     <div class="row">
					 <div class="form-group col-lg-6">
					     <label for="pactelefonop"><i class="ace-icon fa fa-phone"></i> Teléfono </label>
					     <input class="form-control  telefono" type="text" id="pactelefonop" name="pactelefonop" />
					 </div>
					 <div class="form-group col-lg-6">
					     <label for="pacdireccion"><i class="ace-icon fa fa-home"></i>Direccion</label>
					     <input type="text" class="form-control" id="pacdireccion" name="pacdireccion" placeholder="" />
					 </div>

					 
				     </div>
				    
				 </div>

			 </div>
		     </div>
		 </form>
	     </div>

	     <!-- /.PIE DE VENTANA EMERGENTE -->

	     <div class="modal-footer no-margin-top ">


		 <button class="btn btn-primary btn-white btn-round pull-left " style="margin-top: 10px;color:#2aa5a5" id="btnguardar">

		     <img src="<?php echo SERVERURL . "vistas/" ?>comprobado.png" style="width: 30px;height: 30px"> <strong>Guardar</strong>

		 </button>

		 <button class="btn btn-primary btn-white btn-round pull-left " style="margin-top: 10px;color:#2aa5a5;" id="btneditar">

		     <img src="<?php echo SERVERURL . "vistas/" ?>btn-agregar.png" style="width: 30px;height: 30px"> <strong>Guardar Cambios</strong>

		 </button>


		 <button class=" btn btn-danger btn-white btn-round pull-left" onclick="cancelar()" style="margin-top: 10px;color:#2aa5a5" data-dismiss="modal">

		     <img src="<?php echo SERVERURL . "vistas/" ?>cancelar.png" style="width: 30px;height: 30px;"><strong> Cancelar
		     </strong>
		 </button>


		 <button class="btn btn-danger   pull-rigth " style="margin-top: 10px;;margin-rigth:25px;color:#2aa5a5;visibility: hidden" id="alerta">

		     <strong><i class="fa fa-warning"></i> Completar los campos obligatorios</strong>

		 </button>


	     </div>

	 </div>


     </div>
 </div>