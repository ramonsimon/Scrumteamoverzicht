<?php
// Pathprefix
$pathprefix = '../../';

// Requests users
// $gebruikers = new Gebruiker();
// $gebruikers->gebruikersOphalen();

// Start session
session_start();

//// Check if user should be able to access this page
// include_once('loginCheck.php');
// $check = new LoginCheck();
// $check->checkLogin(1);

// Includes user class
include_once('groepen_functies.php');
$groep = new Groep();

// If submit is clicked update the user
if(isset($_POST['submit']))
{   
    $id = $_POST['id'];
    $locatie = $_POST['locatie'];
    $groep->locatieWijzigen($id, $locatie);
} else {
    header("location:fail.php");
    die;
}

