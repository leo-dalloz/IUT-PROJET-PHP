<?php

  $step    = $_GET['step'];
  if ($step == 'errconf')
    $s_msg = "les 2 mots de passes entrés sont differenets";
  else if($step = 'ok')
    $s_msg ="bonjour";
  else if($step = 'mdp')
    $s_msg ="mot de passe modifié";

   $i_token = $_GET['token'];
?>

<main>
  <h1> nouveau mdp </h1>
  <form  action="../controller/generatePwdC.php?token=<?=$i_token?>&step=ok" method="post">
    <input type="text" name="newPwd" placeholder="nouveau mot de passe"><br>
    <p> Confirmez votre mot de passe <br></p>
    <input type="password" name="confMdp" placeholder="confirmer mot de passe"><br>
    <input type="submit" name="action" value="envoyer"><br>
    <?= $s_msg ?>
  </form>
</main>
