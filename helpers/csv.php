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
    //todo remove last /r/n escape character
  $table = array();
  $csvLines = explode("\n", $csvText);
  $headers = explode($delim, $csvLines[0]);

  foreach ($csvLines as $lineKey => $line) {
    if ($lineKey == 0) {
      $headers = explode($delim, $line);
      $headers_clear = [];
      $index = 0;
//      pri kluci id som mal na konci niake skryte 3 znaky ktore
//      ktore som nevidel ani cez xdebug
//      pridal som tieto riadky aby mi to islo
      foreach ($headers as $str){
          $headers_clear[$index++] = preg_replace('/[^\PC\s]/u', '', $str);
      }
      continue;
    }

    $values = explode($delim, $line);

    foreach ($values as $valueKey => $value) {

      $table[$lineKey - 1][$headers_clear[$valueKey]] = $value;
    }
  }
  return $table;
}
