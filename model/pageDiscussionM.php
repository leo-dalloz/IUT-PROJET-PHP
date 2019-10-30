<?php
require 'Discussion.php';

function createMessage($i_authorId, $i_discussionId, $s_contents)
{
    $dbLink = dbConnect();
    $d_date = date('Y-m-d H:i:s');
    $query = "INSERT INTO Message (discussionId, authorId, contents, date, state) VALUES ($i_discussionId, '$i_authorId', '$s_contents', '$d_date', 1)";
    testError($dbLink,$query);
}

function addToMessage($s_contents, $i_messageId)
{
    $dbLink = dbConnect();
    $query = 'UPDATE Message SET contents = CONCAT(contents,\' ' . $s_contents .'\') WHERE messageId = ' . $i_messageId;
    testError($dbLink,$query);
}

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