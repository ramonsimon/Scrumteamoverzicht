<?php
// Pathprefix
$pathprefix = '../../';

// Requests users
// $gebruikers = new Gebruiker();
// $gebruikers->gebruikersOphalen();

// Start session
session_start();

//// Check if user should be able to access this page
include_once('loginCheck.php');
$check = new LoginCheck();
$check->checkLogin(1);

// Includes user class
include_once('lessen_functies.php');
$les = new Les();

// If submit is clicked update the user
if(isset($_POST['submit']))
{    
    $id = $_POST['id'];
    $lesnaam = $_POST['lesnaam'];
    $lokaal = $_POST['lokaal'];
    $dag = $_POST['dag'];
    $starttijd = $_POST['starttijd'];
    $eindtijd = $_POST['eindtijd'];
    $les->lesWijzigen($id, $lesnaam, $lokaal, $dag, $starttijd, $eindtijd);
} else {
    header("location:fail.php");
    die;
}
