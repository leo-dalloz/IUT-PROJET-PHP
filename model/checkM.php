<?php
require_once 'dbTest.php';
function checkPseudo($s_pseudo)
{
    $dbLink = dbConnect();
    $query = 'SELECT pseudo FROM `User` WHERE pseudo = \'' . $s_pseudo . '\'';
    $dbRow = testError($dbLink, $query);
    $dbResult = $dbRow->fetch_assoc();
    if ($dbResult['pseudo'] != NULL)
        return false;
    else
        return true;
}
function checkEmail($s_email)
{
    $dbLink = dbConnect();
    $query = 'SELECT email FROM `User` WHERE email = \'' . $s_email . '\'';
    $dbRow = testError($dbLink, $query);
    $dbResult = $dbRow->fetch_assoc();
    if ($dbResult['email'] != NULL)
        return false;
    else
        return true;

}

/*
* Protège des injections sql
* in : str string que l'on va mettre dans la bd
* Nous avons manqué de temps pour pouvoir implémenter cette fonction
*/

function sanitize($str) {
         $dbLink = dbConnect();
         $str = utf8_encode($str);

         if(get_magic_quotes_gpc()) {
                 $str = sripslashes($str);
         }
         if (!is_numeric($str)) {
                 $str = '\'' . $dbLink -> real_escape_string($str) . '\'';
         }
         return $str;

 }//sanitize()
