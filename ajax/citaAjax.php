<?php
$peticionAjax = true;
require_once "../core/configGeneral.php";

if (isset($_POST["accion"])) {
  if ($_POST["accion"] == "save") {
    require_once "../controladores/citaControlador.php";

    $insAdmin = new citaControlador();
    echo $insAdmin->agregar_cita_controlador();
  }

  if ($_POST["accion"] == "cambiarestado") {

    require_once "../controladores/citaControlador.php";
    $insAdmin = new citaControlador();
    echo $insAdmin->cambiar_estado_cita_controlador();
  }



  if ($_POST["accion"] == "paginado") {

    require_once "../controladores/citaControlador.php";
    $insAdmin = new citaControlador();
    echo $insAdmin->paginador_cita_controlador();
  }

  if($_POST["accion"]=="irconsulta"){

    require_once "../controladores/citaControlador.php";
        $insAdmin = new citaControlador();
        echo $insAdmin->datos_paciente_controlador();   
    
    }

    if($_POST["accion"]=="rgpacientecita"){

      session_start(['name' => 'SBP']);
      $_SESSION["idcita"]=$_REQUEST["idcita"];
      $_SESSION["rgnuevo"]="registrar";

      return "1";
       
      
    }
    if($_POST["accion"]=="asociarconsulta"){

      session_start(['name' => 'SBP']);
      $_SESSION["idcita"]=$_REQUEST["idcita"];
      $_SESSION["rgnuevo"]="registrar";

      return "1";
       
      
    }
    if($_POST["accion"]=="modificarcita"){


      require_once "../controladores/citaControlador.php";
      $insAdmin = new citaControlador();
      echo $insAdmin->modificar_cita_controlador();
      
       
      
    }

   
}
