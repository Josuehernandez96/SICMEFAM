var dir = $("input[name='dir']").val();


function soloNumeros(e) {
    var keynum = window.event ? window.event.keyCode : e.which;
    if ((keynum == 8) || (keynum == 46))
        return true;
    return /\d/.test(String.fromCharCode(keynum));

}

function soloLetras(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = "8-37-39-46";

    tecla_especial = false
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
    }
}

function cancelar() {


    document.getElementById("formmed").reset();

    document.getElementById("formmod").reset();
    document.getElementById("formmodinv").reset();

    document.getElementById("nombre-error").style.display = "none";
    document.getElementById("presentacion-error").style.display = "none";
    document.getElementById("cantidad-error").style.display = "none";
    document.getElementById("contenido-error").style.display = "none";
    document.getElementById("medidas-error").style.display = "none";
    document.getElementById("fechaingreso-error").style.display = "none";
    document.getElementById("fechavencimiento-error").style.display = "none";
    document.getElementById("stock-error").style.display = "none";
    document.getElementById("ubicacion-error").style.display = "none";
    document.getElementById("administracion-error").style.display = "none";
    document.getElementById("proveedor-error").style.display = "none";
    document.getElementById("tipo-error").style.display = "none";
    document.getElementById("alerta").style.visibility = "hidden";

    document.getElementById("nombremed").style.borderColor = "";
    document.getElementById("presentacion").style.borderColor = "";
    document.getElementById("cantidad").style.borderColor = "";
    document.getElementById("contenido").style.borderColor = "";
    document.getElementById("medidas").style.borderColor = "";
    document.getElementById("fechaingreso").style.borderColor = "";
    document.getElementById("fechavencimiento").style.borderColor = "";
    document.getElementById("stockmin").style.borderColor = "";
    document.getElementById("ubicacion").style.borderColor = "";
    document.getElementById("administracion").style.borderColor = "";
    document.getElementById("proveedor").style.borderColor = "";

    document.getElementById("tipo").style.borderColor = "";



    document.getElementById("nombremod-error").style.display = "none";
    document.getElementById("presentacionmod-error").style.display = "none";
    document.getElementById("contenidomod-error").style.display = "none";
    document.getElementById("medidasmod-error").style.display = "none";
    document.getElementById("stockmod-error").style.display = "none";
    document.getElementById("administracionmod-error").style.display = "none";

    document.getElementById("tipomod-error").style.display = "none";
    document.getElementById("alertamod").style.visibility = "hidden";

    document.getElementById("nombremod").style.borderColor = "";
    document.getElementById("presentacionmod").style.borderColor = "";
    document.getElementById("contenidomod").style.borderColor = "";
    document.getElementById("medidasmod").style.borderColor = "";
    document.getElementById("stockminmod").style.borderColor = "";
    document.getElementById("administracionmod").style.borderColor = "";

    document.getElementById("tipomod").style.borderColor = "";

    document.getElementById("fechavencimientomodinv-error").style.display = "none";
    document.getElementById("cantidadmodinv-error").style.display = "none";
    document.getElementById("proveedormodinv-error").style.display = "none";
    document.getElementById("ubicacionmodinv-error").style.display = "none";
    document.getElementById("alertamodinv").style.visibility = "hidden";

    document.getElementById("fechavencimientomodinv").style.borderColor = "";
    document.getElementById("cantidadmodinv").style.borderColor = "";
    document.getElementById("proveedormodinv").style.borderColor = "";
    document.getElementById("ubicacionmodinv").style.borderColor = "";



}



