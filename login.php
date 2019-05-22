<?php

echo '<!DOCTYPE html>';
require_once("helpers/authentication.php");

require_once("helpers/authorization.php");

echo '<!--1-->';

if (isset($_POST) && $_POST['login'] && $_POST['pass']) {

    $log = login($_POST['login'], $_POST['pass']);
    echo '<!--1-->';

    if ($log != 'failed' && $log != 'pass') {
        echo '<!--1-->';

        setAuthentication($log);

        var_dump($log);
        echo '<!--1-->';

        header('Location: index.php');

    }

}

echo '<!--1-->';



if ($_GET["lang"] == "en") {

    echo '<html lang="en">';

    echo '<head>';

    echo '<title>Final project</title>';

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

    echo '<h1>Portal</h1>';

    echo '<a href="login.php?unauth&lang=sk" id="sk_flag"><img src="https://www.geonames.org/flags/x/sk.gif" width="40px" height="20px"></a>';

    echo '<a href="login.php?unauth&lang=en" id="en_flag"><img src="https://www.geonames.org/flags/x/uk.gif" width="40px" height="20px"></a>';

    echo '</header>';

    echo '<form action="login.php" method="POST">';

    echo '<h2>Login</h2>';

    echo '<div class="form-group row">';

    echo '<label for="login" class="col-sm-2 col-form-label">Login</label>';

    echo '<div class="col-sm-10">';

    echo '<input type="text" class="form-control" id="login" name="login" placeholder="Login">';

    echo '</div>';

    echo '</div>';

    echo '<div class="form-group row">';

    echo '<label for="pass" class="col-sm-2 col-form-label">Password</label>';

    echo '<div class="col-sm-10">';

    echo '<input type="password" class="form-control" id="pass" name="pass" placeholder="Password">';

    echo '</div>';

    echo '</div>';

    echo '<div class="form-group row">';

    echo '<div class="col-sm-12">';

    echo '<input type="submit" class="btn btn-primary" value="Log in">';

    echo '</div>';

    echo '</div>';

    echo '</form>';

} else {

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

    echo '<!-- 1 -->';
    echo '<header>';

    echo '<h1>Portál</h1>';

    echo '<a href="login.php?unauth&lang=sk" id="sk_flag"><img src="https://www.geonames.org/flags/x/sk.gif" width="40px" height="20px"></a>';

    echo '<a href="login.php?unauth&lang=en" id="en_flag"><img src="https://www.geonames.org/flags/x/uk.gif" width="40px" height="20px"></a>';

    echo '</header>';

    echo '<form action="login.php" method="POST">';

    echo '<h2>Prihlásenie</h2>';

    echo '<div class="form-group row">';

    echo '<label for="login" class="col-sm-2 col-form-label">Login</label>';

    echo '<div class="col-sm-10">';

    echo '<input type="text" class="form-control" id="login" name="login" placeholder="Login">';

    echo '</div>';

    echo '</div>';

    echo '<div class="form-group row">';

    echo '<label for="pass" class="col-sm-2 col-form-label">Heslo</label>';

    echo '<div class="col-sm-10">';

    echo '<input type="password" class="form-control" id="pass" name="pass" placeholder="Heslo">';

    echo '</div>';

    echo '</div>';

    echo '<div class="form-group row">';

    echo '<div class="col-sm-12">';

    echo '<input type="submit" class="btn btn-primary" value="Prihlásiť sa">';

    echo '</div>';

    echo '</div>';

    echo '</form>';

}

echo '</body>';

echo '</html>';