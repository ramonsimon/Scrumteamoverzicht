<?php
// Pathprefix
$pathprefix = '../../';

// Requests users
// $gebruikers = new Gebruiker();
// $gebruikers->gebruikersOphalen();

// Includes user class
include_once('lessen_functies.php');
$les = new Les();

// If submit is clicked update the user
if(isset($_POST['submit']))
{    
    $id = $_POST['id'];
    $lesnaam = $_POST['lesnaam'];
    $lokaal = $_POST['lokaal'];
    $starttijd = $_POST['starttijd'];
    $eindtijd = $_POST['eindtijd'];
    $les->lesWijzigen($id, $lesnaam, $lokaal, $starttijd, $eindtijd);
} else {
    header("location:fail.php");
    die;
}