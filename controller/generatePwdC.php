<?php
    require ('../model/generatePwdM.php');


    // on verifie que l'url est correcte
    if(!isset($_GET['step'])
    || empty($_GET['step'])
    || empty($_GET['token'])
    || !isset($_GET['token'])) {
      header('Location: ../public/accesInterdit.html');
    }
    $step    = $_GET['step'];
    if ($step == 'hello'){
      $s_msg = 'veuillez entrer votre nouveau mot de passe';
    }
    else if ($step == 'errconf') {
      $s_msg = 'les 2 mots de passes entrés sont differenets';
    }
    else if ($step = 'errmdp') {
      $s_msg = 'vous ne respectez pas les critères de sécurité';
    }

    $s_token   = $_GET['token'];
    /*
      si le token n'existe pas dans la bd c'est que la personne essaye d'acceder à
      la page avec un token au hasard ou alors il a dépassé le temps du token. pas sympa
    */
    if(!verifToken($s_token))
      header('Location: ../public/accesInterdit.html');


    if(isset($_POST['newPwd'])
    && isset($_POST['confPwd']))
    {

       $s_token   = $_GET['token'];
       $s_newPwd  = $_POST['newPwd'];
       $s_confPwd = $_POST['confPwd'];

      if($s_newPwd != $s_confPwd)
        header('Location: generatePwdC.php?step=errconf&token='. $s_token);
      else {
        // le mdp doit contenir une majuscule, un chiffre, une minuscule et faire au moins 8 caractères
        if (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])#', $s_newPwd) && strlen($s_newPwd) > 8)
	      {
          $s_newPwd = password_hash($s_newPwd,PASSWORD_DEFAULT);
          changePwd($s_token,$s_newPwd);
          header('Location: ../view/mdpModifie.html');
        }
        else
          header('Location: generatePwdC.php?step=errmdp&token='. $s_token);
      }
    }
    require ('../view/generatePwdV.php');
