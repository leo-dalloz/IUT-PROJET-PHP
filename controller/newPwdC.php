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
      $headers = "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

      $s_msg  = '<html><body>';
      $s_msg .= '<h1 style="color : green">Mot de passe oublié ? </h1>';
      $s_msg .= '<h2 style="color : green">pas de panique !</h2>';
      $s_msg .= '<p> cliquez sur ce ';
      $s_msg .= '<a href="../view/generatePwdC.php?token=' . $i_token . '">';
      $s_msg .= 'lien</a> pour réinitialiser votre mot de passe';
      $s_msg .= '</body></html>';





      addToken($i_token,$s_mail);
      mail($s_mail,$s_obj,$s_msg,$headers);

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
