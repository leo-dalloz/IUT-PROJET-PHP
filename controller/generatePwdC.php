<?php
    require ('../model/generatePwdM.php');


    /*
      si il n'y pas de token c'est que quelqu'un essaye d'acceder à la page de
      modification de passe sans avoir reçu de mail
    */
    if(empty($_GET['token']))
        header('Location: accesInterdit.html');


    $s_token   = $_GET['token'];
    /*
      si le token n'existe oas dans la bd c'est que la personne essaye d'acceder à
      la page avec un token au hasard. pas sympa
    */
    if(!verifToken($s_token))
      header('Location: accesInterdit.html');


    if(isset($_POST['newPwd'])
    && isset($_POST['confPwd']))
    {

       $s_token   = $_GET['token'];
       $s_newPwd  = $_POST['newPwd'];
       $s_confPwd = $_POST['confPwd'];

      if($s_newPwd != $s_confPwd)
        header('Location: ../view/generatePwdV.php?step=errconf&token='. $s_token);
      else {
        $s_newPwd = password_hash($s_newPwd,PASSWORD_DEFAULT);
        changePwd($s_token,$s_newPwd);
        header('Location: ../view/generatePwdV.php?step=mdp');
      }
    }
    require ('../view/generatePwdV.php');
