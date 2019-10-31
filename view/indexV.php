<?php
    require '../controller/indexC.php';
    $title = 'Freenote';
    $style = '../assets/css/index.css';
    $style_theme = '../assets/css/theme/day.css';
    session_start();
    $tab_discussions = getTabDiscussion();
	ob_start();
?>
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
    <main id="top">
        <section id="FirstPartContainer">
            <div id="DescriptionContainer">
                <p id="DescriptionTitle">
                    Bienvenue sur FreeNote
                </p>

                <p id="DescriptionText">
                    FreeNote est un réseau social d’un nouveau genre qui consiste à créer des fils de discussions comprenant
                    des messages participatifs au sein desquels chaque utilisateur ne peut ajouter qu’un ou deux mots.
                    <br> <br> <b> Inscrivez-vous vite ! </b>
                </p>
            </div>
        </section>

        <section id="secondPartSection">
            <div id="listArg">
                <p class="Arg">
                    <i class="fas fa-users"></i>
                    Rencontrez des Freenoter
                </p>
                <p class="Arg">
                    <i class="fab fa-readme"></i>
                    Parcourez les discussions
                </p>
                <p class="Arg">
                    <i class="fas fa-comments"></i>
                    Répondez aux discussions
                </p>
                <p class="Arg">
                    <i class="fas fa-times-circle"></i>
                    Mais pas plus de 2 mots
                </p>
            </div>


        </section>
        <section id="DescriptionButtons">
            <a class="MainButton" href="">S'inscrire</a>
            <a class="MainButton" href="">Se connecter</a>
        </section>
        <section id="responsiveSection">
            <img src="../assets/images/telThemeClair.png" id="responsiveTel"alt="tel image mobile">
            <p id="responsiveText">
                Disponible sur téléphone ! <br>
                Disponible en thème foncé, <br>
                et clair !
            </p>
        </section>
    </main>

    <div id="returnTopContainer">
        <a href="#top">
            <i class="far fa-arrow-alt-circle-up"></i>
        </a>
    </div>

    <script src="../assets/js/index.js"></script>
<?php
$content = ob_get_clean();
require ('../template.php');
?>