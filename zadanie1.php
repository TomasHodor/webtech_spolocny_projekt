<?php
require_once("helpers/authentication.php");
require_once("helpers/authorization.php");
require_once("helpers/csv.php");


?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>


<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//echo "save file \n";
?>

<?php
ECHO " SAVE FILE !!!!!!!!!!!!!!!!!!!!!!!1 \n";
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
    echo '<a href="zadanie1.php?lang=sk" id="sk_flag"><img src="https://www.geonames.org/flags/x/sk.gif" width="40px" height="20px"></a>';
    echo '<a href="zadanie1.php?lang=en" id="en_flag"><img src="https://www.geonames.org/flags/x/uk.gif" width="40px" height="20px"></a>';
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
    echo '<li class="nav-item active">';
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
    echo '<h2>Results</h2>';

    switch(getAuthentication()->type) {
        case 'student':
            //student

            //ukazka tabulky, treba doplnit udaje
            echo '<div class="table-responsive-sm tab">';
            echo '<h3>WT2 (2018/2019) - RT</h3>';
            echo '<table class="table table-hover table-sm">';
            echo '<thead style="background-color: rgb(90, 0, 0);color: white;">';
            echo '<tr><th scope="col">Preliminary</th>';
            echo '<th scope="col">Project</th>';
            echo '<th scope="col">Test</th>';
            echo '<th scope="col">Questionnaire</th>';
            echo '<th scope="col">Bonus</th>';
            echo '<th scope="col">Sum</th>';
            echo '<th scope="col">Mark</th></tr>';
            echo '</thead>';
            echo '<tbody>';
            echo '<tr><td>46.75</td>';
            echo '<td>18</td>';
            echo '<td>10</td>';
            echo '<td>1</td>';
            echo '<td></td>';
            echo '<td>75.75</td>';
            echo '<td>C</td></tr>';
            echo '</tbody>';
            echo '</table>';
            echo '</div>';
            break;
        case 'admin':
            //admin

            //ukazka pohladu adminu, treba doplnit udaje
            echo '<form action="#" method="POST">';
            echo '<h3>Entering results</h3>';
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

            echo '<div class="table-responsive-sm tab2">';
            echo '<h3>WT2 (2018/2019) - RT</h3>';
            echo '<table class="table table-hover table-sm">';
            echo '<thead style="background-color: rgb(90, 0, 0);color: white;">';
            echo '<tr><th scope="col">ID</th>';
            echo '<th scope="col">Name</th>';
            echo '<th scope="col">CV1</th>';
            echo '<th scope="col">CV2</th>';
            echo '<th scope="col">CV3</th>';
            echo '<th scope="col">CV4</th>';
            echo '<th scope="col">CV5</th>';
            echo '<th scope="col">CV6</th>';
            echo '<th scope="col">CV7</th>';
            echo '<th scope="col">CV8</th>';
            echo '<th scope="col">CV9</th>';
            echo '<th scope="col">CV10</th>';
            echo '<th scope="col">CV11</th>';
            echo '<th scope="col">Z1</th>';
            echo '<th scope="col">Z2</th>';
            echo '<th scope="col">VT</th>';
            echo '<th scope="col">SK-T</th>';
            echo '<th scope="col">SK-P</th>';
            echo '<th scope="col">Sum</th>';
            echo '<th scope="col">Mark</th></tr>';
            echo '</thead>';
            echo '<tbody>';
            echo '<tr><td>12345</td>';
            echo '<td>Name1 Surname1</td>';
            echo '<td>3</td>';
            echo '<td>2</td>';
            echo '<td>3</td>';
            echo '<td>4</td>';
            echo '<td>3</td>';
            echo '<td>3</td>';
            echo '<td>2</td>';
            echo '<td>2</td>';
            echo '<td></td>';
            echo '<td>2</td>';
            echo '<td>1.25</td>';
            echo '<td>6</td>';
            echo '<td>6</td>';
            echo '<td>8</td>';
            echo '<td>14.9</td>';
            echo '<td>16</td>';
            echo '<td>73.77</td>';
            echo '<td>D</td></tr>';
            echo '<tr><td>24598</td>';
            echo '<td>Name2 Surname2</td>';
            echo '<td>3</td>';
            echo '<td>2</td>';
            echo '<td>4</td>';
            echo '<td>3</td>';
            echo '<td>3</td>';
            echo '<td>2</td>';
            echo '<td>2</td>';
            echo '<td>2</td>';
            echo '<td>3</td>';
            echo '<td>2</td>';
            echo '<td>2</td>';
            echo '<td>10</td>';
            echo '<td>7</td>';
            echo '<td>8</td>';
            echo '<td>20</td>';
            echo '<td>14</td>';
            echo '<td>85.05</td>';
            echo '<td>B</td></tr>';
            echo '</tbody>';
            echo '</table>';
            echo '</div>';

            echo '<div class="container buttons">';
            echo '<div class="row justify-content-around">';
            echo '<div class="col-2">';
            echo '<button type="button" class="btn btn-primary" onclick="">Print table</button>';
            echo '</div>';
            echo '<div class="col-2">';
            echo '<button type="button" class="btn btn-primary" onclick="">Delete subject</button>';
            echo '</div>';
            echo '</div>';
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
    echo '<a href="zadanie1.php?lang=sk" id="sk_flag"><img src="https://www.geonames.org/flags/x/sk.gif" width="40px" height="20px"></a>';
    echo '<a href="zadanie1.php?lang=en" id="en_flag"><img src="https://www.geonames.org/flags/x/uk.gif" width="40px" height="20px"></a>';
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
    echo '<li class="nav-item active">';
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
    echo '<h2>Výsledky</h2>';

    switch(getAuthentication()->type) {
        case 'student':
            //student

            //ukazka tabulky, treba doplnit udaje
            echo '<div class="table-responsive-sm tab">';
            echo '<h3>WT2 (2018/2019) - RT</h3>';
            echo '<table class="table table-hover table-sm">';
            echo '<thead style="background-color: rgb(90, 0, 0);color: white;">';
            echo '<tr><th scope="col">Zápočet</th>';
            echo '<th scope="col">Projekt</th>';
            echo '<th scope="col">Test</th>';
            echo '<th scope="col">Dotazník</th>';
            echo '<th scope="col">Bonus</th>';
            echo '<th scope="col">Súčet</th>';
            echo '<th scope="col">Známka</th></tr>';
            echo '</thead>';
            echo '<tbody>';
            echo '<tr><td>46.75</td>';
            echo '<td>18</td>';
            echo '<td>10</td>';
            echo '<td>1</td>';
            echo '<td></td>';
            echo '<td>75.75</td>';
            echo '<td>C</td></tr>';
            echo '</tbody>';
            echo '</table>';
            echo '</div>';
            break;
        case 'admin':
            //admin

            //ukazka pohladu adminu, treba doplnit udaje
            echo '<form action="#" method="POST">';
            echo '<h3>Zadávanie výsledkov</h3>';
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

            echo '<div class="table-responsive-sm tab2">';
            echo '<h3>WT2 (2018/2019) - RT</h3>';
            echo '<table class="table table-hover table-sm">';
            echo '<thead style="background-color: rgb(90, 0, 0);color: white;">';
            echo '<tr><th scope="col">ID</th>';
            echo '<th scope="col">Meno</th>';
            echo '<th scope="col">CV1</th>';
            echo '<th scope="col">CV2</th>';
            echo '<th scope="col">CV3</th>';
            echo '<th scope="col">CV4</th>';
            echo '<th scope="col">CV5</th>';
            echo '<th scope="col">CV6</th>';
            echo '<th scope="col">CV7</th>';
            echo '<th scope="col">CV8</th>';
            echo '<th scope="col">CV9</th>';
            echo '<th scope="col">CV10</th>';
            echo '<th scope="col">CV11</th>';
            echo '<th scope="col">Z1</th>';
            echo '<th scope="col">Z2</th>';
            echo '<th scope="col">VT</th>';
            echo '<th scope="col">SK-T</th>';
            echo '<th scope="col">SK-P</th>';
            echo '<th scope="col">Spolu</th>';
            echo '<th scope="col">Známka</th></tr>';
            echo '</thead>';
            echo '<tbody>';
            echo '<tr><td>12345</td>';
            echo '<td>Priezvisko1 Meno1</td>';
            echo '<td>3</td>';
            echo '<td>2</td>';
            echo '<td>3</td>';
            echo '<td>4</td>';
            echo '<td>3</td>';
            echo '<td>3</td>';
            echo '<td>2</td>';
            echo '<td>2</td>';
            echo '<td></td>';
            echo '<td>2</td>';
            echo '<td>1.25</td>';
            echo '<td>6</td>';
            echo '<td>6</td>';
            echo '<td>8</td>';
            echo '<td>14.9</td>';
            echo '<td>16</td>';
            echo '<td>73.77</td>';
            echo '<td>D</td></tr>';
            echo '<tr><td>24598</td>';
            echo '<td>Priezvisko2 Meno2</td>';
            echo '<td>3</td>';
            echo '<td>2</td>';
            echo '<td>4</td>';
            echo '<td>3</td>';
            echo '<td>3</td>';
            echo '<td>2</td>';
            echo '<td>2</td>';
            echo '<td>2</td>';
            echo '<td>3</td>';
            echo '<td>2</td>';
            echo '<td>2</td>';
            echo '<td>10</td>';
            echo '<td>7</td>';
            echo '<td>8</td>';
            echo '<td>20</td>';
            echo '<td>14</td>';
            echo '<td>85.05</td>';
            echo '<td>B</td></tr>';
            echo '</tbody>';
            echo '</table>';
            echo '</div>';

            echo '<div class="container buttons">';
            echo '<div class="row justify-content-around">';
            echo '<div class="col-2">';
            echo '<button type="button" class="btn btn-primary" onclick="">Vytlačiť tabuľku</button>';
            echo '</div>';
            echo '<div class="col-2">';
            echo '<button type="button" class="btn btn-primary" onclick="">Vymazať predmet</button>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            break;
        default:
            header('Location: index.php?notallowed');
            break;
    }
    echo '<body>';
    echo '<div>';

}
/////////m y    C O D E /////////
/// 😂😂😂😂😂😂😂😂😂😂😂😂😂/////
///
///
//echo " <h1> my code /// 😂😂😂😂😂😂😂😂😂😂😂😂😂///// </h1>";

