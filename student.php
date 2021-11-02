<?php

// Start session
session_start();

//// Check if user should be able to access this page
include_once('loginCheck.php');
$check = new LoginCheck();
$check->checkLogin(1);

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css">
	<link href="src/tailwind.css" rel="stylesheet">
	<link href="assets/fontawesome/css/fontawesome.css" rel="stylesheet">
	<link href="assets/fontawesome/css/solid.css" rel="stylesheet">
	<script type="text/javascript" src="assets/navbar.js"></script>
</head>
<div>
    <nav class="bg-blue-700 dark:bg-gray-800 shadow">
        <div class="max-w-7xl mx-auto px-8">
            <div class="flex items-center justify-between h-16">
                <div class=" flex items-center">
                    <a class="flex-shrink-0" href="/">
                    <a class="text-white px-3 py-2 rounded-md text-sm font-medium">
                                ScrumTeamDashboard
                            </a>
                    </a>
</div>
</div>
</div>
</div>

<body>

<br>
<h1 class="text-3xl text-center">Goeiemorgenmiddagavond</h1>
<br>

<div class="grid place-items-center h-60 w-6/12 text-white bg-blue-700 rounded-3xl">
<h1 class="text-3xl text-center">Teamnaam</h1>
<h1 class="text-center">Status</h1>
<h1 class="text-center">Locatie</h1>
</div>


</body>        

</html>