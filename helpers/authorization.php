<?php
require_once("config.php");
require_once("authentication.php");

/**
 * Vracia na login page s parametrom unauth
 * @author Peter Kalanin
 */
function redirectUnatheticated()
{
  header('Location: login.php?unauth');
}

/**
 * Vracia na index page s parametrom notallowed
 * @author Peter Kalanin
 */
function redirectUnathorized()
{
  header('Location: index.php?notallowed');
}

/**
 * Funkcia, ktorej ulohou je zistit pristupove prava na jednotlive stranky. V pripade, ze pouzivatel nema opravnenie pozerat stranku je presmerovany
 * @author Peter Kalanin
 * 
 * @return String|null
 */
function authorize()
{
  $url = getClearUrl();
  $auth = getAuthentication();
  // echo $url;

  if (!getAuthentication()) {
    if ($url != "login.php") {
      redirectUnatheticated();
      return null;
    }
  }

  switch ($url) {
    case 'zadanie1.php':
    case 'zadanie2.php':
      return $auth->type;

      break;

    case 'zadanie3.php':
      if ($auth->type == 'student') {
        redirectUnathorized();
      }
      return $auth->type;

    default:
      # code...
      break;
  }
}

/**
 * Vrati cistu URL adresu
 * @author Peter Kalanin
 * 
 * @return String URL adresa
 */
function getClearUrl()
{
  return strtok(pathinfo($_SERVER['REQUEST_URI'])["basename"], '?');
}
