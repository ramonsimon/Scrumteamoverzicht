<?php
// Pathprefix
$pathprefix = '../../';

// Requests users
// $gebruikers = new Gebruiker();
// $gebruikers->gebruikersOphalen();

// Includes user class
include_once('groepen_functies.php');
$groep = new Groep();

// If submit is clicked update the user
if(isset($_POST['submit']))
{    
    $id = $_POST['id'];
    $groepnaam = $_POST['groepnaam'];
    $leden = $_POST['leden'];
    $locatie = $_POST['locatie'];
    $projectnaam = $_POST['projectnaam'];
    $groep->groepWijzigen($id, $groepnaam, $leden, $locatie, $projectnaam);
} else {
    header("location:fail.php");
    die;
}

