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
    $this->b_myState = 0;
    $dbLink = dbConnect();
    $query = 'UPDATE Message SET contents = CONCAT(contents,\' ' . $s_contents .'\') WHERE messageId = ' . $i_messageId;
    testError($dbLink,$query);
}

function closeThisMessage()
{
    closeMessage();
}

function idLastMessage()
{
    return lastMessage();
}