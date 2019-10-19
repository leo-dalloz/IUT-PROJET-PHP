<?php
      $title = 'Nouveau mot de passe';
      $style = 'StyleNewPassWord.css';

      $step = $_GET['step'];
      if ($step == null)
          $msg = 'verification mail';
      else if($step == 'ok')
          $msg = 'un mail à été envoyé ';
      elseif ($step == 'error')
          $msg = 'adresse mail inexistante dans notre base de données ';

?>


<main>
  <h1> Mot de passe oublié </h1>
  <h2> <?= $msg ?> </h2>
  <form  action = "../controler/ControlerNewPwd.php" method="post">
      Veuillez entrer votre adresse email <br>
      <input type="text" name="mail" value="mail" placeholder="mail"> <br>
      <input type="submit" name="action" value="envoyer"> <br>
  </form>


</main>
