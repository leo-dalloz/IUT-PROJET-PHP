<?php
require 'Discussion.php';

function createMessage($i_authorId, $i_discussionId, $s_contents)
{
    $dbLink = dbConnect();
    $d_date = date('Y-m-d H:i:s');
    $query = "INSERT INTO Message (discussionId, authorId, contents, date) VALUES ($i_discussionId, '$i_authorId', '$s_contents', '$d_date')";
    testError($dbLink,$query);
}