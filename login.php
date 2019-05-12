<?php
require_once("helpers/authentication.php");
require_once("helpers/authorization.php");

if (isset($_POST) && $_POST['login'] && $_POST['pass']) {
  setAuthentication(loginLdap($_POST['login'], $_POST['pass']));
  header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="sk">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
</head>

<body>
  <?php
  if (isset($_GET['unauth'])) {
    echo 'Musite sa prihlasit';
  }
  ?>
  <form action="login.php" method="post">
    Login: <input name="login"><br>
    Password: <input name="pass" type="password"><br>
    <button type="submit">Odosli</button>
  </form>

</body>

</html>