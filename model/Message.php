<?php
require 'Post.php';

class Message
{
    private $i_myMessageId;
    private $d_myDate;
    private $b_myState;
    private $tab_myPost = array();

    function __construct($i_messageId,$d_date, $b_state)
    {
        $this->i_myMessageId = $i_messageId;
        $this->d_myDate = $d_date;
        $this->b_myState = $b_state;

        $dbLink = dbConnect();
        $query = "SELECT * FROM Post WHERE messageID = '$i_messageId'";
        $dbResult = testError($dbLink,$query);
        while($dbRow = mysqli_fetch_assoc($dbResult))
        {
            $this->tab_myPost[] = new Post($dbRow['postId'],$dbRow['authorId'],$dbRow['contents'],$dbRow['date']);
        }
    }

    public function show()
    {
        $s_contents = '';
        foreach ($this->tab_myPost as $value)
        {
            $s_contents = $s_contents . ' ' . $value->getContents();
        }
        return $s_contents;
    }

    public function closeMessage()
    {
        $this->b_myState = 0;
        $dbLink = dbConnect();
        $query = 'UPDATE Message SET state = 0 WHERE messageId = ' . $this->i_myMessageId;
        testError($dbLink,$query);
    }
}