$("#btnguardar").click(function() {
    var nombre = $('#nombremed');

    var cantidad = $('#cantidad');
    var presentacion = $('#presentacion');
    var contenido = $('#contenido');
    var medidas = $('#medidas');
    var fechaingreso = $('#fechaingreso');
    var fechavencimiento = $('#fechavencimiento');
    var stock = $('#stockmin');
    var ubicacion = $('#ubicacion');
    var administracion = $('#administracion');
    var proveedor = $('#proveedor');
    var tipo = $('#tipo');

    var alert = $('#alerta');

    if (nombre.val() == "") {
        nombre.css("border-color", "red");
        $('#nombre-error').css('display', 'block');
        $('#nombre-error').html('campo obligatorio');


    } else {
        $('#nombre-error').css('display', 'none');
        $('#nombre-error').html('');


    }

    if (presentacion.val() == "") {
        presentacion.css("border-color", "red");
        $('#presentacion-error').css('display', 'block');
        $('#presentacion-error').html('campo obligatorio');


    } else {
        $('#presentacion-error').css('display', 'none');
        $('#presentacion-error').html('');


    }

    if (cantidad.val() == "") {
        cantidad.css("border-color", "red");
        $('#cantidad-error').css('display', 'block');
        $('#cantidad-error').html('campo obligatorio');


    } else {
        $('#cantidad-error').css('display', 'none');
        $('#cantidad-error').html('');


    }

    if (contenido.val() == "") {
        contenido.css("border-color", "red");
        $('#contenido-error').css('display', 'block');
        $('#contenido-error').html('campo obligatorio');


    } else {
        $('#contenido-error').css('display', 'none');
        $('#contenido-error').html('');


    }

    if (medidas.val() == "") {
        medidas.css("border-color", "red");
        $('#medidas-error').css('display', 'block');
        $('#medidas-error').html('campo obligatorio');

    } else {
        $('#medidas-error').css('display', 'none');
        $('#medidas-error').html('');


    }

    if (fechaingreso.val() == "") {
        fechaingreso.css("border-color", "red");
        $('#fechaingreso-error').css('display', 'block');
        $('#fechaingreso-error').html('campo obligatorio');

    } else {
        $('#fechaingreso-error').css('display', 'none');
        $('#fechaingreso-error').html('');


    }
    if (fechavencimiento.val() == "") {
        fechavencimiento.css("border-color", "red");
        $('#fechavencimiento-error').css('display', 'block');
        $('#fechavencimiento-error').html('campo obligatorio');

    } else {
        $('#fechavencimiento-error').css('display', 'none');
        $('#fechavencimiento-error').html('');


    }
    if (stock.val() == "") {
        stock.css("border-color", "red");
        $('#stock-error').css('display', 'block');
        $('#stock-error').html('campo obligatorio');

    } else {
        $('#stock-error').css('display', 'none');
        $('#stock-error').html('');


    }
    if (ubicacion.val() == "") {
        ubicacion.css("border-color", "red");
        $('#ubicacion-error').css('display', 'block');
        $('#ubicacion-error').html('campo obligatorio');

    } else {
        $('#ubicacion-error').css('display', 'none');
        $('#ubicacion-error').html('');


    }
    if (administracion.val() == "") {
        administracion.css("border-color", "red");
        $('#administracion-error').css('display', 'block');
        $('#administracion-error').html('campo obligatorio');

    } else {
        $('#administracion-error').css('display', 'none');
        $('#administracion-error').html('');


    }
    if (proveedor.val() == "") {
        proveedor.css("border-color", "red");
        $('#proveedor-error').css('display', 'block');
        $('#proveedor-error').html('campo obligatorio');

    } else {
        $('#proveedor-error').css('display', 'none');
        $('#proveedor-error').html('');


    }
    if (tipo.val() == "") {
        tipo.css("border-color", "red");
        $('#tipo-error').css('display', 'block');
        $('#tipo-error').html('campo obligatorio');

    } else {
        $('#tipo-error').css('display', 'none');
        $('#tipo-error').html('');


    }


    if (proveedor.val() != "" && nombre.val() != "" && cantidad.val() != "" && presentacion.val() != "" && contenido.val() != "" && medidas.val() != "" &&
        fechaingreso.val() != "" && fechavencimiento.val() != "" && stock.val() != "" && ubicacion.val() != "" && administracion.val() != "" && tipo.val() != "") {
        alert.css("visibility", "hidden");
        enviardatos();
    } else {
        alert.css("visibility", "visible");
    }


});


$("#nombremed").keyup(function() {
    if ($("#nombremed").val() == "") {
        $('#nombre-error').css('display', 'block');
        $('#nombre-error').html('campo obligatorio');
        $("#nombremed").css("border-color", "red");
    } else {
        $('#nombre-error').css('display', 'none');
        $('#nombre-error').html('');
        document.getElementById("nombremed").style.borderColor = "";


    }
    if ($("#nombremed").val().length == 50) {
        $('#nombre-error').css('display', 'block');
        $('#nombre-error').html('50 caracteres maximo');
    }

});

