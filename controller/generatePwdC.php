<?php
    require ('../model/generatePwdM.php');


    $i_token   = $_GET['token'];

    $s_newPwd  = $_POST['newPwd'];
    $s_confPwd = $_POST['confMdp'];



    if($s_newMdp == $s_confMdp)
       header('Location :../view/generatePwdV.php?token="'. $i_token . '?step=errconf"');

       
    changePwd($i_token,$s_newPwd);