$conn = new mysqli(servername,username, password, database );
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo '    <form  method="post" enctype="multipart/form-data">';
//        <!--        todo create select menu for last xy years-->
echo '        <select>';
echo '            <option value="2018/2019">2018/2019</option>';
echo '        </select>';
echo '        <label for="nazov_predmet">Nazov predmetu</label>';
echo '        <input name="nazov_predmetu" value="algebra">';
echo '        <label for="CSV_subor">subor.csv</label>';
echo '        <input type="file" name="CSV_subor" id="fileToUpload"><br>';
echo '        <label for="oddelovac">Oddelovac: </label>';
echo '        <input type="radio" name="oddelovac" value="," checked> ciarka [,]';
echo '        <input type="radio" name="oddelovac" value=";"> bodkociarka [;]<br>';
echo '        <input type ="submit"  name="upload" >';
echo '    </form>';
echo '</div>';


if(!($token=getAuthentication() ) && $_SERVER['HTTP_HOST'] != 'localhost'){
    echo "osobe nebola authetifikovana <br>";
}
else {
    echo "osobe JE authetifikovana <BR>";
    $auth_type = authorize();
    echo $auth_type;//localhost for local debuging
    // todo change to admin
    if($auth_type == 'student' || $_SERVER['HTTP_HOST'] ='localhost' ){
        if(isset($_POST["upload"])) {
            echo "form is set \n";
            $target_file =  basename($_FILES["CSV_subor"]["name"]);
            $csv_file = file_get_contents($_FILES['CSV_subor']['tmp_name']);
            //todo test loaded file and skontroluj skryte znaky
            $delimeter = $_POST['oddelovac'];
            $csv_table_array = csvToTable($csv_file, $delimeter);
            //
            //insert data to db\
            $id_predmet = 0;
            $predmet = $_POST["nazov_predmetu"];
            $checkDB = "SELECT `id_predmet` FROM `zoznam_predmetov` WHERE `nazov` = '$predmet' ";
            $data =  $conn->query($checkDB);
            $res_num = $data->num_rows;

//            pozri ci existuje zaznam
            if($res_num == 0){
                $predmet_insert = "INSERT INTO `zoznam_predmetov` (`id_predmet`, `nazov`) VALUES (NULL, '$predmet');";
                $res = $conn->query($predmet_insert);
                //get last id
                $id_predmet = $conn->insert_id;
            }
            else {
                //predmet exists, get id
                $row =  $data->fetch_assoc();
                $id_predmet = $row['id_predmet'];
            }

            //vloz data do DB z csv_array
            $stmt = $conn->prepare("INSERT INTO `hodnotenie_predmetu` (`id_user`, `id_predmet`, `meno`, `json_object`) VALUES (?,?,?,?)");

            foreach ($csv_table_array as $lineKey => $values) {
                $stmt->bind_param("iiss", $id_user, $meno, $id_predmet, $JSONobj);

                $id_user = $values['ID'];
                $meno = $values['meno'];
                $obj = new stdClass();

                foreach ($values as $valueKey => $value) {
                    switch ($valueKey) {
                        case 'ID' :
                        case 'meno' :
                            break;
                        default :
                            $obj->$valueKey = $value;
                    }
                }
                $JSONobj = json_encode($obj);
                $stmt->execute();
                $stmt->close();
            }

        }
        else {
            echo " upload form is not set \n";
        }



    }
}

$conn->close();

echo '</body>';
echo '</html>';
?>
