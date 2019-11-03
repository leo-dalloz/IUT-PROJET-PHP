<?php

function dbConnect()
{
    $dbLink = mysqli_connect('mysql-projet-iut-info.alwaysdata.net', '191346_admin', 'jullazone')
    or die('Erreur de connexion au serveur : ' . mysqli_connect_error());
    mysqli_select_db($dbLink , 'projet-iut-info_projetphp')
    or die('Erreur dans la sélection de la base : ' . mysqli_error($dbLink));
    return $dbLink;
}
function testError($dbLink,$query)
{
    if(!($dbResult = mysqli_query($dbLink, $query)))
    {
        echo 'Erreur dans requête<br />';
        // Affiche le type d'erreur.
        echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
        // Affiche la requête envoyée.
        echo 'Requête : ' . $query . '<br/>';
        exit();
    }
    return $dbResult;
}