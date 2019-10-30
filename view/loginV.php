<?php
    $title = 'Connexion';
    $style_common = '../assets/css/connexion-inscription.css';
    $style = '../assets/css/connexion.css';

    ob_start()
?>

    <main>
        <a id="LogoMainContainer" href="index.php">
            <img id="LogoMain" src="../assets/images/test2.png" alt="logo FreeNote">
        </a>

        <section id="PageTitleContainer">
            <p id="PageTitle">
                Connexion
            </p>
            <p id="PageDescription">
                Accéder à FreeNote
            </p>
        </section>

        <section id="FormContainer">
            <form action="../controller/loginC.php" method="post">
                <input type="text" name="Pseudo" placeholder="Pseudo" /> <br/>

                <div id="PwdContainer">
                    <input type="password" name="Pwd" placeholder="Mot de passe"/> <br/>
                    <a id="ForgotPwdLink" href="../controller/newPwdC.php">Mot de passe oublié ?</a>
                </div>

                <div id="RememberContainer">
                    <input type="checkbox" name="rememberC" id="rememberC">
                    <label id="rememberCLabel" for="rememberC">Se souvenir de moi</label>
                </div>
                <?php if (isset($_GET['step']) && $_GET['step'] == 'error') {?>
                    <div id="ErrorContainer">
                        <p id="Error">
                            <?= 'L\'identifiant et le mot de passe ne correspondent pas' ?>
                        </p>
                    </div>
                <?php } ?>


                <div id="SubmitContainer">
                    <input id="submitButton" type="submit" value="Se connecter">
                </div>
            </form>

            <p id="RegisterLink">
                Nouveau sur FreeNote ? <a href="registerV.php">S'inscrire maintenant</a>
            </p>

        </section>
    </main>

<?php
    $content = ob_get_clean();
    require('../template_empty.php');
?>
