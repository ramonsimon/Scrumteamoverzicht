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
    <link rel="stylesheet" href="style.css">
	<link href="src/tailwind.css" rel="stylesheet">
	<link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
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
                            ($item['vraag'] == 1) ? $color = "red" : $color = "blue";


							// print_r($item);
							echo '
							<div class="w-1/4 h-48 bg-blue">
							<div class="mx-2 my-2 place-items-center text-white bg-' . $color . '-700 rounded-3xl">
							<h1 class="text-3xl text-center">'.$item['groepnaam'].'</h1>
							<br>
							';$teamLeden = $groep->getGebruikersBijGroep($item['groepID']);
							foreach($teamLeden as $leden){
								echo '<h1 class="text-center">'. $leden['voornaam'] . ' ' . $leden['achternaam'] . '</h1>
                                '; 
                            }
                            echo '
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