$('#cantidad').keyup(function() {
    if ($('#cantidad').val() == "") {
        $('#cantidad-error').css('display', 'block');
        $('#cantidad-error').html('campo obligatorio');
        $("#cantidad").css("border-color", "red");
    } else {
        $('#cantidad-error').css('display', 'none');
        $('#cantidad-error').html('');
        document.getElementById("cantidad").style.borderColor = "";


    }
    if ($("#cantidad").val().length == 50) {
        $('#cantidad-error').css('display', 'block');
        $('#cantidad-error').html('50 caracteres maximo');
    }

});

$('#contenido').keyup(function() {
    if ($('#contenido').val() == "") {
        $('#contenido-error').css('display', 'block');
        $('#contenido-error').html('campo obligatorio');
        $("#contenido").css("border-color", "red");
    } else {
        $('#contenido-error').css('display', 'none');
        $('#contenido-error').html('');
        document.getElementById("contenido").style.borderColor = "";


    }
    if ($("#contenido").val().length == 50) {
        $('#contenido-error').css('display', 'block');
        $('#contenido-error').html('50 caracteres maximo');
    }

});

$('#stockmin').keyup(function() {
    if ($('#stockmin').val() == "") {
        $('#stock-error').css('display', 'block');
        $('#stock-error').html('campo obligatorio');
        $("#stockmin").css("border-color", "red");
    } else {
        $('#stock-error').css('display', 'none');
        $('#stock-error').html('');
        document.getElementById("stockmin").style.borderColor = "";


    }
    if ($("#stockmin").val().length == 50) {
        $('#stock-error').css('display', 'block');
        $('#stock-error').html('50 caracteres maximo');
    }

});

$('#ubicacion').keyup(function() {
    if ($('#ubicacion').val() == "") {
        $('#ubicacion-error').css('display', 'block');
        $('#ubicacion-error').html('campo obligatorio');
        $("#ubicacion").css("border-color", "red");
    } else {
        $('#ubicacion-error').css('display', 'none');
        $('#ubicacion-error').html('');
        document.getElementById("ubicacion").style.borderColor = "";


    }
    if ($("#ubicacion").val().length == 50) {
        $('#ubicacion-error').css('display', 'block');
        $('#ubicacion-error').html('50 caracteres maximo');
    }

});

$('#proveedor').click(function() {
    if ($('#proveedor').val() == "") {
        $('#proveedor-error').css('display', 'block');
        $('#proveedor-error').html('campo obligatorio');
        $("#proveedor").css("border-color", "red");
    } else {
        $('#proveedor-error').css('display', 'none');
        $('#proveedor-error').html('');
        document.getElementById("proveedor").style.borderColor = "";


    }
    if ($("#proveedor").val().length == 50) {
        $('#proveedor-error').css('display', 'block');
        $('#proveedor-error').html('50 caracteres maximo');
    }

});

$('#fechavencimiento').click(function() {
    if ($('#fechavencimiento').val() == "") {
        $('#fechavencimiento-error').css('display', 'block');
        $('#fechavencimiento-error').html('campo obligatorio');
        $("#fechavencimiento").css("border-color", "red");
    } else {
        $('#fechavencimiento-error').css('display', 'none');
        $('#fechavencimiento-error').html('');
        document.getElementById("fechavencimiento").style.borderColor = "";


    }
    if ($("#fechavencimiento").val().length == 50) {
        $('#fechavencimiento-error').css('display', 'block');
        $('#fechavencimiento-error').html('50 caracteres maximo');
    }

});



