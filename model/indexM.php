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
    $i_rand = rand(3,10);
    $query = "INSERT INTO Discussion (discussionName, nbLike, state, nbMaxMessages) VALUES ('$s_nomDiscussion',0, 1, '$i_rand')";
    testError($dbLink,$query);
}
