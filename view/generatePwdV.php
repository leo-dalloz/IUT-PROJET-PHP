<?php


       $i_token = $_GET['token'];

       if($i_token == null)
         $s_msg = "vous ne pouvez pas modifier votre mot de passe";
      else if ($i_token == 0)
         $s_msg = "les 2 mots de passes entrés sont differenets";
      else
        $s_msg ="bonjour";

?>

<main>
  <h1> nouveau mdp </h1>
  <form  action="../controller/generatePwdC.php?token=<?=$i_token?>" method="post">
    <input type="text" name="newPwd" placeholder="nouveau mot de passe"><br>
    <p> Confirmez votre mot de passe <br></p>
    <input type="password" name="confMdp" placeholder="confirmer mot de passe"><br>
    <input type="submit" name="action" value="envoyer"><br>
    <?= $s_msg ?>
  <form>
</main>
