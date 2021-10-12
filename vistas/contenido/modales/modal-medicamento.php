<!--INICIO VENTANA EMERGENTE DE FORMULARIO PARA REGISTRO DE PACIENTES -->

<div id="modal-rgmedicamento" class="modal fade" tabindex="-1">
    <div class="modal-dialog" style="width: 50%">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header" style="background: #2aa5a5">
                    <button type="button" class="close" data-dismiss="modal" onclick="cancelar()" aria-hidden="true">
                        <span class="white">&times;</span>
                    </button>
                    <strong><i class="menu-icon fa fa-medkit"></i> Nuevo Medicamento</strong>
                </div>
            </div>

            <div class="modal-body no-padding" style="background: #fcf8e3">

                <form id="formmed" name="formmed" data-form="save" action="<?php echo SERVERURL; ?>/ajax/medicamentoAjax.php" method="POST">

                    <div class="col-sm-12" style="margin-top: 10px">




                        <div id="home" class="">

                            <h3 class="header smaller lighter default">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;"><strong>Datos Generales</strong><a class="pull-right" style="font-size:13px;margin-right:10px"> * Datos Obligatorios</a></font>
                                </font>
                            </h3>

                            <div class="well" style="height:400px;overflow-y: auto;">
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="nombremed">Nombre <a>*</a></label>
                                        <input type="text" class="form-control" id="nombremed" placeholder="" />
                                        <div id="nombre-error" style="display:none;color:red" class="help-block">
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label for="cantidad">Cantidad inicial <a>*</a></label>
                                        <input type="text" class="form-control" id="cantidad" placeholder="" onkeypress="return soloNumeros(event)" />
                                        <div id="cantidad-error" style="display:none;color:red" class="help-block"></div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="presentacion">
                                            Presentacion <a>*</a></label>
                                        <select class="form-control " id="presentacion" name="presentacion">Capsula</option>
                                            <option value="pastilla">Pastilla</option>
                                            <option value="capsula">Capsula</option>
                                            <option value="Jarabe">Jarabe</option>
                                            <option value="Gotas">Gotas</option>
                                            <option value="Gel">Gel</option>
                                            <option value="Pildora">Pildora</option>
                                            <option value="Pomada">Pomada</option>
                                            <option value="Crema">Crema</option>
                                            <option value="Polvos">Polvos</option>
                                            <option value="Ampollas">Ampollas</option>
                                            <option value="Inyecciones">Inyecciones</option>
                                        </select>
                                        <div id="presentacion-error" style="display:none;color:red" class="help-block"></div>
                                    </div>


                                    <div class="form-group col-lg-3">

                                        <label for="contenido">
                                            Contenido <a>*</a></label>
                                        <input type="text" class="form-control" id="contenido" placeholder="" onkeypress="return soloNumeros(event)" />
                                        <div id="contenido-error" style="display:none;color:red" class="help-block"></div>

                                    </div>
                                    <div class="form-group col-lg-3 " style="margin-top: 6px">
                                        <label for="medidas"></i>
                                        </label>
                                        <select class="form-control " id="medidas">
                                            <option value="mg">miligramos</option>
                                            <option value="ml">mililitros</option>
                                        </select>
                                        <div id="medidas-error" style="display:none;color:red" class="help-block"></div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="fechaingreso"><i class="fa fa-calendar bigger-110"></i> Fecha de Ingreso
                                            <a>*</a></label>
                                        <input class="form-control date-picker input-mask-date" id="fechaingreso" type="text" value="<?php echo  date('d/m/Y'); ?>" disabled="true" data-date-format="dd/mm/yyyy">
                                        <div id="fechaingreso-error" style="display:none;color:red" class="help-block"></div>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="fechavencimiento"><i class="fa fa-calendar bigger-110"></i> Fecha de
                                            de Vencimiento <a>*</a></label>
                                        <input class="form-control date-picker input-mask-date" readonly id="fechavencimiento" type="text" data-date-format="dd/mm/yyyy">
                                        <div id="fechavencimiento-error" style="display:none;color:red" class="help-block"></div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="form-group col-lg-6 ">
                                        <label for="tipo"></i>Tipo <a>*</a>
                                        </label>
                                        <select class="form-control " id="tipo">

                                            <option value="Analgesicos">Analgésicos</option>
                                            <option value="Antiacidos y antiulcerosos">Antiácidos y antiulcerosos</option>
                                            <option value="Antialergicos">Antialérgicos</option>
                                            <option value="Antidiarreicos y laxantes">Antidiarreicos y laxantes</option>
                                            <option value="Antiinfecciosos">Antiinfecciosos</option>
                                            <option value="Antiinflamatorios">Antiinflamatorios</option>
                                            <option value="Antipireticos">Antipiréticos</option>
                                            <option value="Antitusivos y mucoliticos">Antitusivos y mucolíticos</option>

                                        </select>
                                        <div id="tipo-error" style="display:none;color:red" class="help-block"></div>
                                    </div>

                                    <div class="form-group col-lg-6">

                                        <label for="ubicacion">
                                            Ubicación <a>*</a></label>
                                        <input type="text" class="form-control" id="ubicacion" placeholder="" />
                                        <div id="ubicacion-error" style="display:none;color:red" class="help-block"></div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-lg-6 " style="margin-top: 6px">
                                        <label for="administracion"></i>Administración <a>*</a>
                                        </label>
                                        <select class="form-control " id="administracion">

                                            <option value="orales">Orales</option>
                                            <option value="intravenosos">Intravenosa</option>
                                            <option value="topicos">Topicos</option>

                                        </select>
                                        <div id="administracion-error" style="display:none;color:red" class="help-block"></div>
                                    </div>


                                    <div class="form-group col-lg-6 " style="margin-top: 6px">
                                        <label for="proveedor"></i>Proveedor <a>*</a>
                                        </label>
                                        <br>

                                        <?php
                                        require_once "./controladores/medicamentoControlador.php";
                                        $insAdmin = new medicamentoControlador();

                                        $insAdmin->selector_proveedor_controlador();
                                        ?>

                                        <div id="proveedor-error" style="display:none;color:red" class="help-block"></div>


                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-lg-6">

                                        <label for="stockmin">
                                            Stock Minimo <a>*</a></label>
                                        <input type="text" class="form-control" id="stockmin" placeholder="" onkeypress="return soloNumeros(event)" />
                                        <div id="stock-error" style="display:none;color:red" class="help-block"></div>

                                    </div>
                                </div>





                            </div>
                            <br>















                        </div>






                    </div>



                </form>


            </div>

            <!-- /.PIE DE VENTANA EMERGENTE -->

            <div class="modal-footer no-margin-top ">


                <button class="btn btn-primary btn-white btn-round pull-left" style="margin-top: 10px" id="btnguardar">

                    <img src="<?php echo SERVERURL; ?>vistas/btn-agregar.png" style="width: 30px;height: 30px;"> Guardar

                </button>


                <button class=" btn btn-danger btn-white btn-round pull-left" style="margin-top: 10px;color:#2aa5a5" data-dismiss="modal" onclick="cancelar()">

                    <img src="<?php echo SERVERURL; ?>vistas/btn-cancelar.png" style="width: 30px;height: 30px;"><strong> Cancelar
                    </strong>
                </button>

                <button class="btn btn-danger   pull-rigth " style="margin-top: 10px;;margin-rigth:25px;color:#2aa5a5 ;visibility: hidden; padding: 6px 0px;" id="alerta">

                    <strong><i class="fa fa-warning"></i> Completar campos obligatorios</strong>

                </button>



            </div>

        </div>
        <!-- /.CONTENIDO DE VENTANA EMERGENTE -->

    </div>