function enviardatos() {


    var form = $('#formmed');

    var tipo = form.attr('data-form');
    var accion = dir + "ajax/medicamentoAjax.php";
    var metodo = form.attr('method');
    var respuesta = form.children('.RespuestaAjax');

    var msjError = "<script>swal('Ocurrió un error inesperado','Por favor recargue la página','error');</script>";



    var textoAlerta;
    if (tipo === "save") {
        textoAlerta = "Los datos que enviaras quedaran almacenados en el sistema";
    } else if (tipo === "delete") {
        textoAlerta = "Los datos serán eliminados completamente del sistema";
    } else if (tipo === "update") {
        textoAlerta = "Los datos del sistema serán actualizados";
    } else {
        textoAlerta = "Quieres realizar la operación solicitada";
    }


    swal({
        title: "¿Estás seguro?",
        text: textoAlerta,
        type: "question",
        showCancelButton: true,
        confirmButtonText: "Aceptar",
        cancelButtonText: "Cancelar"
    }).then(function() {
        $.ajax({
            method: metodo,
            url: dir + "ajax/medicamentoAjax.php",
            data: {
                nombre: $('#nombremed').val(),
                cantidad: $('#cantidad').val(),
                presentacion: $('#presentacion').val(),
                contenido: $('#contenido').val(),
                medidas: $('#medidas').val(),
                fechaingreso: $('#fechaingreso').val(),
                fechavencimiento: $('#fechavencimiento').val(),
                stock: $('#stockmin').val(),
                ubicacion: $('#ubicacion').val(),
                administracion: $('#administracion').val(),
                tipom: $('#tipo').val(),
                proveedor: $('#proveedor').val(),
                accion: tipo
            }
        }).done(function(msg) {
            $("#respuesta").html(msg);


        });

        return false;
    });
}

function actualizar() {
    document.location.reload(true);
}

function eliminar(id) {

    swal({
        title: "¿Estás seguro de eliminar el medicamento?",
        text: '',
        type: "question",
        showCancelButton: true,
        confirmButtsonText: "Aceptar",
        cancelButtonText: "Cancelar"
    }).then(function() {

        $.ajax({
            method: "POST",
            url: dir + "ajax/medicamentoAjax.php",
            data: {
                idinventario: id,
                accion: "eliminar"
            }
        }).done(function(msg) {
            $("#respuesta").html(msg);

        });

    });

}

function eliminarmed(id) {

    swal({
        title: "¿Estás seguro de eliminar el medicamento?",
        text: '',
        type: "question",
        showCancelButton: true,
        confirmButtsonText: "Aceptar",
        cancelButtonText: "Cancelar"
    }).then(function() {

        $.ajax({
            method: "POST",
            url: dir + "ajax/medicamentoAjax.php",
            data: {
                idmedicamento: id,
                accion: "eliminarmed"
            }
        }).done(function(msg) {
            $("#respuesta").html(msg);
            $.ajax({
                    method: "POST",
                    url: dir + "ajax/medicamentoAjax.php",
                    data: { porpagina: 10, accion: "alltabla" }
                })
                .done(function(msg) {
                    $("#tablamedicamento").html(msg);
                });
        });

    });

}


function ExtraerDatosMod(idmedicamento) {

    $.ajax({
            method: "POST",
            url: dir + "ajax/medicamentoAjax.php",
            data: { idmedicamento: idmedicamento, accion: "obtenerdatosmedicamento" }
        })
        .done(function(msg) {

            document.getElementById("medid").value = idmedicamento;

            var datos = JSON.parse(msg);

            document.getElementById("nombremod").value = datos.nombremed;
            document.getElementById("presentacionmod").value = datos.presentacion;

            document.getElementById("contenidomod").value = datos.contenido;
            document.getElementById("medidasmod").value = datos.medidas;
            document.getElementById("stockminmod").value = datos.stockmin;
            document.getElementById("administracionmod").value = datos.administracion;

            document.getElementById("tipomod").value = datos.tipo;

        });
}

function ExtraerDatosinv(idinventario) {
    document.getElementById("texto").innerHTML = "<i class='menu-icon fa fa-medkit'></i> Modificar Medicamento";
    document.getElementById("btneditarinv").style.display = "block";
    document.getElementById("btnagregarinv").style.display = "none";
    $.ajax({
            method: "POST",
            url: dir + "ajax/medicamentoAjax.php",
            data: { accion: "proveedores" }
        })
        .done(function(msg) {
            $("#proveedormodinv").html(msg);
            Extraer(idinventario);
        });
}

