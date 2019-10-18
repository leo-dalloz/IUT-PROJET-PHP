<?php





    require'checkM.php';

    require 'User.php';
    session_start();
    if($_SESSION['login']!='ok')
    {
        die('Erreur d\'authentification');
    }


    function changeSurname ($s_newSurname)
    {

        if($s_newSurname == NULL)
        {
            header('Location: ../View/profileV.php?error=1');
        }
        $dbLink = dbConnect();


        $query = 'UPDATE `User` SET surname = \'' . $s_newSurname . '\' WHERE pseudo = \'' . $_SESSION['user']->getMyPseudo() . '\'' ;

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

    function changeName ($s_newName)
    {

        if($s_newName == NULL)
        {
            header('Location: ../View/profileV.php?error=2');
        }

        $dbLink = dbConnect();

        $query = 'UPDATE `User` SET name = \'' . $s_newName . '\' WHERE pseudo = \'' . $_SESSION['user']->getMyPseudo() . '\'' ;

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

    function changePseudo ($s_newPseudo)
    {
        if (checkPseudo($s_newPseudo))
        {
            header('Location: ../View/profileV.php?error=3');
        }
        else if($s_newPseudo == NULL)
        {
            header('Location: ../View/profileV.php?error=4');
        }

        $dbLink = dbConnect();

        $query = 'UPDATE `User` SET pseudo = \'' . $s_newPseudo . '\' WHERE pseudo = \'' . $_SESSION['user']->getMyPseudo() . '\'' ;

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

    function changeBirth ($d_newBirth)
    {
        if($d_newBirth == NULL)
        {
            header('Location: ../View/profileV.php?error=5');
        }

        $dbLink = dbConnect();

        $query = 'UPDATE `User` SET birthdate = \'' . $d_newBirth . '\' WHERE pseudo = \'' . $_SESSION['user']->getMyPseudo() . '\'' ;

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

    function changePassword ($s_newPassword)
    {
        if($s_newPassword == NULL)
        {
            header('Location: ../View/profileV.php?error=6');
        }

        $dbLink = dbConnect();

        $query = 'UPDATE `User` SET password = \'' . $s_newPassword . '\' WHERE pseudo = \'' . $_SESSION['user']->getMyPseudo() . '\'' ;

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

    function changeGender ($s_newGender)
    {

    $dbLink = dbConnect();

    $query = 'UPDATE `User` SET gender = \'' . $s_newGender . '\' WHERE pseudo = \'' . $_SESSION['user']->getMyPseudo() . '\'' ;

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

