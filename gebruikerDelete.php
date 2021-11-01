<?php
// Pathprefix
$pathprefix = '../../';

// Requests users
// $gebruikers = new Gebruiker();
// $gebruikers->gebruikersOphalen();

// Includes user class
include_once('gebruiker_functies.php');
$gebruiker = new Gebruiker();

// If delete button is clicked delete the user
if(isset($_POST['verwijderen']))
{    
    $gebruiker->gebruikerVerwijderen($_POST['verwijderen']);
    header("location:gebruikers.php");
} else {
    header("location:fail.php");
    die;
}
?>