<?php


    require ('../model/newPwdM.php');

    $s_mail = $_POST['mail'];
    /**
    * Laurent
    * genere un token aléatoire de 6 chiffres
    * out : int
    */
    function generateToken() {
      $i_token = rand(100000,999999);
      return $i_token;
    } //generateToken()
    /*
    * Laurent
    * Envoie un mail avec le token généré à l'utilisateur souhaitant changer son mot de passe
    * in : string mail de user
    */
    function sendMail($s_mail) {

      $i_token = generateToken();
      $s_obj = 'mot de passe oublié' ;
      $s_msg = '<html><head><meta http-equiv="content-type" content="text/html"; charset="utf-8"></head><body><h1 style="color : green"> Mot de passe oublié ? </h1><h2> pas d\'inquiétudes ! </h2><p> cliquez sur ce <a href="../view/generatePwdV.php">lien</a> pour réinitialiser votre mot de passe <br>bonne journée et à bientôt sur freenote ! </p></body></html>';


      addToken($i_token,$s_mail);
      mail($s_mail,$s_obj,$s_msg);

    } // sendMail()

    // si le mail existe dans la bd on averti l'utilisateur de l'envoie du mail sinon en le previent de la non existance du mail
    if(getMail($s_mail))
    {
      sendMail($s_mail);
      header('Location: ../view/newPwdV.php?step=ok');
    }
    else {

      header('Location: ../view/newPwdV.php?step=error');
    }
