
<?php
//require '../utils.inc.php';
//require '../controller/pageDiscussionC.php';
//start_page('Discussion1');
//$s_etat = $_GET['etat'];
//$i_numDiscussion = $_GET['discussionId'];
//
//if ($s_etat == null || $i_numDiscussion == null)
//{
//    header('Location: indexV.php');
//}
//?>
<!---->
<!--    <h1>Bienvenue sur la discussion: --><?// echo $D_discussion->getName() ?><!--</h1><br><br>-->
<!---->
<!---->
<!--    <p>--><?//$D_discussion->show()?><!--</p><br>-->
<!---->
<!--    <strong>--><?// echo $s_etat?><!--</strong><br>-->
<!--    <form action="../controller/pageDiscussionC.php?discussionId=--><?//echo $i_numDiscussion?><!--" method="post" >-->
<!--        <label for="contents">Ecriver un message</label><br/>-->
<!--        <input type="text" name="contents" placeholder="Message"><br/>-->
<!--        <input type="submit" name="action" value="Envoyer message">-->
<!--    </form>-->
<!---->
<!--    <a href="indexV.php">-->
<!--        <p> Retour au menu </p>-->
<!--    </a>-->
<!---->
<?php
//end_page();
//?>
<?php
require '../utils.inc.php';
require '../controller/pageDiscussionC.php';
require  '../controller/indexC.php';
if (!isset($_GET['etat']) || !isset($_GET['discussionId'])){
    header('Location: indexV.php');
}
$tab_discussions = getTabDiscussion();
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
        <?php } ?>
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