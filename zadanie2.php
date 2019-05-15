<?php
require_once("helpers/authentication.php");
require_once("helpers/authorization.php");
require_once("helpers/csv.php");

echo '<!DOCTYPE html>';
if($_GET["lang"] == "en") {
    echo '<html lang="en">';
    echo '<head>';
    echo '<title>Final project</title>';
    echo '<meta charset="utf-8">';
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
    echo '<meta http-equiv="X-UA-Compatible" content="ie=edge">';
    echo '<link rel="stylesheet" type="text/css" media="screen" href="main.css">';
    echo '<link href="https://fonts.googleapis.com/css?family=Lobster|Roboto" rel="stylesheet">';
    echo '</head>';
    echo '<body>';
    echo '<header>';
    echo '<h1>Portal</h1>';
    echo '<a href="zadanie2.php?lang=sk" id="sk_flag"><img src="https://www.geonames.org/flags/x/sk.gif" width="40px" height="20px"></a>';
    echo '<a href="zadanie2.php?lang=en" id="en_flag"><img src="https://www.geonames.org/flags/x/uk.gif" width="40px" height="20px"></a>';
    echo '</header>';
    echo '<p id="login">Logged in as: ' . getAuthentication()->name . ' | <a href="index.php?lang=en">Menu</a> | <a href="index.php?lang=en&logout">Logout</a></p>';
    echo '<h2>Teams</h2>';

    switch(getAuthentication()->type) {
      case 'student':
        //student
        break;
      case 'admin':
        //admin
        break;
      default:
        header('Location: index.php?lang=en&notallowed');
        break;
    }
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
    echo '<a href="zadanie2.php?lang=sk" id="sk_flag"><img src="https://www.geonames.org/flags/x/sk.gif" width="40px" height="20px"></a>';
    echo '<a href="zadanie2.php?lang=en" id="en_flag"><img src="https://www.geonames.org/flags/x/uk.gif" width="40px" height="20px"></a>';
    echo '</header>';
    echo '<p id="login">Prihlásený/á: ' . getAuthentication()->name . ' | <a href="index.php?lang=sk">Menu</a> | <a href="index.php?lang=sk&logout">Odhlásiť sa</a></p>';
    echo '<h2>Tímy</h2>';

    switch(getAuthentication()->type) {
      case 'student':
        //student
        break;
      case 'admin':
        //admin
        break;
      default:
        header('Location: index.php?notallowed');
        break;
    }
}
echo '</body>';
echo '</html>';
?>