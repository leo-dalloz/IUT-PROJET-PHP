<?php
use mysql_xdevapi\BaseResult;
require '../model/pageDiscussionM.php';
require '../model/User.php';
session_start();

$i_discussionId = $_GET['discussionId'];
$D_discussion = new Discussion($i_discussionId);
$s_etat = $_GET['etat'];
$s_discussionID = $_GET['discussionId'];

if (isset($_POST['action']))
{
    $s_contents = $_POST['contents'];
    $s_action = $_POST['action'];

    if ($s_action == 'sendMessage' AND $_SESSION['login'] == 'ok') {
        $i_lastMessageID = $D_discussion->lastMessage();
        if (!$D_discussion->getState()) {
            header('Location: ../view/pageDiscussionV.php?etat=' . 'Discussion fermé' . '&discussionId=' . $i_discussionId);
        }
        else if (str_word_count($s_contents, 0, '123456789') <= $D_discussion->getNbMaxWords()
            && str_word_count($s_contents, 0, '123456789') != 0) {
            if (-1 == $i_lastMessageID) {
                if (1 == $D_discussion->canOpenDiscussion()) {
                    createMessage($_SESSION['user']->getMyId(), $i_discussionId, $s_contents);
                    $D_discussion = new Discussion($i_discussionId);
                    if (!(strpos($s_contents, '.') == FALSE)) {
                        $D_discussion->closeAMessage();
                    }
                } else {
                    $D_discussion->closeDiscussion();
                    header('Location: ./pageDiscussionC.php?etat=' . 'discussion full' . '&discussionId=' . $i_discussionId);
                }
            } else if (!(strpos($s_contents, '.') == FALSE)) {
                addToMessage($s_contents, $i_lastMessageID);
                $D_discussion->closeAMessage();
            } else {
                addToMessage($s_contents, $i_lastMessageID);
            }

            header('Location: ./pageDiscussionC.php?etat=' . 'message envoyé' . '&discussionId=' . $i_discussionId);
        } else {
            header('Location: ./pageDiscussionC.php?etat=error&discussionId=' . $i_discussionId);
        }
    }
    if ($s_action == 'sendMessage' AND $_SESSION['login'] != 'ok') {
        header('Location: ./pageDiscussionC.php?etat=pasConnecté&discussionId=' . $i_discussionId);
    }

    if ($s_action == 'like' AND $_SESSION['login'] == 'ok') {
        if (0 == testIfLike($i_discussionId, $_SESSION['user']->getMyId())) {
            addLike($i_discussionId, $_SESSION['user']->getMyId());
            header('Location: ./pageDiscussionC.php?etat=like&discussionId=' . $i_discussionId);
        } else {
            removeLike($i_discussionId, $_SESSION['user']->getMyId());
            header('Location: ./pageDiscussionC.php?etat=delike&discussionId=' . $i_discussionId);
        }
    }
}
