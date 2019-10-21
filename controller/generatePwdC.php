<?php
    require ('../model/generatePwdM.php');

    $s_newPwd  = $_POST['newMdp'];
    $s_confPwd = $_POST['confMdp'];

    $i_token   = $_GET['token']


    if($s_newMdp == $s_confMdp) {
      header("Location :../view/generatePwdV.php?step=errconf");
    }

    changePwd($i_token,$s_newPwd);
