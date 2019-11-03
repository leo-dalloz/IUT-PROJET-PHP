<?php
session_start();
require '../model/loginM.php';
if (isset($_POST['login']))
{
    if (isset($_POST['Pseudo']) AND isset($_POST['Pwd']))
    {
        $s_pseudo = $_POST['Pseudo'];
        $s_password = $_POST['Pwd'];
        if (login($s_pseudo, $s_password))
        {
            $_SESSION['login'] = 'ok';
            $_SESSION['user'] = returnUser($s_pseudo);
            header('Location: ../controller/indexC.php');
        }
        else
            header('Location: ../controller/loginC.php?step=error');
    }
    else
        header('Location: ../controller/indexC.php?step=missing');
}
if (isset($_GET['step']))
{
    if ($_GET['step'] == 'error')
        $s_error = 'L\'identifiant et le mot de passe ne correspondent pas.';
    else if ($_GET['step'] == 'missing')
        $s_error = 'Vous avez oublié de remplir un des champs.';
    else
        $s_error = '';
}
else
    $s_error = '';
require '../view/loginV.php';