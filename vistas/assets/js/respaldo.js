var dir = $("input[name='dir']").val();

function backup() {
    var op = "Hola";
    swal({
        title: "¿Crear respaldo de los datos actuales?",
        text: '',
        type: "question",
        showCancelButton: true,
        confirmButtsonText: "Aceptar",
        cancelButtonText: "Cancelar"
    }).then(function() {

        $.ajax({
            data: op,
            url: dir + "ajax/myphp-backup.php",
            type: 'POST',
            beforeSend: function() {
                let timerInterval
                swal({
                    title: '¡Respaldando Base de datos!',
                    html: 'Por favor espere <strong></strong>.',
                    timer: 2000,
                    onBeforeOpen: () => {
                        swal.showLoading()
                        timerInterval = setInterval(() => {
                            swal.getContent().querySelector('strong')
                                .textContent = swal.getTimerLeft()
                        }, 100)
                    },
                    onClose: () => {
                        clearInterval(timerInterval)
                    }
                }).then((result) => {
                    if (
                        // Read more about handling dismissals
                        result.dismiss === swal.DismissReason.timer
                    ) {
                        console.log('I was closed by the timer')
                    }
                })
            },
            success: function(response) {
                // alert(response);
                sweetGuardo("Se hizo un respaldo de la BD exitosamente.");
            }
        });
    });

}

function restore(archivos) {
    swal({
        title: "¿Estás seguro de restaurar?",
        text: 'podrian perderse datos no guardados',
        type: "warning",
        showCancelButton: true,
        confirmButtsonText: "Aceptar",
        cancelButtonText: "Cancelar"
    }).then(function() {
        $.ajax({
            data: { archivo: archivos },
            url: dir + 'ajax/myphp-restore.php',
            type: 'POST',
            beforeSend: function() {
                let timerInterval
                swal({
                    title: '¡Restaurando Base de datos!',
                    html: 'Por favor espere <strong></strong>.',
                    timer: 7000,
                    onBeforeOpen: () => {
                        swal.showLoading()
                        timerInterval = setInterval(() => {
                            swal.getContent().querySelector('strong')
                                .textContent = swal.getTimerLeft()
                        }, 100)
                    },
                    onClose: () => {
                        clearInterval(timerInterval)
                    }
                }).then((result) => {
                    if (
                        // Read more about handling dismissals
                        result.dismiss === swal.DismissReason.timer
                    ) {
                        console.log('Listo')
                    }
                })
            },
            success: function(response) {
                // alert(response);
                sweetGuardo("Se restauró la base de datos exitosamente.");
            }
        });
    });
}

function eliminar(archivos) {

    swal({
        title: "¿Estás seguro de eliminar este respaldo?",
        text: '',
        type: "question",
        showCancelButton: true,
        confirmButtsonText: "Aceptar",
        cancelButtonText: "Cancelar"
    }).then(function() {

        $.ajax({
            method: "POST",
            url: dir + "ajax/respaldoAjax.php",
            data: {
                archivo: archivos,
                accion: "eliminar"
            }
        }).done(function(msg) {
            $("#respuesta").html(msg);

        });

    });

}

function actualizar() {


    $.ajax({
            method: "POST",
            url: dir + "ajax/respaldoAjax.php",
            data: { accion: "alltabla" }
        })
        .done(function(msg) {

            $("#tablarespaldo").html(msg);
        });

}


function sweetGuardo(str) {
    swal(

        'Exito!',
        '' + str,
        'success'
    ).then(function() {
        location.reload();
    });
}

function subir() {
    jQuery(function($) {
        var formdata = new FormData($("#formres")[0]);
        if (document.getElementById('bsubir').value != "") {
            swal({
                title: "¿Estás seguro de subir este respaldo?",
                text: '',
                type: "question",
                showCancelButton: true,
                confirmButtsonText: "Aceptar",
                cancelButtonText: "Cancelar"
            }).then(function() {
                $.ajax({
                    method: "POST",
                    url: dir + "ajax/respaldoAjax.php",
                    data: formdata,
                    accion: "save",
                    cache: false,
                    contentType: false,
                    processData: false
                }).done(function(msg) {
                    $("#respuesta").html(msg);
                });
            });
        } else {

            document.getElementById('info').innerHTML = "No hay archivo seleccionado";

            document.getElementById('info').style.color = "red";
        }

    });
}

function cambiar() {
    var pdrs = document.getElementById('bsubir').files[0].name;
    document.getElementById('info').innerHTML = pdrs;
    document.getElementById('info').style.color = "black";
}

function cancelar() {
    document.getElementById("formres").reset();
    document.getElementById('info').innerHTML = "No hay archivo seleccionado";
}