</div>



<!--INICIO VENTANA MODAL PARA ACERCA DE -->


<!--INICIO VENTANA EMERGENTE DE FORMULARIO PARA REGISTRO DE PACIENTES -->

<div id="modal-modificarmedic" class="modal fade" tabindex="-1">
    <div class="modal-dialog" style="width: 50%">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header" style="background: #2aa5a5">
                    <button type="button" class="close" data-dismiss="modal" onclick="cancelar()" aria-hidden="true">
                        <span class="white">&times;</span>
                    </button>
                    <strong><i class="menu-icon fa fa-medkit"></i> Modificar Medicamento</strong>
                </div>
            </div>

            <div class="modal-body no-padding" style="background: #fcf8e3">

                <form id="formmod" name="formmod" data-form="save" action="<?php echo SERVERURL; ?>/ajax/medicamentoAjax.php" method="POST">

                    <div class="col-sm-12" style="margin-top: 10px">



                        <div class="tab-content">
                            <div id="home" class="tab-pane fade in active">

                                <strong>Datos<a class="pull-right" style="font-size: 10px;margin-left: 15px">(*) Campos Obligatorios</a> </strong>


                                <div class="tab-content">
                                    <div class="row">
                                        <input type="hidden" id="medid" />
                                        <div class="form-group col-lg-6">
                                            <label for="nombremod">Nombre <a>*</a></label>
                                            <input type="text" class="form-control" id="nombremod" placeholder="" />
                                            <div id="nombremod-error" style="display:none;color:red" class="help-block">
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="presentacionmod">
                                                Presentacion <a>*</a></label>
                                            <select class="form-control " id="presentacionmod" name="presentacionmod" <option value="capsula">Capsula</option>
                                                <option value="pastilla">Pastilla</option>
                                                <option value="capsula">Capsula</option>
                                                <option value="Jarabe">Jarabe</option>
                                                <option value="Gotas">Gotas</option>
                                                <option value="Gel">Gel</option>
                                                <option value="Pildora">Pildora</option>
                                                <option value="Pomada">Pomada</option>
                                                <option value="Crema">Crema</option>
                                                <option value="Polvos">Polvos</option>
                                                <option value="Ampollas">Ampollas</option>
                                                <option value="Inyecciones">Inyecciones</option>
                                            </select>
                                            <div id="presentacionmod-error" style="display:none;color:red" class="help-block"></div>
                                        </div>

                                    </div>

                                    <div class="row">



                                        <div class="form-group col-lg-3">

                                            <label for="contenidomod">
                                                Contenido <a>*</a></label>
                                            <input type="text" class="form-control" id="contenidomod" placeholder="" onkeypress="return soloNumeros(event)" />
                                            <div id="contenidomod-error" style="display:none;color:red" class="help-block"></div>

                                        </div>
                                        <div class="form-group col-lg-3 " style="margin-top: 6px">
                                            <label for="medidasmod"></i>
                                            </label>
                                            <select class="form-control " id="medidasmod">
                                                <option value="mg">miligramos</option>
                                                <option value="ml">mililitros</option>
                                            </select>
                                            <div id="medidasmod-error" style="display:none;color:red" class="help-block"></div>
                                        </div>

                                        <div class="form-group col-lg-6 ">
                                            <label for="tipomod"></i>Tipo <a>*</a>
                                            </label>
                                            <select class="form-control " id="tipomod">

                                                <option value="Analgesicos">Analgésicos</option>
                                                <option value="Antiacidos y antiulcerosos">Antiácidos y antiulcerosos</option>
                                                <option value="Antialergicos">Antialérgicos</option>
                                                <option value="Antidiarreicos y laxantes">Antidiarreicos y laxantes</option>
                                                <option value="Antiinfecciosos">Antiinfecciosos</option>
                                                <option value="Antiinflamatorios">Antiinflamatorios</option>
                                                <option value="Antipireticos">Antipiréticos</option>
                                                <option value="Antitusivos y mucoliticos">Antitusivos y mucolíticos</option>

                                            </select>
                                            <div id="tipomod-error" style="display:none;color:red" class="help-block"></div>
                                        </div>



                                    </div>


                                    <div class="row">



                                        <div class="form-group col-lg-6 ">
                                            <label for="administracionmod"></i>Administración <a>*</a>
                                            </label>
                                            <select class="form-control " id="administracionmod">

                                                <option value="orales">Orales</option>
                                                <option value="intravenosos">Intravenosa</option>
                                                <option value="topicos">Topicos</option>

                                            </select>
                                            <div id="administracionmod-error" style="display:none;color:red" class="help-block"></div>
                                        </div>

                                        <div class="form-group col-lg-6">

                                            <label for="stockminmod">
                                                Stock Minimo <a>*</a></label>
                                            <input type="text" class="form-control" id="stockminmod" placeholder="" onkeypress="return soloNumeros(event)" />
                                            <div id="stockmod-error" style="display:none;color:red" class="help-block"></div>

                                        </div>



                                    </div>

                                </div>
                                <br>



                            </div>




                        </div>

                    </div>



                </form>


            </div>

            <!-- /.PIE DE VENTANA EMERGENTE -->

            <div class="modal-footer no-margin-top ">


                <button class="btn btn-primary btn-white btn-round pull-left " style="margin-top: 10px;color:#2aa5a5" id="btneditar">

                    <img src="<?php echo SERVERURL; ?>vistas/btn-agregar.png" style="width: 30px;height: 30px"> <strong>Guardar Cambios</strong>

                </button>


                <button class=" btn btn-danger btn-white btn-round pull-left" style="margin-top: 10px;color:#2aa5a5" data-dismiss="modal" onclick="cancelar()">

                    <img src="<?php echo SERVERURL; ?>vistas/btn-cancelar.png" style="width: 30px;height: 30px;"><strong> Cancelar
                    </strong>
                </button>

                <button class="btn btn-danger   pull-rigth " style="margin-top: 10px;;margin-rigth:25px;color:#2aa5a5 ;visibility: hidden; padding: 6px 0px;" id="alertamod">

                    <strong><i class="fa fa-warning"></i> Completar campos obligatorios</strong>

                </button>



            </div>

        </div>
        <!-- /.CONTENIDO DE VENTANA EMERGENTE -->

    </div>
