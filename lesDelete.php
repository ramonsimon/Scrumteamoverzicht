<?php
// Pathprefix
$pathprefix = '../../';

// Requests users
// $gebruikers = new Gebruiker();
// $gebruikers->gebruikersOphalen();

// Includes user class
include_once('lessen_functies.php');
$les = new Les();

// If delete button is clicked delete the user
if(isset($_POST['verwijderen']))
{    
    $les->lesVerwijderen($_POST['verwijderen']);
    header("location:lessen.php");
} else {
    header("location:fail.php");
    die;
}
?>