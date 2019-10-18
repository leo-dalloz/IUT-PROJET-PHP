<?php


    function dbConnect()
    {
        $dbLink = mysqli_connect("mysql-projet-iut-info.alwaysdata.net",
            "191346_admin",
            "jullazone")
        or die('Erreur de connexion au serveur : ' . mysqli_connect_error());

        mysqli_select_db($dbLink, "projet-iut-info_projetphp")
        or die('Erreur dans la sélection de la base : ' . mysqli_error($dbLink));

        return $dbLink;
    }