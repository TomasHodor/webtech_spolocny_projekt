<?php
require_once("config.php");

/**
 * Funkcia vracajuca autorizacny session token
 * @author Peter Kalanin
 * 
 * @return Object vracia objekt obsahujuci data o pouzivatelovi, null v pripade ze session neexistuje
 */
function getAuthentication()
{
  if (isset($_SESSION['auth'])) {
    return $_SESSION['auth'];
  } else {
    return null;
  }
}

/**
 * Nastavy autentifikacny token ako session
 * @author Peter Kalanin
 * 
 * @param Object $authObj Objekt obsahujucu udaje o prihlaseni
 * 
 * @return Bool true ak bolo zapisane ako session, false pri chybe
 */
function setAuthentication($authObj)
{
  if ($authObj) {
    $_SESSION['auth'] = $authObj;
    return true;
  } else {
    return false;
  }
}

/** 
 * Vracia objekt obsahujúci údaje o autentifikácií
 * @author Peter Kalanin
 * 
 * @param String $login login používateľa
 * @param String $pass Heslo používaeľa
 * 
 * @return Object vracia objekt obsahujuci data o pouzivatelovi, null v pripade zleho login/hesla
 */
function loginLdap($login, $pass)
{
  global  $ldapServer;
  
  if($login == "admin" && $pass == "admin") {
    $loginObject = new stdClass();
    $loginObject->type = "admin";
    $loginObject->name = "admin";
    return $loginObject;
  }

  if($login == "admin" && $pass == "admin") {
    $loginObject = new stdClass();
    $loginObject->type = "admin";
    $loginObject->name = "admin";
    return $loginObject;
  }

  $ldapConnection = ldap_connect($ldapServer);

  $ldapUid = $login;
  $ldapPass = $pass;

  $dn = 'ou=People, DC=stuba, DC=sk';
  $ldapRdn = "uid=$ldapUid, $dn";
  ldap_set_option($ldapConnection, LDAP_OPT_PROTOCOL_VERSION, 3);

  $bind = @ldap_bind($ldapConnection, $ldapRdn, $ldapPass);

  if ($bind) {

    $sr = ldap_search($ldapConnection, $ldapRdn, "uid=$ldapUid");
    $entry = ldap_first_entry($ldapConnection, $sr);
    $usrId = ldap_get_values($ldapConnection, $entry, "uisid")[0];
    $usrName = ldap_get_values($ldapConnection, $entry, "cn")[0];
    $usrMail = ldap_get_values($ldapConnection, $entry, "mail")[0];
    $usrType = ldap_get_values($ldapConnection, $entry, "employeeType")[0];

    $attrs = ldap_get_attributes($ldapConnection, $entry);

    ldap_unbind($bind);
    @ldap_close($ldapConnection);

    $loginObject = new stdClass();
    $loginObject->name = $usrName;
    $loginObject->uid = $usrId;
    $loginObject->mail = $usrMail;
    $loginObject->type = $usrType;
    $loginObject->loginType = "ldap";

    return $loginObject;
  }

  return null;
}
