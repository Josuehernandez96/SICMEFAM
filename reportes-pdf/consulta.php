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


    function viewTable($textos,$titulo)
    {

        $this->SetFont('Times', 'B', 12);


        $this->Cell(50,3,$titulo,0,1,'L');
        
        $this->Cell(50,3,'',0,1);
        
        $this->SetFont('Arial','',10);
        
        //convertimos el texto a utf8
        $texto = utf8_decode($textos);
        
        $this->MultiCell(190,5,$texto,1,1);
        
        $this->Cell(50,5,'',0,1);
        
    }
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

// Logo
$pdf->Image('../vistas/cmfam.png', 10, 15, 25);
// Arial bold 15
$pdf->SetFont('Times', 'B', 12);
// Move to the right
$pdf->Cell(80);
// Title
$pdf->Cell(35, 20, utf8_decode('CONSULTORIO MÉDICO DRA. ANA LUISA VELÁZQUEZ'), 0, 0, 'C');
$pdf->Cell(-35, 35, utf8_decode('MEDICINA GENERAL'), 0, 0, 'C');
$pdf->Cell(35,65, utf8_decode('HOJA DE CONSULTA'), 0, 0, 'C');
$pdf->Cell(-30, 80, utf8_decode('PACIENTE:DAVID FLORES GUZMAN'), 0, 0, 'C');
// Line break
$pdf->Ln(20);
$pdf->SetX(-45);

$pdf->Ln(5);

$pdf->Ln(20);




$consulta=$pdf->ejecutar_consulta_simple("SELECT * FROM `tconsulta` WHERE tconsulta.idconsulta=".$_REQUEST["idconsulta"]." ");
foreach ($consulta as $row) {
    $pdf->viewTable($row["razon_consulta"],"Razon de Consulta");
    $pdf->viewTable($row["antecedentes_consulta"],"Antecedentes");
    $pdf->viewTable($row["diagnostico_consutla"],"Diagnostico");
    $pdf->viewTable($row["observaciones_consulta"],"Observaciones");
    $pdf->viewTable($row["ordenexamen_consulta"],"Ordenes de Examen");
    $pdf->viewTable($row["recomendacion"],utf8_decode("Recomendación"));

}







$pdf->Output();
