<?php
require '../model/indexM.php';
require '../model/User.php';
session_start();
$isConnected = $_SESSION['login'];
if($isConnected == 'ok')
{
    $isAdmin = $_SESSION['user']->getMyAdmin();
}
else
{
    $isAdmin = 0;
}
if(isset($_POST['action']))
{
    $s_action = $_POST['action'];
    if($s_action == 'createDiscussion')
    {
        $s_nomDiscussion = $_POST['nomDiscussion'];
        $i_tailleDiscussion = strlen($s_nomDiscussion);
        if ($i_tailleDiscussion > 1 && $i_tailleDiscussion < 20)
        {
            createNewDiscussion($s_nomDiscussion);
            header('Location: ./indexC.php');
        }
        else
        {
            header('Location: ../view/indexV.php?error=nomIncorrect');
        }
    }
}
require '../view/indexV.php';