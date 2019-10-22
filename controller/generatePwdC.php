<?php
    require ('../model/generatePwdM.php');


    $i_token   = $_GET['token'];
    $s_step    = $_GET['step'];

    $s_newPwd  = $_POST['newPwd'];
    $s_confPwd = $_POST['confMdp'];



    if($s_newMdp != $s_confMdp)
       header('Location: ../view/generatePwdV.php?step=errconf');
    else if(verifToken($i_token) && $s_step = 'ok')
       changePwd($i_token,$s_newPwd);
       header('Location: ../view/generatePwdV.php?step=mdp');
    else
       header('Location: ../view/generatePwdV.php?step=errtkn');


    require ('../view/generatePwdV.php');
