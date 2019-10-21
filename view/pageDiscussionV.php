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