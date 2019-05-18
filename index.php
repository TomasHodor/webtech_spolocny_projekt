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

  <?php require_once("links.php") ?>
</head>

<body>
  <?php
  if (isset($_GET['notallowed'])) {
    echo 'Pre danú operáciu nemáte oprávnenie.';
  }

  echo "Prihlaseny: " . getAuthentication()->name;
  ?>

</body>

</html>