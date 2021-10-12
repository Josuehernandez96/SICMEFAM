var dir = $("input[name='dir']").val();

document.getElementById("btneditar").style.display = "none";
var urlpeticion = document.getElementById("formusu").getAttribute("action")

function cancelar() {


    document.getElementById("formusu").reset();
    document.getElementById("usuarionombre-error").style.display = "none";
    document.getElementById("nombrep-error").style.display = "none";
    document.getElementById("clave1-error").style.display = "none";
    document.getElementById("clave2-error").style.display = "none";
    document.getElementById("contraantigua-error").style.display = "none";
    document.getElementById("correo-error").style.display = "none";

    document.getElementById("nombrep").style.borderColor = "";
    document.getElementById("mostrarcheque").style.display = "none";
    document.getElementById("nombreusuario").style.borderColor = "";
    document.getElementById("clave1").style.borderColor = "";
    document.getElementById("clave2").style.borderColor = "";
    document.getElementById("contraantigua").style.borderColor = "";
    document.getElementById("correousuario").style.borderColor = "";
    document.getElementById("alerta").style.visibility = "hidden";
    eschequeado = 0;

}

$("#btnguardar").click(function() {
    var nombre = $('#nombrep');

    var usuario = $('#nombreusuario');
    var clave1 = $('#clave1');
    var clave2 = $('#clave2');
    var correo = $('#correousuario');
    var tipo = $('#tipo');
    var alert = $('#alerta');
    var valido = 1;

    if (nombre.val() == "") {
        nombre.css("border-color", "red");
        $('#nombrep-error').css('display', 'block');
        $('#nombrep-error').html('campo obligatorio');


    } else {
        $('#nombrep-error').css('display', 'none');
        $('#nombrep-error').html('');


    }

    if (usuario.val() == "") {
        usuario.css("border-color", "red");
        $('#usuarionombre-error').css('display', 'block');
        $('#usuarionombre-error').html('campo obligatorio');


    } else {
        $('#usuarionombre-error').css('display', 'none');
        $('#usuarionombre-error').html('');


    }

    if (clave1.val() == "") {
        clave1.css("border-color", "red");
        $('#clave1-error').css('display', 'block');
        $('#clave1-error').html('campo obligatorio');


    } else {
        $('#clave1-error').css('display', 'none');
        $('#clave1-error').html('');


    }

    if (clave2.val() == "") {
        clave2.css("border-color", "red");
        $('#clave2-error').css('display', 'block');
        $('#clave2-error').html('campo obligatorio');


    } else {
        $('#clave2-error').css('display', 'none');
        $('#clave2-error').html('');


    }

    if (correo.val() == "") {
        correo.css("border-color", "red");
        $('#correo-error').css('display', 'block');
        $('#correo-error').html('campo obligatorio');

    } else {
        $('#correo-error').css('display', 'none');
        $('#correo-error').html('');

        var regex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
        if (!regex.test(correo.val())) {
            $('#correo-error').css('display', 'block');
            $('#correo-error').html('correo invalido');
            valido = 0;

        }


    }



    if (usuario.val() != "" && clave1.val() != "" && clave2.val() != "" && correo.val() != "" && tipo.val() != "" && valido != 0 && nombre.val() != "" && $("#clave2").val() == $("#clave1").val()) {
        alert.css("visibility", "hidden");
        enviardatos();
    } else {
        alert.css("visibility", "visible");
        if ($("#clave2").val() != $("#clave1").val()) {
            $('#clave2-error').css('display', 'block');
            $('#clave2-error').html('contrasena no coincide');
        }

    }


});
$("#nombrep").keyup(function() {
    if ($("#nombrep").val() == "") {
        $('#nombrep-error').css('display', 'block');
        $('#nombrep-error').html('campo obligatorio');
        $("#nombrep").css("border-color", "red");
    } else {
        $('#nombrep-error').css('display', 'none');
        $('#nombrep-error').html('');
        document.getElementById("nombrep").style.borderColor = "";


    }
    if ($("#nombrep").val().length == 50) {
        $('#nombrep-error').css('display', 'block');
        $('#nombrep-error').html('50 caracteres maximo');
    }

});

