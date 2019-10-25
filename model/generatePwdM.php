<?php

  require ('../base.php');
 /*
 *Laurent
 *verifie que le token passé en paramètre existe bien dans la base de données
 *in : int token
 *out : bool
 */
  function verifToken($s_token) {
      $dbLink = dbConnect();

      // selectionne dans le tuple dans la bd qui a le même token que celui passé en paramètre
      $query  = 'SELECT * from User where token =\'' . $s_token .'\'';
      $result = testError($dbLink,$query);

      $dbRow  = mysqli_fetch_assoc($result);

      if($dbRow == null)
        return false;

       // on doit verifier la date du token
       // date("Y-m-d H:i")
       $d_actualDate = new DateTime('now');
       /*str to date car dateToken est stocké sous forme de string dans la bd sinon on
       * ne peut pas stocker les heures min est sec
       */
       $d_dateToken  = DateTime::createFromFormat('Y-m-d H:i:s',$dbRow['dateToken']);


      //si la date du token est superieur à 15 min kaput
      if(($actualDate->diff($dateToken)->format('%Y') < 1)
        && ($actualDate->diff($dateToken)->format('%m') < 1)
        && ($actualDate->diff($dateToken)->format('%d') < 1)
        && ($actualDate->diff($dateToken)->format('%i') < 1))// on met à 1 min pour les testes

           return false;

       return true;
  }//verifToken()


  /*
  *Laurent
  *in : int token de l'user
  *in : string nouveau mot de passe
  */
  function changePwd($s_token,$s_newPwd) {
    $dbLink  = dbConnect();

    // met à jour  dans la BD le mot de passe de l'utilisateur qui à le même token passé en paramètre
    $query  = 'UPDATE User
               SET password = \'' . $s_newPwd .'\'
               WHERE token  = \'' . $s_token . '\'';

    $result = testError($dbLink,$query);

  }//changeMail()