</div>

<div id="modal-modificarinv" class="modal fade" tabindex="-1">
    <div class="modal-dialog" style="width: 50%">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header" style="background: #2aa5a5">
                    <button type="button" class="close" data-dismiss="modal" onclick="cancelar()" aria-hidden="true">
                        <span class="white">&times;</span>
                    </button>
                    <strong id="texto"><i class="menu-icon fa fa-medkit"></i> Modificar Medicamento</strong>
                </div>
            </div>

            <div class="modal-body no-padding" style="background: #fcf8e3">

                <form id="formmodinv" name="formmodinv" data-form="save" action="<?php echo SERVERURL; ?>/ajax/medicamentoAjax.php" method="POST">

                    <div class="col-sm-12" style="margin-top: 10px">



                        <div class="tab-content">
                            <div id="home" class="tab-pane fade in active">

                                <strong>Datos<a class="pull-right" style="font-size: 10px;margin-left: 15px">(*) Campos Obligatorios</a> </strong>


                                <div class="tab-content">
                                    <div class="row">
                                        <input type="hidden" id="invid" />
                                        <input type="hidden" id="idmedicamento" />

                                        <div class="form-group col-lg-6">
                                            <label for="fechaingresomodinv"><i class="fa fa-calendar bigger-110"></i> Fecha de Ingreso
                                                <a>*</a></label>
                                            <input class="form-control date-picker input-mask-date" id="fechaingresomodinv" type="text" value="<?php echo  date('d/m/Y'); ?>" disabled="true" data-date-format="dd/mm/yyyy">
                                            <div id="fechaingresomodinv-error" style="display:none;color:red" class="help-block"></div>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="fechavencimientomodinv"><i class="fa fa-calendar bigger-110"></i> Fecha de
                                                de Vencimiento <a>*</a></label>
                                            <input class="form-control date-picker input-mask-date" readonly id="fechavencimientomodinv" type="text" data-date-format="dd/mm/yyyy">
                                            <div id="fechavencimientomodinv-error" style="display:none;color:red" class="help-block"></div>
                                        </div>


                                    </div>



                                    <div class="row">

                                        <div class="form-group col-lg-6">
                                            <label for="cantidadmodinv">Cantidad<a>*</a></label>
                                            <input type="text" class="form-control" id="cantidadmodinv" placeholder="" onkeypress="return soloNumeros(event)" />
                                            <div id="cantidadmodinv-error" style="display:none;color:red" class="help-block"></div>
                                        </div>
                                        <div class="form-group col-lg-6 " style="margin-top: 6px">
                                            <label for="proveedormodinv"></i>Proveedor <a>*</a>
                                            </label>
                                            <br>
                                            <div id="p">
                                                <?php
                                                require_once "./controladores/medicamentoControlador.php";
                                                $insAdmin = new medicamentoControlador();

                                                $insAdmin->selector_proveedor_controladorinv();
                                                ?>
                                            </div>
                                            <div id="proveedormodinv-error" style="display:none;color:red" class="help-block">
                                            </div>


                                        </div>
                                    </div>



                                    <div class="row">

                                        <div class="form-group col-lg-6">

                                            <label for="ubicacionmodinv">Ubicación <a>*</a></label>
                                            <input type="text" class="form-control" id="ubicacionmodinv" placeholder="" />
                                            <div id="ubicacionmodinv-error" style="display:none;color:red" class="help-block"></div>

                                        </div>

                                    </div>


                                </div>



                            </div>
                            <br>



                        </div>




                    </div>

            </div>



            </form>


        </div>

        <!-- /.PIE DE VENTANA EMERGENTE -->

        <div class="modal-footer no-margin-top ">


            <button class="btn btn-primary btn-white btn-round pull-left " style="margin-top: 10px;color:#2aa5a5; display: none;" id="btneditarinv">

                <img src="<?php echo SERVERURL; ?>vistas/btn-agregar.png" style="width: 30px;height: 30px"> <strong>Guardar Cambios</strong>

            </button>

            <button class="btn btn-primary btn-white btn-round pull-left " style="margin-top: 10px;color:#2aa5a5; " id="btnagregarinv">

                <img src="<?php echo SERVERURL; ?>vistas/btn-agregar.png" style="width: 30px;height: 30px"> <strong>Guardar</strong>

            </button>


            <button class=" btn btn-danger btn-white btn-round pull-left" style="margin-top: 10px;color:#2aa5a5" data-dismiss="modal" onclick="cancelar()">

                <img src="<?php echo SERVERURL; ?>vistas/btn-cancelar.png" style="width: 30px;height: 30px;"><strong> Cancelar
                </strong>
            </button>

            <button class="btn btn-danger   pull-rigth " style="margin-top: 10px;;margin-rigth:25px;color:#2aa5a5 ;visibility: hidden; padding: 6px 0px;" id="alertamodinv">

                <strong><i class="fa fa-warning"></i> Completar campos obligatorios</strong>

            </button>



        </div>

    </div>
    <!-- /.CONTENIDO DE VENTANA EMERGENTE -->

