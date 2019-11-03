<?php
require '../model/indexM.php';
require '../model/User.php';
session_start();
if(isset($_POST['action']))
{
    $s_action = $_POST['action'];
    if($s_action == 'createDiscussion')
    {
        $s_nomDiscussion = $_POST['nameDiscu'];
        $i_tailleDiscussion = strlen($s_nomDiscussion);
        if ($i_tailleDiscussion > 1 && $i_tailleDiscussion < 20)
        {
            createNewDiscussion($s_nomDiscussion);
            $_SESSION['popupsuccess'] = 'Discussion créer';
            header('Location: ./indexC.php');
        }
        else
        {
            header('Location: ../view/indexC.php?error=nomIncorrect');
        }
    }
}
$isConnected = $_SESSION['login'];
if($isConnected == 'ok')
{
    $isAdmin = $_SESSION['user']->getMyAdmin();
}
else
{
    $isAdmin = 0;
}
require '../view/indexV.php';