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
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="dashboard.css">
    <link href="src/tailwind.css" rel="stylesheet">
    <link href="assets/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="assets/fontawesome/css/solid.css" rel="stylesheet">
    <script type="text/javascript" src="assets/navbar.js"></script>
    <?php include 'navbarvoorbeeld.php' ?>
</head>

<body>
    <br>
        <h1 class="text-3xl text-center">Goeiemorgenmiddagavond</h1>
    <br>
		<div class="py-4">
			<div class="py-4 overflow-x-auto flex flex-wrap">
					
						<?php 

						// Requests all groups
						$groepen_result = $groep->groepenOphalen();

						// Loops through groups
						foreach ($groepen_result as $item)
						{
							// print_r($item);
							echo '
							<div class="w-1/4 h-48 bg-blue">
							<div class="mx-2 my-2 place-items-center text-white bg-blue-700 rounded-3xl">
							<h1 class="text-3xl text-center">'.$item['groepnaam'].'</h1>
							<br>
							<h1 class="text-center">'.$item['leden'].'</h1>
							<br>
							<h1 class="text-center">'.$item['locatie'].'</h1>
							</div>
							</div>
							';

					// 		echo 
					// 		"
					// 		<td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>
					// 			<p class='text-gray-900 whitespace-no-wrap'>
					// 			"; echo $item['groepnaam'];"
					// 			</p>
					// 		</td>";
					// 		echo 
					// 		"<td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>
					// 			<p class='text-gray-900 whitespace-no-wrap'>
					// 				"; echo $item['leden'];"
					// 			</p>
					// 		</td>";

					// 		echo 
					// 		"<td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>
					// 			<p class='text-gray-900 whitespace-no-wrap'>
					// 			"; echo $item['locatie'];" 
					// 			</p>
					// 		</td>";

					// 		echo 
					// 		'
					// ';
					} ?>
					</div>
				</div>

</body>        

</html>