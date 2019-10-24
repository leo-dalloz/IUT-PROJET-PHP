<?php
require '../model/indexM.php';
$s_action = $_POST['action'];

if($s_action == 'createDiscussion')
{
    $s_nomDiscussion = $_POST['nomDiscussion'];
    $i_tailleDiscussion = strlen($s_nomDiscussion);
    if ($i_tailleDiscussion > 1 && $i_tailleDiscussion < 20)
    {
        createNewDiscussion($s_nomDiscussion);
    }
}

function getTabDiscussion()
{
    return getDiscussions();
}