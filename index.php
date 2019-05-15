<?php
require_once("helpers/authentication.php");
require_once("helpers/authorization.php");
require_once("helpers/csv.php");

authorize();

if(isset($_GET["logout"]) && isset($_SESSION["auth"])) {
  unset($_SESSION["auth"]);
  header('Location: login.php?unauth');
}

echo '<!DOCTYPE html>';
if($_GET["lang"] == "en") {
  echo '<html lang="en">';
  echo '<head>';
  echo '<meta charset="UTF-8">';
  echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
  echo '<meta http-equiv="X-UA-Compatible" content="ie=edge">';
  echo '<title>Final project</title>';
  echo '<link rel="stylesheet" type="text/css" media="screen" href="main.css" />';
  echo '<link href="https://fonts.googleapis.com/css?family=Lobster|Roboto" rel="stylesheet">';
  echo '</head>';
  echo '<body>';
  echo '<header>';
  echo '<h1>Portal</h1>';
  echo '<a href="index.php?lang=sk" id="sk_flag"><img src="https://www.geonames.org/flags/x/sk.gif" width="40px" height="20px"></a>';
  echo '<a href="index.php?lang=en" id="en_flag"><img src="https://www.geonames.org/flags/x/uk.gif" width="40px" height="20px"></a>';
  echo '</header>';
  echo '<p id="login">Logged in as: ' . getAuthentication()->name . ' | <a href="index.php?lang=en&logout">Logout</a></p>';
  if (isset($_GET['notallowed'])) {
    echo '<h2>You are not authorized to perform this operation.</h2>';
  }
  echo '<div id="links">';
  echo '<a href="zadanie1.php?lang=en" class="link">Results</a><br>';
  echo '<a href="zadanie2.php?lang=en" class="link">Teams</a><br>';
  echo '<a href="zadanie3.php?lang=en" class="link">Password generator</a><br>';
  echo '<a href="tasks.php?lang=en" class="link">Tasks</a><br>';
  echo '<a href="documentation.php?lang=en" class="link">Documentation</a>';
  echo '</div>';
  echo '</body>';
  echo '</html>';
}
else {
  echo '<html lang="sk">';
  echo '<head>';
  echo '<title>Záverečný projekt</title>';
  echo '<meta charset="utf-8">';
  echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
  echo '<meta http-equiv="X-UA-Compatible" content="ie=edge">';
  echo '<link rel="stylesheet" type="text/css" media="screen" href="main.css">';
  echo '<link href="https://fonts.googleapis.com/css?family=Lobster|Roboto" rel="stylesheet">';
  echo '</head>';
  echo '<body>';
  echo '<header>';
  echo '<h1>Portál</h1>';
  echo '<a href="index.php?lang=sk" id="sk_flag"><img src="https://www.geonames.org/flags/x/sk.gif" width="40px" height="20px"></a>';
  echo '<a href="index.php?lang=en" id="en_flag"><img src="https://www.geonames.org/flags/x/uk.gif" width="40px" height="20px"></a>';
  echo '</header>';
  echo '<p id="login">Prihlásený/á: ' . getAuthentication()->name . ' | <a href="index.php?lang=sk&logout">Odhlásiť sa</a></p>';
  if (isset($_GET['notallowed'])) {
    echo '<h2>Pre danú operáciu nemáte oprávnenie.</h2>';
  }
  echo '<div id="links">';
  echo '<a href="zadanie1.php?lang=sk" class="link">Výsledky</a><br>';
  echo '<a href="zadanie2.php?lang=sk" class="link">Tímy</a><br>';
  echo '<a href="zadanie3.php?lang=sk" class="link">Generovanie hesiel</a><br>';
  echo '<a href="tasks.php?lang=sk" class="link">Úlohy</a><br>';
  echo '<a href="documentation.php?lang=sk" class="link">Dokumentácia</a>';
  echo '</div>';
  echo '</body>';
  echo '</html>';
}
?>