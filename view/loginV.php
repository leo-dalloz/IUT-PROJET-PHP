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
                    <!-- On est obligé de rediriger vers mon serveur pour pouvoir envoyer un email car le serveur du groupe est considéré comme spam
                        à cause des testes -->
                    <a id="ForgotPwdLink" href="http://laurent-vouriot.alwaysdata.net/PROJET-PHP/view/newPwdV.php">Mot de passe oublié ?</a>
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
