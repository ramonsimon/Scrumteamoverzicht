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
$check->checkLogin(1);

// Requests users
$groep = new Groep();
$groep->groepenOphalen();

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
<br>
<h1 class="text-3xl text-center">Groep aanmaken</h1>
<div class="pagewrapper">
    
<div class="px-4 py-5 bg-white sm:p-6">
<a href="groepen.php" class="btn-primary"><button class="bg-blue-700 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded"><i class="fas fa-arrow-left"></i> Terug</button></a>
</div>

<div class="px-4 py-5 bg-white sm:p-6">
    <div class="shadow overflow-hidden sm:rounded-md">
        <div class="px-4 py-5 bg-white sm:p-6">
            <div class="col-span-6 sm:col-span-3">
                                      
               
                                        </div>
                                            <form action="groepInsert.php" method="post">
                                                        <div class="flex flex-wrap my-4">
                                                            <div class="flex-inherit w-60"><label class="font-semibold leading-10">Groepnaam:</label></div>
                                                            <div class="flex-grow"><input type="text" name="groepnaam" class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" required /></div>
                                                        </div>
                                                        <div class="flex flex-wrap my-4">
                                                        <div class="flex-inherit w-60"><label class="font-semibold leading-10" leading-10>Locatie:</label></div>
                                                        <div>
                                                        <select name="locatie" class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" id="locatie" required>
                                                            <option selected="true" disabled="disabled" value="">--Selecteer locatie--</option>
                                                            <option value="Tafel 1">Tafel 1</option>
                                                            <option value="Tafel 2">Tafel 2</option>
                                                            <option value="Tafel 3">Tafel 3</option>
                                                            <option value="Tafel 4">Tafel 4</option>
                                                            <option value="Cabine 1">Cabine 1</option>
                                                            <option value="Cabine 2">Cabine 2</option>
                                                            <option value="Cabine 3">Cabine 3</option>
                                                            <option value="Cabine 4">Cabine 4</option>
                                                            <option value="C104">C104</option>
                                                            <option value="Kantine">Kantine</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                        <div class="flex flex-wrap my-4">
                                                            <div class="flex-inherit w-60"><label class="font-semibold leading-10">Project:</label></div>
                                                            <div class="flex-grow"><input type="text" name="projectnaam" class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" required /></div>
                                                        </div>
                                                        <button type="submit" name="submit" value="Toevoegen" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Opslaan</button>
                                                    </div>
                                                </div>
                                          
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