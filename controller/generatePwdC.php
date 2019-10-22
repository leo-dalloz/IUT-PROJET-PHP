<?php
    require ('../model/generatePwdM.php');


    $i_token   = $_GET['token'];

    $s_newPwd  = $_POST['newPwd'];
    $s_confPwd = $_POST['confMdp'];



    if($s_newMdp == $s_confMdp)
       header("Location :../view/generatePwdV.php?token=0");
    changePwd($i_token,$s_newPwd);
