<?php
require_once 'dbTest.php';
function checkPseudo($s_pseudo)
{
    $dbLink = dbConnect();
    $query = 'SELECT pseudo FROM `User` WHERE pseudo = \'' . $s_pseudo . '\'';
    $dbResult = testError($dbLink,$query);
    $result = $dbResult->fetch_assoc();
    if ($result['pseudo'] != NULL)
        return 0;
    else
        return 1;
}
function checkEmail($s_email)
{
    $dbLink = dbConnect();
    $query = 'SELECT email FROM `User` WHERE email = \'' . $s_email . '\'';
    $dbResult = testError($dbLink,$query);
    $result = $dbResult->fetch_assoc();
    if ($result['email'] != NULL)
        return 0;
    else
        return 1;
}