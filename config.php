<?php
define("servername", "localhost");
define("username", "root"); // Sem doplnte vas username do DB
define("password", ""); // Sem doplnte vase heslo do DB
define("database", "zav_zad");

$dbHost = 'localhost';
$dbName = 'spolocna';
$dbUser = 'alexcool';
$dbPass = 'ptktysq11';

include 'lib/db.php';
$db = new db($dbHost, $dbUser, $dbPass, $dbName);

if (!session_id()) {
  session_start();
}

$ldapServer = "ldap.stuba.sk";

