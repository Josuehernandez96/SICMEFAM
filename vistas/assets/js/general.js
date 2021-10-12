var dir = $("input[name='dir']").val();
    
function cerrarsesion(token) {

  swal({
    title: "¿Desea Cerrar Sesión?",   
    text: "",   
    type: "question",   
    showCancelButton: true,     
    confirmButtonText: "Aceptar",
    cancelButtonText: "Cancelar"
}).then(function () {
    $.ajax({
      method: "POST",
      url: dir + "ajax/loginAjax.php",
      data: {
        Token: token,
        accion: "cerrarlogin"
      }
    })
      .done(function(msg) {
        
        if(msg=='1'){
            location.href=dir+'login';
        }
        if(msg=='0'){
            swal({
                title: "Ocurrio un error",
                text: "No se Cerro Sesion",
                type: "error",
                confirmButtonText: "Aceptar"
              }).then(function() {
                location.reload();
              });
        }
      })
      .error(function(msg) {
        swal({
          title: "Ocurrio un error",
          text: "Sin Respuesta del servidor",
          type: "error",
          confirmButtonText: "Aceptar"
        }).then(function() {
          location.reload();
        });
      });
    });
  }
