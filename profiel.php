<?php

// Pathprefix
$pathprefix = '../../';

// request gebruikers
include_once('groepen_functies.php');

// Start session
session_start();

//// Check if user should be able to access this page
include_once('loginCheck.php');
$check = new LoginCheck();
$check->checkLogin(0);

// Requests users
$groep = new Groep();
$groep->groepenOphalen();

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css">
	<link href="src/tailwind.css" rel="stylesheet">
	<link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
	<link href="assets/fontawesome/css/solid.css" rel="stylesheet">
	<script type="text/javascript" src="assets/navbar.js"></script>
</head>

<body>
<div>
    <nav class="bg-blue-700 dark:bg-gray-800  shadow ">
        <div class="max-w-7xl mx-auto px-8">
            <div class="flex items-center justify-between h-16">
                <div class=" flex items-center">
                    <a class="flex-shrink-0" href="/">
                    <a class="text-white px-3 py-2 rounded-md text-sm font-medium">
                            ScrumTeamDashboard
                        </a>
                    </a>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <a class="text-white  hover:text-gray-400 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium"
                               href="student.php">
                                Dashboard
                            </a>
                            <a class="text-white  hover:text-gray-400 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium"
                               href="profiel.php">
                                Profiel
                            </a>
                        </div>
                    </div>
                </div>
                <div class="block">
                    <div class="ml-4 flex items-center md:ml-6">
                        <div class="ml-3 relative">
                            <div class="text-white hover:text-gray-400 dark:hover:text-white relative inline-block text-left">
                                <div>
                                <form class="inline" method="POST" action="logout.php">
									<button name="logout" value="uitloggen" type="submit"><i class="fas fa-sign-out-alt"></i> Uitloggen</button> 
								</form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="-mr-2 flex md:hidden">
                    <button class="text-gray-800 dark:text-white hover:text-gray-300 inline-flex items-center justify-center p-2 rounded-md focus:outline-none">
                        <svg width="20" height="20" fill="currentColor" class="h-8 w-8" viewBox="0 0 1792 1792"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M1664 1344v128q0 26-19 45t-45 19h-1408q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h1408q26 0 45 19t19 45zm0-512v128q0 26-19 45t-45 19h-1408q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h1408q26 0 45 19t19 45zm0-512v128q0 26-19 45t-45 19h-1408q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h1408q26 0 45 19t19 45z">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>
    </a>
</div>

<body>
<br>
<h1 class="text-3xl text-center">Wachtwoord wijzigen</h1>
<div class="pagewrapper">

<div class="px-4 py-5 bg-white sm:p-6">
<a href="student.php" class="btn-primary"><button class="bg-blue-700 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded"><i class="fas fa-arrow-left"></i> Terug</button></a>
</div>

<div class="px-4 py-5 bg-white sm:p-6">
    <div class="shadow overflow-hidden sm:rounded-md">
        <div class="px-4 py-5 bg-white sm:p-6">
            <div class="col-span-6 sm:col-span-3">

        <?php

        if ($_SESSION['id'] != null){
            echo '
               
            <form action="studentUpdate.php" method="post">
            <input type="text" value="'.  $_SESSION['id'] .'" name="id" class="hidden" required />
                
            <div class="flex flex-wrap my-4">
                <div class="flex-inherit w-60"><label class="font-semibold leading-10" leading-10>Oud Wachtwoord:</label></div>
                <div class="flex-grow"><input type="password" value="" name="oud-wachtwoord" id="" class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" /></div>
                </div>
            </div>

            <div class="flex flex-wrap my-4">
                <div class="flex-inherit w-60"><label class="font-semibold leading-10" leading-10>Nieuwe Wachtwoord:</label></div>
                <div class="flex-grow"><input type="password" value="" id="wachtwoord" name="wachtwoord" id="myInput" class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" /></div>
                </div>
               
                <button type="submit" name="submit" value="Wijzigen" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Wijzigen
                </button>
                </form>
                ';
            }else{
                echo '
                <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-800 w-100 md:w-80 m-auto">
                    <div class="w-full text-center">
                        <div class="flex flex-col justify-between">
                            <i class="my-2 fas fa-times text-red-400 text-4xl"></i>
                            <p class="text-md py-2 px-6 text-gray-800 dark:text-white font-bold">
                                Fout
                            </p>
                            <p class="text-gray-600 dark:text-gray-100 text-md py-2 px-6">
                                De gebruiker kan niet gewijzigd worden, omdat geen gebruiker is opgevraagd.
                            </p>
                            <div class="flex items-center justify-between gap-4 w-full mt-8">
                            <a class="btn-primary" href="student.php"><i class="fas fa-arrow-left"></i> Terug</a>
                            </div>
                        </div>
                    </div>
                </div>
                ';
            }
        ?>
    </div>
</body>
</html>