


<?php
    require '../utils.inc.php';
    require '../Model/User.php';

    session_start();
    if($_SESSION['login']!='ok')
    {
        die('Erreur d\'authentification');
    }

    start_page('Page de test');


?>




    <h1>Page de test</h1>

    <?php echo 'Etes vous un admin ? <br/>'
                . $_GET['admin'];?>




<?php
    end_page();
?>