<?php
/*
    @brief : Modification profil
    @Author : Audrey
*/


$title = 'Modification Profil | Freenote';
$style = '../assets/css/modificationProfile.css';
ob_start();
?>
    <main>
        <div id="HeadController">
            <a href="../controller/profileC.php" id="linkBack">
                <i class="fas fa-arrow-left"></i> Retour à la page précédente
            </a>
            <hr>
        </div>
        <form id="form" action="../controller/modificationProfileC.php?action=<?=$s_action?>&submitAction=<?=$s_action?>" method="post">
            <?php
            switch ($s_action) {
                case 'nickname':
                    echo '<input type="text" name="nickname" placeholder="Nouveau pseudo">';
                    break;
                case 'surname':
                    echo '<input type="text" name="surname" placeholder="Nom">';
                    break;
                case 'firstname' :
                    echo '<input type="text" name="firstname" placeholder="Prénom">';
                    break;
                case 'birthday':
                    echo '<input type="date" name="birthday">';
                    break;
                case 'gender' :
                    echo '<select name="gender">
				        <option value="Homme">Homme</option>
                        <option value="Femme">Femme</option>
                        </select>';
                    break;
                case 'password' :
                    echo '<input type="password" name="firstPwd" placeholder="Mot de passe"> 
                          <input type="password" name="secondPwd" placeholder="Répetez votre mot de passe">
                         ';
                    break;
                default:
                    echo 'Erreur';
                    break;
            }
            ?>

            <button type="submit" id="submitButton">
                <i class="fas fa-user-edit"></i>
            </button>
        </form>
        <?php
        if($s_error != '') {
            echo '<div id="ErrorContainer">'.$s_error.'</div>';
        }
        ?>
    </main>
<?php
$content = ob_get_clean();
require('../template.php');
?>