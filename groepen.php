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
<h1 class="text-3xl text-center">Groepen</h1>
<div class="flex">		
<div class="flex">
    <a href="aanmakengroep.php" class="btn-primary"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"><i class="fas fa-plus"></i> Toevoegen</button></a>
	</div>
</div>
<div class="pagewrapper">
		
		<div class="py-4">
			<div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
				<div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
					<table class="min-w-full leading-normal">
						<thead>
							<tr>
								<th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
									Groepnaam
								</th>
								<th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
									Leden
								</th>
								<th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
									Locatie
								</th>
								<th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
									Project
								</th>
								<th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
									Acties
								</th>
							</tr>
						</thead>

						<tbody>
					<tr>
						<?php 

						// Requests all groups
						$groepen_result = $groep->groepenOphalen();

						// Loops through groups
						foreach ($groepen_result as $item)
						{

							echo 
							"
							<td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>
								<p class='text-gray-900 whitespace-no-wrap'>
								"; echo $item['groepnaam'];"
								</p>
							</td>";
							echo 
							"<td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>
								<p class='text-gray-900 whitespace-no-wrap'>
									"; echo $item['leden'] . ', ';"
								</p>
							</td>";

							echo 
							"<td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>
								<p class='text-gray-900 whitespace-no-wrap'>
								"; echo $item['locatie'];" 
								</p>
							</td>";

							echo 
							"<td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>
								<p class='text-gray-900 whitespace-no-wrap'>
								"; echo $item['projectnaam'];" 
								</p>
							</td>";

							echo 
							'
							<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
								<form class="inline" method="POST" action="groepDelete.php">
									<button name="verwijderen" value="'.$item['id'].'" type="submit"><i class="far fa-trash-alt"></i></button> 
								</form>
								<a href="wijzigengroep.php?id='.$item['id'].'" type="submit"><i class="fas fa-edit"></i></a> 
							</td>
					</tr>';} ?>
				</tbody>



</body>        

</html>