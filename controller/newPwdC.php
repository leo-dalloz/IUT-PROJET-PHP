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
      $s_msg = 'bonjour cliquez sur le <a href="generatePwdC.php?token='. $i_token . '">lien</a> svp';


      addToken($i_token,$s_mail);
      mail('laurent.vouriot@etu.univ-amu.fr','test','test');
      if(mail($s_mail,$s_obj,$s_msg))
      {
        print_r('ok');
        exit()
      }

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
