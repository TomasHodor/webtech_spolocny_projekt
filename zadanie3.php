<?php
require_once("helpers/authentication.php");
require_once("helpers/authorization.php");
require_once("helpers/passwordGenerator.php");

function csvToTable($csvText, $delim = ";")
{
    $table = array();
    $headers = explode($delim, $csvText[0]);
    $headers[sizeof($headers)-1] = substr($headers[sizeof($headers)-1], 0, -2);

    foreach ($csvText as $lineKey => $line) {
        if ($lineKey == 0) {
            continue;
        }
        $values = explode($delim, $line);
        foreach ($values as $valueKey => $value) {
            $table[$lineKey - 1][$headers[$valueKey]] = $value;
        }
    }
    return $table;
}
//authorize();

$lang = "SK";
if(isset($_GET['lang'])) {
    $lang = $_GET['lang'];
}
?>

<!DOCTYPE html>
<?php
if($lang == "EN") {
    echo $lang;
    echo "<html lang=\"en\">";
} else {
    echo "<html lang =\"sk\">";
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>uloha 3</title>
    <?php require_once("links.php") ?>
<body>
<a href="zadanie3.php?lang=SK">Svk</a>
<a href="zadanie3.php?lang=EN">Eng</a>
<div id="container">
    <?php
    if (isset($_GET['notallowed'])) {
        echo 'Pre danú operáciu nemáte oprávnenie.';
    }
    if($lang == "EN") {
        echo "Logged in: " . getAuthentication()->name;
    } else {
        echo "Prihlaseny: " . getAuthentication()->name;
    }
    ?>
    <form action="zadanie3.php" method="post" enctype="multipart/form-data">
    <?php if($lang == "EN") {
        echo "<p>Please choose a file</p>";
        echo "<input type=\"file\" name=\"file\" id=\"file\"><br>";
        echo "<input class=\"btn btn-primary\" type=\"submit\" value=\"Send\" name=\"submit\">";
    } else {
        echo "<p>Prosim vyberte subor</p>";
        echo "<input type=\"file\" name=\"file\" id=\"file\"><br>";
        echo "<input class=\"btn btn-primary\" type=\"submit\" value=\"Odošli\" name=\"submit\">";
    }
    ?>
    </form>
    <?php
    $valid_files = array("csv");
    $target_file = basename($_FILES["file"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if(isset($_POST["submit"])) {

        if (in_array($imageFileType, $valid_files) || $_FILES["file"]['error'] > 0) {
            if (file_exists("files/file.csv")) {
                echo "delete<br>";
                unlink("files/file.csv");
            }
            $file = file($_FILES["file"]["tmp_name"]);
            $header = explode(";", $file[0]);
            $header[sizeof($header)-1] = substr($header[sizeof($header)-1], 0, -2);
            array_push($header,"heslo");

            $table = csvToTable($file,";");
            foreach($table as $value => $line){
                $table[$value]["heslo"] = generatePassword(15);
            }
            $fp = fopen('files/file.csv', 'w');
            var_dump($header); echo "<br>";
            fputcsv($fp, $header,";", chr(0));
            foreach ($table as $fields) {
                fputcsv($fp, $fields,";", chr(0));
            }
            fclose($fp);
            echo "<a href=\"files/file.csv\">Docs</a>";

        } else {
            $message = "Nemozem nahrat subor";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }


    }
    ?>
</div>
</body>

</html>