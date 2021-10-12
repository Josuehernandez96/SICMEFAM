<div class="page-content" style="background: #edf7f7">


    <div class="page-header col-xs-12">
        <div class="widget-header widget-header-large">
            <h3 class="widget-title grey lighter">
                <i class="ace-icon fa fa-save blue"></i>
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">
                        RESPALDOS DE INFORMACIÓN
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
                        <div class="tab-pane fade in active">

                            <div class="row">
                                <div class="col-xs-12">

                                    <div class="clearfix" style="background: #2aa5a5;color: #FFFF;padding-top: 5px;padding-right: 5px">

                                        <!--inicio area de botonos de tabla-->

                                        <div class="pull-right tableTools-container">

                                            <div class="dt-buttons btn-overlap btn-group">

                                                <a class="dt-button buttons-collection buttons-colvis btn btn-white btn-primary btn-bold" aria-controls="dynamic-table" data-original-title="" title="" onclick="backup()">
                                                    <span>
                                                        <img src="<?php echo SERVERURL; ?>vistas/btn-nuevo.png" style="width: 30px;height: 30px;">&nbsp;Nuevo</span>
                                                    </span>
                                                </a>

                                                <a class="dt-button buttons-collection buttons-colvis btn btn-white btn-primary btn-bold " style="width: 110px;height: 45px;" aria-controls="dynamic-table" data-original-title="" title=""data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#modal-rgrespaldo">
                                                    <span>
                                                        <img src="<?php echo SERVERURL; ?>vistas/btn-subir.png" style="width: 34px;height: 30px;">&nbsp;Subir</span>
                                                    </span>
                                                </a>                                                

                                                <a class="dt-button buttons-collection buttons-colvis btn btn-white btn-primary btn-bold" aria-controls="dynamic-table" data-original-title="" title="">
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

                                               

                                                </div>
                                            </div>

                                            <div id="tablarespaldo">
                                                <?php

                                                require_once "./controladores/respaldoControlador.php";
                                                $insAdmin = new respaldoControlador();

                                                $insAdmin->paginador_respaldo_controlador();

                                                ?>
                                            </div>


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


<?php include 'modales/modal-respaldo.php'; ?>
<?php include 'scripts/scripts-respaldo.php'; ?>