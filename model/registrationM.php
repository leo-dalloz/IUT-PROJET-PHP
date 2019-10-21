<?php


    require 'User.php';

    require_once 'dbTest.php';

    function registration($newUser)
    {
        $dbLink = dbConnect();



        $query =    'INSERT INTO User (admin, surname, name, pseudo, email,birthdate, password, gender)
                    VALUES (            \' 0 \',
                            \'' . $newUser->getMySurname() . '\',
                            \'' . $newUser->getMyName() . '\',
                            \'' . $newUser->getMyPseudo() . '\',
                            \'' . $newUser->getMyEmail() . '\',
                            \'' . $newUser->getMyBirth() . '\',
                            \'' . $newUser->getMyPassword() . '\',
                            \'' . $newUser->getMyGender() . '\')';

        if (!($dbResult = mysqli_query($dbLink, $query)))
        {
            echo 'Erreur de requête<br/>';
            //Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
            //Affiche la requête envoyée.
            echo 'Requête : ' . $query . '<br/>';
            exit();
        }

    }


