<?php
require 'Discussion.php';

function getDiscussions()
{
    $tab_discussions = array();
    $dbLink = dbConnect();
    $query = 'SELECT discussionId FROM Discussion ORDER BY nbLike DESC';
    $dbResult = testError($dbLink,$query);
    while($dbRow = mysqli_fetch_assoc($dbResult))
    {
        $tab_discussions[] = new Discussion($dbRow['discussionId']);
    }
    return $tab_discussions;
}

function createNewDiscussion($s_nomDiscussion)
{
    $dbLink = dbConnect();
    $query = "INSERT INTO Discussion (discussionName, nbMaxWords, nbLike, state, nbMaxMessages) VALUES ('$s_nomDiscussion', 2, 0, 1, 'rand(3,10)')";
    testError($dbLink,$query);
    header('location : ../view/indexV.php');
}