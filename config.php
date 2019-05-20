<?php
define("servername", "localhost");
define("username", "root"); // Sem doplnte vas username do DB
define("password", ""); // Sem doplnte vase heslo do DB
define("database", "zav_zad");


if (!session_id()) {
  session_start();
}

$ldapServer = "ldap.stuba.sk";

