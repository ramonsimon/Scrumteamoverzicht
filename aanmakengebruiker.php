<?php

// Pathprefix
$pathprefix = '../../';

// request gebruikers
include_once('gebruiker_functies.php');

// Start session
session_start();

//// Check if user should be able to access this page
include_once('loginCheck.php');
$check = new LoginCheck();
$check->checkLogin(1);

// Requests users
$gebruiker = new Gebruiker();
$gebruiker->gebruikersOphalen();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css">
	<link href="src/tailwind.css" rel="stylesheet">
	<link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
	<link href="assets/fontawesome/css/solid.css" rel="stylesheet">
	<script type="text/javascript" src="assets/navbar.js"></script>
    <?php include 'navbarvoorbeeld.php' ?>
</head>

<body>
<div class="hidden sm:block" aria-hidden="true">
  <div class="py-5">
    <div class="border-t border-gray-200"></div>
  </div>
</div>


<div class="mt-5 md:mt-0 md:col-span-2">
    <div class="shadow overflow-hidden sm:rounded-md">
        <div class="px-4 py-5 bg-white sm:p-6">
            <div class="col-span-6 sm:col-span-3">
                <div class="pagewrapper">
                    <div class="flex flex-wrap mb-6">
                        <div class="h-10 flex-0 sm:flex-initial mr-6"><a class="btn-primary" href="gebruikers.php"><i class="fas fa-arrow-left"></i> Terug</a></div>
                        <div class="h-10 leading-10 flex-0 sm:flex-grow mt-4 sm:mt-0"><h1 class="leading-6">Gebruiker toevoegen</h1></div>
                    </div>
                    <form action="gebruikerInsert.php" method="post">
                        <div class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            <div class="flex-inherit w-60"><label class="font-semibold leading-10">Gebruikersnaam:</label></div>
                            <div class="flex-grow"><input type="text" name="gebruikersnaam" class="input" required /></div>
                        </div>

                        <div class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            <div class="flex-inherit w-60"><label class="font-semibold leading-10" leading-10>Wachtwoord:</label></div>
                            <div class="flex-grow"><input type="password" name="wachtwoord" class="input" required /></div>
                        </div>
                        <div class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            <div class="flex-inherit w-60"><label class="font-semibold leading-10">Voornaam:</label></div>
                            <div class="flex-grow"><input type="text" name="voornaam" class="input" required /></div>
                        </div>
                        <div class="mt-1 focus:ring-black-500 focus:border-black-500 block w-full shadow-sm sm:text-sm border-black-900 rounded-md">
                            <div class="flex-inherit w-60"><label class="font-semibold leading-10">Achternaam:</label></div>
                            <div class="flex-grow"><input type="text" name="achternaam" class="input" required /></div>
                        </div>
                        </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button type="submit" name="submit" value="Toevoegen" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Opslaan
                        </button>
                        </form>
                        </div>
                        </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>