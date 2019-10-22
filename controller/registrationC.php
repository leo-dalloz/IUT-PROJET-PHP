<?php

    $s_surname = $_POST['Surname'];
    $s_name = $_POST['Name'];
    $s_pseudo = $_POST['Pseudo'];
    $s_email = $_POST['Email'];
    $d_birth = $_POST['Birth'];
    $s_pwd = $_POST['Pwd'];
    $s_pwd2 = $_POST['Pwd2'];
    $s_gender = $_POST['Gender'];


    if ($s_pwd != $s_pwd2)
    {
        header('Location: ../View/registrationV.php?error=pwd');
    }
    else{




        require '../Model/checkM.php';

        require '../Model/registrationM.php';

        // Check si l'utilisateur a plus de 13 ans
        $d_actualdate = new DateTime(date("Y-m-d"));   
        $d_postdate = new DateTime($_POST['birthday']);
        if (($d_actualdate->diff($d_postdate)->format('%y') < 13)) {
            header('Location: ../View/registrationV.php?error=birthday');
        }           

        if ($s_surname != NULL AND 
            $s_name    != NULL AND 
            $s_pseudo  != NULL AND 
            $s_email   != NULL AND 
            $d_birth   != NULL AND 
            $s_pwd     != NULL AND 
            $s_pwd2    != NULL AND 
            $s_gender  != NULL AND 
            checkPseudo($s_pseudo) == 0 AND checkEmail($s_email) == 0)
        {
            $s_pwd = password_hash($s_pwd, PASSWORD_DEFAULT);

            $newUser = new User(0,$s_surname, $s_name, $s_pseudo, $s_email, $d_birth, $s_pwd, $s_gender);

            registration($newUser);

            header('Location: ../View/loginV.php');
        }


        else if ($s_surname == NULL OR 
                 $s_name    == NULL OR 
                 $s_pseudo  == NULL OR 
                 $s_email   == NULL OR 
                 $d_birth   == NULL OR 
                 $s_pwd     == NULL OR 
                 $s_pwd2    == NULL OR 
                 $s_gender  == NULL)
        {
            header('Location: ../View/registrationV.php?error=wrong');
        }
        else if (checkPseudo($s_pseudo))
        {
            header('Location: ../View/registrationV.php?error=pseudo');
        }
        else if (checkEmail($s_email))
        {
            header('Location: ../View/registrationV.php?error=email');
        }



    }