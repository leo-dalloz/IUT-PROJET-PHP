<?php
require 'dbTest.php';

class Post
{
    private $i_myPostId;
    private $i_myAuthorId;
    private $s_myContents;
    private $d_myDate;

    function __construct($i_postId,$i_authorId, $s_contents, $d_date)
    {
        $this->i_myPostId = $i_postId;
        $this->i_myAuthorId = $i_authorId;
        $this->s_myContents = $s_contents;
        $this->d_myDate = $d_date;
    }
}