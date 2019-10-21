<?php
    require ('../model/generatePwdM.php');


    $i_token   = $_GET['token'];

    $s_newPwd  = $_POST['newPwd'];
    $s_confPwd = $_POST['confMdp'];


    // on verifie si le token existe  dans la bd et on redirige en fonction
    if( $i_token == null || !verifToken($i_token) ) {
      header('Location : ../accesInterdit.html');
    }

    // else if($s_newMdp == $s_confMdp)
    //   header("Location :../view/generatePwdV.php?token=errconf");
    // else
    //     header('Location : ../accesInterdit.html');
    changePwd($i_token,$s_newPwd);
