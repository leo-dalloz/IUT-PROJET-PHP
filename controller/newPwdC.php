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

      $i_token  = generateToken();
      $s_obj    = 'mot de passe oublié' ;
      $headers  = "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type:text/html; charset=UTF-8" . "\r\n";

      $s_msg  = '<html><body style="background-color : #20232A; color : #fff">';
      $s_msg .= '<h1 style="color : lightgrey">Mot de passe oublié ? </h1>';
      $s_msg .= '<h2 style="color : lightgrey">pas de panique !</h2>';
      $s_msg .= '<p> dirigez vous sur ce lien : ';
      $s_msg .= 'http://projet-iut-info.alwaysdata.net/mdpoublie/PROJET-PHP/controller/generatePwdC.php?token=' . $i_token;
      $s_msg .= 'si vous n\'êtes pas à l\'origine de ce changement de mot de passe ignorez ce mail <br>';
      $s_msg .= 'Faites attention peut-être que quelqu\'un essaie de vous pirater<br>';
      $s_msg .= '</body></html>';
      //$s_msg  = wordwrap($s_msg,70);





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
