<?php
define("servername", "localhost");
define("username", "kalanin"); // Sem doplnte vas username do DB
define("password", "kapustnicaMatko"); // Sem doplnte vase heslo do DB
define("database", "zav_zad");

require_once('lib/db.php');
$db = new db(servername, username, password, database);

if (!session_id()) {
  session_start();
}

$ldapServer = "ldap.stuba.sk";
