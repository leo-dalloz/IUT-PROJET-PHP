<?php
<<<<<<< HEAD

=======
>>>>>>> leoDevelop
session_start();
if($_SESSION['login']!='ok')
{
    die('Erreur d\'authentification');
}
session_destroy();
<<<<<<< HEAD

=======
>>>>>>> leoDevelop
header('Location: ../controller/indexC.php');