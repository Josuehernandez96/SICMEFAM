<div class="page-content" style="background: #edf7f7">

    <!-- /.Encabezado de pagina-->
    <div class="page-header col-xs-12">
        <div class="widget-header widget-header-large">
            <h3 class="widget-title grey lighter">
                <i class="ace-icon fa fa-calendar-check-o blue"></i>
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">
                        CITAS
                    </font>
                </font>
            </h3>




        </div>
    </div>


    <div class="row">
        <div class="col-xs-12">
            <!-- contenido de la pagina -->

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

                                                <a class="dt-button buttons-collection buttons-colvis btn btn-white btn-primary btn-bold" aria-controls="dynamic-table" data-original-title="" title="" onclick="pregunta()">
                                                    <span>
                                                        <img src="<?php echo SERVERURL; ?>vistas/btn-nuevo.png" style="width: 30px;height: 30px;">&nbsp;Nuevo</span>
                                                    </span>
                                                </a>

                                                <a class="dt-button buttons-collection buttons-colvis btn btn-white btn-primary btn-bold" aria-controls="dynamic-table">
                                                    <span>
                                                        <img src="<?php echo SERVERURL; ?>vistas/btn-impresora.png" style="width: 30px;height: 30px;">&nbsp;Imprimir</span>
                                                    </span>
                                                </a>
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

                                                    <label> Mostrar
                                                        <select name="dynamic-table_length" id="porpagina" class="form-control form-group">
                                                            <option value="10">10</option>
                                                            <option value="25">25</option>
                                                            <option value="50">50</option>
                                                            <option value="100">100</option>
                                                        </select>
                                                        registros</label>

                                                </div>
                                                <div class="col-xs-6">
                                                    
                                                    <div class="dataTables_length" id="dynamic-table_length">
                                                        <div class="input-daterange input-group">
                                                            <input type="text" class="input-sm form-control" id="fechaini" value="<?php echo date("d/m/Y");?>" name="start" />
                                                            <span class="input-group-addon">
                                                                <i class="fa fa-exchange"></i>
                                                            </span>

                                                            <input type="text" class="input-sm form-control" id="fechafin" value="<?php echo date("d/m/Y");?>" name="end" />
                                                        </div>
                                                    </div>
                                                </div>








                                                <div class="col-xs-3">
                                                    <div id="dynamic-table_filter" class="dataTables_filter">
                                                        <label>Buscar:
                                                            <input type="text" id="busqueda" class="form-control input-sm" placeholder="" aria-controls="dynamic-table"></label></div>


                                                </div>

                                                

                                            </div>

                                            <!--Fin Filtros de Tabla-->

                                            <div id="tablacita">
                                           
                                                
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

    </div>

</div>


<?php include 'vistas/contenido/scripts/scripts-cita.php' ?>
<?php include 'vistas/contenido/modales/modal-cita.php' ?>
<?php include 'vistas/contenido/modales/modal-aux.php' ?>