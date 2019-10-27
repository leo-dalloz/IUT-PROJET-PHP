<?php

  require '../base.php';

  /*
  * Laurent
  * verifie dans la base de donnée si l'adresse mail existe
  * in : string adresse mail
  * out : bool
  */
  function getMail($s_mail)
  {

    $dbLink = dbConnect();
    $query  = 'SELECT email FROM User WHERE email = \'' .  $s_mail .'\'';
    $result = testError($dbLink,$query);
    $dbRow  = mysqli_fetch_assoc($result);
    if ($dbRow['email'] == null)
          return false;
    return true;
  } //getMail()


  /*
  * Laurent
  * ajoute un token généré dans la base de donnée pour l'utilisateur qui a besoin de ce token
  * in : int token
  * in : string mail de l'utilisateur qui veut changer de mot de passe, l'adresse mail est clé primaire de la table user car elle est unique
  */
  function addToken($s_token,$s_mail){
    $dbLink = dbConnect();
    $query  = 'UPDATE User
               SET token     = \'' . $s_token .'\',
               dateToken     = NOW()
               WHERE email   = \'' . $s_mail . '\'';
    $result = testError($dbLink,$query);
  }//addToken()
