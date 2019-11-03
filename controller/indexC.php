<?php
require '../model/indexM.php';
require '../model/User.php';
session_start();

if (isset($_GET['etat']))
{
    $_SESSION['popupsuccess'] = $_GET['etat'];
}
else if (isset($_GET['error']))
{
    $_SESSION['popuperror'] = $_GET['etat'];
}
if(isset($_POST['action']))
{
    $s_action = $_POST['action'];
    if($s_action == 'Créer discussion')
    {
        $s_nomDiscussion = $_POST['nameDiscu'];
        $i_tailleDiscussion = strlen($s_nomDiscussion);
        if ($i_tailleDiscussion > 1 && $i_tailleDiscussion < 20)
        {
            createNewDiscussion($s_nomDiscussion);
            header('Location: ../controller/indexC.php?etat=' . 'Discussion créée');
        }
        else
        {
            header('Location: ../controller/indexC.php?error=' . 'Nom incorrect');
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