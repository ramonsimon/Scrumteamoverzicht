<?php

// Pathprefix
$pathprefix = '../../';

// request gebruikers
include_once('gebruiker_functies.php');

// Start session
session_start();

// Requests users
$gebruikers = new Gebruiker();
$gebruikers->gebruikersOphalen();

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
<h1 class="text-3xl text-center">Gebruikers</h1>

<div class="pagewrapper">
	<div class="flex">
		<div class="flex-initial"><a href="aanmakengebruiker.php" class="btn-primary"><i class="fas fa-plus"></i> Toevoegen</a></div>
	</div>
	<div class="py-4">
		<div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
			<div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
				<table class="min-w-full leading-normal">
					<thead>
						<tr>
							<th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
								Gebruikersnaam
							</th>
							<th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
								Voornaam
							</th>
							<th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
								Achternaam
							</th>
							<th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
								Wachtwoord
							</th>
							<th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
								Rol
							</th>
							<th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
								Acties
							</th>
						</tr>
					</thead>
					<tbody>
					<tr>
						<?php 

						// Requests all users
						$gebruikers_result = $gebruikers->gebruikersOphalen();

						// Loops through users
						foreach ($gebruikers_result as $item)
						{
							// Checks and defines the role of a user
							if($item["rol"] == 0){
								$rol = 'Student';
							} else { 
								$rol = 'Docent';
							}
							echo 
							"
							<td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>
								<p class='text-gray-900 whitespace-no-wrap'>
								"; echo $item['gebruikersnaam'];"
								</p>
							</td>";
							echo 
							"<td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>
								<p class='text-gray-900 whitespace-no-wrap'>
									"; echo $item['voornaam'];"
								</p>
							</td>";

							echo 
							"<td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>
								<p class='text-gray-900 whitespace-no-wrap'>
								"; echo $item['achternaam'];" 
								</p>
							</td>";

							echo 
							"<td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>
								<p class='text-gray-900 whitespace-no-wrap'>
								"; echo '**********';" 
								</p>
							</td>";
							
							echo 
							"
							<td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>
								<p class='text-gray-900 whitespace-no-wrap'>
								"; echo $rol;" 
								</p>
							</td>";
							echo 
							'
							<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
								<form class="inline" method="POST" action="gebruikerDelete.php">
									<button name="verwijderen" value="'.$item['id'].'" type="submit"><i class="far fa-trash-alt"></i></button> 
								</form>
								<a href="wijzigen.php?id='.$item['id'].'" type="submit"><i class="fas fa-edit"></i></a> 
							</td>
					</tr>';} ?>
				</tbody>

</body>        

</html>