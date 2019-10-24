<?php

  require ('../base.php');
 /*
 *Laurent
 *verifie que le token passé en paramètre existe bien dans la base de données
 *in : int token
 *out : bool
 */
  function verifToken($i_token) {
      $dbLink = dbConnect();


      // selectionne dans le tuple dans la bd qui a le même token que celui passé en paramètre
      $query  = 'SELECT * from User where token =' . $i_token;
      $result = testError($dbLink,$query);

      $dbRow  = mysqli_fetch_assoc($result);

       if($dbRow == null)
        return false;

       return true;
  }//verifToken()


  /*
  *Laurent
  *in : int token de l'user
  *in : string nouveau mot de passe
  */
  function changePwd($i_token,$s_newPwd) {
    $dbLink  = dbConnect();

    // met à jour  dans la BD le mot de passe de l'utilisateur qui à le même token passé en paramètre
    $query  = 'UPDATE User
               SET password = \' ' . $s_newPwd .'\''.'
               WHERE token  = \'' . $i_token .'\'';

    $result = testError($dbLink,$query);

  }//changeMail()
