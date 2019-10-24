<?php

  $step    = $_GET['step'];

  if ($step == 'hello'){
    $s_msg = 'veuillez entrer votre nouveau mot de passe';
  }
  else if ($step == 'errconf') {
    $s_msg = 'les 2 mots de passes entrés sont differenets';
    $s_token = $_GET['token'];
  }
  else if($step == 'mdp') {
    $s_msg = 'mot de passe modifié';
  }
?>

<main>
  <h1> nouveau mdp </h1>
  <?= $s_msg ?>
  <form  action="../controller/generatePwdC.php?token=<?= $s_token ?>"  method="post">
    <input type="password" name="newPwd" placeholder="nouveau mot de passe"><br>
    <p> Confirmez votre mot de passe <br></p>
    <input type="password" name="confPwd" placeholder="confirmer mot de passe"><br>
    <input type="submit" name="action" value="envoyer"><br>
  </form>
</main>