function Extraer(idinventario) {
    document.getElementById("btneditarinv").style.display = "block";
    document.getElementById("btnagregarinv").style.display = "none";
    $.ajax({
            method: "POST",
            url: dir + "ajax/medicamentoAjax.php",
            data: { idinventario: idinventario, accion: "obtenerdatosinventario" }
        })
        .done(function(msg) {

            document.getElementById("invid").value = idinventario;

            var datos = JSON.parse(msg);
            var formatfecha = datos.fechav.substr(8, 2, 3) + "/" + datos.fechav.substr(5, 2, 3) + "/" + datos.fechav.substr(0, 4);

            var formatfechai = datos.fechai.substr(8, 2, 3) + "/" + datos.fechai.substr(5, 2, 3) + "/" + datos.fechai.substr(0, 4);

            document.getElementById("fechaingresomodinv").value = formatfechai;

            document.getElementById("fechavencimientomodinv").value = formatfecha;
            document.getElementById("ubicacionmodinv").value = datos.ubicacion;

            document.getElementById("cantidadmodinv").value = datos.cantidad;
            if (datos.estado == 0) {
                $("#proveedormodinv").append("<option value='" + datos.proveedor + "'>" + datos.nombre + "</option>");
            }
            document.getElementById("proveedormodinv").value = datos.proveedor;

        });
}









function enviardatosmod() {


    var form = $('#formmod');

    var tipo = form.attr('data-form');
    var accion = form.attr('action');
    var metodo = form.attr('method');
    var respuesta = form.children('.RespuestaAjax');

    var msjError = "<script>swal('Ocurrió un error inesperado','Por favor recargue la página','error');</script>";



    var textoAlerta;
    if (tipo === "save") {
        textoAlerta = "Los datos del sistema serán actualizados";
    } else {
        textoAlerta = "Quieres realizar la operación solicitada";
    }


    swal({
        title: "¿Estás seguro?",
        text: textoAlerta,
        type: "question",
        showCancelButton: true,
        confirmButtonText: "Aceptar",
        cancelButtonText: "Cancelar"
    }).then(function() {
        $.ajax({
                method: metodo,
                url: dir + "ajax/medicamentoAjax.php",
                data: {
                    idmedicamento: $("#medid").val(),
                    nombre: $("#nombremod").val(),
                    presentacion: $('#presentacionmod').val(),
                    contenido: $('#contenidomod').val(),
                    medidas: $('#medidasmod').val(),
                    stockmin: $('#stockminmod').val(),
                    administracion: $('#administracionmod').val(),
                    tipom: $('#tipomod').val(),
                    accion: "modificar"
                }
            })
            .done(function(msg) {
                $("#respuesta").html(msg);
            });
        return false;
    });
}

$("#btneditar").click(function() {

    var nombre = $('#nombremod');
    var presentacion = $('#presentacionmod');
    var contenido = $('#contenidomod');
    var medidas = $('#medidasmod');
    var stockmin = $('#stockminmod');
    var administracion = $('#administracionmod');
    var tipo = $('#tipomod');

    var alert = $('#alertamod');

    if (nombre.val() == "") {
        nombre.css("border-color", "red");
        document.getElementById("nombremod-error").innerHTML = "Campo Obligatorio";
        document.getElementById("nombremod-error").style.display = "block";
    } else {
        nombre.css("border-color", "");
        document.getElementById("nombremod-error").innerHTML = "";
        document.getElementById("nombremod-error").style.display = "none";
    }

    if (presentacion.val() == "") {
        presentacion.css("border-color", "red");
        document.getElementById("presentacionmod-error").innerHTML = "Campo Obligatorio";
        document.getElementById("presentacionmod-error").style.display = "block";
    } else {
        presentacion.css("border-color", "");
        document.getElementById("presentacionmod-error").innerHTML = "";
        document.getElementById("presentacionmod-error").style.display = "none";
    }


    if (contenido.val() == "") {
        contenido.css("border-color", "red");
        document.getElementById("contenidomod-error").innerHTML = "Campo Obligatorio";
        document.getElementById("contenidomod-error").style.display = "block";
    } else {
        contenido.css("border-color", "");
        document.getElementById("contenidomod-error").innerHTML = "";
        document.getElementById("contenidomod-error").style.display = "none";
    }

    if (medidas.val() == "") {
        medidas.css("border-color", "red");
        document.getElementById("medidasmod-error").innerHTML = "Campo Obligatorio";
        document.getElementById("medidasmod-error").style.display = "block";
    } else {
        medidas.css("border-color", "");
        document.getElementById("medidasmod-error").innerHTML = "";
        document.getElementById("medidasmod-error").style.display = "none";
    }

    if (stockmin.val() == "") {
        stockmin.css("border-color", "red");
        document.getElementById("stockmod-error").innerHTML = "Campo Obligatorio";
        document.getElementById("stockmod-error").style.display = "block";
    } else {
        stockmin.css("border-color", "");
        document.getElementById("stockmod-error").innerHTML = "";
        document.getElementById("stockmod-error").style.display = "none";
    }



    if (administracion.val() == "") {
        administracion.css("border-color", "red");
        document.getElementById("administracionmod-error").innerHTML = "Campo Obligatorio";
        document.getElementById("administracionmod-error").style.display = "block";
    } else {
        administracion.css("border-color", "");
        document.getElementById("administracionmod-error").innerHTML = "";
        document.getElementById("administracionmod-error").style.display = "none";
    }
    if (tipo.val() == "") {
        tipo.css("border-color", "red");
        document.getElementById("tipomod-error").innerHTML = "Campo Obligatorio";
        document.getElementById("tipomod-error").style.display = "block";
    } else {
        tipo.css("border-color", "");
        document.getElementById("tipomod-error").innerHTML = "";
        document.getElementById("tipomod-error").style.display = "none";
    }


    if (nombre.val() != "" && presentacion.val() != "" && contenido.val() != "" && medidas.val() != "" && stockmin.val() != "" && administracion.val() != "" && tipo.val() != "") {
        alert.css("visibility", "hidden");
        enviardatosmod();

    } else {
        alert.css("visibility", "visible");
    }





});


