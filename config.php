<?php
define("servername", "localhost");
define("username", "alexcool"); // Sem doplnte vas username do DB
define("password", "ptktysq11"); // Sem doplnte vase heslo do DB
define("database", "spolocna");

$dbHost = 'localhost';
$dbName = 'spolocna';
$dbUser = 'alexcool';
$dbPass = 'ptktysq11';

include 'lib/db.php';
$db = new dbx($dbHost, $dbUser, $dbPass, $dbName);

if (!session_id()) {
  session_start();
}

$ldapServer = "ldap.stuba.sk";

