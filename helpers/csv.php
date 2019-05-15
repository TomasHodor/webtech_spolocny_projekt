<?php
/**
 * Sluzba prevedie obsah csv suboru na strukturovane pole
 * @author Peter Kalanin
 * 
 * @param String $csvText Obsah csv suboru
 * @param String $delim Oddelovac dat
 * 
 */
function csvToTable($csvText, $delim = ";")
{
  $table = array();
  $csvLines = explode("\n", $csvText);
  $headers = explode($delim, $csvLines[0]);

  foreach ($csvLines as $lineKey => $line) {
    if ($lineKey == 0) {
      $headers = explode($delim, $line);
      continue;
    }

    $values = explode($delim, $line);

    foreach ($values as $valueKey => $value) {
      $table[$lineKey - 1][$headers[$valueKey]] = $value;
    }
  }
  return $table;
}
