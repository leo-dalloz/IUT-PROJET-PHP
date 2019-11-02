<?php
require 'dbTest.php';

class Message
{
    private $i_myMessageId;
    private $i_myAuthorID;
    private $s_myContents;
    private $d_myDate;
    private $i_myNbLike;
    private $b_myState;
    function __construct($i_messageId,$d_date, $b_state)
    {
        $this->i_myMessageId = $i_messageId;

        $this->d_myDate = $d_date;
        $this->b_myState = $b_state;
    }

    public function closeMessage()
    {
        $this->b_myState = 0;
        $dbLink = dbConnect();
        $query = 'UPDATE Message SET state = 0 WHERE messageId = ' . $this->i_myMessageId;
        testError($dbLink,$query);
    }



    /**
     * @return mixed
     */
    public function getAuthorID()
    {
        return $this->i_myAuthorID;
    }
    /**
     * @return mixed
     */
    public function getContents()
    {
        return $this->s_myContents;
    }
    /**
     * @return false|string
     */
    public function getDate()
    {
        return $this->d_myDate;
    }
    /**
     * @return mixed
     */
    public function getNbLike()
    {
        return $this->i_myNbLike;
    }
}