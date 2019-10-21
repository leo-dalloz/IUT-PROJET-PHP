<?php
require '../utils.inc.php';

require '../model/User.php';


session_start();
if($_SESSION['login']!='ok')
{
    die('Erreur d\'authentification');
}

start_page('Profil');
?>


<?php
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
?>



    <h1>Votre profil</h1>

        <p>
            Votre prénom : <?php echo $_SESSION['user']->getMySurname(); ?> <br/>
            <br/>
            <br/>

            Votre nom : <?php echo $_SESSION['user']->getMyName(); ?> <br/>
            <br/>
            <br/>

            Votre pseudo : <?php echo $_SESSION['user']->getMyPseudo(); ?> <br/>
            <br/>
            <br/>

            Votre date de naissance : <?php echo $_SESSION['user']->getMyBirth(); ?> <br/>
            <br/>
            <br/>


            Votre genre : <?php echo $_SESSION['user']->getMyGender(); ?> <br/>
            <br/>
        </p>

        <form action="profileV.php">
            <button type="submit" name="button" value="changeInfo"> Modifier </button> <br/>
        </form>




<?php
end_page();
?>