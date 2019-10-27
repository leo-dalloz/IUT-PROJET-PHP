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

       $d_currentDate = new DateTime('now');
       $d_dateToken   = $dbRow['dateToken'];
       $d_diff        = $d_currentDate->diff($d_dateToken);

       // si la diffence d'année, de mois, de jours ou d'heure est superieur à 1
       // la delai est dépassé, si les nombres de minutes est supérieur à 15, de même
       if( $d_diff-> format('%Y%m%d%H') >= 1 ||  $d_diff->format('%i') >= 1)// 1 min pour testes
        return false;
       else
        return true;

/*
      if($d_currentDate->diff($d_dateToken)->format('%Y') > 1
        && $d_currentDate->diff($d_dateToken)->format('%m') > 1
        && $d_currentDate->diff($d_dateToken)->format('%d') > 1
        && $d_currentDate->diff($d_dateToken)->format('%i') > 1)// on met à 1 min pour les testes
           return false;
        else
           return true;*/
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
