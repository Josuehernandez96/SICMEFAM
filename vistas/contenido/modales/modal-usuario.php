<div id="modal-rgusuario" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header" style="background: #2aa5a5">
                    <button type="button" class="close" data-dismiss="modal" onclick="cancelar()" aria-hidden="true">
                        <span class="white">&times;</span>
                    </button>
                    <strong id="texto"><i class="fa fa-user"></i> Nuevo Usuario</strong>
                </div>
            </div>
            <!-- CONTENIDO DE MODAL -->
            <div class="modal-body no-padding" style="background: #fcf8e3">

                <!--FORMULARIO PARA REGISTRO DE PACIENTE-->
                <form id="formusu" name="formusu" data-form="save" action="<?php echo SERVERURL; ?>/ajax/usuarioAjax.php" method="POST">


                    <div class="col-sm-12" style="margin-top: 10px">
                        <div class="tabbable">
                            <ul class="nav nav-tabs" id="myTab">



                            </ul>

                            <div class="tab-content">
                            <strong><a class="pull-right" style="font-size: 11px;margin-left: 15px">(*) Campos Obligatorios</a> </strong>
                                <div id="home" class="tab-pane fade in active">

                                    <input type="hidden" id="usuid" />
                                    <div class="form-group col-lg-12">
                                        <label for="nombrep"><i class="fa fa-user"></i> Nombre Completo(*)</label>
                                        <input type="text" class="form-control" id="nombrep" name="nombrep" maxlength="50" placeholder="" />
                                        <div id="nombrep-error" style="display:none;color:red" class="help-block"></div>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="nombreusuario"><i class="fa fa-user"></i> Nombre de Usuario(*)</label>
                                        <input type="text" class="form-control" id="nombreusuario" name="nombreusuario" maxlength="15" placeholder="" />
                                        <div id="usuarionombre-error" style="display:none;color:red" class="help-block"></div>
                                    </div>
                                    <div id="mostrarcheque" class="row" style="display:none;">
                                        <div class="checkbox pull-right" style="margin-right: 25px;">
                                            <label>
                                                <input name="form-field-checkbox" class="ace ace-checkbox-2" type="checkbox" id="cheque">
                                                <span class="lbl"> Cambiar Contraseña</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div id="mostrarcontraantigua" class="form-group col-lg-12" style="display: none;">
                                        <label id="textoantigua" for="contraantigua"><i class="fa fa-lock"></i> Contraseña antigua(*)</label>
                                        <input type="password" class="form-control" id="contraantigua" name="contraantigua" maxlength="15" placeholder="" />
                                        <div id="contraantigua-error" style="display:none;color:red" class="help-block"></div>
                                    </div>
                                    <div class="form-group col-lg-12" id="mostrarclave1">
                                        <label id="textoclave1" for="clave1"><i class="fa fa-lock"></i> Contraseña(*)</label>
                                        <input type="password" class="form-control" id="clave1" name="clave1" maxlength="15" placeholder="" required="" />
                                        <div id="clave1-error" style="display:none;color:red" class="help-block">

                                        </div>


                                    </div>

                                    <div class="form-group col-lg-12">
                                        <label for="clave2"><i class="fa fa-lock"></i> Confirmar Contraseña(*)</label>
                                        <input type="password" class="form-control" id="clave2" name="clave2" maxlength="15" placeholder="" />
                                        <div id="clave2-error" style="display:none;color:red" class="help-block"></div>
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <label for="correousuario"><i class="fa fa-envelope"></i> Correo Electronico(*)</label>
                                        <input type="text" class="form-control" id="correousuario" name="correousuario" maxlength="50" placeholder="" onkeypress="caracteresCorreoValido()" />
                                        <div id="correo-error" style="display:none;color:red" class="help-block"></div>
                                    </div>

                                    <div class="form-group col-lg-6" id="campotipo">
                                        <label for="tipo"><i class="fa fa-male bigger-110"></i> Tipo </label>
                                        <select class="form-control " id="tipo" name="tipo">
                                            <option value="admin">Administrador</option>
                                            <option value="secret">Secretaria</option>
                                        </select>
                                        <div id="tipo-error" style="display:none;color:red" class="help-block"></div>
                                    </div>











                                    <p style="visibility: hidden">Raw denim you probably haven't heard of them jean shorts Austin.</p>


                                    <p style="visibility: hidden">Raw denim you probably haven't heard of them jean shorts Austin.</p>

                                </div>




                            </div>
                        </div>
                    </div>



                </form>


            </div>

            <!-- /.PIE DE VENTANA EMERGENTE -->

            <div class="modal-footer no-margin-top ">


                <button class="btn btn-primary btn-white btn-round pull-left" style="margin-top: 10px" id="btnguardar">

                    <img src="<?php echo SERVERURL; ?>vistas/btn-agregar.png" style="width: 30px;height: 30px;"> Guardar

                </button>

                <button class="btn btn-primary btn-white btn-round pull-left" style="margin-top: 10px" id="btneditar">

                    <img src="<?php echo SERVERURL; ?>vistas/btn-agregar.png" style="width: 30px;height: 30px;"> Guardar Cambios

                </button>


                <button class=" btn btn-danger btn-white btn-round pull-left" style="margin-top: 10px" onclick="cancelar()" data-dismiss="modal">

                    <img src="<?php echo SERVERURL; ?>vistas/btn-cancelar.png" style="width: 30px;height: 30px;"> Cancelar

                </button>

                <button class="btn btn-danger   pull-rigth " style="margin-top: 10px;;margin-rigth:25px;color:#2aa5a5 ;visibility: hidden; padding: 6px 0px;" id="alerta">

                    <strong><i class="fa fa-warning"></i> Completar campos obligatorios</strong>

                </button>



            </div>

        </div>
        <!-- /.CONTENIDO DE VENTANA EMERGENTE -->

    </div>
</div>