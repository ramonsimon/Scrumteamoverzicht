<?php
// Pathprefix
$pathprefix = '../../';

// Requests users
// $gebruikers = new Gebruiker();
// $gebruikers->gebruikersOphalen();

// Includes user class
include_once('gebruiker_functies.php');
$gebruiker = new Gebruiker();

// If submit is clicked update the user
if(isset($_POST['submit']))
{    
    $id = $_POST['id'];
    $gebruikersnaam = $_POST['gebruikersnaam'];
    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $wachtwoord = $_POST['wachtwoord'];
    if (isset($wachtwoord) && $wachtwoord != '') {
        // Password hash
        $wachtwoord = password_hash($_POST['wachtwoord'], PASSWORD_DEFAULT);
        $gebruiker->gebruikerWijzigenMetWachtwoord($id, $gebruikersnaam, $wachtwoord, $voornaam, $achternaam);
    } else {
        $gebruiker->gebruikerWijzigen($id, $gebruikersnaam, $voornaam, $achternaam);
    }
} else {
    header("location:fail");
    die;
}