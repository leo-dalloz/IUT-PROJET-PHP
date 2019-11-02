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

      $query  = 'SELECT * from User where token =' . $i_token;
      $result = testError($dbLink,$query);

      $dbRow  = mysqli_fetch_assoc($result);

       if($dbRow == null)
        return false;

       return true;
  }//verifToken()
