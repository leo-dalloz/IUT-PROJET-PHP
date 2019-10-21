<?php

    session_start();

    require '../model/loginM.php';

    $s_pseudo = $_POST['Pseudo'];
    $s_password = $_POST['Pwd'];


    if (login($s_pseudo,$s_password))
    {
        $_SESSION['login'] = 'ok';
        $_SESSION['user'] = returnUser($s_pseudo);
        if ($_SESSION['user']->getMyAdmin() == 1)
            header('Location: ../view/pageTestV.php?admin=oui');
        else
            header('Location: ../view/pageTestV.php?admin=non');
    }
    else
        header('Location: ../view/loginV.php?step=error');
