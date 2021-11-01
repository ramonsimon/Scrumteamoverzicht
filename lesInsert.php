<?php

// Pathprefix
$pathprefix = '../../';

// Requests users
// $gebruikers = new Gebruiker();
// $gebruikers->gebruikersOphalen();

// Includes user class
include_once('lessen_functies.php');
$les = new Les();

// If submit is clicked add a user
if(isset($_POST['submit']))
{    
    $lesnaam = $_POST['lesnaam'];
    $lokaal = $_POST['lokaal'];
    $starttijd = $_POST['starttijd'];
    $eindtijd = $_POST['eindtijd'];
    $les->lesToevoegen($lesnaam, $lokaal, $starttijd, $eindtijd);
} else {
    header("location:fail.php");
    die;
}
?>