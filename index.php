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
  // echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">';
  require_once("links.php");
  echo '<link rel="stylesheet" type="text/css" media="screen" href="main.css" />';
  echo '<link rel="stylesheet" type="text/css" media="print" href="print.css">';
  echo '<link href="https://fonts.googleapis.com/css?family=Lobster|Roboto" rel="stylesheet">';
  echo '</head>';
  echo '<body>';
  echo '<header>';
  echo '<h1>Portal</h1>';
  echo '<a href="index.php?lang=sk" id="sk_flag"><img src="https://www.geonames.org/flags/x/sk.gif" width="40px" height="20px"></a>';
  echo '<a href="index.php?lang=en" id="en_flag"><img src="https://www.geonames.org/flags/x/uk.gif" width="40px" height="20px"></a>';
  echo '</header>';
  echo '<nav class="navbar navbar-expand-lg navbar-dark">';
  echo '<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">';
  echo '<span class="navbar-toggler-icon"></span>';
  echo '</button>';
  echo '<div class="collapse navbar-collapse" id="navbarSupportedContent">';
  echo '<ul class="navbar-nav mr-auto">';
  echo '<li class="nav-item active">';
  echo '<a class="nav-link" href="index.php?lang=en">Home</a>';
  echo '</li>';
  echo '<li class="nav-item">';
  echo '<a class="nav-link" href="zadanie1.php?lang=en">Results</a>';
  echo '</li>';
  echo '<li class="nav-item">';
  echo '<a class="nav-link" href="zadanie2.php?lang=en">Teams</a>';
  echo '</li>';
  echo '<li class="nav-item">';
  echo '<a class="nav-link" href="zadanie3.php?lang=en">Passwords</a>';
  echo '</li>';
  echo '<li class="nav-item">';
  echo '<a class="nav-link" href="tasks.php?lang=en">Tasks</a>';
  echo '</li>';
  echo '<li class="nav-item">';
  echo '<a class="nav-link" href="dokumentacia.docx">Documentation</a>';
  echo '</li>';
  echo '</ul>';
  echo '<ul class="nav navbar-nav navbar-right">';
  echo '<li class="nav-item">';
  echo '<a class="nav-link disabled" href="#">Logged in as: ' . getAuthentication()->name . '</a>';
  echo '</li>';
  echo '<li class="nav-item">';
  echo '<a class="nav-link" href="index.php?lang=en&logout">Logout</a>';
  echo '</li>';
  echo '</ul>';
  echo '</div>';
  echo '</nav>';
  if (isset($_GET['notallowed'])) {
    echo '<h2>You are not authorized to perform this operation.</h2>';
  }
  echo '<div class="list-group list-group-flush links">';
  echo '<a href="zadanie1.php?lang=en" class="list-group-item list-group-item-action">Results</a>';
  echo '<a href="zadanie2.php?lang=en" class="list-group-item list-group-item-action">Teams</a>';
  echo '<a href="zadanie3.php?lang=en" class="list-group-item list-group-item-action">Passwords</a>';
  echo '<a href="tasks.php?lang=en" class="list-group-item list-group-item-action">Tasks</a>';
  echo '<a href="documentation.php?lang=en" class="list-group-item list-group-item-action">Documentation</a>';
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
  echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">';
  echo '<link rel="stylesheet" type="text/css" media="screen" href="main.css">';
  echo '<link rel="stylesheet" type="text/css" media="print" href="print.css">';
  echo '<link href="https://fonts.googleapis.com/css?family=Lobster|Roboto" rel="stylesheet">';
  echo '</head>';
  echo '<body>';
  echo '<header>';
  echo '<h1>Portál</h1>';
  echo '<a href="index.php?lang=sk" id="sk_flag"><img src="https://www.geonames.org/flags/x/sk.gif" width="40px" height="20px"></a>';
  echo '<a href="index.php?lang=en" id="en_flag"><img src="https://www.geonames.org/flags/x/uk.gif" width="40px" height="20px"></a>';
  echo '</header>';
  echo '<nav class="navbar navbar-expand-lg navbar-dark">';
  echo '<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">';
  echo '<span class="navbar-toggler-icon"></span>';
  echo '</button>';
  echo '<div class="collapse navbar-collapse" id="navbarSupportedContent">';
  echo '<ul class="navbar-nav mr-auto">';
  echo '<li class="nav-item active">';
  echo '<a class="nav-link" href="index.php?lang=sk">Domov</a>';
  echo '</li>';
  echo '<li class="nav-item">';
  echo '<a class="nav-link" href="zadanie1.php?lang=sk">Výsledky</a>';
  echo '</li>';
  echo '<li class="nav-item">';
  echo '<a class="nav-link" href="zadanie2.php?lang=sk">Tímy</a>';
  echo '</li>';
  echo '<li class="nav-item">';
  echo '<a class="nav-link" href="zadanie3.php?lang=sk">Heslá</a>';
  echo '</li>';
  echo '<li class="nav-item">';
  echo '<a class="nav-link" href="tasks.php?lang=sk">Úlohy</a>';
  echo '</li>';
  echo '<li class="nav-item">';
  echo '<a class="nav-link" href="dokumentacia.docx">Dokumentácia</a>';
  echo '</li>';
  echo '</ul>';
  echo '<ul class="nav navbar-nav navbar-right">';
  echo '<li class="nav-item">';
  echo '<a class="nav-link disabled" href="#">Prihlásený/á: ' . getAuthentication()->name . '</a>';
  echo '</li>';
  echo '<li class="nav-item">';
  echo '<a class="nav-link" href="index.php?lang=sk&logout">Odhlásiť sa</a>';
  echo '</li>';
  echo '</ul>';
  echo '</div>';
  echo '</nav>';
  if (isset($_GET['notallowed'])) {
    echo '<h2>Pre danú operáciu nemáte oprávnenie.</h2>';
  }
  echo '<div class="list-group list-group-flush links">';
  echo '<a href="zadanie1.php?lang=sk" class="list-group-item list-group-item-action">Výsledky</a>';
  echo '<a href="zadanie2.php?lang=sk" class="list-group-item list-group-item-action">Tímy</a>';
  echo '<a href="zadanie3.php?lang=sk" class="list-group-item list-group-item-action">Heslá</a>';
  echo '<a href="tasks.php?lang=sk" class="list-group-item list-group-item-action">Úlohy</a>';
  echo '<a href="documentation.php?lang=sk" class="list-group-item list-group-item-action">Dokumentácia</a>';
  echo '</div>';
  echo '</body>';
  echo '</html>';
}

?>