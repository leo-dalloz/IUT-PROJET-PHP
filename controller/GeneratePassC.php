<?php
  require ('../model/ModelGeneratePass.php');

  $token = $_GET['token'];

  // on verifie si le token existe  dans la bd et on redirige en fonction 
  if(verifToken($token))
    header('Location: ../view/ViewGeneratePass.php');
  else
    header('Location: ../accesInterdit.html');
