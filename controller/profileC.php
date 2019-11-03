<?php
require '../model/User.php';
session_start();
if($_SESSION['login']!='ok')
{
    header('Location: ../controller/indexC.php');
}
$isConnected = $_SESSION['login'];
if (isset($_GET['error']))
    $s_error = $_GET['error'];
else
    $s_error = 0;
if (isset($_GET['success']))
    $s_success = $_GET['success'];
else
    $s_success = '';
$s_pseudo = $_SESSION['user']->getMyPseudo();
$s_name = $_SESSION['user']->getMyName();
$s_surname = $_SESSION['user']->getMySurname();
$s_birth = $_SESSION['user']->getMyBirth();
$s_gender = $_SESSION['user']->getMyGender();
$s_email = $_SESSION['user']->getMyEmail();
require '../view/profileV.php';
