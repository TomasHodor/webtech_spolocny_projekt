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
    echo '<a href="tasks.php?lang=sk" id="sk_flag"><img src="https://www.geonames.org/flags/x/sk.gif" width="40px" height="20px"></a>';
    echo '<a href="tasks.php?lang=en" id="en_flag"><img src="https://www.geonames.org/flags/x/uk.gif" width="40px" height="20px"></a>';
    echo '</header>';
    echo '<p id="login">Logged in as: ' . getAuthentication()->name . ' | <a href="index.php?lang=en">Menu</a> | <a href="index.php?lang=en&logout">Logout</a></p>';
    echo '<h2>Tasks</h2>';
    echo '<table>';
    echo '<tr><th>Task</th><th>Team member</th></tr>';
    echo '<tr><td>Authentication</td><td>Peter Kalanin</td></tr>';
    echo '<tr><td>Task 1 - results</td><td>Peter Sebest</td></tr>';
    echo '<tr><td>Task 2 - teams</td><td>Alex Kholodov</td></tr>';
    echo '<tr><td>Task 3 - passwords</td><td>Tomas Hodor</td></tr>';
    echo '<tr><td>FrontEnd</td><td>Friderika Benkoova</td></tr>';
    echo '</table>';
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
    echo '<a href="tasks.php?lang=sk" id="sk_flag"><img src="https://www.geonames.org/flags/x/sk.gif" width="40px" height="20px"></a>';
    echo '<a href="tasks.php?lang=en" id="en_flag"><img src="https://www.geonames.org/flags/x/uk.gif" width="40px" height="20px"></a>';
    echo '</header>';
    echo '<p id="login">Prihlásený/á: ' . getAuthentication()->name . ' | <a href="index.php?lang=sk">Menu</a> | <a href="index.php?lang=sk&logout">Odhlásiť sa</a></p>';
    echo '<h2>Úlohy</h2>';
    echo '<table>';
    echo '<tr><th>Úloha</th><th>Člen tímu</th></tr>';
    echo '<tr><td>Autentifikácia</td><td>Peter Kalanin</td></tr>';
    echo '<tr><td>Úloha 1 - výsledky</td><td>Peter Sebest</td></tr>';
    echo '<tr><td>Úloha 2 - tímy</td><td>Alex Kholodov</td></tr>';
    echo '<tr><td>Úloha 3 - heslá</td><td>Tomas Hodor</td></tr>';
    echo '<tr><td>FrontEnd</td><td>Friderika Benkoova</td></tr>';
    echo '</table>';
}
echo '</body>';
echo '</html>';
?>