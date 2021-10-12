var dir = $("input[name='dir']").val();
$("#usuario").change(function() {
    $.ajax({
        method: "POST",
        url: dir + "ajax/bitacoraAjax.php",
        data: {
            busqueda: $("#busqueda").val(),
            usuario: $("#usuario").val(),
            fechaini: $("#fechaini").val(),
            fechafin: $("#fechafin").val(),
            accion: "paginado"
        }
    }).done(function(msg) {
        $("#tablabitacora").html(msg);
    });
});

$("#busqueda").change(function() {
    $.ajax({
        method: "POST",
        url: dir + "ajax/bitacoraAjax.php",
        data: {
            usuario: $("#usuario").val(),
            busqueda: $("#busqueda").val(),
            fechaini: $("#fechaini").val(),
            fechafin: $("#fechafin").val(),
            accion: "paginado"
        }
    }).done(function(msg) {
        $("#tablabitacora").html(msg);
    });
});

$("#fechafin").change(function() {
    $.ajax({
        method: "POST",
        url: dir + "ajax/bitacoraAjax.php",
        data: {
            busqueda: $("#busqueda").val(),
            usuario: $("#usuario").val(),
            fechaini: $("#fechaini").val(),
            fechafin: $("#fechafin").val(),
            accion: "paginado"
        }
    }).done(function(msg) {
        $("#tablabitacora").html(msg);
    });
});


$("#fechaini").change(function() {
    $.ajax({
        method: "POST",
        url: dir + "ajax/bitacoraAjax.php",
        data: {
            busqueda: $("#busqueda").val(),
            usuario: $("#usuario").val(),
            fechaini: $("#fechaini").val(),
            fechafin: $("#fechafin").val(),
            accion: "paginado"
        }
    }).done(function(msg) {
        $("#tablabitacora").html(msg);
    });
});