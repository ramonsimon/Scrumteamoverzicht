<?php

// Pathprefix
$pathprefix = '../../';

// request gebruikers
include_once('lessen_functies.php');

// Start session
session_start();

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
<div class="hidden sm:block" aria-hidden="true">
  <div class="py-5">
    <div class="border-t border-gray-200"></div>
  </div>
</div>

<div class="pagewrapper">
        <div class="flex flex-wrap mb-6">
            <div class="h-10 flex-0 sm:flex-initial mr-6"><a class="btn-primary" href="lessen.php"><i class="fas fa-arrow-left"></i> Terug</a></div>
			<div class="h-10 leading-10 flex-0 sm:flex-grow mt-4 sm:mt-0"><h1 class="leading-6">Les aanmaken</h1></div>
		</div>
    <form action="lesInsert.php" method="post">
            <div class="flex flex-wrap my-4">
                <div class="flex-inherit w-60"><label class="font-semibold leading-10">Lesnaam:</label></div>
                <div class="flex-grow"><input type="text" name="lesnaam" class="input" required /></div>
            </div>
            <div class="flex flex-wrap my-4">
                <div class="flex-inherit w-60"><label class="font-semibold leading-10" leading-10>Lokaal:</label></div>
                <div class="flex-grow"><input type="text" name="lokaal" class="input" required /></div>
            </div>
            <div class="flex flex-wrap my-4">
                <div class="flex-inherit w-60"><label class="font-semibold leading-10">Starttijd:</label></div>
                <div class="flex-grow"><input type="time" name="starttijd" class="input" required /></div>
            </div>
            <div class="flex flex-wrap my-4">
                <div class="flex-inherit w-60"><label class="font-semibold leading-10">Eindtijd:</label></div>
                <div class="flex-grow"><input type="time" name="eindtijd" class="input" required /></div>
            </div>
            <input type="submit" name="submit" value="Toevoegen" class="btn-success cursor-pointer mt-4">
        </form>
    </div>
  </div>
</div>


</body>
</html>