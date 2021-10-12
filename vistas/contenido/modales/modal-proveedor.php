








<!--INICIO VENTANA EMERGENTE DE FORMULARIO PARA REGISTRO DE PACIENTES -->

<div id="modal-rgproveedor" class="modal fade" tabindex="-1">
    <div class="modal-dialog" style="width: 50%">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header" style="background: #2aa5a5">
                    <button type="button" class="close" data-dismiss="modal" onclick="cancelarp()" aria-hidden="true">
                        <span class="white">&times;</span>
                    </button>
                    <strong><i class="fa fa-user"></i> Nuevo Proveedor</strong>
                </div>
            </div>

            <div class="modal-body no-padding" style="background: #fcf8e3">

                <form id="formpro" name="formpro" data-form="save" action="<?php echo SERVERURL; ?>/ajax/proveedorAjax.php" method="POST">

                    <div class="col-sm-12" style="margin-top: 10px">



                        <div class="tab-content" >
                            <div id="home2" class="tab-pane fade in active">

                                <strong>Datos<a class="pull-right" style="font-size: 10px;margin-left: 15px">(*) Campos Obligatorios</a> </strong>


                                <div class="tab-content" >
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label for="nombrepro">Proveedor<a>*</a></label>
                                            <input type="text" class="form-control" id="nombrepro" placeholder="" onkeypress="return soloLetras(event)" />
                                            <div id="nombrepro-error" style="display:hidden;color:red" class="help-block">
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="contacto">Nombre Contacto<a>*</a></label>
                                            <input type="text" class="form-control" id="contacto" placeholder="" onkeypress="return soloLetras(event)" />
                                            <div id="contacto-error" style="display:hidden;color:red" class="help-block">
                                            </div>
                                        </div>


                                    </div>

                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label for="telefono"><i class="ace-icon fa fa-phone"></i>Telefono <a>*</a></label>
                                            <input type="text" class="form-control telefono" id="telefono" placeholder="" onkeypress="return soloNumeros(event)" />
                                            <div id="telefono-error" style="display:hidden;color:red" class="help-block"></div>
                                        </div>
                                    </div>

                                    <div class="row">

                                    </div>





                                </div>
                                <br>















                            </div>




                        </div>

                    </div>



                </form>


            </div>

            <!-- /.PIE DE VENTANA EMERGENTE -->

            <div class="modal-footer no-margin-top ">


                <button class="btn btn-primary btn-white btn-round pull-left" style="margin-top: 10px" id="btnguardarpro">

                    <img src="<?php echo SERVERURL; ?>vistas/btn-agregar.png" style="width: 30px;height: 30px;"> Guardar

                </button>


                <button class=" btn btn-danger btn-white btn-round pull-left" style="margin-top: 10px;color:#2aa5a5" data-dismiss="modal" onclick="cancelarp()">

                    <img src="<?php echo SERVERURL; ?>vistas/btn-cancelar.png" style="width: 30px;height: 30px;"><strong> Cancelar
                    </strong>
                </button>

                <button class="btn btn-danger   pull-rigth " style="margin-top: 10px;;margin-rigth:25px;color:#2aa5a5 ;visibility: hidden; padding: 6px 0px;" id="alertap">

                    <strong><i class="fa fa-warning"></i> Completar campos obligatorios</strong>

                </button>



            </div>

        </div>
        <!-- /.CONTENIDO DE VENTANA EMERGENTE -->

    </div>
</div>