$("#btneditarinv").click(function() {

    var fecha = $('#fechavencimientomodinv');
    var ubicacion = $('#ubicacionmodinv');
    var cantidad = $('#cantidadmodinv');
    var proveedor = $('#proveedormodinv');

    var alert = $('#alertamodinv');

    if (fecha.val() == "") {
        fecha.css("border-color", "red");
        document.getElementById("fechavencimientomodinv-error").innerHTML = "Campo Obligatorio";
        document.getElementById("fechavencimientomodinv-error").style.display = "block";
    } else {
        fecha.css("border-color", "");
        document.getElementById("fechavencimientomodinv-error").innerHTML = "";
        document.getElementById("fechavencimientomodinv-error").style.display = "none";
    }

    if (ubicacion.val() == "") {
        ubicacion.css("border-color", "red");
        document.getElementById("ubicacionmodinv-error").innerHTML = "Campo Obligatorio";
        document.getElementById("ubicacionmodinv-error").style.display = "block";
    } else {
        ubicacion.css("border-color", "");
        document.getElementById("ubicacionmodinv-error").innerHTML = "";
        document.getElementById("ubicacionmodinv-error").style.display = "none";
    }


    if (cantidad.val() == "") {
        cantidad.css("border-color", "red");
        document.getElementById("cantidadmodinv-error").innerHTML = "Campo Obligatorio";
        document.getElementById("cantidadmodinv-error").style.display = "block";
    } else {
        cantidad.css("border-color", "");
        document.getElementById("cantidadmodinv-error").innerHTML = "";
        document.getElementById("cantidadmodinv-error").style.display = "none";
    }

    if (proveedor.val() == "") {
        proveedor.css("border-color", "red");
        document.getElementById("proveedormodinv-error").innerHTML = "Campo Obligatorio";
        document.getElementById("proveedormodinv-error").style.display = "block";
    } else {
        proveedor.css("border-color", "");
        document.getElementById("proveedormodinv-error").innerHTML = "";
        document.getElementById("proveedormodinv-error").style.display = "none";
    }


    if (fecha.val() != "" && ubicacion.val() != "" && cantidad.val() != "" && proveedor.val() != "") {
        alert.css("visibility", "hidden");
        enviardatosmodinv();

    } else {
        alert.css("visibility", "visible");
    }

});

