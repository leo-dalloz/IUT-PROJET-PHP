<?php
    $title = 'Inscription';
    $style_common = '../assets/css/connexion-inscription.css';
    $style = '../assets/css/inscription.css';


    // Gestion des erreurs de connexion
    // Jeremy
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

    ob_start();
?>

	<main>
        <a id="LogoMainContainer" href="indexV.php">
            <img id="LogoMain" src="https://imagizer.imageshack.com/img922/7716/Xxjiro.png" alt="logo FreeNote">
        </a>

        <section id="PageTitleContainer">
            <p id="PageTitle">
                Créer votre compte
            </p>
        </section>

        <section id="FormContainer">
            <form action="" method="post">
                <input type="text" name="Nom"  class="FormInput" placeholder="Nom">
                <input type="text" name="Prenom"  class="FormInput" placeholder="Prénom">
                <input type="text" name="Pseudo" class="FormInput" placeholder="Pseudo">

                <select name="Gender" class="FormInput">
                    <option class="OptionInput" value="H">
                        Homme
                    </option>
                    <option class="OptionInput" value="M">
                        Femme
                    </option>
                    <option class="OptionInput" value="NS">
                        Non spécifié
                    </option>
                </select>

                <input type="email" name="Email" class="FormInput" placeholder="Adresse Mail">

                <input type="date" name="Naissance" class="FormInput" placeholder="Date">

                <input type="password" name="Pwd" class="FormInput" placeholder="Mot de passe">
                <input type="password" name="Pwd1" class="FormInput" placeholder="Confirmer mot de passe">

                <div id="SubmitContainer">
                    <input id="submitButton" type="submit" value="S'inscrire">
                </div>
            </form>

            <p id="LoginLink">
                Vous possédez déja un compte ? <a href="loginV.php">Se connecter</a>
            </p>
        </section>

    </main>

<?php
	$content = ob_get_clean();
	require('../template_empty.php');
?>
