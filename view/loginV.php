<?php
    require '../utils.inc.php';

    start_page('Page de connexion');
?>



    <h1>Page de connexion</h1>


    <form action="../Controller/loginC.php" method="post">
        <input type="text" name="Pseudo" placeholder="Pseudo" /> <br/>
        <input type="password" name="Pwd" placeholder="Mot de passe"/> <br/>
        <?php if ($_GET['step'] == 'error')
            echo 'L\'identifiant et le mot de passe ne correspondent pas'?>
        <br/>
        <input type="submit" name="action" value="Login"/> <br/>
    </form>


<?php
    end_page();
?>