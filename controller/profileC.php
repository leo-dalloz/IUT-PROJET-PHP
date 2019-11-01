<?php
    /*
        @brief : controler modification du profile de l'utilisateur
        @Authors : Jeremy & Audrey
    */

    require '../model/profileM.php';
    session_start();
    if($_SESSION['login']!='ok')
    {
        die('Erreur d\'authentification');
    }
    
    
    // Test si l'utilisateur arrive sur ce lien sans action définie au préalable
    if (!isset($_GET['action'])) {
        echo "error l.10";
        die();
    }
    $s_action = $_GET['action'];


    // Test pour savoir si le $_GET n'a pas été modifié par l'utilisateur
    $a_editable_user = array(   'nickname',
                                'surname',
                                'firstname',
                                'birthday',
                                'gender',
                                'password'
                            );
                            
    switch ($s_action) {
        case 'nickname' :
            if ($_POST['nickname'] != null) {
                changePseudo($_POST['nickname']);
                $_SESSION['user']->setMyPseudo($_POST['nickname']);
                header ('location: ../view/profileV.php?success=Le profil a été modifié avec succès');
            } else {
                header ('location: ../view/modificationProfileV.php?action=nickname&error=Pseudo invalide');
            }
            break;
        case 'surname' :
            if ($_POST['surname'] != NULL) {
                changeSurname($_POST['surname']);
                $_SESSION['user']->setMySurname($_POST['surname']);
                header ('location: ../view/profileV.php?success=Le profil a été modifié avec succès');
            } else {
		        header ('location: ../view/modificationProfileV.php?action=surname&error=Nom de famille invalide');
	        }
            break; 
        case 'firstname' :
            if ($_POST['firstname'] != NULL) {
                changeName($_POST['firstname']);
                $_SESSION['user']->setMyName($_POST['firstname']);
                header ('location: ../view/profileV.php?success=Le profil a été modifié avec succès');
            }else {
		        header ('location: ../view/modificationProfileV.php?action=firstname&error=Prénom invalide');
            }
            break; 
        case 'birthday' :
            //  on récupère la date actuelle pour voir si l'utilisateur a plus de 13 ans. 
            $d_actualdate = new DateTime(date("Y-m-d"));   
            $d_postdate = new DateTime($_POST['birthday']);

            if ($_POST['birthday'] != null && ($d_actualdate->diff($d_postdate)->format('%y') >= 13)) {
                changeBirth($_POST['birthday']);
                $_SESSION['user']->setMyBirth($_POST['birthday']);
                header ('location: ../view/profileV.php?success=Le profil a été modifié avec succès');
            } else {
		        header ('location: ../view/modificationProfileV.php?action=birthday&error=Date vide ou vous ne pouvez pas avoir avoir moins de 13 ans');
	        }
            break;
        case 'gender' :
            if ($_POST['gender'] != NULL && ($_POST['gender'] == 'Homme' || $_POST['gender'] == 'Femme')) {
                changeGender($_POST['gender']);
                $_SESSION['user']->setMyGender($_POST['gender']);
                header ('location: ../view/profileV.php?success=Le profil a été modifié avec succès');
            } else {
                header ('location: ../view/modificationProfileV.php?action=gender&error=Genre vide ou invalide');
            }
            break;
        default:
            header ('location: ../view/modificationProfileV.php?action=gender&error=Champs non modifiable');
            break;
    }
?>