$("#nombreusuario").keyup(function() {
    if ($("#nombreusuario").val() == "") {
        $('#usuarionombre-error').css('display', 'block');
        $('#usuarionombre-error').html('campo obligatorio');
        $("#nombreusuario").css("border-color", "red");
    } else {
        $('#usuarionombre-error').css('display', 'none');
        $('#usuarionombre-error').html('');
        document.getElementById("nombreusuario").style.borderColor = "";


    }
    if ($("#nombreusuario").val().length == 15) {
        $('#usuarionombre-error').css('display', 'block');
        $('#usuarionombre-error').html('15 caracteres maximo');
    }

});

$("#correousuario").keyup(function() {
    if ($("#correousuario").val() == "") {
        $('#correo-error').css('display', 'block');
        $('#correo-error').html('campo obligatorio');
        $("#correousuario").css("border-color", "red");
    } else {
        $('#correo-error').css('display', 'none');
        $('#correo-error').html('');

        document.getElementById("correousuario").style.borderColor = "";

    }
    if ($("#correousuario").val().length == 50) {
        $('#correo-error').css('display', 'block');
        $('#correo-error').html('50 caracteres maximo');
    }


});


$("#contraantigua").keyup(function() {
    if ($("#contraantigua").val() == contra) {

        $('#contraantigua-error').css('display', 'none');
        $('#contraantigua-error').html('');

        document.getElementById("contraantigua").style.borderColor = "";
    } else {
        $('#contraantigua-error').css('display', 'block');
        $('#contraantigua-error').html('contrasena incorrecta');
    }
});
$("#clave1").keyup(function() {
    if ($("#clave1").val() == "") {
        $('#clave1-error').css('display', 'block');
        $('#clave1-error').html('campo obligatorio');
        $("#clave1").css("border-color", "red");


    } else {
        $('#clave1-error').css('display', 'none');
        $('#clave1-error').html('');
        document.getElementById("clave1").style.borderColor = "";


    }
    if ($("#clave1").val().length == 50) {
        $('#clave1-error').css('display', 'block');
        $('#clave1-error').html('50 caracteres maximo');
    }

    if ($("#clave2").val() != "") {
        if ($("#clave2").val() == $("#clave1").val()) {
            $('#clave2-error').css('display', 'block');
            $('#clave2-error').html('');
        } else {
            $('#clave2-error').css('display', 'block');
            $('#clave2-error').html('contrasena no coincide');
        }
    }




});

$("#clave2").keyup(function() {
    if ($("#clave2").val() == "") {


        $('#clave2-error').css('display', 'block');
        $('#clave2-error').html('campo obligatorio');
        $("#clave2").css("border-color", "red");
    } else {
        $('#clave2-error').css('display', 'none');
        $('#clave2-error').html('');
        document.getElementById("clave2").style.borderColor = "";
    }
    if ($("#clave2").val().length == 50) {
        $('#clave2-error').css('display', 'block');
        $('#clave2-error').html('50 caracteres maximo');
    }

    if ($("#clave2").val() == $("#clave1").val()) {
        $('#clave2-error').css('display', 'block');
        $('#clave2-error').html('');
    } else {
        $('#clave2-error').css('display', 'block');
        $('#clave2-error').html('contrasena no coincide');
    }



});

function caracteresCorreoValido() {
    var errorcorreo = document.getElementById("correo-error");
    var texto = document.getElementById("correousuario").value;

    //var email = $(email).val();
    var regex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;

    if (!regex.test(texto)) {
        document.getElementById("correo-error").innerHTML = "Correo invalido";
    } else {
        document.getElementById("correo-error").innerHTML = "";
    }

}


function enviardatos() {


    var form = $('#formusu');

    var tipo = form.attr('data-form');
    var accion = dir + "ajax/usuarioAjax.php";
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
            url: dir + "ajax/usuarioAjax.php",
            data: {
                nombrep: $('#nombrep').val(),

                nombre: $('#nombreusuario').val(),
                clave: $('#clave1').val(),
                contrausuario2: $('#clave2').val(),
                correo: $('#correousuario').val(),
                rol: $('#tipo').val(),
                accion: tipo
            }
        }).done(function(msg) {
            $("#respuesta").html(msg);
            actualizaradmin();
            actualizarsecret();
        });

        return false;
    });
}



function eliminar(id) {

    swal({
        title: "¿Estás seguro de eliminar el usuario?",
        text: '',
        type: "question",
        showCancelButton: true,
        confirmButtsonText: "Aceptar",
        cancelButtonText: "Cancelar"
    }).then(function() {

        $.ajax({
            method: "POST",
            url: dir + "ajax/usuarioAjax.php",
            data: {
                idusuario: id,
                accion: "eliminar"
            }
        }).done(function(msg) {
            $("#respuesta").html(msg);
            actualizaradmin();
            actualizarsecret();
        });

    });

}

