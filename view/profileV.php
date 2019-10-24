<?php
require '../utils.inc.php';
require '../Model/User.php';
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

    <form action="../Controller/profileC.php" method="post">
        <p>
            Votre prénom : <?php echo $_SESSION['user']->getMySurname(); ?> <br/>
            <input type="text" name="Surname" placeholder="Changer votre prénom" /> <br/>
            <br/>

            Votre nom : <?php echo $_SESSION['user']->getMyName(); ?> <br/>
            <input type="text" name="Name" placeholder="Changer votre nom" /> <br/>

            <br/>

            Votre pseudo : <?php echo $_SESSION['user']->getMyPseudo(); ?> <br/>
            <input type="text" name="Pseudo" placeholder="Changer votre pseudo" /> <br/>
            <?php if ($s_error == 1) echo 'Le pseudo que vous avez choisi est déjà utilisé.';
            else echo '';   ?>
            <br/>

            Votre date de naissance : <?php echo $_SESSION['user']->getMyBirth(); ?> <br/>
            Changer votre date de naissance : <br/>
            <input type="date" name="Birth" placeholder="Date de naissance"/> <br/>

            <br/>

            Pour changer votre mot de passe : <br/>
            <input type="password" name="Pwd" placeholder="Changer votre mot de passe" /> <br/>

            <br/>

            Votre genre : <?php echo $_SESSION['user']->getMyGender(); ?> <br/>
            <select name="Gender">
                <option value="Homme">
                    Homme
                </option>
                <option value="Femme">
                    Femme
                </option>
                <option value="Autre">
                    Autre
                </option>
            </select>
            <br/>
        </p>

        <button type="submit" name="button" value="changeInfo"> Enregistrer </button> <br/>

    </form>


<?php
end_page();
?>