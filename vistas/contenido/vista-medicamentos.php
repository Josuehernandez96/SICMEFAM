<div class="page-content" style="background: #edf7f7">


                        <div class="page-header col-xs-12">
                                <div class="widget-header widget-header-large">
                                        <h3 class="widget-title grey lighter">
                                            <i class="ace-icon fa fa-group blue"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                                MEDICAMENTOS
                                                </font></font></h3>
    
                                        
    
                                        
                                    </div>
                        </div>
                    <!-- /.page-header -->

                    <div class="row">
                        <div class="col-xs-12">
                            <!-- PAGE CONTENT BEGINS -->


                            <div class="col-sm-12">
                                <div class="tabbable">


                                    <div class="tab-content" style="height: auto;">
                                        <div class="tab-pane fade in active">

                                            <div class="row">
                                                <div class="col-xs-12">

                                                    <div class="clearfix"
                                                        style="background: #2aa5a5;color: #FFFF;padding-top: 5px;padding-right: 5px">

                                                        <!--inicio area de botonos de tabla-->

                                                        <div class="pull-right tableTools-container">

                                                            <div class="dt-buttons btn-overlap btn-group">

                                                                <a class="dt-button buttons-collection buttons-colvis btn btn-white btn-primary btn-bold"
                                                                    aria-controls="dynamic-table" data-original-title=""
                                                                    title="" data-toggle="modal"
                                                                    data-target="#modal-table">     
                                                                    <span>
                                                                        <img src="btn-nuevo.png"
                                                                            style="width: 30px;height: 30px;">&nbsp;Nuevo</span>
                                                                    </span>
                                                                </a>

                                                                <a class="dt-button buttons-collection buttons-colvis btn btn-white btn-primary btn-bold"
                                                                    aria-controls="dynamic-table" data-original-title="" href="EstructuraReporte.docx"
                                                                    title="">
                                                                    <span> 
                                                                        <img src="btn-impresora.png"
                                                                            style="width: 30px;height: 30px;">&nbsp;Imprimir</span>
                                                                    </span>
                                                                </a>
                                                                <a class="dt-button buttons-collection buttons-colvis btn btn-white btn-primary btn-bold"
                                                                    aria-controls="dynamic-table" data-original-title=""
                                                                    title="">
                                                                    <span>
                                                                        <img src="btn-ayuda.png"
                                                                            style="width: 30px;height: 30px;">&nbsp;Ayuda</span>
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
                                                        <div id="dynamic-table_wrapper"
                                                            class="dataTables_wrapper form-inline no-footer">

                                                            <!--inicio Filtros de Tabla-->
                                                            
                                                            <div class="row tab-content">

                                                                <div>

                                                                    <div class="col-lg-2">

                                                                        <label>Mostrar Regitros<br>
                                                                            <select name="dynamic-table_length"
                                                                                class="form-control form-group">
                                                                                <option value="10">10</option>
                                                                                <option value="25">25</option>
                                                                                <option value="50">50</option>
                                                                                <option value="100">100</option>
                                                                            </select>
                                                                           
                                                                        </label>

                                                                    </div>


                                                                    <div class="col-lg-2">

                                                                        <label>Administracion
                                                                            <select
                                                                                name="dynamic-table_length dataTables_filter"
                                                                                class="form-control form-group">
                                                                                <option value="10">Orales</option>
                                                                                <option value="25">Intravenoso</option>
                                                                                <option value="25">Rectales y Vaginales</option>
                                                                                <option value="25">Tópico</option>
                                                                                <option value="25">Intradérmica</option>
                                                                                <option value="25">Soluciones Ópticas</option>

                                                                            </select>

                                                                        </label>

                                                                    </div>

                                                                    <div class="col-lg-2">

                                                                            <label>Presentación
                                                                                <br>
                                                                                <select
                                                                                    name="dynamic-table_length dataTables_filter"
                                                                                    class="form-control form-group">
                                                                                    <option value="10">Pastillas</option>
                                                                                    <option value="10">Capsulas</option>
                                                                                    
                                                                                    
                                                                                    
                                                                                </select>
    
                                                                            </label>
    
                                                                        </div>

                                                                    <div class="col-lg-2">

                                                                        <label>Dosis
                                                                            <br>
                                                                            <select
                                                                                name="dynamic-table_length dataTables_filter"
                                                                                class="form-control form-group">
                                                                                <option value="10">160 mg</option>
                                                                                <option value="10">250 mg</option>
                                                                                
                                                                                <option value="10">500 mg</option>
                                                                                
                                                                            </select>

                                                                        </label>

                                                                    </div>


                                                                    <div class="col-lg-4">
                                                                            <div id="dynamic-table_filter"
                                                                                class="dataTables_filter pull-right">
                                                                                <label>Busqueda:
                                                                                    <input type="text" style="width: 100%;"
                                                                                        class="form-control input-sm"
                                                                                        placeholder=""></label>
    
    
    
                                                                            </div>
    
                                                                        </div>

                                                                </div>
                                                            </div>










                                                            <!--Fin Filtros de Tabla-->

                                                            <table id="dynamic-table"
                                                                class="table table-striped table-bordered table-hover   dataTable no-footer"
                                                                role="grid">

                                                                <thead>
                                                                    <tr role="row" style="background: #ffff">
                                                                        <th style="width: 20%">
                                                                            <strong>NOMBRE</strong></th>
                                                                            
                                                                        <th style="width: 5%"><strong>CANTIDAD</strong>
                                                                            <th style="width: 15%"><strong>PRESENTACIÓN</strong>
                                                                            <th style="width: 6%"><strong>DOSIS</strong>
                                                                            <th style="width: 14%"><strong>FECHA INGRESO</strong>
                                                                            <th style="width: 14%"><strong>FECHA VENCIMIENTO</strong>
                                                                            
                                                                            <th style="width: 15%"><strong>UBICACIÓN</strong>
                                                                            
                                                                        <th style="width: 15%"><strong>ACCIÓN</strong>
                                                                        </th>
                                                                    </tr>
                                                                </thead>

                                                                <tbody>


                                                                    <tr role="row" class="odd active">


                                                                        <td>
                                                                            <a href="vista-expediente.html"
                                                                                class="info tooltip-info "
                                                                                data-placement="right"
                                                                                data-rel="tooltip"
                                                                                title="Ir a Expediente">ASPIRINA</strong></a>
                                                                        </td>

                                                                        <td>
                                                                            15</td>

                                                                        <td>PASTILLA</td>

                                                                        <td>500 mg</td>

                                                                        
                                                                        <td>20/09/2019</td>
                                                                        <td>20/09/2020</td>

                                                                        <td>ESTANTE 1 SECCIÓN A</td>
                                                                        



                                                                        <td>


                                                                            <div
                                                                                class="hidden-sm hidden-xs action-buttons">

                                                                                


                                                                                <a class="green tooltip-info" href="#"
                                                                                    data-rel="tooltip" title="Modificar"
                                                                                    data-toggle="modal"
                                                                                    data-target="#modal-modificarmedic">
                                                                                    <i
                                                                                        class="ace-icon fa fa-pencil bigger-180"></i>
                                                                                </a>

                                                                                <a class="red tooltip-info" href="#"
                                                                                    data-rel="tooltip" title="Dar Baja">
                                                                                    <i
                                                                                        class="ace-icon fa fa-arrow-down bigger-180"></i>
                                                                                </a>
                                                                            </div>

                                                                            <div class="hidden-md hidden-lg">
                                                                                <div class="inline pos-rel">
                                                                                    <button
                                                                                        class="btn btn-minier btn-yellow dropdown-toggle"
                                                                                        data-toggle="dropdown"
                                                                                        data-position="auto">
                                                                                        <i
                                                                                            class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                                                                                    </button>

                                                                                    <ul
                                                                                        class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                                                                        <li>
                                                                                            <a href="#"
                                                                                                class="tooltip-info"
                                                                                                data-rel="tooltip"
                                                                                                title=""
                                                                                                data-original-title="View">
                                                                                                <span class="blue">
                                                                                                    <i
                                                                                                        class="ace-icon fa fa-search-plus bigger-120"></i>
                                                                                                </span>
                                                                                            </a>
                                                                                        </li>

                                                                                        <li>
                                                                                            <a href="#"
                                                                                                class="tooltip-success"
                                                                                                data-rel="tooltip"
                                                                                                title=""
                                                                                                data-original-title="Edit">
                                                                                                <span class="green">
                                                                                                    <i
                                                                                                        class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                                                                                </span>
                                                                                            </a>
                                                                                        </li>

                                                                                        <li>
                                                                                            <a href="#"
                                                                                                class="tooltip-error"
                                                                                                data-rel="tooltip"
                                                                                                title=""
                                                                                                data-original-title="Delete">
                                                                                                <span class="red">
                                                                                                    <i
                                                                                                        class="ace-icon fa fa-trash-o bigger-120"></i>
                                                                                                </span>
                                                                                            </a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </td>

                                                                    </tr>
                                                                    








                                                                </tbody>
                                                            </table>


                                                            <!--PIE DE TABLA (PAGINACION DE TABLA)-->
                                                            <div class="row tab-content">
                                                                <div class="col-xs-8">
                                                                    <div class="dataTables_info" id="dynamic-table_info"
                                                                        role="status" aria-live="polite">
                                                                        mostrando 1 a 10 de 23 registros
                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-4">
                                                                    <div class="dataTables_paginate paging_simple_numbers"
                                                                        id="dynamic-table_paginate">
                                                                        <ul class="pagination">
                                                                            <li class="paginate_button previous disabled"
                                                                                aria-controls="dynamic-table"
                                                                                tabindex="0"
                                                                                id="dynamic-table_previous">
                                                                                <a href="#">Previos</a>
                                                                            </li>
                                                                            <li class="paginate_button active btn-default"
                                                                                aria-controls="dynamic-table"
                                                                                tabindex="0"><a href="#">1</a>
                                                                            </li>
                                                                            <li class="paginate_button "
                                                                                aria-controls="dynamic-table"
                                                                                tabindex="0"><a href="#">2</a>
                                                                            </li>
                                                                            <li class="paginate_button "
                                                                                aria-controls="dynamic-table"
                                                                                tabindex="0"><a href="#">3</a>
                                                                            </li>
                                                                            <li class="paginate_button next"
                                                                                aria-controls="dynamic-table"
                                                                                tabindex="0" id="dynamic-table_next"><a
                                                                                    href="#">Siguiente</a>
                                                                            </li>

                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>


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









                            <!-- PAGE CONTENT ENDS -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>


                <?php include 'scripts/scripts-medicamento.php';?>


                <?php include 'modales/modal-medicamento.php';?>