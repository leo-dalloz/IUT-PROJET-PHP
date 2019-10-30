<?php
require '../utils.inc.php';
require '../controller/pageDiscussionC.php';
start_page('Discussion1');
$s_etat = $_GET['etat'];
$i_numDiscussion = $_GET['discussionId'];

if ($s_etat == null || $i_numDiscussion == null)
{
    header('Location: indexV.php');
}
?>

    <h1>Bienvenue sur la discussion: <? echo $D_discussion->getName() ?></h1><br><br>

    <!--AFFICHER LES MESSAGES DE LA DISCUSSION-->

    <p><?$D_discussion->show()?></p><br>

    <strong><? echo $s_etat?></strong><br>
    <form action="../controller/pageDiscussionC.php?discussionId=<?echo $i_numDiscussion?>" method="post" >
        <label for="contents">Ecriver un message</label><br/>
        <input type="text" name="contents" placeholder="Message"><br/>
        <input type="submit" name="action" value="Envoyer message">
    </form>

    <a href="indexV.php">
        <p> Retour au menu </p>
    </a>

<?php
end_page();
?>


<?php
require '../utils.inc.php';
require '../controller/pageDiscussionC.php';
if (!isset($_GET['etat']) || !isset($_GET['discussionId'])){
    header('Location: indexV.php');
}
$title = 'Discussion ' .$D_discussion->getName().' | Freenote';
$style = '../assets/css/discussion.css';
$i_numDiscussion = $_GET['discussionId'];
ob_start();
?>


    <main>

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