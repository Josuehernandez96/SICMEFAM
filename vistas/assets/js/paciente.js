document.getElementById("btneditar").style.display="none";
var urlpeticion=document.getElementById("formpac").getAttribute("action")
var tieneresponsable=1;
var expedientemod="";
var error=0;
function soloNumeros(e)
{
var keynum = window.event ? window.event.keyCode : e.which;
if ((keynum == 8) || (keynum == 46))
return true;
return /\d/.test(String.fromCharCode(keynum));

}

function soloLetras(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = "8-37-39-46";

    tecla_especial = false
    for(var i in especiales){
         if(key == especiales[i]){
             tecla_especial = true;
             break;
         }
     }

     if(letras.indexOf(tecla)==-1 && !tecla_especial){
         return false;
     }
}


function irconsulta(id){
    $.ajax({
        method: "POST",
        url: urlpeticion,
        data: { idpaciente : id ,accion : "irconsulta"  }
      })
        .done(function( msg ) {
    
            $("#respuesta").html(msg);
            
        }) .error(function(msg) {
            swal({
              title: "Ocurrio un error",
              text: "Sin Respuesta del servidor",
              type: "error",
              confirmButtonText: "Aceptar"
            }).then(function() {
              location.reload();
            });
          });
}

function paginador(pagina){
var porpagina=document.getElementById("porpagina").value;

$.ajax({
    method: "POST",
    url: urlpeticion,
    data: { pagina : pagina , porpagina : porpagina ,accion : "paginado"  }
  })
    .done(function( msg ) {

        document.getElementById("tabla").innerHTML=msg;
    });
}

// funcion para validar el correo
function caracteresCorreoValido(){
    var errorcorreo=document.getElementById("paccorreo-error");
    var texto=document.getElementById("paccorreo").value;
    
    //var email = $(email).val();
    var regex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
  
    if (!regex.test(texto)) {
        document.getElementById("paccorreo-error").innerHTML = "Correo invalido";
    } else {
      document.getElementById("paccorreo-error").innerHTML = "";
    }
    
}

function cancelar(){

    tieneresponsable=1;
    $('#modal-rgpaciente').modal('hide');

    $('#cuerpo').css('padding-right','0px')


    document.getElementById("formpac").reset();
    document.getElementById("pacdui").disabled=true;
    document.getElementById("resnombre").disabled=true;
    document.getElementById("resapellido").disabled=true;
    document.getElementById("resrelacion").disabled=true;
    document.getElementById("resdui").disabled=true;
    document.getElementById("restelefonop").disabled=true;
    document.getElementById("restelefonos").disabled=true;
    document.getElementById("pacnombre-error").style.display="none";
    document.getElementById("pacapellido-error").style.display="none";
    document.getElementById("pacsexo-error").style.display="none";
    document.getElementById("pacfecha-error").style.display="none";

    document.getElementById("resnombre-error").style.display="none";
    document.getElementById("resapellido-error").style.display="none";
    document.getElementById("resrelacion-error").style.display="none";
    document.getElementById("alerta").style.visibility="hidden";

    document.getElementById("texto1").style.display="none";
    document.getElementById("texto2").style.display="none";

    document.getElementById('pacscrool').scrollTop = 0;
    $('#modal-cita').modal('hide');

    

}

function nuevoregistro(){
    
    document.getElementById('pacscrool').scrollTop = 0;
    document.getElementById("btneditar").style.display="none";
    document.getElementById("btnguardar").style.display="block";
    document.getElementById("texto").innerHTML="<i class='fa fa-user'></i> Nuevo Paciente";
    document.getElementById("pacnombre").style.borderColor="";
    document.getElementById("pacapellido").style.borderColor="";
    document.getElementById("pacsexo").style.borderColor="";
    document.getElementById("pacfecha").style.borderColor="";
    document.getElementById("resnombre").style.borderColor="";
    document.getElementById("resapellido").style.borderColor="";
    document.getElementById("resrelacion").style.borderColor="";
    document.getElementById("formpac").reset();   
    
}

