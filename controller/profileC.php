<?php
/*
    @brief : controller modification du profil de l'utilisateur
    @Authors : Jeremy & Audrey
*/

    require '../model/profileM.php';
    session_start();
    if($_SESSION['login']!='ok')
    {
        die('Erreur d\'authentification');
    }


    $s_surname = $_POST['Surname'];
    $s_name = $_POST['Name'];
    $s_pseudo = $_POST['Pseudo'];
    $d_birth = $_POST['Birth'];
    $s_pwd = $_POST['Pwd'];
    $s_gender = $_POST['Gender'];
    if ($s_surname != NULL)
    {
        changeSurname($s_surname);
        $_SESSION['user']->setMySurname($s_surname);
    }
    if ($s_name != NULL)
    {
        changeName($s_name);
        $_SESSION['user']->setMyName($s_name);
    }
    if ($s_pseudo != NULL)
    {
        if (checkPseudo($s_pseudo) == 0)
        {
            changePseudo($s_pseudo);
            $_SESSION['user']->setMyPseudo($s_pseudo);
        }
    }
    if ($d_birth != NULL)
    {
        changeBirth($d_birth);
        $_SESSION['user']->setMyBirth($d_birth);
    }
    if ($s_pwd != NULL)
    {
        $s_pwd = password_hash($s_pwd, PASSWORD_DEFAULT);
        changePassword($s_pwd);
        $_SESSION['user']->setMyPassword($s_pwd);
    }
    changeGender($s_gender);
    $_SESSION['user']->setMyGender($s_gender);
//
//    if ($s_action == 'chSurname')
//    {
//        $s_newSurname = $_POST['Surname'];
//        changeSurname($s_newSurname);
//        $_SESSION['user']->setMySurname($s_newSurname);
//    }
//    else if ($s_action == 'chName')
//    {
//        $s_newName = $_POST['Name'];
//        changeName($s_newName);
//        $_SESSION['user']->setMyName($s_newName);
//    }
//    else if ($s_action == 'chPseudo')
//    {
//        $s_newPseudo = $_POST['Pseudo'];
//        changePseudo($s_newPseudo);
//        $_SESSION['user']->setMyPseudo($s_newPseudo);
//    }
//    else if ($s_action == 'chBirth')
//    {
//        $d_newBirth = $_POST['Birth'];
//        changeBirth($d_newBirth);
//        $_SESSION['user']->setMyBirth($d_newBirth);
//    }
//    else if ($s_action == 'chPwd')
//    {
//        $s_newPwd = $_POST['Pwd'];
//        changePassword($s_newPwd);
//        $_SESSION['user']->setMyPassword($s_newPwd);
//    }
//    else if ($s_action == 'chGender')
//    {
//        $s_newGender = $_POST['Gender'];
//        changeGender($s_newGender);
//        $_SESSION['user']->setMyGender($s_newGender);
//    }
    header('Location: ../view/basicProfileV.php');
