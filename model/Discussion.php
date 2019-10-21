<?php
require 'Message.php';
class Discussion
{
    private $i_myDiscussionId;
    private $s_myName;
    private $i_myNbMaxWords;
    private $i_myNbLike;
    private $b_myState;
    private $tab_myMessages = array();
    function __construct($i_discussionId)
    {
        $dbLink = dbConnect();
        $query = 'SELECT discussionName, nbMaxWords, nbLike, state FROM Discussion WHERE discussionId = \'' . $i_discussionId.'\'';
        $dbResult = testError($dbLink,$query);
        while($dbRow = mysqli_fetch_assoc($dbResult))
        {
            $this->s_myName = $dbRow['discussionName'];
            $this->i_myNbMaxWords = $dbRow['nbMaxWords'];
            $this->i_myNbLike =$dbRow['nbLike'];
            $this->b_myState = $dbRow['state'];
        }
        $this->i_myDiscussionId = $i_discussionId;
        $query = 'SELECT messageId, authorId, contents, date, nbLike, state FROM Message WHERE discussionId = \'' . $i_discussionId . '\' ORDER BY date';
        $dbResult = testError($dbLink,$query);
        while($dbRow = mysqli_fetch_assoc($dbResult))
        {
            $this->tab_myMessages[] = new Message($dbRow['messageId'],$dbRow['authorId'],$dbRow['contents'],$dbRow['date'],$dbRow['nbLike'], $dbRow['state']);
        }
    }
    public function show()
    {
        foreach ($this->tab_myMessages as $value)
        {
            echo $value->getContents() . '<br>';
        }
    }
    public function getNbMessages()
    {
        return count($this->tab_myMessages);
    }
    public function closeDiscussion()
    {
        $this->b_myState = 0;
        $dbLink = dbConnect();
        $query = 'UPDATE Discussion SET state = 0 WHERE discussionId = ' . $this->i_myDiscussionId;
        testError($dbLink,$query);
    }
    /**
     * @param mixed $b_myState
     */
    public function openDiscussion()
    {
        $this->b_myState = 1;
        $dbLink = dbConnect();
        $query = 'UPDATE Discussion SET state = 1 WHERE discussionId = ' . $this->i_myDiscussionId;
        testError($dbLink,$query);
    }
    /**
     * @return mixed
     */
    public function getDiscussionId()
    {
        return $this->i_myDiscussionId;
    }
    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->s_myName;
    }
    /**
     * @return mixed
     */
    public function getNbMaxWords()
    {
        return $this->i_myNbMaxWords;
    }
    /**
     * @return mixed
     */
    public function getNbLike()
    {
        return $this->i_myNbLike;
    }
    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->b_myState;
    }
}