function ExtraerDatosMod(idpaciente){
    document.getElementById("btneditar").style.display="block";
    document.getElementById("btnguardar").style.display="none";
    document.getElementById("texto").innerHTML="<i class='fa fa-edit'></i> Modificar Paciente";
    document.getElementById("pacnombre").style.borderColor="";
    document.getElementById("pacapellido").style.borderColor="";
    document.getElementById("pacsexo").style.borderColor="";
    document.getElementById("pacfecha").style.borderColor="";
    document.getElementById("resnombre").style.borderColor="";
    document.getElementById("resapellido").style.borderColor="";
    document.getElementById("resrelacion").style.borderColor="";

    document.getElementById("formpac").reset();

    $.ajax({
        method: "POST",
        url: urlpeticion,
        data: { idpaciente : idpaciente ,accion : "obtenerdatos"  }
      })
        .done(function( msg ) {

        document.getElementById("pacid").value=idpaciente;
          
          var datos=JSON.parse(msg);

          var formatfecha=datos.pacfecha.substr(8,2,3)+"/"+datos.pacfecha.substr(5,2,3)+"/"+datos.pacfecha.substr(0,4);

         document.getElementById("pacnombre").value=datos.pacnombre;
         document.getElementById("pacapellido").value=datos.pacapellido;
        
         document.getElementById("pacfecha").value=formatfecha;
         if(datos.pacsexo=="FEMENINO"){
            document.getElementById("pacsexo")[2].selected=true;
          
         }
         if(datos.pacsexo=="MASCULINO"){
            document.getElementById("pacsexo")[1].selected=true;
         }
         expedientemod=datos.expediente;
         document.getElementById("pacdui").value=datos.pacdui;
         document.getElementById("paccorreo").value=datos.paccorreo;
         document.getElementById("pacdireccion").value=datos.pacdireccion;
         document.getElementById("pactelefonop").value=datos.pactelefonop;
         document.getElementById("pactelefonos").value=datos.pactelefonos;

         var anio=document.getElementById("actual").value;
                var pacanio=datos.pacfecha.substr(0,4);
            
                var edad=parseInt(anio,10)-parseInt(pacanio,10);

                if(edad>=18){
                    document.getElementById("pacdui").disabled=false;
                }
                if(edad<18){
                    document.getElementById("pacdui").disabled=true;
                }

            if(datos.resnombre!=null && datos.resapellido!=null && datos.resrelacion!=null && datos.restelefonop!=null) {

                document.getElementById("resdui").value=datos.resdui;
                document.getElementById("resnombre").value=datos.resnombre;
                document.getElementById("resapellido").value=datos.resapellido;
                
                document.getElementById("restelefonop").value=datos.restelefonop;
                document.getElementById("restelefonos").value=datos.restelefonos;



                if(datos.resrelacion=="MADRE"){
                    document.getElementById("resrelacion")[1].selected=true;
                  
                 }
                 if(datos.resrelacion=="PADRE"){
                    document.getElementById("resrelacion")[2].selected=true;
                 }
                 if(datos.resrelacion=="HIJA"){
                    document.getElementById("resrelacion")[3].selected=true;
                  
                 }
                 if(datos.resrelacion=="HIJO"){
                    document.getElementById("resrelacion")[4].selected=true;
                 }
                 if(datos.resrelacion=="ABUELA"){
                    document.getElementById("resrelacion")[5].selected=true;
                  
                 }
                 if(datos.resrelacion=="ABUELO"){
                    document.getElementById("resrelacion")[6].selected=true;
                 }
                 if(datos.resrelacion=="HERMANA"){
                    document.getElementById("resrelacion")[7].selected=true;
                  
                 }
                 if(datos.resrelacion=="HERMANO"){
                    document.getElementById("resrelacion")[8].selected=true;
                 }
                 if(datos.resrelacion=="NIETA"){
                    document.getElementById("resrelacion")[9].selected=true;
                 }
                 if(datos.resrelacion=="NIETO"){
                    document.getElementById("resrelacion")[10].selected=true;
                 }
                 if(datos.resrelacion=="TIA"){
                    document.getElementById("resrelacion")[11].selected=true;
                 }
                 if(datos.resrelacion=="TIO"){
                    document.getElementById("resrelacion")[12].selected=true;
                 }





                document.getElementById("resdui").disabled=false;
                document.getElementById("resnombre").disabled=false;
                document.getElementById("resapellido").disabled=false;
                document.getElementById("resrelacion").disabled=false;
                document.getElementById("restelefonop").disabled=false;
                document.getElementById("restelefonos").disabled=false;
                tieneresponsable=1;
            }else{
                tieneresponsable=1;
                document.getElementById("resnombre").disabled=false;
                document.getElementById("resapellido").disabled=false;
                document.getElementById("restelefonop").disabled=false;
                document.getElementById("restelefonos").disabled=false;
                document.getElementById("resdui").disabled=false;
            }



        });


}


