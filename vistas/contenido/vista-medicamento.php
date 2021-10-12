<div class="page-content" style="background: #edf7f7">


    <div class="page-header col-xs-12">
        <div class="widget-header widget-header-large">
            <h3 class="widget-title grey lighter">
                <i class="menu-icon fa fa-medkit blue"></i>
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">
                        MEDICAMENTOS
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
                    <ul class="nav nav-tabs" id="myTab">
                        <li class="active">
                            <a data-toggle="tab" href="#home">
                                <i class="green ace-icon fa fa-list bigger-120"></i>
                                Inventario
                            </a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#home2">
                                <i class="green ace-icon fa fa-user bigger-120"></i>
                                Proveedores
                            </a>
                        </li>

                    </ul>

                    <div class="tab-content" style="height: auto ">
                        <div id="home" class="tab-pane fade in active">

                            <div class="row">
                                <div class="col-xs-12">

                                    <div class="clearfix" style="background: #2aa5a5;color: #FFFF;padding-top: 5px;padding-right: 5px">

                                        <!--inicio area de botonos de tabla-->

                                        <div class="pull-right tableTools-container">

                                            <div class="dt-buttons btn-overlap btn-group">

                                                <a class="dt-button buttons-collection buttons-colvis btn btn-white btn-primary btn-bold" aria-controls="dynamic-table" data-original-title="" title="" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#modal-rgmedicamento"  onclick="Listaprovedores()">
                                                    <span>
                                                        <img src="<?php echo SERVERURL; ?>vistas/btn-nuevo.png" style="width: 30px;height: 30px;">&nbsp;Nuevo</span>
                                                    </span>
                                                </a>

                                                <a class="dt-button buttons-collection buttons-colvis btn btn-white btn-primary btn-bold" aria-controls="dynamic-table" data-original-title=""  href="<?php echo SERVERURL; ?>reportes-pdf/medicamento.php" target="_blank" title="">
                                                    <span>
                                                        <img src="<?php echo SERVERURL; ?>vistas/btn-impresora.png" style="width: 30px;height: 30px;">&nbsp;Imprimir</span>
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

                                                <div>

                                                    <div class="col-lg-3 col-xs-6">

                                                        <label>Mostrar
                                                            <select name="dynamic-table_length" class="form-control form-group" id="porpagina">
                                                                <option value="10">10</option>
                                                                <option value="25">25</option>
                                                                <option value="50">50</option>
                                                                <option value="100">100</option>
                                                            </select>
                                                            registros
                                                        </label>

                                                    </div>




                                                    <div class="col-lg-9 col-xs-9">
                                                        <div id="dynamic-table_filter" class="dataTables_filter">
                                                            <label>Busqueda:
                                                                <input type="text" style="width: 60%;" class="form-control input-sm" id="busqueda" placeholder=""></label>



                                                        </div>

                                                    </div>

                                                </div>
                                            </div>


                                            <div id="tablamedicamento">
                                                <?php

                                                require_once "./controladores/medicamentoControlador.php";
                                                $insAdmin = new medicamentoControlador();

                                                $insAdmin->paginador_medicamentos_controlador();

                                                ?>
                                            </div>







                                            <!--Fin Filtros de Tabla-->
                                            <!--PIE DE TABLA (PAGINACION DE TABLA)-->



                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p style="visibility: hidden">Raw denim you probably haven't heard of them
                                jean shorts Austin.</p>







                        </div>
                        <div id="home2" class="tab-pane fade">
                            <div class="row">

                                <div class="row">
                                    <div class="col-xs-12">

                                        <div class="clearfix" style="background: #2aa5a5;color: #FFFF;padding-top: 5px;padding-right: 5px">

                                            <!--inicio area de botonos de tabla-->

                                            <div class="pull-right tableTools-container">

                                                <div class="dt-buttons btn-overlap btn-group">

                                                    <a class="dt-button buttons-collection buttons-colvis btn btn-white btn-primary btn-bold" aria-controls="dynamic-table" data-original-title="" title="" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#modal-rgproveedor">
                                                        <span>
                                                            <img src="<?php echo SERVERURL; ?>vistas/btn-nuevo.png" style="width: 30px;height: 30px;">&nbsp;Nuevo</span>
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

                                                    <div>

                                                        <div class="col-lg-3 col-xs-6">

                                                            <label>Mostrar
                                                                <select name="dynamic-table_length" class="form-control form-group" id="porpaginap">
                                                                    <option value="10">10</option>
                                                                    <option value="25">25</option>
                                                                    <option value="50">50</option>
                                                                    <option value="100">100</option>
                                                                </select>
                                                                registros
                                                            </label>

                                                        </div>




                                                        <div class="col-lg-9 col-xs-9">
                                                            <div id="dynamic-table_filter" class="dataTables_filter">
                                                                <label>Busqueda:
                                                                    <input type="text" style="width: 60%;" class="form-control input-sm" id="busquedap" placeholder=""></label>



                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>


                                                <div id="tablaproveedor">
                                                    <?php

                                                    require_once "./controladores/proveedorControlador.php";
                                                    $insAdmin = new proveedorControlador();

                                                    $insAdmin->paginador_proveedor_controlador();

                                                    ?>
                                                </div>







                                                <!--Fin Filtros de Tabla-->
                                                <!--PIE DE TABLA (PAGINACION DE TABLA)-->



                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p style="visibility: hidden">Raw denim you probably haven't heard of them
                                    jean shorts Austin.</p>

                            </div>
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


<?php include 'modales/modal-medicamento.php'; ?>
<?php include 'scripts/scripts-medicamento.php'; ?>


<?php include 'modales/modal-proveedor.php'; ?>
<script src="<?php echo SERVERURL; ?>vistas/assets/js/proveedor.js"></script>