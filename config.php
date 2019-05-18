<?php
define("servername", "localhost");
define("username", "vas username"); // Sem doplnte vas username do DB
define("password", "vase heslo"); // Sem doplnte vase heslo do DB
define("database", "spolocny_projekt");

if (!session_id()) {
  session_start();
}

$ldapServer = "ldap.stuba.sk";

