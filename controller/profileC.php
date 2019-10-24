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
    'email',
    'password'
);
if (!in_array($s_action, $a_editable_user)) {
    echo "error l.25";
    die();
}

switch ($s_action) {
    case 'nickname' :
        if ($_POST['nickname'] != null) {
            changePseudo($_POST['nickname']);
            $_SESSION['user']->setMyPseudo($_POST['nickname']);
        }
        break;
    case 'surname' :
        if ($_POST['surname'] != NULL) {
            changeSurname($_POST['surname']);
            $_SESSION['user']->setMySurname($_POST['surname']);
        }
        break;
    case 'firstname' :
        if ($_POST['firstname'] != NULL) {
            changeName($_POST['firstname']);
            $_SESSION['user']->setMyName($_POST['firstname']);
        }
        break;
    case 'birthday' :
        //  on récupère la date actuelle pour voir si l'utilisateur a plus de 13 ans.
        $d_actualdate = new DateTime(date("Y-m-d"));
        $d_postdate = new DateTime($_POST['birthday']);
        if ($_POST['birthday'] != null && ($d_actualdate->diff($d_postdate)->format('%y') >= 13)) {
            changeBirth($d_birth);
            $_SESSION['user']->setMyBirth($d_birth);
        }
        break;
    case 'password' :
        if ($_POST['password'] != NULL) {
            $s_pwd = password_hash($_POST['password'], PASSWORD_DEFAULT);
            changePassword($s_pwd);
            $_SESSION['user']->setMyPassword($s_pwd);
        }
        break;
    // case 'email' :
    //     break;
    default:
        # code...
        break;
}
?>
