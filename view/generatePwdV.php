<?php

  $step    = $_GET['step'];
  if ($step == 'errconf')
    $s_msg = 'les 2 mots de passes entrés sont differenets';
  else if($step = 'mpd')
    $s_msg ='mot de passe modifié';
  else if ($step = 'errtkn')
    $s_msg = 'erreur de token';
  else
    $s_msg ='bonjour';
?>

<main>
  <h1> nouveau mdp </h1>
  <form  action="../controller/generatePwdC.php?token="<?= $i_token ?>  method="post">
    <input type="text" name="newPwd" placeholder="nouveau mot de passe"><br>
    <p> Confirmez votre mot de passe <br></p>
    <input type="password" name="confMdp" placeholder="confirmer mot de passe"><br>
    <input type="submit" name="action" value="envoyer"><br>
    <?= $s_msg ?>
  </form>
</main>
