<?php
    /*
        @brief : Modification profil
        @Author : Audrey
    */
    session_start();
    if($_SESSION['login']!='ok')
    {
        die('Erreur d\'authentification');
    }

    // Test si l'utilisateur arrive sur ce lien sans action définie au préalable
    if (!isset($_GET['action'])) {
        echo "error l.10";
        die();
    }
    $s_action = $_GET['action'];


    // Test pour savoir si le $_GET n'a pas été modifié par l'utilisateur
    $a_editable_user = array(   'nickname',
                                'firstname',
				                'surname',
                                'birthday',
                                'gender',
                                'email',
                                'password'
                            );
    if (!in_array($s_action, $a_editable_user)) {
        echo "error l.25";
        die();
    }

    if (isset($_GET['error'])) {
	$s_error = $_GET['error'];
    }

    $title = 'Modification Profil | Freenote';
    $style = '../assets/css/modificationProfile.css';

    ob_start();
?>
<main>
    <div id="HeadController">
        <a href="/Freenote/view/profileV.php" id="linkBack">
            <i class="fas fa-arrow-left"></i> Retour à la page précédente
        </a>
        <hr>
    </div>
    <form id="form" action="../controller/profileC.php?action=<?=$s_action?>" method="post">
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
	if(isset($s_error)) {
                    echo '<div id="ErrorContainer">'.$s_error.'</div>';
                }
	?>
</main>
<?php
    $content = ob_get_clean();
    require('../template.php');
?>