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
         $this->SetFont('Arial', 'B', 12);
         $this->Cell(-200, 10, utf8_decode('REPORTE DE PERSONAL'), 0, 0, 'C');
        $this->Ln(5);


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
    function headerTable()
    {

        $this->setDrawColor(42, 255, 255);
        $this->SetFont("Times", "B", 11);
        $this->SetX(14);
        $this->Cell(8, 10, "ID", 1, 0, "L");
        $this->Cell(65, 10, "Nombre", 1, 0, "L");
        $this->Cell(20, 10, "Telefono", 1, 0, "L");
        $this->Cell(30, 10, "Fecha de ingreso", 1, 0, "L");
        $this->Cell(60, 10, "Direccion", 1, 0, "L");

        $this->Ln(10);
    }


    function viewTable()
    {

        $this->SetFont("Times", "", 11);



       $result = self::ejecutar_consulta_simple("SELECT * FROM `tpersonal`");
        if ($result) {
            foreach ($result as $row) {
                $this->SetX(14);
                 
                $this->Cell(8, 10, $row['idpersonal'], 1, 0, "L");
                $this->Cell(65, 10, utf8_decode($row['nombre_personal']) . " " . utf8_decode($row['apellido_personal']), 1, 0, "L");
                $this->Cell(20, 10, $row['telefono_personal'], 1, 0, "L");
                $this->Cell(30, 10, $row['fecha_ingreso'], 1, 0, "L");
                $this->Cell(60, 10, $row['direccion'], 1, 0, "L");



                $this->Ln(10);
            }
            $this->SetFont("Times", "B", 11);
        }

        $this->Ln(10);
        $this->SetX(14);

      /*  $this->Cell(50, 10, "Fecha de ingreso", 1, 0, "L");
        $this->Cell(30, 10, "Fecha", 1, 0, "L");
        $this->Cell(100, 10, "Direccion", 1, 0, "L");
        $this->Ln();
        $this->SetFont("Times", "", 11);*/

        /*$result = self::ejecutar_consulta_simple("SELECT fecha_ingreso, direccion FROM tpersonal  WHERE idpersonal=".$_REQUEST["idpersonal"]."");

        if ($result) {
            foreach ($result as $row) {
                $this->SetX(14);
                $this->Cell(50, 1, date("d/m/Y", strtotime($row['fecha_ingreso'])) . " ", 1, 0, "L");
                $this->Cell(30, 1, $row['edad'], 1, 0, "L");
                $this->MultiCell(100, 3, $row['direccion'], 1, "L", 0);
                

                $this->Ln(3);
            }
        }
        */
        $this->setDrawColor(42, 265, 265);
        $this->setLineWidth(0.5);
        $this->Line(14.5, $this->GetY() + 10, 195.5, $this->GetY() + 10);
    }
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times', '', 10);
$pdf->headers();

$pdf->headerTable();
$pdf->viewTable();
$pdf->Output();
