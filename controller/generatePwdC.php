<?php
    require ('../model/generatePwdM.php');


    $i_token   = $_GET['token'];
    $s_step    = $_GET['step'];

    $s_newPwd  = $_POST['newPwd'];
    $s_confPwd = $_POST['confMdp'];



    if($s_newMdp != $s_confMdp)
       header('Location: ../view/generatePwdV.php?step=errconf');
    else if($s_step == 'ok')
       changePwd($i_token,$s_newPwd);

    require ('../view/generatePwdV.php');
