<?php


    require ('../model/newPwdM.php');

    /**
    * Laurent
    * genere un token aléatoire avec sa date de création
    * out : array de string avec le token et la date
    */
    function generateToken() {


      $s_token          = md5(mt_rand(100000,999999));
      /*$d_dateToken      = date("Y-m-d H:i");


      $a_tokenAndDate  = array (
                      'token' => $s_token,
                      //'date'  => $d_dateToken
      );

      return $a_tokenAndDate; */
      return $s_token;
    } //generateToken()

    /*
    * Laurent
    * Envoie un mail avec le token généré à l'utilisateur souhaitant changer son mot de passe
    * in : string mail de user
    */
    function sendMail($s_mail) {

      $s_token  = generateToken();

      $s_obj    = 'mot de passe oublié' ;
      $headers  = "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type:text/html; charset=UTF-8" . "\r\n";

      $s_msg  = '<html><body style="background-color : #20232A; color : #fff">';
      $s_msg .= '<h1 style="color : #ff793f">Mot de passe oublié ? </h1>';
      $s_msg .= '<h2 style="color : #ff793f">pas de panique !</h2>';
      $s_msg .= '<p> Dirigez vous sur ce lien : <br>';
      $s_msg .= 'http://projet-iut-info.alwaysdata.net/mdpoublie/PROJET-PHP/controller/generatePwdC.php?token=' . $s_token . '&step=hello <br><br>';
      $s_msg .= 'Si vous n\'êtes pas à l\'origine de ce changement de mot de passe ignorez ce mail. <br><br>';
      $s_msg .= 'Faites attention peut-être que quelqu\'un essaie de vous pirater<br><p>';
      $s_msg .= '</body></html>';


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
