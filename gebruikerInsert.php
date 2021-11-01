<?php

// Pathprefix
$pathprefix = '../../';

// Requests users
// $gebruikers = new Gebruiker();
// $gebruikers->gebruikersOphalen();

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
    $gebruiker->gebruikerToevoegen($gebruikersnaam, $wachtwoord, $voornaam, $achternaam);
} else {
    header("location:fail.php");
    die;
}
?>