<?php
define("SERVERNAME", "localhost");
define("USERNAME", "meno"); // Sem doplnte vas username do DB
define("PASSWORD", "heslo"); // Sem doplnte vase heslo do DB
define("DATABASE", "spolocny_projekt");

if (!session_id()) {
  session_start();
}

$ldapServer = "ldap.stuba.sk";

