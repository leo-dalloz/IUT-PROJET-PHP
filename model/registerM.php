<?php
require 'User.php';
require_once 'dbTest.php';
function registration($newUser)
{
    $dbLink = dbConnect();
    $query =    'INSERT INTO User (admin, name , surname, pseudo, email,birthdate, password, gender)
                    VALUES (            \' 0 \',
                            \'' . $newUser->getMyName(). '\',
                            \'' . $newUser->getMySurname() . '\',
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