<?php


  $title        = 'Nouveau mot de passe';
  $style        = '../assets/css/generatePwd.css';
  $style_common = '../assets/css/connexion-inscription.css';

  ob_start();
  
?>

<main>
  <div id="LogoMainContainer">
      <img src="../assets/images/test2.png" id="LogoMain">
  </div>
  <div id="PageTitleContainer">
      <h1 id="PageTitle"> nouveau mot de passe </h1>
      <h2 id="message"> <?= $s_msg ?> </h2>
  </div>
  <div id="FormPwdContainer">
    <form  action="../controller/generatePwdC.php?token=<?= $s_token ?>"  method="post">
      <input type="password" name="newPwd" placeholder="nouveau mot de passe"><br>
      <input type="password" name="confPwd" placeholder="confirmer mot de passe"><br>
      <div id="submitContainer">
        <input type="submit" name="action" value="envoyer" id="submitButton"><br>
      </div>
    </form>
  </div>
</main>

<?php

	$content = ob_get_clean();
	require('../template_empty.php');

?>
