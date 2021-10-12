        <!--INICIO VENTANA EMERGENTE DE FORMULARIO PARA REGISTRO DE PACIENTES -->

        <div id="modal-rgrespaldo" class="modal fade" tabindex="-1">
            <div class="modal-dialog" style="width: 30%">
                <div class="modal-content">
                    <div class="modal-header no-padding">
                        <div class="table-header" style="background: #2aa5a5">
                            <button type="button" class="close" data-dismiss="modal" onclick="cancelar()" aria-hidden="true">
                                <span class="white">&times;</span>
                            </button>
                            <strong>Subir un Respaldo</strong>
                        </div>
                    </div>
                    <!-- CONTENIDO DE MODAL -->
                    <div class="modal-body no-padding" style="background: #fcf8e3">

                        <!--FORMULARIO PARA REGISTRO DE PACIENTE-->
                        <form id="formres" action="<?php echo SERVERURL; ?>/ajax/respaldoAjax.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="accion" value="save" />
                            <div class="col-sm-12" style="margin-top: 10px">



                                <div class="tab-content">
                                    <div id="home" class="tab-pane fade in active">

                                        <div class="center">
                                            <div class="row">
                                                <span>Seleccione un archivo: </span>
                                            </div>
                                            <div class="row">
                                            <label for="bsubir" class="center btn btn-primary btn-white btn-round pull-center"><span>
                                                        <img src="<?php echo SERVERURL; ?>vistas/btn-buscar.png" style="width: 35px;height: 29px;">&nbsp;Buscar archivo</span></label>
                                            <input id="bsubir" onchange="cambiar()" type="file" name="uploadedFile" style="display: none;" />
                                            </div>
                                            <div id="info" style="margin-top: 10px; color: red"></div>
                                        </div>


                                    </div>


                                </div>

                            </div>



                        </form>


                    </div>

                    <!-- /.PIE DE VENTANA EMERGENTE -->

                    <div class="modal-footer no-margin-top ">


                        <button type="submit" name="uploadBtn" class="btn btn-primary btn-white btn-round pull-left " style="margin-top: 10px;color:#2aa5a5" value="upload" onclick="subir()">

                            <img src="<?php echo SERVERURL; ?>vistas/btn-agregar.png" style="width: 30px;height: 30px"> <strong>Enviar</strong>

                        </button>


                        <button class=" btn btn-danger btn-white btn-round pull-left" style="margin-top: 10px;color:#2aa5a5" data-dismiss="modal" onclick="cancelar()">

                            <img src="<?php echo SERVERURL; ?>vistas/btn-cancelar.png" style="width: 30px;height: 30px;"><strong> Cancelar
                            </strong>
                        </button>



                    </div>

                </div>
                <!-- /.CONTENIDO DE VENTANA EMERGENTE -->

            </div>
        </div>

        <!--FIN VENTANA EMERGENTE DE FORMULARIO PARA REGISTRO DE PACIENTES -->