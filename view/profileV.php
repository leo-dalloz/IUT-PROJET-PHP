<?php
$title = 'Profil | Freenote';
$style = '../assets/css/profil.css';
ob_start();
?>

    <main>
        <section id ="ProfileContainer">
            <div id="ProfileTitle">
                Profil de <?php echo $s_pseudo ?>
            </div>

            <?php

            if($s_error != 0) {
                echo '<div id="ErrorContainer">'.$s_error.'</div>';
            }
            ?>
            <?php
            if ($s_success != '') {
                echo '<div id="SuccessContainer">' . $s_success . '</div>';
            }
            ?>
            <div id="listProfile">
                <div class="ProfileLine">
                    <p class="CategName">
                        NOM
                    </p>
                    <p class="CategValue">
                        <?php echo $s_surname; ?>
                    </p>
                    <a href="../controller/modificationProfileC.php?action=surname" class="CategLink"><i class="fas fa-angle-right"></i></a>
                </div>
                <div class="ProfileLine">
                    <p class="CategName">
                        PRENOM
                    </p>
                    <p class="CategValue">
                        <?php echo $s_name; ?>
                    </p>
                    <a href="../controller/modificationProfileC.php?action=firstname" class="CategLink"><i class="fas fa-angle-right"></i></a>
                </div>
                <div class="ProfileLine">
                    <p class="CategName">
                        PSEUDO
                    </p>
                    <p class="CategValue">
                        <?php echo $s_pseudo; ?>
                    </p>
                    <a href="../controller/modificationProfileC.php?action=nickname" class="CategLink"><i class="fas fa-angle-right"></i></a>
                </div>
                <div class="ProfileLine">
                    <p class="CategName">
                        DATE DE NAISSANCE
                    </p>
                    <p class="CategValue">
                        <?php echo $s_birth; ?>
                    </p>
                    <a href="../controller/modificationProfileC.php?action=birthday" class="CategLink"><i class="fas fa-angle-right"></i></a>
                </div>
                <div class="ProfileLine">
                    <p class="CategName">
                        SEXE
                    </p>
                    <p class="CategValue">
                        <?php echo $s_gender; ?>
                    </p>
                    <a href="../controller/modificationProfileC.php?action=gender" class="CategLink"><i class="fas fa-angle-right"></i></a>
                </div>
                <div class="ProfileLine mailLine">
                    <p class="CategName">
                        ADRESSE E-MAIL
                    </p>
                    <p class="CategValue">
                        <?php echo $s_email; ?>
                    </p>
                </div>
            </div>
        </section>

    </main>


<?php
$content = ob_get_clean();
require('../template.php');
?>