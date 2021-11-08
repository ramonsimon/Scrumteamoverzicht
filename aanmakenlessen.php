<?php

// Pathprefix
$pathprefix = '../../';

// request gebruikers
include_once('lessen_functies.php');

// Start session
session_start();

//// Check if user should be able to access this page
include_once('loginCheck.php');
$check = new LoginCheck();
$check->checkLogin(1);

// Requests users
$les = new Les();
$les->lessenOphalen();

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
<h1 class="text-3xl text-center">Les aanmaken</h1>
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
            <div class="flex flex-wrap mb-6">
                <div class="flex"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"><a href="lessen.php" class="btn-primary"><i class="fas fa-arrow-left"></i> Terug</a></button></div>
                </div>
		</div>
    <form action="lesInsert.php" method="post">
            <div class="mt-1 focus:ring-black-500 focus:border-black-500 block w-full shadow-sm sm:text-sm border-black-900 rounded-md">
                <div class="flex-inherit w-60"><label class="font-semibold leading-10">Lesnaam:</label></div>
                <div class="flex-grow"><input type="text" name="lesnaam" class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" required /></div>
            </div>
            <div class="mt-1 focus:ring-black-500 focus:border-black-500 block w-full shadow-sm sm:text-sm border-black-900 rounded-md">
                <div class="flex-inherit w-60"><label class="font-semibold leading-10" leading-10>Lokaal:</label></div>
                <div class="flex-grow"><input type="text" name="lokaal" class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" required /></div>
            </div>
            <div class="mt-1 focus:ring-black-500 focus:border-black-500 block w-full shadow-sm sm:text-sm border-black-900 rounded-md">
                <div class="flex-inherit w-60"><label class="font-semibold leading-10" leading-10>Dag:</label></div>
                <div class="flex-grow"><input type="text" name="dag" class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" required /></div>
            </div>
            <div class="mt-1 focus:ring-black-500 focus:border-black-500 block w-full shadow-sm sm:text-sm border-black-900 rounded-md">
                <div class="flex-inherit w-60"><label class="font-semibold leading-10">Starttijd:</label></div>
                <div class="flex-grow"><input type="time" name="starttijd" class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" required /></div>
            </div>
            <div class="mt-1 focus:ring-black-500 focus:border-black-500 block w-full shadow-sm sm:text-sm border-black-900 rounded-md">
                <div class="flex-inherit w-60"><label class="font-semibold leading-10">Eindtijd:</label></div>
                <div class="flex-grow"><input type="time" name="eindtijd" class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" required /></div>
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
                            </div>
                        </div>
                    </div>
                </form>

</body>
</html>