function actualizaradmin() {
    $.ajax({
            method: "POST",
            url: dir + "ajax/usuarioAjax.php",
            data: { accion: "tablaadmin" }
        })
        .done(function(msg) {

            $("#acordeonadmin").html(msg);
        });

}

function actualizarsecret() {
    $.ajax({
            method: "POST",
            url: dir + "ajax/usuarioAjax.php",
            data: { accion: "tablasecret" }
        })
        .done(function(msg) {
            $("#acordeonsecret").html(msg);
        });

}

function nuevoregistro() {

    document.getElementById("clave1").disabled = false;
    document.getElementById("clave2").disabled = false;

    document.getElementById("tipo").disabled = false;
    document.getElementById("btneditar").style.display = "none";
    document.getElementById("btnguardar").style.display = "block";
    document.getElementById("texto").innerHTML = "<i class='fa fa-user'></i> Nuevo Usuario";
    document.getElementById("textoclave1").innerHTML = "<i class='fa fa-lock'></i> Contraseña(*)";

    document.getElementById("mostrarcontraantigua").style.display = "none";
    document.getElementById("mostrarcheque").style.display = "none";


    document.getElementById("formusu").reset();


}

var contra = "";

function ExtraerDatosMod(idusuario) {
    document.getElementById("btneditar").style.display = "block";
    document.getElementById("mostrarcontraantigua").style.display = "block";

    document.getElementById("clave1").disabled = true;
    document.getElementById("clave2").disabled = true;

    document.getElementById("tipo").disabled = true;

    document.getElementById("contraantigua").disabled = true;


    document.getElementById("mostrarcheque").style.display = "block";
    document.getElementById("btnguardar").style.display = "none";
    document.getElementById("texto").innerHTML = "<i class='fa fa-edit'></i> Modificar Usuario";

    document.getElementById("textoclave1").innerHTML = "<i class='fa fa-lock'></i> Contraseña Nueva";

    $.ajax({
            method: "POST",
            url: dir + "ajax/usuarioAjax.php",
            data: { idusuario: idusuario, accion: "obtenerdatos" }
        })
        .done(function(msg) {

            document.getElementById("usuid").value = idusuario;

            var datos = JSON.parse(msg);

            document.getElementById("nombrep").value = datos.nombrep;
            document.getElementById("nombreusuario").value = datos.nombreusuario;

            document.getElementById("correousuario").value = datos.correousuario;

            document.getElementById("tipo").value = datos.tipo;
            contra = datos.clave1;
        });



}

function enviardatosmod() {


    var form = $('#formusu');

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
                url: dir + "ajax/usuarioAjax.php",
                data: {
                    idusuario: $("#usuid").val(),
                    nombrep: $("#nombrep").val(),

                    nombreusuario: $("#nombreusuario").val(),
                    clave1: $('#clave1').val(),
                    eschequeado: eschequeado,

                    correousuario: $('#correousuario').val(),
                    accion: "modificar"
                }
            })
            .done(function(msg) {
                $("#respuesta").html(msg);
                actualizaradmin();
                actualizarsecret();
            });
        return false;
    });
}