</div>



<!--INICIO VENTANA MODAL PARA ACERCA DE -->

<div id="modal-acerca" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header" style="background: #2aa5a5">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <span class="white">&times;</span>
                    </button>
                    <strong>Acerca de</strong>
                </div>
            </div>
            <!-- CONTENIDO DE MODAL -->
            <div class="modal-body no-padding" style="background: #fcf8e3">


                <!--FORMULARIO PARA REGISTRO DE PACIENTE-->
                <form>


                    <div class="col-sm-12" style="margin-top: 10px">



                        <div class="tab-content">
                            <div id="home" class="tab-pane fade in active">

                                <strong>SICMEDIC</strong> surge al conocer la situación la necesidad del
                                consultorio médica de la Doctor
                                Ana Luisa Velázquez, puesto que ellos no contaban con un sistema informático
                                para la sistematización de sus
                                pacientes.
                                <br>
                                <br>
                                Para la elaboración de dicho sistema se tomaron muy en cuenta las factibilidades
                                operativas, técnicas y económicas, las cuales
                                nos brindaron la información necesaria para la realización de SICMEDIC
                                <br>
                                <br>
                                <strong>Desarolladores:</strong>
                                <br>
                                David Flores Guzmán
                                <br>
                                Oscar René Muñoz Garcia
                                <br>
                                Emerson Josué Palacios
                                <br>
                                Miguel Ángel Beltran Morán
                                <br>
                                <strong class="pull-right"> Diseño de Sistemas II</strong>




                                <p style="visibility: hidden">Raw denim you probably haven't heard of them jean
                                    shorts Austin.</p>

                            </div>



                        </div>
                    </div>



                </form>


            </div>

            <!-- /.PIE DE VENTANA EMERGENTE -->

            <div class="modal-footer no-margin-top ">



                <button class="btn btn-warning btn-white btn-round pull-right " style="margin-top: 10px" data-dismiss="modal">

                    <i class="fa fa-check"></i><strong>Aceptar</strong>

                </button>







            </div>

        </div>
        <!-- /.CONTENIDO DE VENTANA EMERGENTE -->

    </div>
</div>