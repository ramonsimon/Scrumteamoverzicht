<?php

// Pathprefix
$pathprefix = '../../';

// Gets the id of the user
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = null;
}

// Start session
session_start();

//// Check if user should be able to access this page
include_once('loginCheck.php');
$check = new LoginCheck();
$check->checkLogin(1);

// request gebruikers
include_once('lessen_functies.php');

$les = new Les();

// Gets user based on id
$les = $les->lessenOphalen($id);

// Loops through the user
foreach ($les as $singleLes){
    $les = $singleLes;
}

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
    <?php include 'navbarvoorbeeld.php' ?>
</head>

<body>
<br>
<h1 class="text-3xl text-center">Lessen wijzigen</h1>
<div class="pagewrapper">
<div class="px-4 py-5 bg-white sm:p-6">
<a href="lessen.php" class="btn-primary"><button class="bg-blue-700 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded"><i class="fas fa-arrow-left"></i> Terug</button></a>
</div>
<div class="px-4 py-5 bg-white sm:p-6">
        <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
    
        <?php
            if ($id != null){
                echo '
                
                <form action="lesUpdate.php" method="post">
                <input type="text" value="'.  $id .'" name="id" class="hidden" required />
                <div class="flex flex-wrap my-4">
                    <div class="flex-inherit w-60"><label class="font-semibold leading-10">Lesnaam:</label></div>
                    <div class="flex-grow"><input type="text" value="'.  $les['lesnaam'] .'" name="lesnaam" class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" required /></div>
                </div>
                <div class="flex flex-wrap my-4">
                    <div class="flex-inherit w-60"><label class="font-semibold leading-10">Lokaal:</label></div>
                    <div>
                    <select name="lokaal" class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                    <option selected="true" value="'.  $les['lokaal'] .'">'.  $les['lokaal'] .'</option>
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
                    <div class="flex-inherit w-60"><label class="font-semibold leading-10">Dag:</label></div>
                    <div>
                    <select name="dag" class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                    <option selected="true" value="'.  $les['dag'] .'">'.  $les['dag'] .'</option>
                        <option value="Maandag">Maandag</option>
                        <option value="Dinsdag">Dinsdag</option>
                        <option value="Woensdag">Woensdag</option>
                        <option value="Donderdag">Donderdag</option>
                        <option value="Vrijdag">Vrijdag</option>
                    </select>
                </div>
                </div>

                <div class="flex flex-wrap my-4">
                    <div class="flex-inherit w-60"><label class="font-semibold leading-10">Starttijd:</label></div>
                    <div class="flex"><input type="time" value="'.  $les['starttijd'] .'" name="starttijd" class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" required /></div>
                </div>
                <div class="flex flex-wrap my-4">
                    <div class="flex-inherit w-60"><label class="font-semibold leading-10">Eindtijd:</label></div>
                    <div class="flex"><input type="time" value="'.  $les['eindtijd'] .'" name="eindtijd" class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" required /></div>
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
                            <a class="btn-primary" href="lessen.php"><i class="fas fa-arrow-left"></i> Terug</a>
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