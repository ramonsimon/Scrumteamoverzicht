<?php
// Pathprefix
$pathprefix = '../';
 
// Start session
session_start();
 
// Includes user class
include_once('gebruiker_functies.php');
$gebruiker = new Gebruiker();

// If edit page submitted
if(isset($_POST['submit']))
{    
    $id = $_POST['id'];

    // Hashes new password
    $nieuwWachtwoord = password_hash($_POST['wachtwoord'], PASSWORD_DEFAULT);
    $oudwachtwoord = $_POST['oud-wachtwoord'];

    // Gets userdata
    $gebruikersGegevens = $gebruiker->gebruikerOphalen($id);

    // Loop through userdata
    foreach($gebruikersGegevens as $gebruikersGegeven)
    {
    
    }

    echo $oudwachtwoord;

    //Checks if the old password matches the one from the database
    if(password_verify($oudwachtwoord, $gebruikersGegeven['wachtwoord']))
    {
        // Edit password
        $gebruiker->wachtwoordWijzigen($id, $nieuwWachtwoord);
    }
    else
    {
        // Error page
        header("location:fail.php");
        die;
    }
}
?>