<?php

// Pathprefix
$pathprefix = '../../';

// request gebruikers
include_once('groepen_functies.php');

// // Start session
// session_start();

// //// Check if user should be able to access this page
// include_once('loginCheck.php');
// $check = new LoginCheck();
// $check->checkLogin(0);

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
					} ?>
					</div>
				</div>

</body>        

</html>