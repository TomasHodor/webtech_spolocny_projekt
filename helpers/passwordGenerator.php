<?php
/**
 * Generator hesla
 * @author Tomas Hodor
 *
 * @param int $len
 * @return string Heslo
 */
function generatePassword($len = 10) {
    $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charsLen = strlen($chars);
    $password = '';
    for ($i = 0; $i < $len; $i++) {
       $password .= $chars[rand(0, $charsLen - 1)];
    }
    return  $password;
}