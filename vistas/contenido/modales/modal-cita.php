<div id="modal-cita" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header" style="background: #2aa5a5">
                    <button type="button" class="close" onclick="cancelar()" aria-hidden="true">
                        <span class="white">&times;</span>
                    </button>
                    <strong><i class="fa fa-calendar-check-o"></i> Nueva Cita </strong>
                </div>
            </div>
            
            <!-- CONTENIDO DE MODAL -->
            <div class="modal-body no-padding" style="background: #fcf8e3">

                <!--FORMULARIO PARA REGISTRO DE PACIENTE-->
                <form>


                    <div class="col-sm-12" style="margin-top: 10px">
                        <div class="tabbable">
                            <ul class="nav nav-tabs" id="myTab">



                            </ul>

                            <div class="tab-content">
                                <div id="home" class="tab-pane fade in active">

                                    <div class="row">

                                        <div class="form-group col-lg-12" id="campoid" style="display:none">
                                            <label for="state"><i class="fa fa-group"></i> Paciente</label>
                                            <br>
                                            <?php
                                            require_once "./controladores/citaControlador.php";
                                            $insAdmin = new citaControlador();

                                            $insAdmin->selector_paciente_cita_controlador();
                                            ?>

                                            <div id="idpaciente-error" style="display:none;color:red" class="help-block "></div>

                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-12" id="camponombre" style="display:none">
                                            <label for="inputName"><i class="fa fa-edit"></i> Nombre </label>
                                            <input type="text" class="form-control" id="nombrecitado" onkeypress="return soloLetras(event)" placeholder="" />
                                            <div id="nombrecitado-error" style="display:none;color:red" class="help-block "></div>

                                        </div>


                                    </div>

                                    <div class="row">

                                        <div class="form-group col-lg-6">
                                            <label for="inputName"><i class="fa fa-calendar bigger-110"></i> Fecha</label>
                                            <input class="form-control date-picker input-mask-date" readonly id="fechacita" type="text" data-date-format="dd/mm/yyyy">
                                            <div id="fechacita-error" style="display:none;color:red" class="help-block "></div>

                                        </div>


                                        <div class="form-group col-lg-6">
                                            <label for="inputName"><i class="fa fa-clock-o bigger-110"></i> Hora</label>
                                            <input id="horacita" type="text" style="padding-botton:10px" readonly value="" class="form-control" />
                                            <div id="horacita-error" style="display:none;color:red" class="help-block "></div>


                                        </div>
                                    </div>


                                    <div class="row" id="telemos" style="display:none">
                                        <div class="form-group col-lg-6" id="mostele">

                                            <label for="telefono"><i class="ace-icon fa fa-phone"></i> Teléfono </label>




                                            <input class="form-control telefono" type="text" id="telefono" />
                                            <div id="telefono-error" style="display:none;color:red"   class="help-block "></div>
                                                               


                                        </div>
                                    </div>




                                    <p style="visibility: hidden">Raw denim you probably haven't heard of them jean shorts Austin.</p>

                                </div>

                                


                            </div>
                        </div>
                    </div>



                </form>


            </div>

            <!-- /.PIE DE VENTANA EMERGENTE -->

            <div class="modal-footer no-margin-top ">


                <button class="btn btn-primary btn-white btn-round pull-left" onclick="validar()"  id="btnenviar" style="margin-top: 10px">

                    <img src="http://localhost/SICMEDIC/vistas/btn-agregar.png" style="width: 30px;height: 30px;"> <strong>Guardar</strong>

                </button>


                <button class=" btn btn-danger btn-white btn-round pull-left" onclick="cancelar()" style="margin-top: 10px">

                    <img src="http://localhost/SICMEDIC/vistas/btn-cancelar.png" style="width: 30px;height: 30px;"> <strong>Cancelar</strong>

                </button>



            </div>

        </div>
        <!-- /.CONTENIDO DE VENTANA EMERGENTE -->

    </div>
</div>





<div id="modal-pregunta" class="modal fade" tabindex="-1">
    <div class="modal-dialog" style="margin-top: 15%">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header" style="background: #2aa5a5">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <span class="white">&times;</span>
                    </button>
                    <strong><i class="fa fa-calendar-check-o"></i> Ventana de Confirmacion</strong>
                </div>
            </div>
            <!-- CONTENIDO DE MODAL -->
            <div class="modal-body no-padding" style="background: #fcf8e3">

                <!--FORMULARIO PARA REGISTRO DE PACIENTE-->
                <form>


                    <div class="col-sm-12" style="margin-top: 10px">
                        <div class="tabbable">
                            <ul class="nav nav-tabs" id="myTab">



                            </ul>

                            <div class="tab-content">
                                <div id="home" class="tab-pane fade in active">


                                    ¿LA CITA ES PARA UN PACIENTE ANTIGUO?




                                </div>





                            </div>


                        </div>
                    </div>
            </div>



            </form>


        </div>

        <!-- /.PIE DE VENTANA EMERGENTE -->

        <div class="modal-footer no-margin-top ">



            <button class="btn btn-primary pull-left" style="margin-top:5px" onclick="setearvalor(1)" type="button">
                <i class="ace-icon fa fa-check bigger-110"></i>
                Si
            </button>
            <button class="btn btn-danger pull-left" onclick="setearvalor(2)" style="margin-top:5px;margin-left:5px" type="button">
                <i class="ace-icon fa fa-exit bigger-110"></i>
                <i class="ace-icon fa fa-close bigger-110"></i>No
            </button>





        </div>

    </div>
    <!-- /.CONTENIDO DE VENTANA EMERGENTE -->

</div>
</div>