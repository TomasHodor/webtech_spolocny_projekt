<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("helpers/authentication.php");
require_once("helpers/authorization.php");
require_once("helpers/csv.php");
require_once("helpers/func_zad1.php");

$output_status;
$conn = new mysqli(servername,username, password, database );
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST["pdf"])){
    data_Cookie($conn);
    require_once("helpers/pdf.php");
}
elseif (isset($_POST["delete"])) {
    $nazov = $_POST["nazov"];
    $DB_id = "SELECT `id_predmet`, `nazov` FROM `zoznam_predmetov` WHERE `nazov` = '$nazov'";
    $DB = $conn->query($DB_id);
    $predmet_row = $DB->fetch_assoc();
    $id_predmet = intval($predmet_row['id_predmet']);
    $output_status = $predmet_row['nazov'];
    //todo delete data from cookie


    if (!$id_predmet) {
        echo "predmet nieje v DB \n";
    } else {
        //vymaz z DB predmety, a hodnotenia
        $DB_xPredmet = "DELETE FROM `zoznam_predmetov` WHERE `id_predmet` = $id_predmet;";
//            $DB_xHosnotenie = "DELETE FROM `hodnotenie_predmetu` WHERE `id_predmet` = $id_predmet;";
        $conn->multi_query($DB_xPredmet );
    }
    //todo delete data from cookie

}


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
    echo "<h4> predmet: $output_status bol vymazany</h4>";
    echo '<h2>Results</h2>';

    switch(getAuthentication()->type) {
        case 'student':
            //student

            //ukazka tabulky, treba doplnit udaje
            $id_student = $_SESSION['auth']->uid;
            $name_student = $_SESSION['auth']->name;


            echo "<h4>$name_student, $id_student</h4>";
            studentTable("en", $conn,$id_student);

            break;
        case 'admin':
            //admin

            //ukazka pohladu adminu, treba doplnit udaje
            echo '<form  method="post" enctype="multipart/form-data">';
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
            echo '<input class="form-control" type="radio" name="oddelovac" value="," checked> ciarka [,]';
            echo '<input class="form-control" type="radio" name="oddelovac" value=";"> bodkociarka [;]<br>';
            echo '</div>';
            echo '</div>';
            echo '<div class="form-group row">';
            echo '<div class="col-sm-12">';
            echo '<input type="submit" class="btn btn-primary" value="Save" name="Save">';
            echo '</div>';
            echo '<div class="col-2">';
            echo '<input type ="submit" class="btn btn-primary"  name="pdf" value="Courses.PDF">';
            echo '</div>';
            echo '<div class="col-2">';
            echo '<input type ="submit" class="btn btn-primary"  name="delete" value="Delete course">';
            echo '</div>';
            echo '</div>';
            echo '</form>';
//            data_Cookie($conn);
            tableAdmin("en", $conn);
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
    echo '<h2>Výsledky</h2>';

    switch(isset(getAuthentication()->type) ? getAuthentication()->type : null) {
        case 'student':
            //student

            //ukazka tabulky, treba doplnit udaje
            $id_student = $_SESSION['auth']->uid;
            $name_student = $_SESSION['auth']->name;

            echo "<h4>$name_student, $id_student</h4>";

            studentTable("en", $conn,$id_student);

            break;
        case 'admin':
            //admin

            //ukazka pohladu adminu, treba doplnit udaje
            echo '<form  method="post" enctype="multipart/form-data">';
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
            echo '<input type="file" class="form-control" id="subor" name="subor" >';
            echo '</div>';
            echo '</div>';
            echo '<div class="form-group row">';
            echo '<label for="oddelovac" class="col-sm-4 col-form-label">Separator</label>';
            echo '<div class="col-sm-8">';
            echo '<input class="form-control" type="radio" name="oddelovac" value="," checked> ciarka [,]';
            echo '<input class="form-control" type="radio" name="oddelovac" value=";"> bodkociarka [;]<br>';
            echo '</div>';
            echo '</div>';
            echo '<div class="form-group row">';
            echo '<div class="col-sm-12">';
            echo '<input type="submit" class="btn btn-primary" value="Uložiť" name="Save">';
            echo '</div>';
            echo '<div class="col-2">';
            echo '<input type ="submit" class="btn btn-primary"  name="pdf" value="Predmety.PDF">';
            echo '</div>';
            echo '<div class="col-2">';
            echo '<input type ="submit" class="btn btn-primary"  name="delete" value="Vymaz Predmet">';
            echo '</div>';
            echo '</div>';
            echo '</form>';
//            data_Cookie($conn);
            tableAdmin("en", $conn);
            break;
        default:
            header('Location: index.php?notallowed');
            break;
    }

//    echo '<div>';

}
/////////m y    C O D E /////////
/// 😂😂😂😂😂😂😂😂😂😂😂😂😂/////
///
///
//echo " <h1> my code /// 😂😂😂😂😂😂😂😂😂😂😂😂😂///// </h1>";

if(!($token=getAuthentication() ) && $_SERVER['HTTP_HOST'] != 'localhost'){

}
else {
    $auth_type = authorize();
    if (isset($_POST["Save"])) {
        $target_file = basename($_FILES["subor"]["name"]);
        $csv_file = file_get_contents($_FILES['subor']['tmp_name']);
        //todo test loaded file and skontroluj skryte znaky
        $delimeter = $_POST['oddelovac'];
        $csv_table_array = csvToTable($csv_file, $delimeter);

        //insert data to db\
        $id_predmet;
        $predmet = (strlen($_POST["nazov"])) != 0 ? $_POST["nazov"] : "bez nazvu";
        $checkDB = "SELECT `id_predmet` FROM `zoznam_predmetov` WHERE `nazov` = '$predmet' ";
        $data = $conn->query($checkDB);
        $res_num = $data->num_rows;

//            pozri ci existuje zaznam
        if ($res_num == 0) {
            $predmet_insert = "INSERT INTO `zoznam_predmetov` (`id_predmet`, `nazov`) VALUES (NULL, '$predmet');";
            $res = $conn->query($predmet_insert);
            //get last id
            $id_predmet = $conn->insert_id;
        } else {
            //predmet exists, get id
            $row = $data->fetch_assoc();
            $id_predmet = $row['id_predmet'];
        }

        //vloz data do DB z csv_array
        $stmt = $conn->prepare("INSERT INTO `hodnotenie_predmetu` (`id_user`, `id_predmet`, `meno`, `json_object`) VALUES (?,?,?,?)");

        foreach ($csv_table_array as $lineKey => $values) {
            $stmt->bind_param("iiss", $id_user, $id_predmet, $meno, $JSONobj);
            //todo if user exist (cannot insert) update

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
        }
        $stmt->close();

    }



//    echo '</body>';



}

$conn->close();

echo '</body>';

echo '</html>';
