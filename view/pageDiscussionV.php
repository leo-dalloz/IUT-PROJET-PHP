<?php
    require '../utils.inc.php';
    require '../controller/pageDiscussionC.php';

    if (!isset($_GET['etat']) || !isset($_GET['discussionId'])){
        header('Location: indexV.php');
    }

    $title = 'Discussion ' .$D_discussion->getName().' | Freenote';
    $style = '../assets/css/discussion.css';


    ob_start();
?>


<main>
<section id="ListConversationContainer">
    <p id="ListConversation">
        Conversations
    </p>
    <div id="LConvContainer">
        <?php foreach ($tab_discussions as $value) { ?>
        <button class="buttonLConv" onclick="window.location.href='pageDiscussionV.php?discussionId=<?= $value->getDiscussionId()?>&etat=0'">
        <ul class="LConv">
            <div class="FirstLine">
                <li>
                    <a href="pageDiscussionV.php?discussionId=<?= $value->getDiscussionId()?>&etat=0" class="LinkDiscu"><?= $value->getName()?></a>
                </li>
                <li>
                    <?= $value->getNbMessages() ?> Messages
                </li>
            </div>
            <div class="SecondLine">
                <li>    
                    <?= $value->getNbMaxWords()?> Mots MAX
                </li>
                <li>
                    <?php $b_isOuvert = $value->getState()?>
                    <p class="<?= ($b_isOuvert) ? 'Open' : 'Close' ?>"><?= ($b_isOuvert) ? 'Ouverte' : 'Fermée' ?></p>
                </li>
                <li >
                    <?= $value->getNbLike() ?> <i class="fas fa-thumbs-up"></i>
                </li>
            </div>
        </ul>
        </button>
        <?php }?>
    </div>
</section>

<section id="conversationContainer">
        <div id="headConversationContainer">
            <p id="titleConversation">
                <?= $D_discussion->getName(); ?>
            </p>
            <p id="likeContainer">
                <?= $D_discussion->getNbLike(); ?>
                likes
                <?php
                    if (testIfLike($D_discussion->getDiscussionId(), $_SESSION['id']) == 0) {
                ?>
                <form action="../controller/pageDiscussionC.php?discussionId=<?=$i_discussionId?>" method="post">
                    <button class="likeButton" type="submit" name="action" value="like">
                        Like <i class="fas fa-heart"></i>
                    </button>
                </form>
                <?php
                    } else {
                ?>
                <form action="../controller/pageDiscussionC.php?discussionId=<?=$i_discussionId?>" method="post">
                    <button class="dislikeButton" type="submit" name="action" value="like">
                        dislike <i class="fas fa-heart"></i>
                    </button>
                </form>
                <?php } ?>
            </p>
        </div>
        <div id="LMessageContainer">
            <?php $Messages = $D_discussion->getMessages();
                foreach ($Messages as $message) {
            ?>
            <div id="listMessage">
                <div class="line">
                    <p class="message">
                        <?= $message->getContents(); ?>
                    </p>
                </div>
            </div>
            <?php 
                } 
            ?>
        </div>
        <div id="SendMessageContainer">
            <form id="formMessage" action="../controller/pageDiscussionC.php?discussionId=<?=$i_discussionId?>" method="post" >
                <input id="contentInput" type="text" name="contents" placeholder="Message">
                <button id="submitButton" type="submit" name="action"><i class="fab fa-telegram-plane"></i></button>
            </form>
        </div>
    </section>
</main>
<?php
    $content = ob_get_clean();
    require('../template.php');
?>