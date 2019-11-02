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
            header('Location: ../controller/indexC.php?step=error');
    }
    else
        header('Location: ../controller/indexC.php?step=missing');
}
require '../view/loginV.php';