$("#btneditar").click(function() {

    var nombrep = $('#nombrep');
    var nombre = $('#nombreusuario');
    var clave1 = $('#clave1');
    var clave2 = $('#clave2');
    var clave3 = $('#contraantigua');


    var correo = $('#correousuario');
    var alert = $('#alerta');

    var valido = 1;

    if (nombrep.val() == "") {
        nombrep.css("border-color", "red");
        document.getElementById("nombrep-error").innerHTML = "Campo Obligatorio";
        document.getElementById("nombrep-error").style.display = "block";
    } else {
        nombre.css("border-color", "");
        document.getElementById("nombrep-error").innerHTML = "";
        document.getElementById("nombrep-error").style.display = "none";
    }

    if (nombre.val() == "") {
        nombre.css("border-color", "red");
        document.getElementById("usuarionombre-error").innerHTML = "Campo Obligatorio";
        document.getElementById("usuarionombre-error").style.display = "block";
    } else {
        nombre.css("border-color", "");
        document.getElementById("usuarionombre-error").innerHTML = "";
        document.getElementById("usuarionombre-error").style.display = "none";
    }

    if (eschequeado == 1) {
        if (clave1.val() == "") {
            clave1.css("border-color", "red");
            document.getElementById("clave1-error").innerHTML = "Campo Obligatorio";
            document.getElementById("clave1-error").style.display = "block";
        } else {
            clave1.css("border-color", "");
            document.getElementById("clave1-error").innerHTML = "";
            document.getElementById("clave1-error").style.display = "none";
        }

        if (clave2.val() == "") {
            clave2.css("border-color", "red");
            document.getElementById("clave2-error").innerHTML = "Campo Obligatorio";
            document.getElementById("clave2-error").style.display = "block";
        } else {
            clave2.css("border-color", "");
            document.getElementById("clave2-error").innerHTML = "";
            document.getElementById("clave2-error").style.display = "none";
        }

        if (clave3.val() == "") {
            clave3.css("border-color", "red");
            document.getElementById("contraantigua-error").innerHTML = "Campo Obligatorio";
            document.getElementById("contraantigua-error").style.display = "block";
        } else {
            clave3.css("border-color", "");
            document.getElementById("contraantigua-error").innerHTML = "";
            document.getElementById("contraantigua-error").style.display = "none";
        }





    } else {
        clave3.css("border-color", "");
        document.getElementById("contraantigua-error").innerHTML = "";
        document.getElementById("contraantigua-error").style.display = "none";

        clave2.css("border-color", "");
        document.getElementById("clave2-error").innerHTML = "";
        document.getElementById("clave2-error").style.display = "none";

        clave1.css("border-color", "");
        document.getElementById("clave1-error").innerHTML = "";
        document.getElementById("clave1-error").style.display = "none";


    }

    if (correo.val() == "") {
        correo.css("border-color", "red");

        document.getElementById("correo-error").innerHTML = "Campo Obligatorio";
        document.getElementById("correo-error").style.display = "block";
    } else {
        correo.css("border-color", "");

        document.getElementById("correo-error").innerHTML = "";
        document.getElementById("correo-error").style.display = "none";

        var regex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
        if (!regex.test(correo.val())) {
            $('#correo-error').css('display', 'block');
            $('#correo-error').html('correo invalido');
            valido = 0;
        }
    }

    if (eschequeado == 1) {
        if (nombre.val() != "" && correo.val() != "" && valido != 0 && nombrep.val() != "" && clave1.val() != "" && clave2.val() != "" && clave3.val() != "" && clave1.val() == clave2.val() && clave3.val() == contra) {
            alert.css("visibility", "hidden");
            enviardatosmod();

        } else {
            alert.css("visibility", "visible");


            if ($("#contraantigua").val() != contra) {
                $('#contraantigua-error').css('display', 'block');
                $('#contraantigua-error').html('contrasena no coincide');
            }

            if ($("#clave2").val() != $("#clave1").val()) {
                $('#clave2-error').css('display', 'block');
                $('#clave2-error').html('contrasena no coincide');
            }
        }

    } else {
        if (nombre.val() != "" && correo.val() != "" && valido != 0 && nombrep.val() != "") {
            alert.css("visibility", "hidden");
            enviardatosmod();
        } else {
            alert.css("visibility", "visible");
        }
    }


});

var eschequeado;

$("#cheque").click(function() {
    var alert = $('#alerta');

    if (document.getElementById("cheque").checked == true) {
        document.getElementById("clave1").disabled = false;
        document.getElementById("clave2").disabled = false;
        document.getElementById("contraantigua").disabled = false;
        eschequeado = 1;
    } else {

        eschequeado = 0;
        document.getElementById("clave1").disabled = true;
        document.getElementById("clave2").disabled = true;
        document.getElementById("contraantigua").disabled = true;

        document.getElementById("clave1").value = "";
        document.getElementById("clave2").value = "";
        document.getElementById("contraantigua").value = "";

        $("#clave1").css("border-color", "");
        document.getElementById("clave1-error").innerHTML = "";
        document.getElementById("clave1-error").style.display = "none";


        $("#clave2").css("border-color", "");
        document.getElementById("clave2-error").innerHTML = "";
        document.getElementById("clave2-error").style.display = "none";


        $("#contraantigua").css("border-color", "");
        document.getElementById("contraantigua-error").innerHTML = "";
        document.getElementById("contraantigua-error").style.display = "none";

        alert.css("visibility", "hidden");


    }


});