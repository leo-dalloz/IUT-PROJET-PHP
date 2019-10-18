<?php

    session_start();

    require '../Model/loginM.php';

    $s_pseudo = $_POST['Pseudo'];
    $s_password = $_POST['Pwd'];


    if (login($s_pseudo,$s_password))
    {
        $_SESSION['login'] = 'ok';
        $_SESSION['user'] = returnUser($s_pseudo);
        if ($_SESSION['user']->getMyAdmin() == 1)
            header('Location: ../View/pageTestV.php?admin=oui');
        else
            header('Location: ../View/pageTestV.php?admin=non');
    }
    else
        header('Location: ../View/loginV.php?step=error');






