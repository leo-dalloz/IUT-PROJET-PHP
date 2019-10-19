<?php
    require('../model/generatePwdM.php');
    $i_token = $_GET['token'];
    if($i_token == null || !verifToken($i_token))
      header('Location : accesInterdit.html');

    echo '<h1> ok </h1>';
