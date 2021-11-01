<?php
// Pathprefix
$pathprefix = '../../';

// Requests users
// $gebruikers = new Gebruiker();
// $gebruikers->gebruikersOphalen();

// Includes user class
include_once('groepen_functies.php');
$groep = new groep();

// If delete button is clicked delete the user
if(isset($_POST['verwijderen']))
{    
    $groep->groepVerwijderen($_POST['verwijderen']);
    header("location:groepen.php");
} else {
    header("location:fail.php");
    die;
}
?>