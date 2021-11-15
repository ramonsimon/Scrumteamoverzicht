<?php
// Pathprefix
$pathprefix = '../../';

// Requests users
// $gebruikers = new Gebruiker();
// $gebruikers->gebruikersOphalen();

// Start session
session_start();

//// Check if user should be able to access this page
include_once('loginCheck.php');
$check = new LoginCheck();
$check->checkLogin(1);

// Includes user class
include_once('gebruiker_functies.php');
$gebruiker = new Gebruiker();
$jwt = $_SESSION['jwt'];
// If delete button is clicked delete the user
if(isset($_POST['verwijderen']))
{    
    $gebruiker->gebruikerVerwijderen($_POST['verwijderen'], $jwt);
    header("location:gebruikers.php");
} else {
    header("location:fail.php");
    die;
}
?>