<?php
    require ('../model/generatePwdM.php');

    if(!isset($_GET['token']))
      echo 'token vide';

    $i_token  =  $_GET['token'];

    if (!verifToken($i_token))
      echo 'token innexistant';


    if(isset($_POST['newPwd'])
    && isset($_POST['confPwd']))
    {

       $i_token   = $_GET['token'];

       $s_newPwd  = $_POST['newPwd'];
       $s_confPwd = $_POST['confPwd'];

       if($s_newPwd != $s_confPwd)
          header("Location : ../view/generatePwdV.php?step=errconf");


       changePwd($i_token,$s_newPwd);

       header("Location : ../view/generatePwdV.php?step=mdp");
    }



    require ('../view/generatePwdV.php');
