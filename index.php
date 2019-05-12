<?php
require_once("helpers/authentication.php");
require_once("helpers/authorization.php");
require_once("helpers/csv.php");

authorize();
?>

<!DOCTYPE html>
<html lang="sk">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>

  <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
  <?php
  if (isset($_GET['notallowed'])) {
    echo 'Pre danú operáciu nemáte oprávnenie.';
  }

  if (isset($_POST)) {
    setAuthentication(loginLdap($_POST['login'], $_POST['pass']));
    
  }

  echo "Prihlaseny: " . getAuthentication()->name;
  ?>

</body>

</html>