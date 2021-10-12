<div class="page-content" style="background: #edf7f7">


    <div class="page-header " style="margin-left: 10px;margin-right: 10px">
        <div class="widget-header widget-header-large">
            <h3 class="widget-title grey lighter">
                <i class="ace-icon fa fa-folder-open blue"></i>
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">
                        Historial Clinico
                    </font>
                </font>
            </h3>



        </div>
    </div>

    <!-- /.page-header -->

    <div class="row">


        <div class="col-xs-12" style="margin-top: 20px;">


            <!-- PAGE CONTENT BEGINS -->



            <div class="col-sm-12">


                <div class="tabbable">
                    <ul class="nav nav-tabs" id="myTab">
                        <li class="active">
                            <a data-toggle="tab" href="#home">
                                <i class="blue ace-icon fa fa-home bigger-120"></i>
                                Listado de Historial Clinico
                            </a>
                        </li>

                    </ul>

                    <div class="tab-content" style="background-color: #e6fafb">
                        <div id="home" class="tab-pane fade in active">
                            <div class="row">
                                <div class="col-xs-12">

                                    <div class="clearfix" style="background: #0494AD;color: #FFFF;padding-top: 5px;padding-right: 5px">

                                        <!--inicio area de botonos de tabla-->

                                        <div class="pull-right tableTools-container">

                                            <div class="dt-buttons btn-overlap btn-group">

                                                <a class="dt-button buttons-collection buttons-colvis btn btn-success btn-primary btn-bold" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#modal-table" aria-controls="dynamic-table">
                                                    <span>
                                                        <i class="fa fa-plus-circle" aria-hidden="true" style="width: 30px;height: 20px;">&nbsp; </i> Nuevo
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

                                            <div class="row tab-content" style="background: #edf7f7">


                                                <div class="col-xs-5">
                                                    <div class="dataTables_length" id="dynamic-table_length">
                                                        <label for="inputName"></i>del</label>
                                                        <input class="form-control date-picker input-mask-date" id="form-field-mask-1" type="text" data-date-format="dd/mm/yyyy">
                                                        <label for="inputName">hasta</label>
                                                        <input class="form-control date-picker input-mask-date" id="form-field-mask-1" type="text" data-date-format="dd/mm/yyyy">

                                                    </div>

                                                </div>











                                            </div>

                                        </div>

                                        <!--Fin Filtros de Tabla-->





                                        



                                        <div class="row tab-content " style="margin: 0.1px">
                                            <div class="col-xs-6">
                                                <div class="dataTables_info" id="dynamic-table_info" role="status" aria-live="polite">
                                                    mostrando 1 a 1 de 1 registros
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="dataTables_paginate paging_simple_numbers" id="dynamic-table_paginate">
                                                    <ul class="pagination">
                                                        <li class="paginate_button previous disabled" aria-controls="dynamic-table" tabindex="0" id="dynamic-table_previous">
                                                            <a href="#">Previos</a>
                                                        </li>
                                                        <li class="paginate_button active" aria-controls="dynamic-table" tabindex="0"><a href="#">1</a>
                                                        </li>
                                                        <li class="paginate_button " aria-controls="dynamic-table" tabindex="0"><a href="#">2</a>
                                                        </li>
                                                        <li class="paginate_button " aria-controls="dynamic-table" tabindex="0"><a href="#">3</a>
                                                        </li>
                                                        <li class="paginate_button next" aria-controls="dynamic-table" tabindex="0" id="dynamic-table_next"><a href="#">Siguiente</a>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>






                                    <!--PIE DE TABLA (PAGINACION DE TABLA)-->



                                </div>
                            </div>
                        </div>
                    </div>






                </div>
            </div>
        </div>

    </div>


</div>

<?php include 'scripts/scripts-consulta.php'; ?>

<?php include 'modales/modal-consulta.php'; ?>