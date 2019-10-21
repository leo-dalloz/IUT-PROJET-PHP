<?php
    require ('../model/generatePwdM.php');

    $s_newPwd  = $_POST['newMdp'];
    $s_confPwd = $_POST['confMdp'];

    $i_token   = $_GET['token'];
    print ('get');
    print_r($_GET);
    exit();

    // on verifie si le token existe  dans la bd et on redirige en fonction
    if(!verifToken($i_token)) {
      header('Location : ../accesInterdit.html');
    }

    else if($s_newMdp == $s_confMdp)
      header("Location :../view/generatePwdV.php?token=errconf");
    else
        header('Location : ../accesInterdit.html');
      //changePwd($i_token,$s_newPwd);
