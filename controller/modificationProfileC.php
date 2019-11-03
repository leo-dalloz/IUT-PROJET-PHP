<?php
/*
    @brief : controller modification du profile de l'utilisateur
    @Authors : Audrey
*/
require '../model/profileM.php';
session_start();
if( 'ok' != $_SESSION['login'])
{
    header('Location: ../controller/indexC.php');
}
$isConnected = $_SESSION['login'];



if (isset($_GET['action'])) {
    $s_action = $_GET['action'];
// Test pour savoir si le $_GET n'a pas été modifié par l'utilisateur
    $a_editable_user = array('nickname',
        'surname',
        'firstname',
        'birthday',
        'gender',
        'password'
    );
    if (!in_array($s_action, $a_editable_user)) {
        echo "error l.25";
        die();
    }
    if (isset($_POST['submitAction'])) {

        switch ($s_action) {
            case 'nickname' :
                if ($_POST['nickname'] != null) {
                    changePseudo($_POST['nickname']);
                    $_SESSION['user']->setMyPseudo($_POST['nickname']);
                    header('location: ../controller/profileC.php?success=Le profil a été modifié avec succès');
                } else {
                    header('location: ../controller/modificationProfileC.php?action=nickname&error=Pseudo invalide');
                }
                break;
            case 'surname' :
                if ($_POST['surname'] != NULL) {
                    changeSurname($_POST['surname']);
                    $_SESSION['user']->setMySurname($_POST['surname']);
                    header('location: ../controller/profileC.php?success=Le profil a été modifié avec succès');
                } else {
                    header('location: ../controller/modificationProfileC.php?action=surname&error=Nom de famille invalide');
                }
                break;
            case 'firstname' :
                if ($_POST['firstname'] != NULL) {
                    changeName($_POST['firstname']);
                    $_SESSION['user']->setMyName($_POST['firstname']);
                    header('location: ../controller/profileC.php?success=Le profil a été modifié avec succès');
                } else {
                    header('location: ../controller/modificationProfileC.php?action=firstname&error=Prénom invalide');
                }
                break;
            case 'birthday' :
                //  on récupère la date actuelle pour voir si l'utilisateur a plus de 13 ans.
                $d_actualdate = new DateTime(date("Y-m-d"));
                $d_postdate = new DateTime($_POST['birthday']);
                if ($_POST['birthday'] != null && ($d_actualdate->diff($d_postdate)->format('%y') >= 13)) {
                    changeBirth($_POST['birthday']);
                    $_SESSION['user']->setMyBirth($_POST['birthday']);
                    header('location: ../controller/profileC.php?success=Le profil a été modifié avec succès');
                } else {
                    header('location: ../controller/modificationProfileC.php?action=birthday&error=Date vide ou vous ne pouvez pas avoir avoir moins de 13 ans');
                }
                break;
            case 'gender' :
                if ($_POST['gender'] != NULL && ($_POST['gender'] == 'Homme' || $_POST['gender'] == 'Femme')) {
                    changeGender($_POST['gender']);
                    $_SESSION['user']->setMyGender($_POST['gender']);
                    header('location: ../controller/profileC.php?success=Le profil a été modifié avec succès');
                } else {
                    header('location: ../controller/modificationProfileC.php?action=gender&error=Genre vide ou invalide');
                }
                break;
            case 'password' :
                if ($_POST['password'] != NULL && (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])#', $_POST['password']) && strlen($_POST['password']) > 8)) {
                    changePassword($_POST['password']);
                    //$_SESSION['user']->setMyGender($_POST['gender']); faux à changer plus tard
                    header('location: ../controller/profileC.php?success=Le profil a été modifié avec succès');
                } else {
                    header('location: ../controller/modificationProfileC.php?action=password&error=Mot de passe invalide ou ne respectant pas les critères de sécurité');
                }
                break;
            default:
                header('location: ../controller/modificationProfileC.php?action=gender&error=Champs non modifiable');
                break;
        }
    }
}

if (isset($_GET['error']))
    $s_error = $_GET['error'];
else
    $s_error = '';


require '../view/modificationProfileV.php';

