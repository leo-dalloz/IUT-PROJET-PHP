<?php


    require ('../model/newPwdM.php');

    /*
    * Laurent
    * Envoie un mail avec le token généré à l'utilisateur souhaitant changer son mot de passe
    * in : string mail de user
    */
    function sendMail($s_mail) {

      $s_token  = md5(uniqid(mt_rand(100000,999999)));

      $s_obj    = 'mot de passe oublié' ;

      $bndary   =  md5(uniqid(mt_rand()));
      $headers  = "MIME-Version: 1.0" . "\r\n";
      $headers .= 'Content-type: multipart/alternative; boundary="' . $bndary. '"';



      //$headers .= "Content-type:text/html; charset=UTF-8" . "\r\n";

      $s_msg_txt =  'Mot de passe oublié ? cliquez sur ce lien' .  "\r\n";
      $s_msg_txt .= 'http://projet-iut-info.alwaysdata.net/mdpoublie/PROJET-PHP/controller/generatePwdC.php?token=' . $s_token . '&step=hello';

      $s_msg_html  = '<html><body style="background-color : #20232A; color : #fff">';
      $s_msg_html .= '<h1 style="color : #ff793f">Mot de passe oublié ? </h1>';
      $s_msg_html .= '<h2 style="color : #ff793f">pas de panique !</h2>';
      $s_msg_html .= '<p> Dirigez vous sur ce lien : <br>';
      $s_msg_html .= 'http://projet-iut-info.alwaysdata.net/mdpoublie/PROJET-PHP/controller/generatePwdC.php?token=' . $s_token . '&step=hello <br><br>';
      $s_msg_html .= 'Si vous n\'êtes pas à l\'origine de ce changement de mot de passe ignorez ce mail. <br><br>';
      $s_msg_html .= 'Faites attention peut-être que quelqu\'un essaie de vous pirater<br><p>';
      $s_msg_html .= '</body></html>';

      $s_msg       =  '--' . $bndary . "\n";
      $s_msg      .=  'Content-Type: text/plain; charset=utf-8' . "\n\n";
      $s_msg      .=  $s_msg_txt . "\n\n";
      $s_msg      .=  '--' . $bndary . "\n";
      $s_msg      .=  "Content-type:text/html; charset=UTF-8" . "\r\n";
      $s_msg      .=  $s_msg_html . "\n\n";

      addToken($s_token,$s_mail);
      mail($s_mail,$s_obj,$s_msg,$headers);

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
