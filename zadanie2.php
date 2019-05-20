<<<<<<< .merge_file_a06244
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>

<body>

</body>

</html>
=======
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
    echo '<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">';
    echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">';
    echo '<link rel="stylesheet" type="text/css" media="screen" href="main.css">';
    echo '<link rel="stylesheet" type="text/css" media="print" href="print.css">';
    echo '<link href="https://fonts.googleapis.com/css?family=Lobster|Roboto" rel="stylesheet">';
    echo '</head>';
    echo '<body>';
    echo '<header>';
    echo '<h1>Portal</h1>';
    echo '<a href="zadanie2.php?lang=sk" id="sk_flag"><img src="https://www.geonames.org/flags/x/sk.gif" width="40px" height="20px"></a>';
    echo '<a href="zadanie2.php?lang=en" id="en_flag"><img src="https://www.geonames.org/flags/x/uk.gif" width="40px" height="20px"></a>';
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
    echo '<li class="nav-item active">';
    echo '<a class="nav-link" href="zadanie2.php?lang=en">Teams</a>';
    echo '</li>';  
    echo '<li class="nav-item">';
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
    echo '<h2>Teams</h2>';

    switch(getAuthentication()->type) {
      case 'student':
        //student

        //ukazka pohladu kapitana, treba doplnit udaje
        echo '<form action="#" method="POST">';
        echo '<h3>WT2 - team</h3>';
        echo '<h4>Points for team: 40</h4>';
        echo '<div class="form-group row">';
        echo '<label for="clen1" class="col-sm-6 col-form-label">Peter Kalanin</label>';
        echo '<div class="col-sm-6">';
        echo '<input type="number" class="form-control" id="clen1" name="clen1" min="0" max="40">';
        echo '</div>';
        echo '</div>';
        echo '<div class="form-group row">';
        echo '<label for="clen2" class="col-sm-6 col-form-label">Peter Sebest</label>';
        echo '<div class="col-sm-6">';
        echo '<input type="number" class="form-control" id="clen2" name="clen2" min="0" max="40">';
        echo '</div>';
        echo '</div>';
        echo '<div class="form-group row">';
        echo '<label for="clen3" class="col-sm-6 col-form-label">Alex Kholodov</label>';
        echo '<div class="col-sm-6">';
        echo '<input type="number" class="form-control" id="clen3" name="clen3" min="0" max="40">';
        echo '</div>';
        echo '</div>';
        echo '<div class="form-group row">';
        echo '<label for="clen4" class="col-sm-6 col-form-label">Tomas Hodor</label>';
        echo '<div class="col-sm-6">';
        echo '<input type="number" class="form-control" id="clen4" name="clen4" min="0" max="40">';
        echo '</div>';
        echo '</div>';
        echo '<div class="form-group row">';
        echo '<label for="clen5" class="col-sm-6 col-form-label">Friderika Benkoova</label>';
        echo '<div class="col-sm-6">';
        echo '<input type="number" class="form-control" id="clen5" name="clen5" min="0" max="40">';
        echo '</div>';
        echo '</div>';
        echo '<div class="form-group row">';
        echo '<div class="col-sm-12">';
        echo '<input type="submit" class="btn btn-primary" value="Save">';
        echo '</div>';
        echo '</div>';
        echo '</form>';

        //ukazka pohladu nekapitana, treba doplnit udaje
        echo '<div class="table-responsive-sm tab">';
        echo '<h3>WT2 - team</h3>';
        echo '<table class="table table-hover table-sm">';
        echo '<thead style="background-color: rgb(90, 0, 0);color: white;">';
        echo '<tr><th scope="col">Email</th>';
        echo '<th scope="col">Name</th>';
        echo '<th scope="col">Points</th>';
        echo '<th scope="col">Agree</th></tr>';
        echo '</thead>';
        echo '<tbody>';
        echo '<tr><td>xstud1@stuba.sk</td>';
        echo '<td>Peter Kalanin</td>';
        echo '<td>8</td>';
        echo '<td><a href="#"><i class="far fa-thumbs-up"></i></a> <a href="#"><i class="far fa-thumbs-down"></i></a></td></tr>';
        echo '<tr><td>xstud2@stuba.sk</td>';
        echo '<td>Peter Sebest</td>';
        echo '<td>8</td>';
        echo '<td><a href="#"><i class="far fa-thumbs-up"></i></a> <a href="#"><i class="far fa-thumbs-down"></i></a></td></tr>';
        echo '<tr><td>xstud3@stuba.sk</td>';
        echo '<td>Alex Kholodov</td>';
        echo '<td>8</td>';
        echo '<td><a href="#"><i class="far fa-thumbs-up"></i></a> <a href="#"><i class="far fa-thumbs-down"></i></a></td></tr>';
        echo '<tr><td>xstud3@stuba.sk</td>';
        echo '<td>Tomas Hodor</td>';
        echo '<td>8</td>';
        echo '<td><a href="#"><i class="far fa-thumbs-up"></i></a> <a href="#"><i class="far fa-thumbs-down"></i></a></td></tr>';
        echo '<tr><td>xstud3@stuba.sk</td>';
        echo '<td>Friderika Benkoova</td>';
        echo '<td>8</td>';
        echo '<td><a href="#"><i class="far fa-thumbs-up"></i></a> <a href="#"><i class="far fa-thumbs-down"></i></a></td></tr>';
        echo '</tbody>';
        echo '</table>';
        echo '</div>';
        break;
      case 'admin':
        //admin

        //ukazka pohladu adminu, treba doplnit udaje
        echo '<form action="#" method="POST">';
        echo '<h3>Adding students</h3>';
        echo '<div class="form-group row">';
        echo '<label for="rok" class="col-sm-4 col-form-label">Academic year</label>';
        echo '<div class="col-sm-8">';
        echo '<select class="form-control" id="rok">';
        echo '<option name="2018/2019">2018/2019</option>';
        echo '<option name="2017/2018">2017/2018</option>';
        echo '<option name="2016/2017">2016/2017</option>';
        echo '<option name="2015/2016">2015/2016</option>';
        echo '<option name="2014/2015">2014/2015</option>';
        echo '</select>';
        echo '</div>';
        echo '</div>';
        echo '<div class="form-group row">';
        echo '<label for="nazov" class="col-sm-4 col-form-label">Subject title</label>';
        echo '<div class="col-sm-8">';
        echo '<input type="text" class="form-control" id="nazov" name="nazov">';
        echo '</div>';
        echo '</div>';
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

        echo '<form action="#" method="POST">';
        echo '<h3>WT2 (2018/2019) - RT</h3>';
        echo '<div class="form-group row">';
        echo '<label for="tim1" class="col-sm-3 col-form-label">Team 1</label>';
        echo '<label for="tim1" class="col-sm-3 col-form-label">Member 1<br>Member 2<br>Member 3<br>Member 4<br>Member 5</label>';
        echo '<div class="col-sm-6">';
        echo '<input type="number" class="form-control" id="tim1" name="tim1" min="0" max="40">';
        echo '</div>';
        echo '</div>';
        echo '<div class="form-group row">';
        echo '<label for="tim2" class="col-sm-3 col-form-label">Team 2</label>';
        echo '<label for="tim2" class="col-sm-3 col-form-label">Member 1<br>Member 2<br>Member 3<br>Member 4<br>Member 5</label>';
        echo '<div class="col-sm-6">';
        echo '<input type="number" class="form-control" id="tim2" name="tim2" min="0" max="40">';
        echo '</div>';
        echo '</div>';
        echo '<div class="form-group row">';
        echo '<label for="tim3" class="col-sm-3 col-form-label">Team 3</label>';
        echo '<label for="tim3" class="col-sm-3 col-form-label">Member 1<br>Member 2<br>Member 3<br>Member 4<br>Member 5</label>';
        echo '<div class="col-sm-6">';
        echo '<input type="number" class="form-control" id="tim3" name="tim3" min="0" max="40">';
        echo '</div>';
        echo '</div>';
        echo '<div class="form-group row">';
        echo '<div class="col-sm-12">';
        echo '<input type="submit" class="btn btn-primary" value="Save">';
        echo '</div>';
        echo '</div>';
        echo '</form>';

        echo '<div class="table-responsive-sm tab">';
        echo '<h3>Team 1</h3>';
        echo '<table class="table table-hover table-sm">';
        echo '<thead style="background-color: rgb(90, 0, 0);color: white;">';
        echo '<tr><th scope="col">Email</th>';
        echo '<th scope="col">Name</th>';
        echo '<th scope="col">Points</th>';
        echo '<th scope="col">Agree</th></tr>';
        echo '</thead>';
        echo '<tbody>';
        echo '<tr><td>xstud1@stuba.sk</td>';
        echo '<td>Student 1</td>';
        echo '<td>20</td>';
        echo '<td><a href="#"><i class="far fa-thumbs-up"></i></a> <a href="#"><i class="far fa-thumbs-down"></i></a></td></tr>';
        echo '<tr><td>xstud2@stuba.sk</td>';
        echo '<td>Student 2</td>';
        echo '<td>8</td>';
        echo '<td><a href="#"><i class="far fa-thumbs-up"></i></a> <a href="#"><i class="far fa-thumbs-down"></i></a></td></tr>';
        echo '<tr><td>xstud3@stuba.sk</td>';
        echo '<td>Student 3</td>';
        echo '<td>5</td>';
        echo '<td><a href="#"><i class="far fa-thumbs-up"></i></a> <a href="#"><i class="far fa-thumbs-down"></i></a></td></tr>';
        echo '</tbody>';
        echo '</table>';
        echo '</div>';

        echo '<div style="margin: 0 auto;margin-top:30px;margin-bottom:30px;width: 10%;">';
        echo '<button type="button" class="btn btn-primary" onclick="">Export</button>';
        echo '</div>';

        echo '<div class="table-responsive-sm tab">';
        echo '<h3>WT2 (2018/2019) - RT</h3>';
        echo '<table class="table table-hover table-sm">';
        echo '<tbody>';
        echo '<tr><td>Count of students</td>';
        echo '<td>20</td></tr>';
        echo '<tr><td>Count of agreeing students</td>';
        echo '<td>12</td></tr>';
        echo '<tr><td>Count of disagreeing students</td>';
        echo '<td>5</td></tr>';
        echo '<tr><td>Count of students without opinion</td>';
        echo '<td>3</td></tr>';
        echo '</tbody>';
        echo '</table>';
        echo '</div>';

        echo '<div class="table-responsive-sm tab">';
        echo '<h3>WT2 (2018/2019) - RT</h3>';
        echo '<table class="table table-hover table-sm">';
        echo '<tbody>';
        echo '<tr><td>Count of teams</td>';
        echo '<td>5</td></tr>';
        echo '<tr><td>Count of closed teams</td>';
        echo '<td>2</td></tr>';
        echo '<tr><td>Count of teams to comment</td>';
        echo '<td>2</td></tr>';
        echo '<tr><td>Count of teams with students without opinion</td>';
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
    echo '<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">';
    echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">';
    echo '<link rel="stylesheet" type="text/css" media="screen" href="main.css">';
    echo '<link rel="stylesheet" type="text/css" media="print" href="print.css">';
    echo '<link href="https://fonts.googleapis.com/css?family=Lobster|Roboto" rel="stylesheet">';
    echo '</head>';
    echo '<body>';
    echo '<header>';
    echo '<h1>Portál</h1>';
    echo '<a href="zadanie2.php?lang=sk" id="sk_flag"><img src="https://www.geonames.org/flags/x/sk.gif" width="40px" height="20px"></a>';
    echo '<a href="zadanie2.php?lang=en" id="en_flag"><img src="https://www.geonames.org/flags/x/uk.gif" width="40px" height="20px"></a>';
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
    echo '<li class="nav-item active">';
    echo '<a class="nav-link" href="zadanie2.php?lang=sk">Tímy</a>';
    echo '</li>';  
    echo '<li class="nav-item">';
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
    echo '<h2>Tímy</h2>';

    switch(getAuthentication()->type) {
      case 'student':
        //student

        //ukazka pohladu kapitana, treba doplnit udaje
        echo '<form action="#" method="POST">';
        echo '<h3>WT2 - tím na vypracovanie záverečného projektu</h3>';
        echo '<h4>Body pridené tímu: 40</h4>';
        echo '<div class="form-group row">';
        echo '<label for="clen1" class="col-sm-6 col-form-label">Peter Kalanin</label>';
        echo '<div class="col-sm-6">';
        echo '<input type="number" class="form-control" id="clen1" name="clen1" min="0" max="40">';
        echo '</div>';
        echo '</div>';
        echo '<div class="form-group row">';
        echo '<label for="clen2" class="col-sm-6 col-form-label">Peter Sebest</label>';
        echo '<div class="col-sm-6">';
        echo '<input type="number" class="form-control" id="clen2" name="clen2" min="0" max="40">';
        echo '</div>';
        echo '</div>';
        echo '<div class="form-group row">';
        echo '<label for="clen3" class="col-sm-6 col-form-label">Alex Kholodov</label>';
        echo '<div class="col-sm-6">';
        echo '<input type="number" class="form-control" id="clen3" name="clen3" min="0" max="40">';
        echo '</div>';
        echo '</div>';
        echo '<div class="form-group row">';
        echo '<label for="clen4" class="col-sm-6 col-form-label">Tomas Hodor</label>';
        echo '<div class="col-sm-6">';
        echo '<input type="number" class="form-control" id="clen4" name="clen4" min="0" max="40">';
        echo '</div>';
        echo '</div>';
        echo '<div class="form-group row">';
        echo '<label for="clen5" class="col-sm-6 col-form-label">Friderika Benkoova</label>';
        echo '<div class="col-sm-6">';
        echo '<input type="number" class="form-control" id="clen5" name="clen5" min="0" max="40">';
        echo '</div>';
        echo '</div>';
        echo '<div class="form-group row">';
        echo '<div class="col-sm-12">';
        echo '<input type="submit" class="btn btn-primary" value="Uložiť">';
        echo '</div>';
        echo '</div>';
        echo '</form>';

        //ukazka pohladu nekapitana, treba doplnit udaje
        echo '<div class="table-responsive-sm tab">';
        echo '<h3>WT2 - tím na vypracovanie záverečného projektu</h3>';
        echo '<table class="table table-hover table-sm">';
        echo '<thead style="background-color: rgb(90, 0, 0);color: white;">';
        echo '<tr><th scope="col">Email</th>';
        echo '<th scope="col">Meno</th>';
        echo '<th scope="col">Body</th>';
        echo '<th scope="col">Súhlas</th></tr>';
        echo '</thead>';
        echo '<tbody>';
        echo '<tr><td>xstud1@stuba.sk</td>';
        echo '<td>Peter Kalanin</td>';
        echo '<td>8</td>';
        echo '<td><a href="#"><i class="far fa-thumbs-up"></i></a> <a href="#"><i class="far fa-thumbs-down"></i></a></td></tr>';
        echo '<tr><td>xstud2@stuba.sk</td>';
        echo '<td>Peter Sebest</td>';
        echo '<td>8</td>';
        echo '<td><a href="#"><i class="far fa-thumbs-up"></i></a> <a href="#"><i class="far fa-thumbs-down"></i></a></td></tr>';
        echo '<tr><td>xstud3@stuba.sk</td>';
        echo '<td>Alex Kholodov</td>';
        echo '<td>8</td>';
        echo '<td><a href="#"><i class="far fa-thumbs-up"></i></a> <a href="#"><i class="far fa-thumbs-down"></i></a></td></tr>';
        echo '<tr><td>xstud3@stuba.sk</td>';
        echo '<td>Tomas Hodor</td>';
        echo '<td>8</td>';
        echo '<td><a href="#"><i class="far fa-thumbs-up"></i></a> <a href="#"><i class="far fa-thumbs-down"></i></a></td></tr>';
        echo '<tr><td>xstud3@stuba.sk</td>';
        echo '<td>Friderika Benkoova</td>';
        echo '<td>8</td>';
        echo '<td><a href="#"><i class="far fa-thumbs-up"></i></a> <a href="#"><i class="far fa-thumbs-down"></i></a></td></tr>';
        echo '</tbody>';
        echo '</table>';
        echo '</div>';
        break;
      case 'admin':
        //admin

        //ukazka pohladu adminu, treba doplnit udaje
        echo '<form action="#" method="POST">';
        echo '<h3>Pridávanie študentov</h3>';
        echo '<div class="form-group row">';
        echo '<label for="rok" class="col-sm-4 col-form-label">Školský rok</label>';
        echo '<div class="col-sm-8">';
        echo '<select class="form-control" id="rok">';
        echo '<option name="2018/2019">2018/2019</option>';
        echo '<option name="2017/2018">2017/2018</option>';
        echo '<option name="2016/2017">2016/2017</option>';
        echo '<option name="2015/2016">2015/2016</option>';
        echo '<option name="2014/2015">2014/2015</option>';
        echo '</select>';
        echo '</div>';
        echo '</div>';
        echo '<div class="form-group row">';
        echo '<label for="nazov" class="col-sm-4 col-form-label">Názov predmetu</label>';
        echo '<div class="col-sm-8">';
        echo '<input type="text" class="form-control" id="nazov" name="nazov">';
        echo '</div>';
        echo '</div>';
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

        echo '<form action="#" method="POST">';
        echo '<h3>WT2 (2018/2019) - RT</h3>';
        echo '<div class="form-group row">';
        echo '<label for="tim1" class="col-sm-3 col-form-label">Tím 1</label>';
        echo '<label for="tim1" class="col-sm-3 col-form-label">Člen 1<br>Člen 2<br>Člen 3<br>Člen4<br>Člen 5</label>';
        echo '<div class="col-sm-6">';
        echo '<input type="number" class="form-control" id="tim1" name="tim1" min="0" max="40">';
        echo '</div>';
        echo '</div>';
        echo '<div class="form-group row">';
        echo '<label for="tim2" class="col-sm-3 col-form-label">Tím 2</label>';
        echo '<label for="tim2" class="col-sm-3 col-form-label">Člen 1<br>Člen 2<br>Člen 3<br>Člen4<br>Člen 5</label>';
        echo '<div class="col-sm-6">';
        echo '<input type="number" class="form-control" id="tim2" name="tim2" min="0" max="40">';
        echo '</div>';
        echo '</div>';
        echo '<div class="form-group row">';
        echo '<label for="tim3" class="col-sm-3 col-form-label">Tím 3</label>';
        echo '<label for="tim3" class="col-sm-3 col-form-label">Člen 1<br>Člen 2<br>Člen 3<br>Člen4<br>Člen 5</label>';
        echo '<div class="col-sm-6">';
        echo '<input type="number" class="form-control" id="tim3" name="tim3" min="0" max="40">';
        echo '</div>';
        echo '</div>';
        echo '<div class="form-group row">';
        echo '<div class="col-sm-12">';
        echo '<input type="submit" class="btn btn-primary" value="Uložiť">';
        echo '</div>';
        echo '</div>';
        echo '</form>';

        echo '<div class="table-responsive-sm tab">';
        echo '<h3>Tím 1</h3>';
        echo '<table class="table table-hover table-sm">';
        echo '<thead style="background-color: rgb(90, 0, 0);color: white;">';
        echo '<tr><th scope="col">Email</th>';
        echo '<th scope="col">Meno</th>';
        echo '<th scope="col">Body</th>';
        echo '<th scope="col">Súhlas</th></tr>';
        echo '</thead>';
        echo '<tbody>';
        echo '<tr><td>xstud1@stuba.sk</td>';
        echo '<td>Student 1</td>';
        echo '<td>20</td>';
        echo '<td><a href="#"><i class="far fa-thumbs-up"></i></a> <a href="#"><i class="far fa-thumbs-down"></i></a></td></tr>';
        echo '<tr><td>xstud2@stuba.sk</td>';
        echo '<td>Student 2</td>';
        echo '<td>8</td>';
        echo '<td><a href="#"><i class="far fa-thumbs-up"></i></a> <a href="#"><i class="far fa-thumbs-down"></i></a></td></tr>';
        echo '<tr><td>xstud3@stuba.sk</td>';
        echo '<td>Student 3</td>';
        echo '<td>5</td>';
        echo '<td><a href="#"><i class="far fa-thumbs-up"></i></a> <a href="#"><i class="far fa-thumbs-down"></i></a></td></tr>';
        echo '</tbody>';
        echo '</table>';
        echo '</div>';

        echo '<div style="margin: 0 auto;margin-top:30px;margin-bottom:30px;width: 10%;">';
        echo '<button type="button" class="btn btn-primary" onclick="">Exportovať</button>';
        echo '</div>';

        echo '<div class="table-responsive-sm tab">';
        echo '<h3>WT2 (2018/2019) - RT</h3>';
        echo '<table class="table table-hover table-sm">';
        echo '<tbody>';
        echo '<tr><td>Počet študentov</td>';
        echo '<td>20</td></tr>';
        echo '<tr><td>Počet súhlasiacich študentov</td>';
        echo '<td>12</td></tr>';
        echo '<tr><td>Počet nesúhlasiacich študentov</td>';
        echo '<td>5</td></tr>';
        echo '<tr><td>Počet študentov, ktorý sa nevyjadrili</td>';
        echo '<td>3</td></tr>';
        echo '</tbody>';
        echo '</table>';
        echo '</div>';

        echo '<div class="table-responsive-sm tab">';
        echo '<h3>WT2 (2018/2019) - RT</h3>';
        echo '<table class="table table-hover table-sm">';
        echo '<tbody>';
        echo '<tr><td>Počet tímov</td>';
        echo '<td>5</td></tr>';
        echo '<tr><td>Počet uzavretých tímov</td>';
        echo '<td>2</td></tr>';
        echo '<tr><td>Počet tímov, ku ktorým sa treba vyjadriť</td>';
        echo '<td>2</td></tr>';
        echo '<tr><td>Počet tímov s nevyjadrenými študentami</td>';
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
>>>>>>> .merge_file_a08968
