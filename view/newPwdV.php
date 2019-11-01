<?php

      $title = 'Mot de passe oublié';
      $style_common = '../assets/css/connexion-inscription.css';
      $style = '../assets/css/newPwd.css';

      ob_start()


?>

      <main>
        <div id="LogoMainContainer">
            <img src="../assets/images/test2.png" id="LogoMain">
        </div>
        <div id="PageTitleContainer">
          <h1 id="PageTitle"> Mot de passe oublié </h1>
          <h2 id="message"> <?= $msg ?>   </h2>
        </div>
        <div id="FormMailContainer">
          <form  action = "../controller/newPwdC.php" method="post" id="FormMail">
              Veuillez entrer votre adresse email <br>
              <input type="text" name="mail" placeholder="mail"> <br>
              <div id="submitContainer">
                <input type="submit" name="action" value="envoyer" id="submitButton"> <br>
              </div>
          </form>
        </div>
      </main>
<?php
      $content = ob_get_clean();
      require('../template_empty.php');
?>
