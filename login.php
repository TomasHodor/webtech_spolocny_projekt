<?php
require_once("helpers/authentication.php");
require_once("helpers/authorization.php");

if (isset($_POST) && $_POST['login'] && $_POST['pass']) {
  setAuthentication(loginLdap($_POST['login'], $_POST['pass']));
  header('Location: index.php');
}

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
    echo '<a href="login.php?unauth&lang=sk" id="sk_flag"><img src="https://www.geonames.org/flags/x/sk.gif" width="40px" height="20px"></a>';
    echo '<a href="login.php?unauth&lang=en" id="en_flag"><img src="https://www.geonames.org/flags/x/uk.gif" width="40px" height="20px"></a>';
    echo '</header>';
    echo '<form action="login.php" method="POST">';
    echo '<h2>Login</h2>';
    echo '<input type="text" name="login" placeholder="Username"><br>';
    echo '<input type="password" name="pass" placeholder="Password"><br>';
    echo '<input type="submit" value="Log in">';
    echo '</form>';
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
    echo '<a href="login.php?unauth&lang=sk" id="sk_flag"><img src="https://www.geonames.org/flags/x/sk.gif" width="40px" height="20px"></a>';
    echo '<a href="login.php?unauth&lang=en" id="en_flag"><img src="https://www.geonames.org/flags/x/uk.gif" width="40px" height="20px"></a>';
    echo '</header>';
    echo '<form action="login.php" method="POST">';
    echo '<h2>Prihlásenie</h2>';
    echo '<input type="text" name="login" placeholder="Prihlasovacie meno"><br>';
    echo '<input type="password" name="pass" placeholder="Heslo"><br>';
    echo '<input type="submit" value="Prihlásiť sa">';
    echo '</form>';
}
echo '</body>';
echo '</html>';
?>