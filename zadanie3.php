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
    echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">';
    echo '<link rel="stylesheet" type="text/css" media="screen" href="main.css">';
    echo '<link rel="stylesheet" type="text/css" media="print" href="print.css">';
    echo '<link href="https://fonts.googleapis.com/css?family=Lobster|Roboto" rel="stylesheet">';
    echo '</head>';
    echo '<body>';
    echo '<header>';
    echo '<h1>Portal</h1>';
    echo '<a href="zadanie3.php?lang=sk" id="sk_flag"><img src="https://www.geonames.org/flags/x/sk.gif" width="40px" height="20px"></a>';
    echo '<a href="zadanie3.php?lang=en" id="en_flag"><img src="https://www.geonames.org/flags/x/uk.gif" width="40px" height="20px"></a>';
    echo '</header>';
    echo '<nav class="navbar navbar-expand-lg navbar-dark">';
    echo '<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">';
    echo '<span class="navbar-toggler-icon"></span>';
    echo '</button>';
    echo '<div class="collapse navbar-collapse" id="navbarSupportedContent">';
    echo '<ul class="navbar-nav mr-auto">';
    echo '<li class="nav-item">';
    echo '<a class="nav-link" href="index.php?lang=en">Home</a>';
    echo '</li>';
    echo '<li class="nav-item">';
    echo '<a class="nav-link" href="zadanie1.php?lang=en">Results</a>';
    echo '</li>'; 
    echo '<li class="nav-item">';
    echo '<a class="nav-link" href="zadanie2.php?lang=en">Teams</a>';
    echo '</li>';  
    echo '<li class="nav-item active">';
    echo '<a class="nav-link" href="zadanie3.php?lang=en">Passwords</a>';
    echo '</li>';
    echo '<li class="nav-item">';
    echo '<a class="nav-link" href="tasks.php?lang=en">Tasks</a>';
    echo '</li>';    
    echo '<li class="nav-item">';
    echo '<a class="nav-link" href="documentation.php?lang=en">Documentation</a>';
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
    echo '<h2>Password generator</h2>';

    switch(getAuthentication()->type) {
      case 'admin':
        //admin

        //ukazka pohladu adminu, treba doplnit udaje
        echo '<form action="#" method="POST">';
        echo '<h3>Password generator</h3>';
        echo '<div class="form-group row">';
        echo '<label for="subor" class="col-sm-4 col-form-label">CSV file</label>';
        echo '<div class="col-sm-8">';
        echo '<input type="file" class="form-control" id="subor" name="subor">';
        echo '</div>';
        echo '</div>';
        echo '<div class="form-group row">';
        echo '<label for="oddelovac" class="col-sm-4 col-form-label">Separator</label>';
        echo '<div class="col-sm-8">';
        echo '<select class="form-control" id="oddelovac">';
        echo '<option name="ciarka">,</option>';
        echo '<option name="bodkociarka">;</option>';
        echo '</select>';
        echo '</div>';
        echo '</div>';
        echo '<div class="form-group row">';
        echo '<div class="col-sm-12">';
        echo '<input type="submit" class="btn btn-primary" value="Save">';
        echo '</div>';
        echo '</div>';
        echo '</form>';

        echo '<div class="table-responsive-sm tab">';
        echo '<h3>Sent emails</h3>';
        echo '<table class="table table-hover table-sm">';
        echo '<thead style="background-color: rgb(90, 0, 0);color: white;">';
        echo '<tr><th scope="col">Date sent</th>';
        echo '<th scope="col">Name</th>';
        echo '<th scope="col">Email</th>';
        echo '<th scope="col">Subject</th>';
        echo '<th scope="col">Template ID</th></tr>';
        echo '</thead>';
        echo '<tbody>';
        echo '<tr><td>15. 5. 2019</td>';
        echo '<td>Student 1</td>';
        echo '<td>xstud1@stuba.sk</td>';
        echo '<td>Access data</td>';
        echo '<td>1</td></tr>';
        echo '<tr><td>15. 5. 2019</td>';
        echo '<td>Student 2</td>';
        echo '<td>xstud2@stuba.sk</td>';
        echo '<td>Access data</td>';
        echo '<td>1</td></tr>';
        echo '<tr><td>15. 5. 2019</td>';
        echo '<td>Student 3</td>';
        echo '<td>xstud3@stuba.sk</td>';
        echo '<td>Access data</td>';
        echo '<td>1</td></tr>';
        echo '</tbody>';
        echo '</table>';
        echo '</div>';
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
    echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">';
    echo '<link rel="stylesheet" type="text/css" media="screen" href="main.css">';
    echo '<link rel="stylesheet" type="text/css" media="print" href="print.css">';
    echo '<link href="https://fonts.googleapis.com/css?family=Lobster|Roboto" rel="stylesheet">';
    echo '</head>';
    echo '<body>';
    echo '<header>';
    echo '<h1>Portál</h1>';
    echo '<a href="zadanie3.php?lang=sk" id="sk_flag"><img src="https://www.geonames.org/flags/x/sk.gif" width="40px" height="20px"></a>';
    echo '<a href="zadanie3.php?lang=en" id="en_flag"><img src="https://www.geonames.org/flags/x/uk.gif" width="40px" height="20px"></a>';
    echo '</header>';
    echo '<nav class="navbar navbar-expand-lg navbar-dark">';
    echo '<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">';
    echo '<span class="navbar-toggler-icon"></span>';
    echo '</button>';
    echo '<div class="collapse navbar-collapse" id="navbarSupportedContent">';
    echo '<ul class="navbar-nav mr-auto">';
    echo '<li class="nav-item">';
    echo '<a class="nav-link" href="index.php?lang=sk">Domov</a>';
    echo '</li>';
    echo '<li class="nav-item">';
    echo '<a class="nav-link" href="zadanie1.php?lang=sk">Výsledky</a>';
    echo '</li>'; 
    echo '<li class="nav-item">';
    echo '<a class="nav-link" href="zadanie2.php?lang=sk">Tímy</a>';
    echo '</li>';  
    echo '<li class="nav-item active">';
    echo '<a class="nav-link" href="zadanie3.php?lang=sk">Heslá</a>';
    echo '</li>';
    echo '<li class="nav-item">';
    echo '<a class="nav-link" href="tasks.php?lang=sk">Úlohy</a>';
    echo '</li>';    
    echo '<li class="nav-item">';
    echo '<a class="nav-link" href="documentation.php?lang=sk">Dokumentácia</a>';
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
    echo '<h2>Generovanie hesiel</h2>';

    switch(getAuthentication()->type) {
      case 'admin':
        //admin

        //ukazka pohladu adminu, treba doplnit udaje
        echo '<form action="#" method="POST">';
        echo '<h3>Generovanie hesiel</h3>';
        echo '<div class="form-group row">';
        echo '<label for="subor" class="col-sm-4 col-form-label">CSV súbor</label>';
        echo '<div class="col-sm-8">';
        echo '<input type="file" class="form-control" id="subor" name="subor">';
        echo '</div>';
        echo '</div>';
        echo '<div class="form-group row">';
        echo '<label for="oddelovac" class="col-sm-4 col-form-label">Oddeľovač</label>';
        echo '<div class="col-sm-8">';
        echo '<select class="form-control" id="oddelovac">';
        echo '<option name="ciarka">,</option>';
        echo '<option name="bodkociarka">;</option>';
        echo '</select>';
        echo '</div>';
        echo '</div>';
        echo '<div class="form-group row">';
        echo '<div class="col-sm-12">';
        echo '<input type="submit" class="btn btn-primary" value="Uložiť">';
        echo '</div>';
        echo '</div>';
        echo '</form>';

        echo '<div class="table-responsive-sm tab">';
        echo '<h3>Odoslané maily</h3>';
        echo '<table class="table table-hover table-sm">';
        echo '<thead style="background-color: rgb(90, 0, 0);color: white;">';
        echo '<tr><th scope="col">Dátum odoslania</th>';
        echo '<th scope="col">Meno</th>';
        echo '<th scope="col">Email</th>';
        echo '<th scope="col">Názov predmetu správy</th>';
        echo '<th scope="col">ID použitej šablóny</th></tr>';
        echo '</thead>';
        echo '<tbody>';
        echo '<tr><td>15. 5. 2019</td>';
        echo '<td>Student 1</td>';
        echo '<td>xstud1@stuba.sk</td>';
        echo '<td>Prístupové údaje</td>';
        echo '<td>1</td></tr>';
        echo '<tr><td>15. 5. 2019</td>';
        echo '<td>Student 2</td>';
        echo '<td>xstud2@stuba.sk</td>';
        echo '<td>Prístupové údaje</td>';
        echo '<td>1</td></tr>';
        echo '<tr><td>15. 5. 2019</td>';
        echo '<td>Student 3</td>';
        echo '<td>xstud3@stuba.sk</td>';
        echo '<td>Prístupové údaje</td>';
        echo '<td>1</td></tr>';
        echo '</tbody>';
        echo '</table>';
        echo '</div>';
        break;
      default:
        header('Location: index.php?notallowed');
        break;
    }
}
echo '</body>';
echo '</html>';
?>
