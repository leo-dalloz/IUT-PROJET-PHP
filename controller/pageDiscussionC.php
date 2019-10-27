<?php
require '../model/pageDiscussionM.php';

if (isset($s_contents)) {
    $s_contents = $_POST['contents'];
}

if (isset($s_action)) {
    $s_action = $_POST['action'];
}

$i_discussionId = $_GET['discussionId'];
$D_discussion = new Discussion($i_discussionId);

$tab_discussions = array();
$dbLink = dbConnect();
$query = 'SELECT discussionId FROM Discussion ORDER BY nbLike DESC';
$dbResult = testError($dbLink,$query);
while($dbRow = mysqli_fetch_assoc($dbResult))
{
    $tab_discussions[] = new Discussion($dbRow['discussionId']);
}
return $tab_discussions;


if (isset($s_action) && $s_action == 'Envoyer message')
{
    if (! $D_discussion->getState())
    {
        header('Location: ../view/pageDiscussionV.php?etat='. 'Discussion fermé' . '&discussionId=' .$i_discussionId);
    }
    else if(str_word_count($s_contents,0,'123456789') <= $D_discussion->getNbMaxWords()
        && str_word_count($s_contents,0,'123456789') != 0)
    {

        $i_lastMessageID = $D_discussion->LastMessage();
        if ( -1 == $i_lastMessageID)
        {
            if(1 == $D_discussion->canOpenDiscussion())
            {
                createMessage('0001',$i_discussionId, $s_contents);
            }
            else
            {
                $D_discussion->closeDiscussion();
                header('Location: ../view/pageDiscussionV.php?etat=' . 'discussion full' . '&discussionId=' . $i_discussionId);
            }
        }
        else
        {
            addToMessage($s_contents, $i_lastMessageID);
        }
        if ( ! (strpos($s_contents,'.') == FALSE))
        {
            $D_discussion->closeAMessage();
        }
        header('Location: ../view/pageDiscussionV.php?etat=' . 'message envoyé' . '&discussionId=' . $i_discussionId);
    }
    else
    {
        header('Location: ../view/pageDiscussionV.php?etat=error&discussionId=' .$i_discussionId);
    }
}