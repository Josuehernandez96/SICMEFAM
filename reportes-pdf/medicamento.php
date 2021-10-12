<?php

require_once "../core/configAPP.php";
require('fpdf.php');

class PDF extends FPDF
{

     function conectar()
	{
		$enlace = new PDO(SGBD, USER, PASS);
		return $enlace;
	}

     function ejecutar_consulta_simple($consulta)
	{
		$respuesta = self::conectar()->prepare($consulta);
		$respuesta->execute();
		return $respuesta;
	}

    // Page header
    function Header()
    {
        
    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Times', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Pagina ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
        $this->SetX(-45);
        $this->SetFont("Arial", "", 8);
        date_default_timezone_set('America/El_Salvador');
        $date = date('d/m/Y', time());
        $hora = date('h:i:s a', time());
        $this->Cell(0, 10, "fecha: " . $date, 0, 0, "C");
        $this->Ln(5);
        $this->SetX(-45);
        $this->Cell(0, 10, "hora: " . $hora, 0, 0, "C");
    }
    function headerTable()
    {
        
    }


    function viewTable($id,$nombre,$presentacion,$tipo,$via,$concentracion,$unidad)
    {


        
        $this->SetFont('Arial','',10);
        $this->Ln(7);
        
        $this->Cell(50,7,$nombre,1,0,'C');
        $this->Cell(25,7,$presentacion,1,0,'C');
        $this->Cell(42,7,$tipo,1,0,'C');
        $this->Cell(32,7,$via,1,0,'C');
        $this->Cell(20,7,$concentracion." ".$unidad,1,0,'C');
        $consulta2=$this->ejecutar_consulta_simple("SELECT SUM(tinventario_medicamento.cantidad_medicamento) AS cantidad
		FROM
		tinventario_medicamento
		WHERE idmedicamento =$id AND estado!=0
        ");
        foreach ($consulta2 as $row2) {
            if(!$row2['cantidad']||$row2['cantidad']=="0"){
            $this->Cell(20,7,"Agotado",1,0,'C');
            }else{
            $this->Cell(20,7,$row2['cantidad'],1,0,'C');
            }
            
        }
        

        
        
    }
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

// Logo
$pdf->Image('../vistas/logotipo.png', 10, 15, 25);
// Arial bold 15
$pdf->SetFont('Times', 'B', 12);
// Move to the right
$pdf->Cell(80);
// Title
$pdf->Cell(35, 20, utf8_decode('CONSULTORIO MÉDICO DRA. ANA LUISA VELÁZQUEZ'), 0, 0, 'C');
$pdf->Cell(-35, 35, utf8_decode('MEDICINA GENERAL'), 0, 0, 'C');
$pdf->Cell(35,65, utf8_decode('REPORTE DE MEDICAMENTOS'), 0, 0, 'C');
// Line break
$pdf->Ln(20);
$pdf->SetX(-45);

$pdf->Ln(5);

$pdf->Ln(20);




$consulta=$pdf->ejecutar_consulta_simple("SELECT * FROM tmedicamento WHERE tmedicamento.estado= 1");
$pdf->SetFont('Times', 'B', 12);


$pdf->Cell(50,7,"Nombre",1,0,'C');
$pdf->Cell(25,7,"Presentacion",1,0,'C');
$pdf->Cell(42,7,"Tipo",1,0,'C');
$pdf->Cell(32,7,"Administracion",1,0,'C');
$pdf->Cell(20,7,"Contenido",1,0,'C');
$pdf->Cell(20,7,"Total",1,0,'C');

foreach ($consulta as $row) {
    $pdf->viewTable($row["idmedicamento"],$row["nombre_medicamento"],$row['presentacion_medicamento'],$row['tipo'],$row['via_admin_medicamento'],$row['concentracion_medicamento'],$row['unidad']);
}







$pdf->Output();
