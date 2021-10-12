var dir = $("input[name='dir']").val();


function cancelarp() {


    document.getElementById("formpro").reset();

    document.getElementById("nombrepro-error").style.display = "none";
    document.getElementById("contacto-error").style.display = "none";
    document.getElementById("telefono-error").style.display = "none";

    document.getElementById("alertap").style.visibility = "hidden";

    document.getElementById("nombrepro").style.borderColor = "";
    document.getElementById("contacto").style.borderColor = "";
    document.getElementById("telefono").style.borderColor = "";



}


$("#btnguardarpro").click(function() {
    var nombre = $('#nombrepro');
    var contacto = $('#contacto');
    var telefono = $('#telefono');

    var alert = $('#alertap');

    if (nombre.val() == "") {
        nombre.css("border-color", "red");
        $('#nombrepro-error').css('display', 'block');
        $('#nombrepro-error').html('campo obligatorio');


    } else {
        $('#nombrepro-error').css('display', 'hidden');
        $('#nombrepro-error').html('');


    }

    if (contacto.val() == "") {
        contacto.css("border-color", "red");
        $('#contacto-error').css('display', 'block');
        $('#contacto-error').html('campo obligatorio');


    } else {
        $('#contacto-error').css('display', 'hidden');
        $('#contacto-error').html('');


    }


    if (telefono.val() == "") {
        telefono.css("border-color", "red");
        $('#telefono-error').css('display', 'block');
        $('#telefono-error').html('campo obligatorio');


    } else {
        $('#telefono-error').css('display', 'hidden');
        $('#telefono-error').html('');


    }




    if (nombre.val() != "" && contacto.val() != "" && telefono.val()) {
        alert.css("visibility", "hidden");
        enviardatosprov();
    } else {
        alert.css("visibility", "visible");
    }


});


function enviardatosprov() {


    var form = $('#formpro');

    var tipo = form.attr('data-form');
    var accion = dir + "ajax/proveedorAjax.php";
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
            url: dir + "ajax/proveedorAjax.php",
            data: {
                nombre: $('#nombrepro').val(),
                contacto: $('#contacto').val(),
                telefono: $('#telefono').val(),
                accion: tipo
            }
        }).done(function(msg) {
            $("#respuesta").html(msg);
            actualizarp(document.getElementById("porpaginap").value);

        });

        return false;
    });
}

function actualizarp(porpagp) {


    $.ajax({
            method: "POST",
            url: dir + "ajax/proveedorAjax.php",
            data: { porpaginap: porpagp, accion: "alltabla" }
        })
        .done(function(msg) {

            $("#tablaproveedor").html(msg);
        });

}

$("#nombrepro").keyup(function() {
    if ($("#nombrepro").val() == "") {
        $('#nombrepro-error').css('display', 'block');
        $('#nombrepro-error').html('campo obligatorio');
        $("#nombrepro").css("border-color", "red");
    } else {
        $('#nombrepro-error').css('display', 'hidden');
        $('#nombrepro-error').html('');
        document.getElementById("nombrepro").style.borderColor = "";


    }
    if ($("#nombrepro").val().length == 50) {
        $('#nombrepro-error').css('display', 'block');
        $('#nombrepro-error').html('50 caracteres maximo');
    }

});

$("#contacto").keyup(function() {
    if ($("#contacto").val() == "") {
        $('#contacto-error').css('display', 'block');
        $('#contacto-error').html('campo obligatorio');
        $("#contacto").css("border-color", "red");
    } else {
        $('#contacto-error').css('display', 'hidden');
        $('#contacto-error').html('');
        document.getElementById("contacto").style.borderColor = "";


    }
    if ($("#contacto").val().length == 50) {
        $('#contacto-error').css('display', 'block');
        $('#contacto-error').html('50 caracteres maximo');
    }

});

$("#telefono").keyup(function() {
    if ($("#telefono").val() == "") {
        $('#telefono-error').css('display', 'block');
        $('#telefono-error').html('campo obligatorio');
        $("#telefono").css("border-color", "red");
    } else {
        $('#telefono-error').css('display', 'hidden');
        $('#telefono-error').html('');
        document.getElementById("telefono").style.borderColor = "";


    }
});

function cambiarestadop(id) {

    swal({
        title: "¿Estás seguro de eliminar el proveedor?",
        text: '',
        type: "question",
        showCancelButton: true,
        confirmButtsonText: "Aceptar",
        cancelButtonText: "Cancelar"
    }).then(function() {

        $.ajax({
            method: "POST",
            url: dir + "ajax/proveedorAjax.php",
            data: {
                idproveedor: id,
                accion: "eliminar"
            }
        }).done(function(msg) {
            $("#respuesta").html(msg);
            actualizarp(document.getElementById("porpaginap").value);
        });

    });

}


function paginadorp(pagina) {
    var porpagina = document.getElementById("porpaginap").value;

    $.ajax({
            method: "POST",
            url: dir + "ajax/proveedorAjax.php",
            data: { busquedap: $("#busquedap").val(), paginap: pagina, porpaginap: porpagina, accion: "paginadop" }
        })
        .done(function(msg) {

            $("#tablaproveedor").html(msg);
        });
}

$("#porpaginap").change(function() {

    $.ajax({
            method: "POST",
            url: dir + "ajax/proveedorAjax.php",
            data: {
                porpaginap: $("#porpaginap").val(),
                busquedap: $("#busquedap").val(),
                accion: "paginadop"
            }
        })
        .done(function(msg) {
            $("#tablaproveedor").html(msg);
        });
});

$("#busquedap").keyup(function() {

    $.ajax({
            method: "POST",
            url: dir + "ajax/proveedorAjax.php",
            data: {
                porpaginap: $("#porpaginap").val(),
                busquedap: $("#busquedap").val(),
                accion: "paginadop"
            }
        })
        .done(function(msg) {

            $("#tablaproveedor").html(msg);
        });

});