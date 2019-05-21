<?php require_once('./../fpdf/fpdf.php');

/**
 * Vezme strukturovane pole a vytlaci z neho tabulku.
 * !!! Tato funkcia musi byt prevolana mimo klasickeho HTML suboru !!!
 * 
 * @author Peter Kalanin
 * 
 * @param Array $tab Strukturovane posle
 */
function tabToPdf($tab)
{
  try {
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 12);

    $cell_width = 40;
    $cell_height = 7;

    foreach ($tab as $tkey => $tval) {
      if ($tkey > 0) {
        continue;
      }
      foreach ($tval as $key => $val) {
        $pdf->Cell($cell_width, $cell_height, $key, 1);
      }
      $pdf->Ln();
    }
    $pdf->SetFont('Arial', '', 12);
    foreach ($tab as $tkey => $tval) {
      foreach ($tval as $key => $val) {
        $pdf->Cell($cell_width, $cell_height, $val, 1);
      }
      $pdf->Ln();
    }

    $pdf->Output();
  } catch (\Throwable $th) {
    echo $th;
  }
}
