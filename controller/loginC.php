<?php
session_start();
require '../model/loginM.php';
$s_pseudo = $_POST['Pseudo'];
$s_password = $_POST['Pwd'];
if (login($s_pseudo,$s_password))
{
    $_SESSION['login'] = 'ok';
    $_SESSION['user'] = returnUser($s_pseudo);
    header('Location: ../view/indexV.php');

}
else
    header('Location: ../view/loginV.php?step=error');