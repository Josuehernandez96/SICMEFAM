<div id="modal-table" class="modal fade " tabindex="-1">
    <div class="modal-dialog" style="width: 70%">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header" style="background: #0494AD">
                    <button type="button" class="close" onclick="cerrarmodal()" aria-hidden="true">
                        <span class="white">&times;</span>
                    </button>
                    <strong><i class="fa fa-heart"></i> Registro de Signos Vitales</strong>
                </div>
            </div>

            <div class="modal-body no-padding" style="background: #fcf8e3">


                <form id="formulario_consulta" action="<?php echo SERVERURL ?>/ajax/pacienteAjax.php" enctype="multipart/form-data">

                    <input type="hidden" name="accion" value="save" />
                    <div class="col-sm-12" style="margin-top: 10px">


                        <div class="tab-content contenedor" style="overflow-y: scroll;height: 380px; ">
                            <div id="home" class="tab-pane fade in active">

                                <div class="row">

                                    <div class="col-xs-12">
                                        <div class="widget-box">
                                            <div class="widget-header widget-header-flat">
                                                <h4 class="widget-title smaller"><i class="fa fa-heart"></i> Mediciones/Signos Vitales </h4>


                                            </div>

                                            <div class="widget-body">
                                                <div class="widget-main">


                                                    <dl id="dt-list-1">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <dt style="margin-left: 12px;"> Paciente</dt>
                                                                

                                                                <select id="paciente" name="tpaciente" class="form-control">
                                                                    
                                                                </select>
                                                </div>

                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <dt style="margin-left: 12px;"> Presion Arterial (mmHg)</dt>



                                                                <div class="col-lg-12">

                                                                    <input class="form-control " type="text" id="presion" name="presion" placeholder="###/###"  />

                                                                </div>

                                                            </div>

                                                            <div class="col-lg-6">
                                                                <dt>Frecuencia Respiratorio (Rpm)</dt>
                                                                <input class="form-control " type="text" id="frecuenciares" name="frecuenciares" placeholder="###" onkeypress="return soloNumeros(event)" />
                                                            </div>

                                                        </div>
                                                        <br>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <dt style="margin-left: 12px;"> Temperatura (°C)</dt>



                                                                <div class="col-lg-12">

                                                                    <input class="form-control " type="text" id="temperatura" name="temperatura" onkeypress="return soloNumeros(event)" placeholder="###" />

                                                                </div>

                                                            </div>

                                                            <div class="col-lg-6">
                                                                <dt>Peso (Libras)</dt>
                                                                <input class="form-control " type="text" id="peso" name="peso"  placeholder="###" onkeypress="return soloNumeros(event)" />
                                                            </div>

                                                        </div>

                                                        <br>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <dt style="margin-left: 12px;"> Estatura (Cms)</dt>



                                                                <div class="col-lg-12">

                                                                    <input class="form-control " type="text" id="estatura" name="estatura" onkeypress="return soloNumeros(event)" placeholder="###" />

                                                                </div>

                                                            </div>
                                                            <div class="col-lg-6">
                                                                <dt>Frecuencia Cardiaca (Lpm)</dt>
                                                                <input class="form-control " type="text" id="frecuencia" name="frecuencia" onkeypress="return soloNumeros(event)" placeholder="###" />
                                                            </div>
                                                            



                                                        </div>



                                                    </dl>
                                                </div>
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


                <button class="btn btn-primary btn-round pull-left" style="margin-top: 10px;background-color: #7EBDFB" name="botonconsulta" onclick="guardar_consulta()">
                    <i class="fa fa-floppy-o"></i>
                     Guardar

                </button>


                <button class=" btn btn-danger btn-round pull-left" style="margin-top: 10px;background-color: #FC4D31" onclick="limpiarmodal()">
                    <i class="fa fa-times"></i>
                     Cancelar

                </button>



            </div>

        </div>
        <!-- /.CONTENIDO DE VENTANA EMERGENTE -->

    </div>
</div>
