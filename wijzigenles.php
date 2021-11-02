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
    <div class="pagewrapper">
        <?php
            if ($id != null){
                echo '
                <div class="flex flex-wrap mb-6">
                    <div class="h-10 flex-0 sm:flex-initial mr-6"><a class="btn-primary" href="lessen.php"><i class="fas fa-arrow-left"></i> Terug</a></div>
                <div class="h-10 leading-10 flex-0 sm:flex-grow mt-4 sm:mt-0"><h1 class="leading-6">Gebruiker wijzigen</h1></div>
                </div>
                <form action="lesUpdate.php" method="post">
                <input type="text" value="'.  $id .'" name="id" class="hidden" required />
                <div class="flex flex-wrap my-4">
                    <div class="flex-inherit w-60"><label class="font-semibold leading-10">Lesnaam:</label></div>
                    <div class="flex-grow"><input type="text" value="'.  $les['lesnaam'] .'" name="lesnaam" class="input" required /></div>
                </div>
                <div class="flex flex-wrap my-4">
                    <div class="flex-inherit w-60"><label class="font-semibold leading-10" leading-10>Lokaal:</label></div>
                    <div class="flex-grow"><input type="text" value="'.  $les['lokaal'] .'" name="lokaal" class="input" required /></div>
                </div>
                <div class="flex flex-wrap my-4">
                    <div class="flex-inherit w-60"><label class="font-semibold leading-10">Starttijd:</label></div>
                    <div class="flex-grow"><input type="time" value="'.  $les['starttijd'] .'" name="starttijd" class="input" required /></div>
                </div>
                <div class="flex flex-wrap my-4">
                    <div class="flex-inherit w-60"><label class="font-semibold leading-10">Eindtijd:</label></div>
                    <div class="flex-grow"><input type="time" value="'.  $les['eindtijd'] .'" name="eindtijd" class="input" required /></div>
                </div>
                <input type="submit" name="submit" value="Wijzigen" class="btn-success cursor-pointer mt-4">
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