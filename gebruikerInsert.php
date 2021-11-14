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
$jwt = $_SESSION['jwt'];

// Includes user class
include_once('gebruiker_functies.php');
$gebruiker = new Gebruiker();

// If submit is clicked add a user
if(isset($_POST['submit']))
{    
    $gebruikersnaam = $_POST['gebruikersnaam'];
    // Password hash
    $wachtwoord = password_hash($_POST['wachtwoord'], PASSWORD_DEFAULT);
    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    // $rol = $_POST['rol'];
    $gebruiker->gebruikerToevoegen($gebruikersnaam, $wachtwoord, $voornaam, $achternaam, $jwt);
} else {
    header("location:fail.php");
    die;
}
?>