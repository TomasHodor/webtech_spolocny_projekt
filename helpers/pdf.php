<?php
require(__DIR__ . '/../lib/Mpdf/fpdf.php');
//todo osetrenie rozlozenia, page breaks, new pages...
class PDF extends FPDF
{
// Page header
    function Header()
    {
        global $title;
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Move to the right
        $this->Cell(80);
        // Title
        $this->Cell(30,10,$title,1,0,'C');// todo nejde
        // Line break
        $this->Ln(20);
    }

// Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
    function table($data){
        foreach ($data as $name => $users){
//            nazov predmetu
            $this->SetTextColor(196,128,255);
            $this->SetFont('Arial','',12);
            $this->Cell(80,7,$name,1);
            $this->Ln();
            $headers = [];
            foreach ($users as $id => $user  ){
//                create header cols
                $this->SetTextColor(0,0,0);

                if(count($headers) == 0){
                    $this->SetFillColor(128,64,196);
                    $this->SetFont('Arial','B',8);
                    $headers = array_keys($user);
                    $this->Cell(15,7,'id',1,0,'C');
                    foreach ($headers as $col){
                        //select weight
                        $w = ($col == 'meno') ? 30 : 15;
                        $this->Cell($w,7,$col,1,0,'C');

                    }
                    $this->Ln();
                    $this->SetFont('Arial','I',8);
                    $this->SetFillColor(255,255,255);
                }
                //print user data
                $this->Cell(15,7,$id,1,0,'C');//ID is key to user data
                foreach ($user as $key => $value ){
                    $w = ($key == 'meno') ? 30 : 15;
                    $this->Cell($w,7,$value,1,0,'C');
                }
                $this->Ln();
            }

        }
    }
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->setTitle("webTech 2 - Predmety");
$pdf->AddPage();

$data = $_COOKIE['pdf_data'];
$pdf->table($data);
$pdf->Output();
?>