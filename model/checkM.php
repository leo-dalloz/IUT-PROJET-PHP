<?php
require_once 'dbTest.php';
function checkPseudo($s_pseudo)
{
    $dbLink = dbConnect();
    $query = 'SELECT pseudo FROM User WHERE pseudo = \'' . $s_pseudo . '\'';
    $dbRow = testError($dbLink,$query);
  //  while($dbRow = mysqli_fetch_assoc($dbResult))
  //  {
    $dbResult = $dbRow->fetch_assoc();
        if ($dbResult['pseudo'] == NULL)
            return true;
        else
            return false;
    //}
}
function checkEmail($s_email)
{
    $dbLink = dbConnect();
    $query = 'SELECT email FROM User WHERE email = \'' . $s_email . '\'';
    $dbRow = testError($dbLink,$query);
    //while($dbRow = mysqli_fetch_assoc($dbResult))
    //{
    $dbResult = $dbRow->fetch_assoc();
        if ($dbResult['email'] != NULL)
            return 0;
        else
            return 1;
    //}
}