function agregardatosinv() {

    var form = $('#formmodinv');

    var tipo = form.attr('data-form');
    var accion = form.attr('action');
    var metodo = form.attr('method');
    var respuesta = form.children('.RespuestaAjax');

    var msjError = "<script>swal('Ocurrió un error inesperado','Por favor recargue la página','error');</script>";



    var textoAlerta;
    if (tipo === "save") {
        textoAlerta = "Los datos del sistema serán actualizados";
    } else {
        textoAlerta = "Quieres realizar la operación solicitada";
    }


    swal({
        title: "¿Estás seguro?",
        text: textoAlerta,
        type: "question",
        showCancelButton: true,
        confirmButtonText: "Aceptar",
        cancelButtonText: "Cancelar"
    }).then(function() {
        $.ajax({
                method: metodo,
                url: dir + "ajax/medicamentoAjax.php",
                data: {
                    idmedicamento: $("#idmedicamento").val(),
                    fecha: $("#fechavencimientomodinv").val(),
                    ubicacion: $("#ubicacionmodinv").val(),
                    proveedor: $("#proveedormodinv").val(),
                    cantidad: $("#cantidadmodinv").val(),
                    accion: "agregarinv"
                }
            })
            .done(function(msg) {
                $("#respuesta").html(msg);
            });
        return false;
    });


}


function enviardatosmodinv() {

    var form = $('#formmodinv');

    var tipo = form.attr('data-form');
    var accion = form.attr('action');
    var metodo = form.attr('method');
    var respuesta = form.children('.RespuestaAjax');

    var msjError = "<script>swal('Ocurrió un error inesperado','Por favor recargue la página','error');</script>";



    var textoAlerta;
    if (tipo === "save") {
        textoAlerta = "Los datos del sistema serán actualizados";
    } else {
        textoAlerta = "Quieres realizar la operación solicitada";
    }


    swal({
        title: "¿Estás seguro?",
        text: textoAlerta,
        type: "question",
        showCancelButton: true,
        confirmButtonText: "Aceptar",
        cancelButtonText: "Cancelar"
    }).then(function() {
        $.ajax({
                method: metodo,
                url: dir + "ajax/medicamentoAjax.php",
                data: {
                    idinventario: $("#invid").val(),
                    fecha: $("#fechavencimientomodinv").val(),
                    ubicacion: $("#ubicacionmodinv").val(),
                    proveedor: $("#proveedormodinv").val(),
                    cantidad: $("#cantidadmodinv").val(),
                    accion: "modificarinv"
                }
            })
            .done(function(msg) {
                $("#respuesta").html(msg);
            });
        return false;
    });


}

function nuevoregistro(idmedicamento) {
    document.getElementById("idmedicamento").value = idmedicamento;
    document.getElementById("btneditarinv").style.display = "none";
    document.getElementById("btnagregarinv").style.display = "block";
    document.getElementById("texto").innerHTML = "<i class='menu-icon fa fa-medkit'></i> Agregar Medicamento";

    document.getElementById("formmodinv").reset();

    $.ajax({
            method: "POST",
            url: dir + "ajax/medicamentoAjax.php",
            data: { accion: "proveedores" }
        })
        .done(function(msg) {

            $("#proveedormodinv").html(msg);
        });

}

function Listaprovedores() {
    $.ajax({
            method: "POST",
            url: dir + "ajax/medicamentoAjax.php",
            data: { accion: "proveedoresnuevo" }
        })
        .done(function(msg) {

            $("#proveedor").html(msg);
        });

}


$("#btneditarinv").click(function() {
    var fecha = $('#fechavencimientomodinv');
    var ubicacion = $('#ubicacionmodinv');
    var cantidad = $('#cantidadmodinv');
    var proveedor = $('#proveedormodinv');

    var alert = $('#alertamodinv');

    if (fecha.val() == "") {
        fecha.css("border-color", "red");
        document.getElementById("fechavencimientomodinv-error").innerHTML = "Campo Obligatorio";
        document.getElementById("fechavencimientomodinv-error").style.display = "block";
    } else {
        fecha.css("border-color", "");
        document.getElementById("fechavencimientomodinv-error").innerHTML = "";
        document.getElementById("fechavencimientomodinv-error").style.display = "none";
    }

    if (ubicacion.val() == "") {
        ubicacion.css("border-color", "red");
        document.getElementById("ubicacionmodinv-error").innerHTML = "Campo Obligatorio";
        document.getElementById("ubicacionmodinv-error").style.display = "block";
    } else {
        ubicacion.css("border-color", "");
        document.getElementById("ubicacionmodinv-error").innerHTML = "";
        document.getElementById("ubicacionmodinv-error").style.display = "none";
    }


    if (cantidad.val() == "") {
        cantidad.css("border-color", "red");
        document.getElementById("cantidadmodinv-error").innerHTML = "Campo Obligatorio";
        document.getElementById("cantidadmodinv-error").style.display = "block";
    } else {
        cantidad.css("border-color", "");
        document.getElementById("cantidadmodinv-error").innerHTML = "";
        document.getElementById("cantidadmodinv-error").style.display = "none";
    }

    if (proveedor.val() == "") {
        proveedor.css("border-color", "red");
        document.getElementById("proveedormodinv-error").innerHTML = "Campo Obligatorio";
        document.getElementById("proveedormodinv-error").style.display = "block";
    } else {
        proveedor.css("border-color", "");
        document.getElementById("proveedormodinv-error").innerHTML = "";
        document.getElementById("proveedormodinv-error").style.display = "none";
    }


    if (fecha.val() != "" && ubicacion.val() != "" && cantidad.val() != "" && proveedor.val() != "") {
        alert.css("visibility", "hidden");
        enviardatosmodinv();

    } else {
        alert.css("visibility", "visible");
    }
});



