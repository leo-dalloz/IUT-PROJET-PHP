<?php
    require '../utils.inc.php';

    start_page('Page d\'inscription');


?>


<?php
    $s_error = $_GET['error'];

    if ($s_error == 'wrong')
        $s_error = 'Vous n\'avez pas rempli un des champs.';
    else if ($s_error == 'pwd')
        $s_error = 'Les mots de passe sont différents.';
    else if ($s_error == 'pseudo')
        $s_error = 'Le pseudo que vous avez choisi est déjà utilisé.';
    else if ($s_error == 'email')
        $s_error = 'L\'email que vous avez choisi possède déjà un compte associé.';
    else
        $s_error = '';


?>


    <h1>Page d'inscription</h1>


    <form action="../Controller/registrationC.php" method="post">
        <input type="text" name="Surname" placeholder="Prénom" /> <br/>
        <input type="text" name="Name" placeholder="Nom" /> <br/>
        <input type="text" name="Pseudo" placeholder="Pseudo" /> <br/>
        <input type="email" name="Email" placeholder="E-Mail"/> <br/>
        Date de Naissance : <br/>
        <input type="date" name="Birth" placeholder="Date de naissance"/> <br/>
        <input type="password" name="Pwd" placeholder="Mot de passe"/> <br/>
        <input type="password" name="Pwd2" placeholder="Verification du mot de passe"/> <br/>
        <?php echo '<strong>' . $s_error . '</strong><br/>' ?>
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
        <input type="submit" name="action" value="Registration"/> <br/>
    </form>


<?php
    end_page();
?>