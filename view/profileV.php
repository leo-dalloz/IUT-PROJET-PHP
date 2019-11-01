<?php
    require '../utils.inc.php';

    require '../model/User.php';


    session_start();
    if($_SESSION['login']!='ok')
    {
        die('Erreur d\'authentification');
    }

    $s_error = $_GET['error'];

    if ($s_error == 'wrongPseudo')
        $s_error = 1;
    else if ($s_error == 'wrongEmail')
        $s_error = 2;
    else if ($s_error == 'samePseudo')
        $s_error = 3;
    else if ($s_error == 'sameEmail')
        $s_error = 4;
    else
        $s_error = 0;

    $title = 'Profil | Freenote';
    $style = '../assets/css/profil.css';

    ob_start();
?>

<main>
    <section id ="ProfileContainer">
        <div id="ProfileTitle">
            Profil de <?php echo $_SESSION['user']->getMyPseudo(); ?>
        </div>

            <?php
		 
                if(isset($s_error) && $s_error != 0) {
                    echo '<div id="ErrorContainer">'.$s_error.'</div>';
                }
            ?>
            <?php
                if (isset($_GET['success'])) {
                      echo '<div id="SuccessContainer">' .$_GET['success']. '</div>';
                }
            ?>
        <div id="listProfile">
            <div class="ProfileLine">
                <p class="CategName">
                    NOM
                </p>
                <p class="CategValue">
                    <?php echo $_SESSION['user']->getMySurname(); ?>
                </p>
                <a href="/Freenote/view/modificationProfileV.php?action=surname" class="CategLink"><i class="fas fa-angle-right"></i></a>
            </div>
            <div class="ProfileLine">
                <p class="CategName">
                    Prénom
                </p>
                <p class="CategValue">
                    <?php echo $_SESSION['user']->getMyName(); ?>
                </p>
                <a href="/Freenote/view/modificationProfileV.php?action=firstname" class="CategLink"><i class="fas fa-angle-right"></i></a>
            </div>
            <div class="ProfileLine">
                <p class="CategName">
                    PSEUDO
                </p>
                <p class="CategValue">
                    <?php echo $_SESSION['user']->getMyPseudo(); ?> 
                </p>
                <a href="/Freenote/view/modificationProfileV.php?action=nickname" class="CategLink"><i class="fas fa-angle-right"></i></a>
            </div>
            <div class="ProfileLine">
                <p class="CategName">
                    ANNIVERSAIRE
                </p>
                <p class="CategValue">
                    <?php echo $_SESSION['user']->getMyBirth(); ?>
                </p>
                <a href="/Freenote/view/modificationProfileV.php?action=birthday" class="CategLink"><i class="fas fa-angle-right"></i></a>
            </div>
            <div class="ProfileLine">
                <p class="CategName">
                    SEXE
                </p>
                <p class="CategValue">
                    <?php echo $_SESSION['user']->getMyGender(); ?>
                </p>
                <a href="/Freenote/view/modificationProfileV.php?action=gender" class="CategLink"><i class="fas fa-angle-right"></i></a>
            </div>
            <div class="ProfileLine">
                <p class="CategName">
                    Mot de passe
                </p>
                <p class="CategValue">
                    ****************
                </p>
                <a href="/Freenote/view/modificationProfileV.php?action=password" class="CategLink"><i class="fas fa-angle-right"></i></a>
            </div>
            <div class="ProfileLine mailLine">
                <p class="CategName">
                    ADRESSE E-MAIL
                </p>
                <p class="CategValue">
                    <?= $_SESSION['user']->getMyEmail(); ?>
                </p>
            </div>
        </div>
    </section>

</main>


<?php
    $content = ob_get_clean();
    require('../template.php');
?>