$("#btnagregarinv").click(function() {
    var fecha = $('#fechavencimientomodinv');
    var ubicacion = $('#ubicacionmodinv');
    var cantidad = $('#cantidadmodinv');
    var proveedor = $('#proveedormodinv');

    var alert = $('#alertamodinv');

    if (fecha.val() == "") {
        fecha.css("border-color", "red");
        document.getElementById("fechavencimientomodinv-error").innerHTML = "Campo Obligatorio";
        document.getElementById("fechavencimientomodinv-error").style.display = "block";
    } else {
        fecha.css("border-color", "");
        document.getElementById("fechavencimientomodinv-error").innerHTML = "";
        document.getElementById("fechavencimientomodinv-error").style.display = "none";
    }

    if (ubicacion.val() == "") {
        ubicacion.css("border-color", "red");
        document.getElementById("ubicacionmodinv-error").innerHTML = "Campo Obligatorio";
        document.getElementById("ubicacionmodinv-error").style.display = "block";
    } else {
        ubicacion.css("border-color", "");
        document.getElementById("ubicacionmodinv-error").innerHTML = "";
        document.getElementById("ubicacionmodinv-error").style.display = "none";
    }


    if (cantidad.val() == "") {
        cantidad.css("border-color", "red");
        document.getElementById("cantidadmodinv-error").innerHTML = "Campo Obligatorio";
        document.getElementById("cantidadmodinv-error").style.display = "block";
    } else {
        cantidad.css("border-color", "");
        document.getElementById("cantidadmodinv-error").innerHTML = "";
        document.getElementById("cantidadmodinv-error").style.display = "none";
    }

    if (proveedor.val() == "") {
        proveedor.css("border-color", "red");
        document.getElementById("proveedormodinv-error").innerHTML = "Campo Obligatorio";
        document.getElementById("proveedormodinv-error").style.display = "block";
    } else {
        proveedor.css("border-color", "");
        document.getElementById("proveedormodinv-error").innerHTML = "";
        document.getElementById("proveedormodinv-error").style.display = "none";
    }


    if (fecha.val() != "" && ubicacion.val() != "" && cantidad.val() != "" && proveedor.val() != "") {
        alert.css("visibility", "hidden");
        agregardatosinv();

    } else {
        alert.css("visibility", "visible");
    }
});

function paginador(pagina) {
    var porpagina = document.getElementById("porpagina").value;

    $.ajax({
            method: "POST",
            url: dir + "ajax/medicamentoAjax.php",
            data: { busqueda: $("#busqueda").val(), pagina: pagina, porpagina: porpagina, accion: "paginado" }
        })
        .done(function(msg) {

            $("#tablamedicamento").html(msg);
        });
}

$("#porpagina").change(function() {

    $.ajax({
            method: "POST",
            url: dir + "ajax/medicamentoAjax.php",
            data: {
                porpagina: $("#porpagina").val(),
                busqueda: $("#busqueda").val(),
                accion: "paginado"
            }
        })
        .done(function(msg) {
            $("#tablamedicamento").html(msg);
        });
});

$("#busqueda").keyup(function() {

    $.ajax({
            method: "POST",
            url: dir + "ajax/medicamentoAjax.php",
            data: {
                porpagina: $("#porpagina").val(),
                busqueda: $("#busqueda").val(),
                accion: "paginado"
            }
        })
        .done(function(msg) {

            $("#tablamedicamento").html(msg);
        });

});