<?php
  $i_token = $_GET['token'];
  $step    = $_GET['step'];

  // on verifie si le token existe  dans la bd et on redirige en fonction
  if($i_token == null || !verifToken($i_token))
    header('Location : accesInterdit.html');

  if ($step = 'errconf')
      $msg = "les deux mots de passes ne correspondent pas" ;
  
?>

<main>
  <h1> nouveau mdp </h1>
  <from method="post" action="../controller/generatePwdC.php?token= <?= $i_token ?>">
    <input type="text" name="newMdp" placeholder="nouveau mot de passe"><br>
    <p> Confirmez votre mot de passe <br></p>
    <input type="text" name="confMdp" placeholder="confirmer mot de passe">
    <?= $msg ?>
  <form>
</main>
