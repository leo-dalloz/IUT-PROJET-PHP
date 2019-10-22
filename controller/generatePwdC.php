<?php
    require ('../model/generatePwdM.php');


    $i_token   = $_GET['token'];

    $s_newPwd  = $_POST['newPwd'];
    $s_confPwd = $_POST['confMdp'];


    require ('../view/generatePwdV.php?step=ok&token='. $i_token);

    if($s_newMdp != $s_confMdp)
       header('Location: ../view/generatePwdV.php?step=errconf');
    else if {
       changePwd($i_token,$s_newPwd);
       header('Location: ../view/generatePwdV.php?step=mdp');
    }
