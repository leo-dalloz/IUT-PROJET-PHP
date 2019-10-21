<?php


       $i_token = $_GET['token'];


?>

<main>
  <h1> nouveau mdp </h1>
  <form  action="../controller/generatePwdC.php?token=<?=$i_token?>" method="post">
    <input type="text" name="newPwd" placeholder="nouveau mot de passe"><br>
    <p> Confirmez votre mot de passe <br></p>
    <input type="password" name="confMdp" placeholder="confirmer mot de passe"><br>
    <input type="submit" name="action" value="envoyer"><br>
    <?= $i_token ?>
  <form>
</main>
