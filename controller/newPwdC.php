<?php


    require ('../model/newPwdM.php');

    /*
    * Laurent
    * Envoie un mail avec le token généré à l'utilisateur souhaitant changer son mot de passe
    * in : string mail de user
    */
    function sendMail($s_mail) {
      // testes :

      $s_token  = md5(uniqid(mt_rand(100000,999999)));
      $boundary = uniqid('np');

      $headers  = "MIME-Version: 1.0\r\n";
      $s_obj  .= "mot de passe oublié";
      $headers .= "Content-Type: multipart/alternative;boundary=" . $boundary . "\r\n";

      $message .= "\r\n\r\n--" . $boundary . "\r\n";
      $message .= "Content-type: text/plain;charset=utf-8\r\n\r\n";
      $message .= "mot de passe oublié ? cliquez sur ce lien : \n";
      $message .= 'http://projet-iut-info.alwaysdata.net/mdpoublie/PROJET-PHP/controller/generatePwdC.php?token=' . $s_token . '&step=hello';

      $message .= "\r\n\r\n--" . $boundary . "\r\n";
      $message .= "Content-type: text/html;charset=utf-8\r\n\r\n";
      $message .= fopen('../view/email.txt','r');
  /*  $message .= '<html><body style="background-color : #20232A; color : #fff">';
      $message .= '<h1 style="color : #ff793f">Mot de passe oublié ? </h1>';
      $message .= '<h2 style="color : #ff793f">pas de panique !</h2>';
      $message .= '<p> Dirigez vous sur ce lien : <br>';
      $message .= 'http://projet-iut-info.alwaysdata.net/mdpoublie/PROJET-PHP/controller/generatePwdC.php?token=' . $s_token . '&step=hello <br><br>';
      $message .= 'Si vous n\'êtes pas à l\'origine de ce changement de mot de passe ignorez ce mail. <br><br>';
      $message .= 'Faites attention peut-être que quelqu\'un essaie de vous pirater<br><p>';
      $message .= '</body></html>';*/

      $message .= "\r\n\r\n--" . $boundary . "--";

      addToken($s_token,$s_mail);
      mail($s_mail,$s_obj,$message, $headers);
    } // sendMail()

    if (isset($_POST['mail'])) {
      $s_mail = $_POST['mail'];
      // si le mail existe dans la bd on averti l'utilisateur de l'envoie du mail sinon en le previent de la non existance du mail
      if(getMail($s_mail))
      {
        sendMail($s_mail);
        header('Location: ../view/newPwdV.php?step=ok');
      }
      else {
        header('Location: ../view/newPwdV.php?step=error');
      }
    }

    require ('../view/newPwdV.php');
