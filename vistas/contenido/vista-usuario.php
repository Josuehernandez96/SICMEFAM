<div class="page-content" style="background: #edf7f7">


    <div class="page-header col-xs-12">
        <div class="widget-header widget-header-large">
            <h3 class="widget-title grey lighter">
                <i class="ace-icon fa fa-user blue"></i>
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">
                        USUARIOS
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


                    <div class="tab-content" style="height: auto">
                        <div id="home" class="tab-pane fade in active">

                            <div class="row">








                                <div class="col-sm-12">

                                    <div class="clearfix" style="background: #2aa5a5;color: #FFFF;padding-top: 5px;padding-right: 5px">

                                        <!--inicio area de botonos de tabla-->

                                        <div class="pull-right tableTools-container">

                                            <div class="dt-buttons btn-overlap btn-group">

                                                <a class="dt-button buttons-collection buttons-colvis btn btn-white btn-primary btn-bold" aria-controls="dynamic-table" data-original-title="" title="" onclick="nuevoregistro()" data-backdrop="static" data-keyboard="false" data-toggle="modal"  data-target="#modal-rgusuario">
                                                    <span>
                                                        <img src="<?php echo SERVERURL ;?>vistas/btn-nuevo.png" style="width: 30px;height: 30px;">&nbsp;Nuevo</span>
                                                    </span>
                                                </a>


                                                <a class="dt-button buttons-collection buttons-colvis btn btn-white btn-primary btn-bold" aria-controls="dynamic-table">
                                                    <span>
                                                        <img src="<?php echo SERVERURL ;?>vistas/btn-ayuda.png" style="width: 30px;height: 30px;">&nbsp;Ayuda</span>
                                                    </span>
                                                </a>
                                            </div>

                                            <!--fin area de botonos-->

                                        </div>

                                        <!--fin area de botonos de tabla-->

                                    </div>


                                    <div id="accordion" class="accordion-style1 panel-group">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title"></h4>
                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                    <i class="ace-icon fa fa-angle-down bigger-110" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i>
                                                    &nbsp;Usuario Administrador
                                                </a>
                                                </h4>
                                            </div>

                                            <div class="panel-collapse collapse in" id="collapseOne">

                                                <div id="acordeonadmin">
                                                    <?php

                                                    require_once "./controladores/usuarioControlador.php";
                                                    $insAdmin = new usuarioControlador();

                                                    $insAdmin->acordeon_admin_controlador();

                                                    ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title"></h4>
                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                                    <i class="ace-icon fa fa-angle-down bigger-110" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i>
                                                    &nbsp;Usuario Limitado
                                                </a>
                                                </h4>
                                            </div>

                                            <div class="panel-collapse collapse in" id="collapseTwo">

                                                <div id="acordeonsecret">
                                                    <?php

                                                    require_once "./controladores/usuarioControlador.php";
                                                    $insAdmi = new usuarioControlador();

                                                    $insAdmi->acordeon_limitado_controlador();

                                                    ?>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>





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
<?php include 'modales/modal-usuario.php'; ?>
<?php include 'scripts/scripts-usuario.php'; ?>