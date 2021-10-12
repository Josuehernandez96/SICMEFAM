 <!--Modal para registrar informacion de pacientes nuevo -->

 <div id="modal-rgpaciente" class="modal fade" tabindex="-1">
     <div class="modal-dialog" style="width: 65%">
         <div class="modal-content">
             <div class="modal-header no-padding">
                 <div class="table-header" style="background:       #0494AD;">
                     <button type="button" class="close" data-dismiss="modal" onclick="cancelar()" aria-hidden="true">
                         <span class="white">&times;</span>
                     </button>
                     <strong id="texto"><i class="fa fa-user"></i> Nuevo Paciente</strong>
                 </div>
             </div>

             <div class="modal-body no-padding" style="background: #FAEBD7">

                 <form id="formpac" name="formpac" data-form="save" action="<?php echo SERVERURL ?>/ajax/pacienteAjax.php" method="POST">

                     <div class="col-sm-12" style="margin-top: 10px">

                         <div class="contenedor" id="pacscrool" style="height:450px;overflow-y: auto;">

                             <div id="home" class="">

                                 <h3 class="header smaller lighter default">

                     <img src="<?php echo SERVERURL . "vistas/" ?>informacion-personal.png" style="width: 30px;height: 30px">

                
                                     <font style="vertical-align: inherit;">
                                         <font style="font-size:15px;  inherit;im"><strong>Datos Generales</strong><a class="pull-right" style="font-size:10px;margin-right:10px"> * Datos Obligatorios</a></font>
                                     </font>
                                 </h3>
                                 <div class="well">
                                     <div class="row">
                                         <div class="form-group col-lg-6">
                                             <label for="pacnombre">Nombre(s) <a>*</a></label>
                                             <input type="text" class="form-control" name="pacnombre" id="pacnombre" max="40" placeholder="" onkeypress="return soloLetras(event)" />
                                             <div id="pacnombre-error" style="display:none;color:red" class="help-block "></div>
                                         </div>

                                         <div class="form-group col-lg-6">
                                             <label for="pacapellido">Apellido(s) <a>*</a></label>
                                             <input type="text" class="form-control" id="pacapellido" placeholder="" onkeypress="return soloLetras(event)" />
                                             <div id="pacapellido-error" style="display:none;color:red" class="help-block"></div>
                                         </div>
                                     </div>

                                     <div class="row">

                                         <div class="form-group col-lg-6">
                                             <label for="pacsexo"></i> Sexo <a>*</a></label>
                                             <select class="form-control " id="pacsexo">
                                                 <option value=""> Seleccionar sexo</option>
                                                 <option value="M">Masculino</option>
                                                 <option value="F">Femenino</option>
                                             </select>
                                             <div id="pacsexo-error" style="color:red" class="help-block"></div>

                                         </div>

                                         <div class="form-group col-lg-6">

                                             <label for="pacfecha"></i> Fecha de Nacimiento <a>*</a></label>
                                             <input class="form-control date-picker input-mask-date" id="pacfecha" type="text" data-date-format="dd/mm/yyyy">
                                             <div id="pacfecha-error" style="color:red" class="help-block"></div>
                                         </div>

                                     </div>

                                     <div class="row">

                                         <div class="form-group col-lg-6">
                                             <label for="pacdui"></i>DUI</label>
                                             <input type="text" class="form-control dui" id="pacdui" name="pacdui" placeholder="" />
                                         </div>

                                         <div class="form-group col-lg-6">
                                             <label for="paccorreo"><i ></i> Email </label>
                                             <input type="text" class="form-control" id="paccorreo" name="paccorreo" placeholder="" onkeypress="caracteresCorreoValido()" />
                                             <div id="paccorreo-error" style="color:red" class="help-block"></div>
                                         </div>
                                     </div>
                                     <div class="row">
                                         <div class="form-group col-lg-6">
                                             <label for="pactelefonop"></i> Teléfono </label>
                                             <input class="form-control  telefono" type="text" id="pactelefonop" name="pactelefonop" />
                                         </div>

                                       
                                   
                                         <div class="form-group col-lg-6">
                                             <label for="pacdireccion"></i>Dirección </label>
                                             <input type="text" class="form-control" id="pacdireccion" name="pacdireccion" placeholder="" />

                                         </div>
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


                


             </div>

         </div>


     </div>
 </div>