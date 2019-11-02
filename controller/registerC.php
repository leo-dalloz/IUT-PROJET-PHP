<?php
if (isset($_POST['register']))
{
    $s_surname = $_POST['Surname'];
    $s_name = $_POST['Name'];
    $s_pseudo = $_POST['Pseudo'];
    $s_email = $_POST['Email'];
    $d_birth = $_POST['Birth'];
    $s_pwd = $_POST['Pwd'];
    $s_pwd1 = $_POST['Pwd1'];
    $s_gender = $_POST['Gender'];
    if ($s_surname != NULL AND $s_name != NULL AND $s_pseudo != NULL AND $s_email != NULL AND $d_birth != NULL AND $s_pwd != NULL AND $s_pwd1 != NULL AND $s_gender != NULL)
    {
        if ($s_pwd != $s_pwd1)
        {
            header('Location: ../view/registerV.php?error=pwd');
        }
        else
        {
            // le mdp doit contenir une majuscule, un chiffre, une minuscule et faire au moins 8 caractères
            if (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])#', $s_pwd) && strlen($s_pwd) > 8)
            {
                require '../model/checkM.php';
                require '../model/registerM.php';
                if (checkPseudo($s_pseudo) AND checkEmail($s_email)) {
                    $s_pwd = password_hash($s_pwd, PASSWORD_DEFAULT);
                    $newUser = new User(0, $s_surname, $s_name, $s_pseudo, $s_email, $d_birth, $s_pwd, $s_gender);
                    registration($newUser);
                    header('Location: ./loginC.php');
                } else if (!checkPseudo($s_pseudo)) {
                    header('Location: ../controller/registerC.php.php?error=pseudo');
                } else if (!checkEmail($s_email)) {
                    header('Location: ../controller/registerC.php.php?error=email');
                }
            }
            else
                header('Location: ../controller/registerC.php.php?error=wrongPwd');
        }
    }
    else
    {
        header('Location: ../controller/registerC.php?error=wrong');
    }
}
require '../view/registerV.php';