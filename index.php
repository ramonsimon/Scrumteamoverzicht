<?php

// Start session
session_start();

//// Check if user should be able to access this page
include_once('loginCheck.php');
$check = new LoginCheck();
$check->checkLogin(1);

?>

<!doctype html>
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
	<div class="flex items-center justify-center m-6">
		<div class="flex flex-col w-full max-w-md px-4 py-8 bg-white rounded-lg shadow dark:bg-gray-800 sm:px-6 md:px-8 lg:px-10">
			<div class="self-center mb-2 text-xl font-semibold text-gray-600 sm:text-2xl dark:text-white">
			<img src="FPlogo.png" alt="Logo" class="logo">
				ScrumTeamDashboard
			</div>
			<div class="mt-8">
				<form method="post" action="login.php" autoComplete="off">
					<div class="flex flex-col mb-2">
						<div class="flex relative ">
							<span class="rounded-l-md inline-flex  items-center px-3 border-t bg-white border-l border-b  border-gray-300 text-gray-500 shadow-sm text-sm">
							<i class="fas fa-user-circle"></i>
							</span>
							<input type="text" name="gebruikersnaam" class=" rounded-r-lg flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="Gebruikersnaam" required/>
						</div>
					</div>
					<div class="flex flex-col mb-4">
						<div class="flex relative ">
							<span class="rounded-l-md inline-flex  items-center px-3 border-t bg-white border-l border-b  border-gray-300 text-gray-500 shadow-sm text-sm">
							<i class="fas fa-unlock"></i>
							</span>
							<input type="password" name="wachtwoord" class="rounded-r-lg flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="Wachtwoord" required/>
						</div>
					</div>
					<?php
						if (isset($_SESSION['message'])) {
						?>
							<div class="rounded-md border border-red-500 text-center text-red-500 font-semibold p-1 mb-4">
								<?php echo $_SESSION['message']; ?>
							</div>
						<?php
							unset($_SESSION['message']);
						}
					?>
					<div class="flex w-full">
						<button type="submit" id='login' name="login" class="btn-primary">
							Inloggen
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>

</body>

</html>