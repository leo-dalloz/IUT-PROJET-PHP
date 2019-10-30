<?php



    if (isset($_POST['Surname']) AND isset($_POST['Name']) AND isset($_POST['Pseudo']) AND isset($_POST['Email']) AND isset($_POST['Birth']) AND isset($_POST['Pwd']) AND isset($_POST['Pwd1']) AND isset($_POST['Gender']))
    {
        $s_surname = $_POST['Surname'];
        $s_name = $_POST['Name'];
        $s_pseudo = $_POST['Pseudo'];
        $s_email = $_POST['Email'];
        $d_birth = $_POST['Birth'];
        $s_pwd = $_POST['Pwd'];
        $s_pwd1 = $_POST['Pwd1'];
        $s_gender = $_POST['Gender'];

        if ($s_pwd != $s_pwd1)
        {
            header('Location: ../view/registerV.php?error=pwd');
        }
        else{

            require '../model/checkM.php';

            require '../model/registerM.php';

            if (checkPseudo($s_pseudo) AND checkEmail($s_email))
            {

                $s_pwd = password_hash($s_pwd, PASSWORD_DEFAULT);

                $newUser = new User(0,$s_surname, $s_name, $s_pseudo, $s_email, $d_birth, $s_pwd, $s_gender);

                registration($newUser);

                header('Location: loginC.php');

            }
            else if (!checkPseudo($s_pseudo))
            {
                header('Location: ../view/registerV.php?error=pseudo');
            }
            else if (!checkEmail($s_email))
            {
                header('Location: ../view/registerV.php?error=email');
            }
        }
    }
    else
    {
        header('Location: ../view/registerV.php?error=wrong');
    }

    require '../view/registerV.php';