<?php

    // Start session
    session_start();

    $pathprefix = '../';

    // Incude necessary files
// Includes user class
include_once('gebruiker_functies.php');
$gebruiker = new Gebruiker();

    // If login is clicked
    if(isset($_POST['login']))
    {
        //print_r($_POST);

        // Set login variables
        $username = $_POST['gebruikersnaam'];
        $password = $_POST['wachtwoord'];

        $gebruiker->checklogin($username, $password);

//      print_r($gebruiker);
        // Checks if user exists and requests data
//        $results = $user->checkLogin($username);
////        // print_r($results);
//        if($results != null)
//        {
            // Verifies the $_POST password on the hashed password
//            if(password_verify($password, $results['wachtwoord']))
//            {
//                // Sets the session variables
//                $_SESSION['id'] = $results['id'];
//                $_SESSION['rol'] = $results['rol'];
//                $_SESSION['loggedin'] = true;

        if ($_SESSION['loggedin'] == true  ) {


//            // Checks on role
            if ($_SESSION['rol'] == 1) {
                $_SESSION['rol'];
                header("Location:dashboard.php");
            } elseif ($_SESSION['rol'] == 0) {
                echo $_SESSION['rol'];
                header("Location:student.php");
            } else {
                // Error message
                $_SESSION['message'] = '<i class="fas fa-exclamation-circle"></i> Geen geldige rol om in te loggen';
                header("Location:index.php");
            }
        }

        if($_SESSION['loggedin'] == false){
//             Error message
                $_SESSION['message'] = '<i class="fas fa-exclamation-circle"></i> Incorrecte gebruikersnaam of wachtwoord';
                header("Location:index.php");
        }
//            {
//                // Error message
//                $_SESSION['message'] = '<i class="fas fa-exclamation-circle"></i> Incorrecte gebruikersnaam of wachtwoord';
//                header("Location:index.php");
//            }
//        }else
//        {
//            // Error message
//            $_SESSION['message'] = '<i class="fas fa-exclamation-circle"></i> Incorrecte gebruikersnaam of wachtwoord';
//            header("Location:index.php");
//        }

   }
?>