function cambiarestado(idpaciente,estado){

    var texto="";
    if(estado==1){
        texto="Quieres dar de alta al paciente";
    }
    if(estado==0){
        texto="Quieres dar de baja al paciente";
    }
    jQuery(function ($) {
    swal({
        title: "¿Estás seguro?",   
        text: texto,   
        type: "question",   
        showCancelButton: true,     
        confirmButtonText: "Aceptar",
        cancelButtonText: "Cancelar"
    }).then(function () {
        
        $.ajax({
            method: "POST",
            url: urlpeticion,
            data: { idpaciente : idpaciente, estado : estado,
                    accion : "cambiarestado" }
          })
            .done(function( msg ) {
              $("#respuesta").html(msg);
              $.ajax({
                method: "POST",
                url: urlpeticion,
                data: { porpagina : 10,estado : $("#estado").val() , accion : "alltabla"  }
              })
                .done(function( msg ) {
                  $("#tabla").html(msg);
                });
            });
        return false;
    });
});
}





jQuery(function ($) {

    

 function obteneredad(){
    var anio=document.getElementById("actual").value;
    var pacanio=document.getElementById("pacfecha").value.substr(6,9);

    var edad=parseInt(anio,10)-parseInt(pacanio,10);
    

    return edad;
    
}

$("#porpagina").change(function(){

    $.ajax({
        method: "POST",
        url: urlpeticion,
        data: { porpagina : $("#porpagina").val(), estado : $("#estado").val(),
                accion : "paginado" }
      })
        .done(function( msg ) {
            document.getElementById("tabla").innerHTML=msg;
        });
});






$("#resnombre").keyup(function(){
if($("#resnombre").val()!="" && $("#resapellido").val()==""){
    document.getElementById("resrelacion")[0].selected=true
    document.getElementById("resrelacion").disabled=true;
}
if($("#resnombre").val()=="" && $("#resapellido").val()==""){
    document.getElementById("resrelacion")[0].selected=true
    document.getElementById("resrelacion").disabled=true;
}
if($("#resnombre").val()!="" && $("#resapellido").val()!=""){
   
    document.getElementById("resrelacion").disabled=false;
}

});

$("#resapellido").keyup(function(){
    if($("#resnombre").val()!="" && $("#resapellido").val()==""){
        document.getElementById("resrelacion").disabled=true;
        document.getElementById("resrelacion")[0].selected=true
    }
    if($("#resnombre").val()=="" && $("#resapellido").val()==""){
        document.getElementById("resrelacion").disabled=true;
        document.getElementById("resrelacion")[0].selected=true
    }
    if($("#resnombre").val()!="" && $("#resapellido").val()!=""){
    
        document.getElementById("resrelacion").disabled=false;
    }
    
    });

    $("#pacnombre" ).keyup(function() {

        if(document.getElementById("pacnombre").value.length>40){
            document.getElementById("pacnombre-error").style.display="block";
            document.getElementById("pacnombre-error").innerHTML="solo se permite 40 caracteres";
        }

    });



$("#pacfecha" ).change(function() {


    if(document.getElementById("pacfecha").value!=""){

        if(document.getElementById("pacfecha").value.length<10){
            document.getElementById("pacdui").value="";
            document.getElementById("pacdui").disabled=true;
        }else{

    var ob1=$('#ob1');
   
    var ob2=$('#ob2');
   
    var ob3=$('#ob3');

  if(obteneredad()>=18){
    document.getElementById("pacdui").disabled=false;
    document.getElementById("resnombre").disabled=false;
    document.getElementById("resapellido").disabled=false;
    document.getElementById("restelefonop").disabled=false;
    document.getElementById("resdui").disabled=false;
    document.getElementById("texto2").style.display="block";
    document.getElementById("texto1").style.display="none";
    document.getElementById("restelefonos").disabled=false;
    ob1.css("visibility","hidden");
    ob2.css("visibility","hidden");
    ob3.css("visibility","hidden");
    
  }
 
  if(obteneredad()<18){
    document.getElementById("pacdui").value="";
    ob1.css("visibility","visible");
    ob2.css("visibility","visible");
    ob3.css("visibility","visible");
    document.getElementById("pacdui").disabled=true;
    document.getElementById("resnombre").disabled=false;
    document.getElementById("resapellido").disabled=false;
    document.getElementById("restelefonop").disabled=false;
    document.getElementById("resdui").disabled=false;
    document.getElementById("restelefonos").disabled=false;
    document.getElementById("texto1").style.display="block";
    document.getElementById("texto2").style.display="none";
    
  }
}
  
 
    }else{

        document.getElementById("pacdui").value="";
        document.getElementById("pacdui").disabled=true;
        document.getElementById("texto1").style.display="none";
        document.getElementById("texto2").style.display="none";

    }
    
  

});





$( "#btnguardar" ).click(function() {
    var nombre=$('#pacnombre');
    var apellido=$('#pacapellido');
    var sexo=$('#pacsexo');
    var dui=$('#pacdui');
    var fecha=$('#pacfecha');
    var alert=$('#alerta');


    var resnombre=$('#resnombre');
    var resapellido=$('#resapellido');
    var relacion=$('#resrelacion');
    var telefonop=$('#restelefonop');
   
    
   

    if(nombre.val()==""){
        nombre.css("border-color","red");
        alert.css("visibility","visible");
        document.getElementById("pacnombre-error").innerHTML="Campo Obligatorio";
        document.getElementById("pacnombre-error").style.display="block";
    }else{
        nombre.css("border-color","");
        alert.css("visibility","hidden");
        document.getElementById("pacnombre-error").innerHTML="";
        document.getElementById("pacnombre-error").style.display="hidden";
    }

    if(apellido.val()==""){
        apellido.css("border-color","red");
        alert.css("visibility","visible");
        document.getElementById("pacapellido-error").innerHTML="Campo Obligatorio";
        document.getElementById("pacapellido-error").style.display="block";
    }else{
        apellido.css("border-color","");
        alert.css("visibility","hidden");
        document.getElementById("pacapellido-error").innerHTML="";
        document.getElementById("pacapellido-error").style.display="hidden";
    }

    if(sexo.val()==""){
        sexo.css("border-color","red");
        alert.css("visibility","visible");
        document.getElementById("pacsexo-error").innerHTML="Campo Obligatorio";
        document.getElementById("pacsexo-error").style.display="block";
    }else{
        sexo.css("border-color","");
        alert.css("visibility","hidden");
        document.getElementById("pacsexo-error").innerHTML="";
        document.getElementById("pacsexo-error").style.display="hidden";
    }

    if(fecha.val()==""){
        fecha.css("border-color","red");
        alert.css("visibility","visible");
        document.getElementById("pacdui").disabled=true;
        document.getElementById("pacfecha-error").innerHTML="Campo Obligatorio";
        document.getElementById("pacfecha-error").style.display="block";
        
    }else{
        fecha.css("border-color","");
        alert.css("visibility","hidden");
        document.getElementById("pacdui").disabled=false;
        document.getElementById("pacfecha-error").innerHTML="";
        document.getElementById("pacfecha-error").style.display="hidden";
    }


    if(fecha.val()!=""){
    if(resnombre.val()=="" && obteneredad()<18  ){
        resnombre.css("border-color","red");
        alert.css("visibility","visible");
        document.getElementById("resnombre-error").innerHTML="Campo Obligatorio";
        document.getElementById("resnombre-error").style.display="block";
        
    }else{
        resnombre.css("border-color","");
        alert.css("visibility","hidden");
        document.getElementById("resnombre-error").innerHTML="";
        document.getElementById("resnombre-error").style.display="hidden";
    }
    if(resapellido.val()=="" && obteneredad()<18 ){
        resapellido.css("border-color","red");
        alert.css("visibility","visible");
        document.getElementById("resapellido-error").innerHTML="Campo Obligatorio";
        document.getElementById("resapellido-error").style.display="block";
    }else{
        resapellido.css("border-color","");
        alert.css("visibility","hidden");
        document.getElementById("resapellido-error").innerHTML="";
        document.getElementById("resapellido-error").style.display="hidden";
    }
    if(relacion.val()=="" && obteneredad()<18 ){
        relacion.css("border-color","red");
        alert.css("visibility","visible");
        document.getElementById("resrelacion-error").innerHTML="Campo Obligatorio";
        document.getElementById("resrelacion-error").style.display="block";
        
    }else{
        relacion.css("border-color","");
        alert.css("visibility","hidden");
        document.getElementById("resrelacion-error").innerHTML="";
        document.getElementById("resrelacion-error").style.display="hidden";
    }
    if(telefonop.val()=="" && obteneredad()<18 ){
        telefonop.css("border-color","red");
        alert.css("visibility","visible");
        document.getElementById("restelefonop-error").innerHTML="Campo Obligatorio";
        document.getElementById("restelefonop-error").style.display="block";
        
    }else{
        telefonop.css("border-color","");
        alert.css("visibility","hidden");
        document.getElementById("restelefonop-error").innerHTML="";
        document.getElementById("restelefonop-error").style.display="hidden";
    }

    

}

if(fecha.val()!="" && fecha.val().length==10){
    if(obteneredad()<18){
if(resnombre.val()!="" && resapellido.val()!="" && relacion.val()!="" && telefonop.val()!=""){
    tieneresponsable=1;
}
else{
    tieneresponsable=1;
}
}
if(obteneredad()>=18){

if(resnombre.val()!="" && resapellido.val()!="" && relacion.val()!=""){
    tieneresponsable=1;
}else{
    tieneresponsable=1;
}
}
}


     
    if(fecha.val!=""){
    if(nombre.val()!="" && apellido.val()!="" && sexo.val()!="" && fecha.val()!="" &&  obteneredad()>=18){
        enviardatos();
    }

    if(resnombre.val()!="" && resapellido.val()!="" && telefonop.val()!="" && relacion.val()!="" && nombre.val()!="" && apellido.val()!="" && sexo.val()!="" && fecha.val()!="" && obteneredad()<18){
        enviardatos();
    }

    
}

});

$( "#btneditar" ).click(function() {

    var nombre=$('#pacnombre');
    var apellido=$('#pacapellido');
    var sexo=$('#pacsexo');
    var dui=$('#pacdui');
    var fecha=$('#pacfecha');
    var alert=$('#alerta');


    var resnombre=$('#resnombre');
    var resapellido=$('#resapellido');
    var relacion=$('#resrelacion');
    var telefonop=$('#restelefonop');
   
    
   

    if(nombre.val()==""){
        nombre.css("border-color","red");
        alert.css("visibility","visible");
        document.getElementById("pacnombre-error").innerHTML="Campo Obligatorio";
        document.getElementById("pacnombre-error").style.display="block";
    }else{
        nombre.css("border-color","");
        alert.css("visibility","hidden");
        document.getElementById("pacnombre-error").innerHTML="";
        document.getElementById("pacnombre-error").style.display="hidden";
    }

    if(apellido.val()==""){
        apellido.css("border-color","red");
        alert.css("visibility","visible");
        document.getElementById("pacapellido-error").innerHTML="Campo Obligatorio";
        document.getElementById("pacapellido-error").style.display="block";
    }else{
        apellido.css("border-color","");
        alert.css("visibility","hidden");
        document.getElementById("pacapellido-error").innerHTML="";
        document.getElementById("pacapellido-error").style.display="hidden";
    }

    if(sexo.val()==""){
        sexo.css("border-color","red");
        alert.css("visibility","visible");
        document.getElementById("pacsexo-error").innerHTML="Campo Obligatorio";
        document.getElementById("pacsexo-error").style.display="block";
    }else{
        sexo.css("border-color","");
        alert.css("visibility","hidden");
        document.getElementById("pacsexo-error").innerHTML="";
        document.getElementById("pacsexo-error").style.display="hidden";
    }

    if(fecha.val()==""){
        fecha.css("border-color","red");
        alert.css("visibility","visible");
        document.getElementById("pacdui").disabled=true;
        document.getElementById("pacfecha-error").innerHTML="Campo Obligatorio";
        document.getElementById("pacfecha-error").style.display="block";
        
    }else{
        fecha.css("border-color","");
        alert.css("visibility","hidden");
        document.getElementById("pacdui").disabled=false;
        document.getElementById("pacfecha-error").innerHTML="";
        document.getElementById("pacfecha-error").style.display="hidden";
    }


    if(fecha.val()!=""){
    if(resnombre.val()=="" && obteneredad()<18  ){
        resnombre.css("border-color","red");
        alert.css("visibility","visible");
        document.getElementById("resnombre-error").innerHTML="Campo Obligatorio";
        document.getElementById("resnombre-error").style.display="block";
        
    }else{
        resnombre.css("border-color","");
        alert.css("visibility","hidden");
        document.getElementById("resnombre-error").innerHTML="";
        document.getElementById("resnombre-error").style.display="hidden";
    }
    if(resapellido.val()=="" && obteneredad()<18 ){
        resapellido.css("border-color","red");
        alert.css("visibility","visible");
        document.getElementById("resapellido-error").innerHTML="Campo Obligatorio";
        document.getElementById("resapellido-error").style.display="block";
    }else{
        resapellido.css("border-color","");
        alert.css("visibility","hidden");
        document.getElementById("resapellido-error").innerHTML="";
        document.getElementById("resapellido-error").style.display="hidden";
    }
    if(relacion.val()=="" && obteneredad()<18 ){
        relacion.css("border-color","red");
        alert.css("visibility","visible");
        document.getElementById("resrelacion-error").innerHTML="Campo Obligatorio";
        document.getElementById("resrelacion-error").style.display="block";
        
    }else{
        relacion.css("border-color","");
        alert.css("visibility","hidden");
        document.getElementById("resrelacion-error").innerHTML="";
        document.getElementById("resrelacion-error").style.display="hidden";
    }
    if(telefonop.val()=="" && obteneredad()<18 ){
        telefonop.css("border-color","red");
        alert.css("visibility","visible");
        document.getElementById("restelefonop-error").innerHTML="Campo Obligatorio";
        document.getElementById("restelefonop-error").style.display="block";
        
    }else{
        telefonop.css("border-color","");
        alert.css("visibility","hidden");
        document.getElementById("restelefonop-error").innerHTML="";
        document.getElementById("restelefonop-error").style.display="hidden";
    }

    

}

if(fecha.val()!="" && fecha.val().length==10){
    if(obteneredad()<18){
if(resnombre.val()!="" && resapellido.val()!="" && relacion.val()!="" && telefonop.val()!=""){
    tieneresponsable=1;
}
else{
    tieneresponsable=1;
}
}
if(obteneredad()>=18){

if(resnombre.val()!="" && resapellido.val()!="" && relacion.val()!=""){
    tieneresponsable=1;
}else{
    tieneresponsable=1;
}
}
}


     
    if(fecha.val!=""){
    if(nombre.val()!="" && apellido.val()!="" && sexo.val()!="" && fecha.val()!="" &&  obteneredad()>=18){
        enviardatosmod();
    }

    if(resnombre.val()!="" && resapellido.val()!="" && telefonop.val()!="" && relacion.val()!="" && nombre.val()!="" && apellido.val()!="" && sexo.val()!="" && fecha.val()!="" && obteneredad()<18){
        enviardatosmod();
    }

    
}

});



$("#estado" ).change(function() {


    $.ajax({
        method: "POST",
        url: urlpeticion,
        data: { porpagina : $("#porpagina").value, estado: $("#estado").val()
                ,accion : "paginado"  }
      })
        .done(function( msg ) {
          
         $("#tabla").html(msg);
        });

    
});


$("#busqueda" ).keyup(function() {



        $.ajax({
            method: "POST",
            url: urlpeticion,
            data: { porpagina : $("#porpagina").val(), estado: $("#estado").val()
                    , busqueda : $("#busqueda").val(), accion : "paginado"  }
          })
            .done(function( msg ) {
              
             $("#tabla").html(msg);
            });

    
    
    

    
});





     

    
 



    function enviardatosmod(){


    var form=$('#formpac');

    var tipo=form.attr('data-form');
    var accion=form.attr('action');
    var metodo=form.attr('method');
    var respuesta=form.children('.RespuestaAjax');

    var msjError="<script>swal('Ocurrió un error inesperado','Por favor recargue la página','error');</script>";
    


    var textoAlerta;
    if(tipo==="save"){
        textoAlerta="Los datos del sistema serán actualizados";
    }else{
        textoAlerta="Quieres realizar la operación solicitada";
    }


    swal({
        title: "¿Estás seguro?",   
        text: textoAlerta,   
        type: "question",   
        showCancelButton: true,     
        confirmButtonText: "Aceptar",
        cancelButtonText: "Cancelar"
    }).then(function () {
        edadx=obteneredad();
        $.ajax({
            method: metodo,
            url: accion,
            data: { idpaciente : $("#pacid").val(), pacnombre: $("#pacnombre").val()
                    , pacapellido: $('#pacapellido').val(),
                    pacsexo: $('#pacsexo').val(),pacfecha : $('#pacfecha').val()
                    ,pacdui : $('#pacdui').val(),pacdireccion : $('#pacdireccion').val()
                    ,paccorreo : $('#paccorreo').val(),pactelefonop : $('#pactelefonop').val()
                    ,pactelefonos : $('#pactelefonos').val(),pacfecha : $('#pacfecha').val()
                    ,resnombre: $("#resnombre").val(), resapellido: $('#resapellido').val()
                    ,resrelacion: $("#resrelacion").val(), restelefonop: $('#restelefonop').val() 
                    ,restelefonos: $('#restelefonos').val()
                    ,expediente: expedientemod
                    ,edad: edadx ,tieneresponsable : tieneresponsable
                    ,resdui: $("#resdui").val(),accion : "modificar"  }
          })
            .done(function( msg ) {
              $("#respuesta").html(msg);
              actualizardatos(1,document.getElementById("porpagina").value);
            });
        return false;
    });
}


function enviardatos(){


    var form=$('#formpac');

    var tipo=form.attr('data-form');
    var accion=form.attr('action');
    var metodo=form.attr('method');
    var respuesta=form.children('.RespuestaAjax');

    var msjError="<script>swal('Ocurrió un error inesperado','Por favor recargue la página','error');</script>";
    


    var textoAlerta;
    if(tipo==="save"){
        textoAlerta="Los datos enviados quedaran almacenados en el sistema";
    }else if(tipo==="delete"){
        textoAlerta="Los datos serán eliminados completamente del sistema";
    }else if(tipo==="update"){
        textoAlerta="Los datos del sistema serán actualizados";
    }else{
        textoAlerta="Quieres realizar la operación solicitada";
    }


    swal({
        title: "¿Estás seguro?",   
        text: textoAlerta,   
        type: "question",   
        showCancelButton: true,     
        confirmButtonText: "Aceptar",
        cancelButtonText: "Cancelar",
        confirmButtonColor: "#2aa5a5"
    }).then(function () {
        edadx=obteneredad();
        $.ajax({
            method: metodo,
            url: accion,
            data: { pacnombre: $("#pacnombre").val(), pacapellido: $('#pacapellido').val(),
                    pacsexo: $('#pacsexo').val(),pacfecha : $('#pacfecha').val()
                    ,pacdui : $('#pacdui').val(),pacdireccion : $('#pacdireccion').val()
                    ,paccorreo : $('#paccorreo').val(),pactelefonop : $('#pactelefonop').val()
                    ,pactelefonos : $('#pactelefonos').val(),pacfecha : $('#pacfecha').val()
                    ,resnombre: $("#resnombre").val(), resapellido: $('#resapellido').val()
                    ,resrelacion: $("#resrelacion").val(), restelefonop: $('#restelefonop').val() 
                    ,restelefonos: $('#restelefonos').val(), tieneresponsable : tieneresponsable
                    ,edad: edadx
                    ,resdui: $("#resdui").val(),accion : tipo  }
          })
            .done(function( msg ) {
              $("#respuesta").html(msg);
              debugger
              if(esdecita=="noesdecita"){
              actualizardatos(1,document.getElementById("porpagina").value);
              }else{
                  if(error==0){
                $.ajax({
                    method: metodo,
                    url: dir+"ajax/citaAjax.php",
                    data: { idcita: idcita,accion : "modificarcita"  }
                  })
                    .done(function( msg ) {

                        irconsulta(msg);
                    });
                }
              }
            });
        return false;
    });
}

function actualizardatos(estado,porpag){


    $.ajax({
        method: "POST",
        url: urlpeticion,
        data: { porpagina : porpag, estado : estado , accion : "alltabla"  }
      })
        .done(function( msg ) {
           
          $("#tabla").html(msg);
        });

}





    





    var $sidebar = $('.sidebar').eq(0);
    if (!$sidebar.hasClass('h-sidebar')) return;

    $(document).on('settings.ace.top_menu', function (ev, event_name, fixed) {
        if (event_name !== 'sidebar_fixed') return;

        var sidebar = $sidebar.get(0);
        var $window = $(window);

        //return if sidebar is not fixed or in mobile view mode
        var sidebar_vars = $sidebar.ace_sidebar('vars');
        if (!fixed || (sidebar_vars['mobile_view'] || sidebar_vars['collapsible'])) {
            $sidebar.removeClass('lower-highlight');
            //restore original, default marginTop
            sidebar.style.marginTop = '';

            $window.off('scroll.ace.top_menu')
            return;
        }


        var done = false;
        $window.on('scroll.ace.top_menu', function (e) {

            var scroll = $window.scrollTop();
            scroll = parseInt(scroll / 4); //move the menu up 1px for every 4px of document scrolling
            if (scroll > 17) scroll = 17;


            if (scroll > 16) {
                if (!done) {
                    $sidebar.addClass('lower-highlight');
                    done = true;
                }
            } else {
                if (done) {
                    $sidebar.removeClass('lower-highlight');
                    done = false;
                }
            }

            sidebar.style['marginTop'] = (17 - scroll) + 'px';
        }).triggerHandler('scroll.ace.top_menu');

    }).triggerHandler('settings.ace.top_menu', ['sidebar_fixed', $sidebar.hasClass('sidebar-fixed')]);

    $(window).on('resize.ace.top_menu', function () {
        $(document).triggerHandler('settings.ace.top_menu', ['sidebar_fixed', $sidebar.hasClass('sidebar-fixed')]);
    });
    // para cargar componenete popover que muestra +datos de paciente
    $('[data-rel=popover]').popover({
        html: true
    });

    $('[data-rel=tooltip]').tooltip();

    $('.date-picker').datepicker({
        
        autoclose: true,
        endDate: $('#fechaactual').val()
    });

    $.mask.definitions['~'] = '[+-]';

    $('.telefono').mask('9999-9999');
    $('.dui').mask('99999999-9');
    $('.input-mask-date').mask('99/99/9999');

    
    
    

});