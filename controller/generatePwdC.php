<?php
    require ('../model/generatePwdM.php');


    $i_token  = $_GET['token'];

    if(isset($_POST['newPwd'])){
       $s_newPwd = $_POST['newPwd'];

       echo "testtestestesttestds " . $i_token ;
       verifToken($i_token);
       // changePwd($i_token,$s_newPwd);
    }
    require ('../view/generatePwdV.php');
