                <div class="page-content" style="background: #edf7f7">


                    <div class="page-header col-xs-12">
                        <div class="widget-header widget-header-large">
                            <h3 class="widget-title grey lighter">
                                <i class="ace-icon fa fa-list-alt blue"></i>
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">
                                        BITACORA
                                    </font>
                                </font>
                            </h3>




                        </div>
                    </div>
                    <!-- /.page-header -->

                    <div class="row">
                        <div class="col-xs-12">
                            <!-- PAGE CONTENT BEGINS -->


                            <div class="col-sm-12">
                                <div class="tabbable">


                                    <div class="tab-content">
                                        <div id="home" class="tab-pane fade in active">

                                            <div class="row">
                                                <div class="col-xs-12">

                                                    <div class="clearfix" style="background: #2aa5a5;color: #FFFF;padding-top: 5px;padding-right: 5px">

                                                        <!--inicio area de botonos de tabla-->

                                                        <div class="pull-right tableTools-container">

                                                            <div class="dt-buttons btn-overlap btn-group">


                                                                <a class="dt-button buttons-collection buttons-colvis btn btn-white btn-primary btn-bold" aria-controls="dynamic-table">
                                                                    <span>
                                                                        <img src="<?php echo SERVERURL; ?>vistas/btn-ayuda.png" style="width: 30px;height: 30px;">&nbsp;Ayuda</span>
                                                                    </span>
                                                                </a>
                                                            </div>

                                                            <!--fin area de botonos-->

                                                        </div>

                                                        <!--fin area de botonos de tabla-->

                                                    </div>


                                                    <!-- div.table-responsive -->

                                                    <!-- div.dataTables_borderWrap -->
                                                    <div>
                                                        <div id="dynamic-table_wrapper" class="dataTables_wrapper form-inline no-footer">

                                                            <!--inicio Filtros de Tabla-->

                                                            <div class="row tab-content">





                                                                <div class="col-xs-3">
                                                                    <div class="dataTables_length" id="dynamic-table_length">
                                                                        Usuario<label>
                                                                            <select id="usuario" aria-controls="dynamic-table" class="form-control input-sm">
                                                                                <option value="admin">Administrador</option>
                                                                                <option value="secret">Usuario Limitado</option>
                                                                            </select>
                                                                        </label>
                                                                    </div>
                                                                </div>

                                                                <div class="col-xs-4">
                                                                    <div class="dataTables_length" id="dynamic-table_length">
                                                                        <div class="input-daterange input-group">
                                                                            <input type="text" class="input-sm form-control" id="fechaini" value="<?php echo date("d/m/Y"); ?>" name="start" />
                                                                            <span class="input-group-addon">
                                                                                <i class="fa fa-exchange"></i>
                                                                            </span>

                                                                            <input type="text" class="input-sm form-control" id="fechafin" value="<?php echo date("d/m/Y"); ?>" name="end" />
                                                                        </div>
                                                                    </div>
                                                                </div>








                                                                <div class="col-xs-5">
                                                                    <div id="filter" class="dataTables_filter">
                                                                        <label>Ver acciones en
                                                                            <select id="busqueda" aria-controls="dynamic-table" class="form-control input-sm">
                                                                                <option value="Todo">Todo</option>
                                                                                <option value="PACIENTE">Paciente</option>
                                                                                <option value="CITA">Citas</option>
                                                                                <option value="CONSULTA">Consulta</option>
                                                                                <option value="MEDICAMENTO">Medicamentos</option>
                                                                                <option value="USUARIO">Usuarios</option>
                                                                                <option value="RESPALDO">Respaldo</option>
                                                                                <option value="LOGIN">Login</option>

                                                                            </select>



                                                                        </label>
                                                                    </div>


                                                                </div>

                                                            </div>

                                                            <!--Fin Filtros de Tabla-->




                                                            <div id="tablabitacora">



                                                                <?php

                                                                require_once "./controladores/bitacoraControlador.php";
                                                                $insAdmin = new bitacoraControlador();

                                                                $insAdmin->paginador_bitacora_controlador();

                                                                ?>

                                                            </div>




                                                            <!--PIE DE TABLA (PAGINACION DE TABLA)-->



                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <p style="visibility: hidden">Raw denim you probably haven't heard of them jean shorts Austin.</p>

                                        </div>




                                    </div>
                                </div>
                            </div>









                            <!-- PAGE CONTENT ENDS -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.page-content -->

                <?php include 'vistas/contenido/scripts/scripts-bitacora.php' ?>