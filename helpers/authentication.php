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

function loginPass($user, $pass)
{
    // if (password_verify($pass, $user['heslo'])) {
    if ($pass == $user['heslo']) {
        $loginObject = new stdClass();
        $loginObject->name = $user['meno'];
        $loginObject->uid = $user['id'];
        $loginObject->mail = $user['email'];
        $loginObject->type = 'student';
        $loginObject->loginType = "login";

        return $loginObject;
    } else {
        return null;
    }
}

function login($login, $pass)
{
    if ($login == "admin" && $pass == "admin") {
        $loginObject = new stdClass();
        $loginObject->type = "admin";
        $loginObject->name = "admin";
        return $loginObject;
    }

    $user = getUserFromDb($login);
    if ($user == 0) {
        return 'failed';
    } else if ($user == 1) {
        return 'pass';
    }

    if (!$user['heslo']) {
        return loginLdap($login, $pass);
    } else {
        return loginPass($user, $pass);
    }
}

function getUserFromDb($login)
{
    $conn = connectToDb();
    if (!$conn) {
        return 0;
    }
    $sql = "SELECT * FROM `users` WHERE `login` = '$login'";
    $resp = $conn->query($sql);
    if ($resp->num_rows == 0) {
        return 1;
    }
    $data = $resp->fetch_assoc();

    return $data;
}

function connectToDb()
{
    $conn = new mysqli(servername, username, password, database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        return null;
    }
    $conn->set_charset("utf8");
    return $conn;
}