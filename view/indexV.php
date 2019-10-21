<?php
	$title = 'Freenote';
	$style = '../assets/css/index.css';
	$style_theme = '../assets/css/theme/day.css';

    require '../controller/indexC.php';
    $tab_discussions = getTabDiscussion();

	ob_start();
?>
<main>
    <aside>
        <?php
        foreach ($tab_discussions as $value)
        {
            ?>
            <a href="pageDiscussionView.php?etat=login&discussionId=<?echo $value->getDiscussionId()?>"id="lien_salon_1">
                <p>  <?echo $value->getName()?> <br>
                    <?$b_isOuvert = $value->getState()?>
                    status :<span id="span_status_discussion_<?echo ($b_isOuvert) ? 'ouvert' : 'ferme' ?>">
                              <? echo ($b_isOuvert) ? 'Ouvert' : 'Fermé';?> </span> <br>
                    messages :   <?echo $value->getNbMessages()?><br>
                    nbWordsMax: <?echo $value->getNbMaxWords() ?><br>
                    nbLike: <?echo $value->getNbLike() ?></p>
            </a>
            <?php
        }
        ?>

    </aside>
</main>


<?php
	$content = ob_get_clean();
	require ('../template.php');
?>
