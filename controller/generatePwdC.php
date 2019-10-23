<?php
    require ('../model/generatePwdM.php');


    if(!isset($_GET['token']))
        header('Location: accesInterdit.html');


    $i_token   = $_GET['token'];

    if(!verifToken($i_token))
      header('Location: accesInterdit.html');


    if(isset($_POST['newPwd'])
    && isset($_POST['confPwd']))
    {

       $i_token   = $_GET['token'];
       $s_newPwd  = $_POST['newPwd'];
       $s_confPwd = $_POST['confPwd'];

      if($s_newPwd != $s_confPwd)
        header('Location: ../view/generatePwdV.php?step=errconf&token='. $i_token);
      else {
        changePwd($i_token,$s_newPwd);
        header('Location: ../view/generatePwdV.php?step=mdp');
      }
    }
    require ('../view/generatePwdV.php');
