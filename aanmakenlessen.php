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
<div class="pagewrapper">
    
<div class="px-4 py-5 bg-white sm:p-6">
<a href="lessen.php" class="btn-primary"><button class="bg-blue-700 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded"><i class="fas fa-arrow-left"></i> Terug</button></a>
</div>

<div class="px-4 py-5 bg-white sm:p-6">
    <div class="shadow overflow-hidden sm:rounded-md">
        <div class="px-4 py-5 bg-white sm:p-6">
            <div class="col-span-6 sm:col-span-3">
		</div>
    <form action="lesInsert.php" method="post">
            <div class="flex flex-wrap my-4">
                <div class="flex-inherit w-60"><label class="font-semibold leading-10">Lesnaam:</label></div>
                <div class="flex-grow"><input type="text" name="lesnaam" class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" required /></div>
            </div>
            <div class="flex flex-wrap my-4">
                    <div class="flex-inherit w-60"><label class="font-semibold leading-10">Lokaal:</label></div>
                    <div>
                    <select name="lokaal" class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                    <option selected="true" disabled="disabled" value="">--Selecteer locatie--</option>                        
                        <option value="C101">C101</option>
                        <option value="C102">C102</option>
                        <option value="C103">C103</option>
                        <option value="C104">C104</option>
                        <option value="C105">C105</option>
                        <option value="C106">C106</option>
                        <option value="C107">C107</option>
                        <option value="C108">C108</option>
                        <option value="C109">C109</option>
                        <option value="Kantine">Kantine</option>
                    </select>
                </div>
                </div>
                <div class="flex flex-wrap my-4">
                    <div class="flex-inherit w-60"><label class="font-semibold leading-10">Dag:</label></div>
                    <div>
                    <select name="dag" class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                    <option selected="true" disabled="disabled" value="">--Selecteer dag--</option>                        <option value="Maandag">Maandag</option>
                        <option value="Dinsdag">Dinsdag</option>
                        <option value="Woensdag">Woensdag</option>
                        <option value="Donderdag">Donderdag</option>
                        <option value="Vrijdag">Vrijdag</option>
                    </select>
                </div>
                </div>
            <div class="flex flex-wrap my-4">
                <div class="flex-inherit w-60"><label class="font-semibold leading-10">Starttijd:</label></div>
                <div class="flex"><input type="time" name="starttijd" class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" required /></div>
            </div>
            <div class="flex flex-wrap my-4">
                <div class="flex-inherit w-60"><label class="font-semibold leading-10">Eindtijd:</label></div>
                <div class="flex"><input type="time" name="eindtijd" class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" required /></div>
                </div>
                                                        <button type="submit" name="submit" value="Toevoegen" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Opslaan</button>
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