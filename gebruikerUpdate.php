<?php
session_start();
// Pathprefix
$pathprefix = '../../';

// Requests users
// $gebruikers = new Gebruiker();
// $gebruikers->gebruikersOphalen();


// Includes user class
include_once('gebruiker_functies.php');
$gebruiker = new Gebruiker();

// If submit is clicked update the user
if(isset($_POST['submit'])) {
    $id = $_POST['id'];
    $gebruikersnaam = $_POST['gebruikersnaam'];
    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $groepid = $_POST['groepid'];
    $wachtwoord = $_POST['wachtwoord'];
    $rol = 1;
    $jwt = $_SESSION['jwt'];

    $gebruiker->gebruikerWijzigen($id, $gebruikersnaam, $voornaam, $achternaam, $rol, $groepid, $wachtwoord, $jwt);
}