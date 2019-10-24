<?php
require '../model/indexM.php';
$s_action = $_POST['action'];

if($s_action == 'createDiscussion')
{
    $s_nomDiscussion = $_POST['nomDiscussion'];
    createNewDiscussion($s_nomDiscussion);
}

function getTabDiscussion()
{
    return getDiscussions();
}