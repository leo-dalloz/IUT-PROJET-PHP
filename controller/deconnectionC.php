<?php
session_start();
if($_SESSION['login']!='ok')
{
    die('Erreur d\'authentification');
}
session_destroy();
header('Location: ../controller/indexC.php');