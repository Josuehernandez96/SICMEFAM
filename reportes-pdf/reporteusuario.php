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
    function Headers()
    {
        // Logo
        $this->Image('../vistas/cmfam.png', 5, 6, 25);
        // Arial bold 15
        $this->SetFont('Arial', 'B', 14);
        // Move to the right
        $this->Cell(80);
        // Title

        $this->Cell(30, 10, utf8_decode('CLINICA MEDICA FAMILIAR'), 0, 0, 'C');
        $this->Ln(5);

        $this->SetFont("Arial", "", 11);
        $this->Cell(0, 10, ('TELEFONO: 2393-0548'), 0, 0, 'C');
        $this->Ln(5);
        $this->Cell(0, 10, ('J.V.P.M 3012'), 0, 0, 'C');

        $this->Ln(5);
        $this->setDrawColor(42, 165, 165);
        $this->setLineWidth(0.5);
        $this->Line(14.5, $this->GetY() + 10, 195.5, $this->GetY() + 10);
        $this->Ln(2);
        $this->setLineWidth(2);
        $this->Line(15, $this->GetY() + 10, 195, $this->GetY() + 10);

        // Line break
        $this->Ln(10);
        $this->SetX(-45);
        $this->SetFont("Arial", "", 8);
        date_default_timezone_set('America/El_Salvador');
        $date = date('d/m/Y', time());
        $hora = date('h:i:s a', time());
        $this->Cell(0, 10, "fecha: " . $date, 0, 0, "C");
        $this->Ln(5);
        $this->SetX(-45);
        $this->Cell(0, 10, "hora: " . $hora, 0, 0, "C");

        $this->setLineWidth(0.5);
        $this->Line(14.5, $this->GetY() + 10, 195.5, $this->GetY() + 10);


        $this->Ln(12);
    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Pagina ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
    function title()
    {
        $this->SetFont("Arial", "B", 18);
        $this->Cell(190, 10, utf8_decode('REPORTE DE USUARIO'), 0, 0, 'C');
        $this->Ln();
        
    }
    function headerTable()
    {
        $this->setDrawColor(42, 255, 255);
        $this->SetFont("Times", "B", 9);
        $this->SetX(14);
        $this->Cell(10, 10, "ID:", 1, 0, "L");
        $this->Cell(30, 10, "USUARIO:", 1, 0, "L");
        $this->Cell(60, 10, "NOMBRE:", 1, 0, "L");
        $this->Cell(20, 10, "CREACION:", 1, 0, "L");
        $this->Cell(60, 10, "CORREO:", 1, 0, "L");

        $this->Ln(10);
    }


    function viewTable()
    {

        $this->SetFont("Times", "", 9);



        $result = self::ejecutar_consulta_simple("SELECT * FROM `tusuario` where estado= 1");
        if ($result) {
            foreach ($result as $row) {
                $this->SetX(14);
                $this->Cell(10, 5, $row['idusuario'], 1, 0, "L");
                $this->Cell(30, 5, $row['nombre'], 1, 0, "L");
                $this->Cell(60, 5, $row['nombrep'], 1, 0, "L");
                $this->Cell(20, 5, $row['fechacreacion'], 1, 0, "L");
                $this->Cell(60, 5, $row['correo'], 1, 0, "L");

                $this->Ln(5);
            }
            $this->SetFont("Times", "B", 11);
        }

        
        $this->setDrawColor(42, 165, 165);
        $this->setLineWidth(0.5);
        $this->Line(14.5, $this->GetY() + 10, 195.5, $this->GetY() + 10);
    }
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times', '', 12);
$pdf->headers();

$pdf->title();
$pdf->headerTable();
$pdf->viewTable();
$pdf->Output();
