 <!--Modal para registrar informacion de pacientes nuevo -->

 <div id="modal-rgpaciente" class="modal fade" tabindex="-1">
     <div class="modal-dialog" style="width: 70%">
         <div class="modal-content">
             <div class="modal-header no-padding">
                 <div class="table-header" style="background: #0494AD">
                     <button type="button" class="close" data-dismiss="modal" onclick="cancelar()" aria-hidden="true">
                         <span class="white">&times;</span>
                     </button>
                     <strong id="texto"><i class="fa fa-user"></i> Nuevo Paciente</strong>
                 </div>
             </div>

             <div class="modal-body no-padding" style="background: #fcf8e3">

                 <form id="formpac" name="formpac" data-form="save" action="<?php echo SERVERURL ?>/ajax/pacienteAjax.php" method="POST">

                     <div class="col-sm-12" style="margin-top: 10px">

                         <div class="contenedor" id="pacscrool" style="height:450px;overflow-y: auto;">

                             <div id="home" class="">

                                 <h3 class="header smaller lighter default">
                                     <font style="vertical-align: inherit;">
                                         <font style="vertical-align: inherit;"><strong>Datos Generales</strong><a class="pull-right" style="font-size:13px;margin-right:10px">  Datos Obligatorios</a></font>
                                     </font>
                                 </h3>
                                 <div class="well">
                                     <div class="row">
                                         <div class="form-group col-lg-6">
                                             <label for="pacnombre">Nombre(s) <a></a></label>
                                             <input type="text" class="form-control" name="pacnombre" id="pacnombre" max="40" placeholder="" onkeypress="return soloLetras(event)" />
                                             <div id="pacnombre-error" style="display:none;color:red" class="help-block "></div>
                                         </div>

                                         <div class="form-group col-lg-6">
                                             <label for="pacapellido">Apellido(s) <a></a></label>
                                             <input type="text" class="form-control" id="pacapellido" placeholder="" onkeypress="return soloLetras(event)" />
                                             <div id="pacapellido-error" style="display:none;color:red" class="help-block"></div>
                                         </div>
                                     </div>

                                     <div class="row">

                                         <div class="form-group col-lg-6">
                                             <label for="pacsexo"><i class="fa fa-male bigger-110"></i> Sexo <a></a></label>
                                             <select class="form-control " id="pacsexo">
                                                 <option value=""> Seleccionar sexo</option>
                                                 <option value="M">Masculino</option>
                                                 <option value="F">Femenino</option>
                                             </select>
                                             <div id="pacsexo-error" style="color:red" class="help-block"></div>

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
                                    
                                     <h4 class="green smaller lighter">
                                         <button class="btn btn-info   pull-rigth " style="margin-top: 10px;;margin-rigth:25px;color:#2aa5a5;display:none" id="texto1">

                                             <strong><i class="fa fa-info"></i> Paciente es menor :Completar datos de Responsable</strong>

                                         </button>
                                         <h5>












                                 </div>


                                 <h3 class="header smaller lighter default">
                                     <font style="vertical-align: inherit;">
                                         <font style="vertical-align: inherit;"><strong>Familiar Responsable</strong></font>
                                     </font>
                                 </h3>


                                 <div class="well">


                                     <div class="row">
                                         <div class="form-group col-lg-6">
                                             <label for="resnombre">Nombre(s) <a id="ob1" style="visibility:hidden">*</a></label>
                                             <input type="text" class="form-control" name="resnombre" id="resnombre" placeholder="" onkeypress="return soloLetras(event)" />
                                             <div id="resnombre-error" style="display:none;color:red" class="help-block"></div>
                                         </div>

                                         <div class="form-group col-lg-6">
                                             <label for="resapellido">Apellido(s) <a id="ob2" style="visibility:hidden">*</a></label>
                                             <input type="text" class="form-control" name="resapellido" id="resapellido" placeholder="" onkeypress="return soloLetras(event)" />
                                             <div id="resapellido-error" style="display:none;color:red" class="help-block"></div>

                                         </div>
                                     </div>
                                     <div class="row">
                                         <div class="form-group col-lg-6">
                                             <label for="resrelacion"><i class="fa fa-male bigger-110"></i> Relación <a id="ob3" style="visibility:hidden"></a></label>
                                             <select class="form-control " id="resrelacion">
                                                 <option value=""> [Seleccionar la Relacion]</option>
                                                 <option value="MADRE">MADRE</option>
                                                 <option value="PADRE">PADRE</option>
                                                 <option value="HIJA">HIJA</option>
                                                 <option value="HIJO">HIJO</option>
                                                 <option value="ABUELA">ABUELA</option>
                                                 <option value="ABUELO">ABUELO</option>
                                                 <option value="HERMANA">HERMANA</option>
                                                 <option value="HERMANO">HERMANO</option>
                                                 <option value="NIETA">NIETA</option>
                                                 <option value="NIETO">NIETO</option>
                                                 <option value="TIA">TIA</option>
                                                 <option value="TIO">TIO</option>
                                                 
                                                 

                                             </select>
                                             <div id="resrelacion-error" style="display:none;color:red" class="help-block"></div>

                                         </div>
                                         <div class="form-group col-lg-6">
                                             <label for="resdui"><i class="fa fa-credit-card bigger-110"></i> DUI</label>
                                             <input class="form-control dui" type="text" id="resdui" name="resdui" />
                                         </div>
                                     </div>

                                     <div class="row">

                                         <div class="form-group col-lg-6">
                                             <label for="restelefonop"><i class="ace-icon fa fa-phone"></i> Teléfono  <a id="ob4" style="visibility:hidden"></a></label>
                                             <input class="form-control telefono" type="text" id="restelefonop" name="restelefonop" />
                                             <div id="restelefonop-error" style="display:none;color:red" class="help-block "></div>
                                         </div>

                                        
                                     </div>


                                     <h4 class="green smaller lighter">
                                         <button class="btn btn-info   pull-rigth " style="margin-top: 10px;;margin-rigth:25px;color:#2aa5a5;display:none" id="texto2">

                                             <strong><i class="fa fa-info"></i> El Paciente mayor: Datos de Familiar Responsable No son obligatorios </strong>

                                         </button>
                                 </div>







                             </div>
                         </div>
                     </div>
                 </form>
             </div>

             <!-- /.PIE DE VENTANA EMERGENTE -->

             <div class="modal-footer no-margin-top ">


                 <button class="btn btn-primary btn-round pull-left" style="margin-top: 10px;color:#2aa5a5" id="btnguardar">

                     <i class="fa fa-check-circle" aria-hidden="true"></i>
                     Guardar

                 </button>

                 <button class="btn btn-primary btn-round pull-left " style="margin-top: 10px;color:#2aa5a5;" id="btneditar">

                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                    Guardar Cambios

                 </button>


                 <button class=" btn btn-danger btn-round pull-left" onclick="cancelar()" style="margin-top: 10px;color:#2aa5a5" data-dismiss="modal">

                    <i class="fa fa-times"></i>
                    Cancelar
                    
                 </button>


                 <button class="btn btn-danger   pull-rigth " style="margin-top: 10px;;margin-rigth:25px;color:#2aa5a5;visibility: hidden" id="alerta">

                     <strong><i class="fa fa-warning"></i> Completar los campos obligatorios</strong>

                 </button>


             </div>

         </div>


     </div>
 </div>