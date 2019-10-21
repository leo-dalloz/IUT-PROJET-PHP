<?php


       $i_token = $_GET['token'];

       // ?token=<?=$i_token?
?>

<main>
  <h1> nouveau mdp </h1>
  <from  action="../controller/generatePwdC.php" method="post">
    <input type="password" name="newPwd" placeholder="nouveau mot de passe"><br>
    <p> Confirmez votre mot de passe <br></p>
    <input type="password" name="confMdp" placeholder="confirmer mot de passe"><br>
    <input type="submit" name="action" value="envoyer"><br>
    <?= $i_token ?>
  <form>
</main>
