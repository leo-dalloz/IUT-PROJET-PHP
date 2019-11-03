<?php
require '../model/checkM.php';
require '../model/registerM.php';
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
                    $newUser = new User(0, $s_name, $s_surname, $s_pseudo, $s_email, $d_birth, $s_pwd, $s_gender);
                    registration($newUser);
                    header('Location: ./loginC.php');
                } else if (!checkPseudo($s_pseudo)) {
                    header('Location: ../controller/registerC.php?error=pseudo');
                } else if (!checkEmail($s_email)) {
                    header('Location: ../controller/registerC.php?error=email');
                }
            }
            else
                header('Location: ../controller/registerC.php?error=wrongPwd');
        }
    }
    else
    {
        header('Location: ../controller/registerC.php?error=wrong');
    }
}
if (isset($_GET['error']))
{
    if ($_GET['error'] == 'wrong')
        $s_error = 'Vous n\'avez pas rempli un des champs.';
    else if ($_GET['error'] == 'pwd')
        $s_error = 'Les mots de passe sont différents.';
    else if ($_GET['error'] == 'pseudo')
        $s_error = 'Le pseudo que vous avez choisi est déjà utilisé.';
    else if ($_GET['error'] == 'email')
        $s_error = 'L\'email que vous avez choisi possède déjà un compte associé.';
    else if ($_GET['error'] == 'wrongPwd')
        $s_error = 'Le mot de passe doit contenir au moins 8 caractères, dont une majuscule, une minuscule et un chiffre.';
    else
        $s_error = '';
}
else
    $s_error = '';
require '../view/registerV.php';
