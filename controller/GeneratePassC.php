<?php
  require ('../model/generatePwdM.php');

  $token = $_GET['token'];

  // on verifie si le token existe  dans la bd et on redirige en fonction
  if(verifToken($token))
    header('Location: ../view/generatePwdV.php');
  else
    header('Location: ../accesInterdit.html');
