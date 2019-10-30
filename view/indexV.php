<?php
	$title = 'Freenote';
	$style = '../assets/css/index.css';
	$style_theme = '../assets/css/theme/day.css';

    require '../controller/indexC.php';
    $tab_discussions = getTabDiscussion();

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
</main>

<?php
	$content = ob_get_clean();
	require ('../template.php');
?>

