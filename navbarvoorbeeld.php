<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="style.css">
    <link href="src/tailwind.css" rel="stylesheet">
    <link href="assets/fontawesome/css/fontawesome.css" rel="stylesheet">
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
                            <a class="text-white  hover:text-gray-400 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium"
                               href="dashboard.php">
                                Dashboard
                            </a>
                            <a class="text-white  hover:text-gray-400 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium"
                               href="gebruikers.php">
                                Gebruikers
                            </a>
                            <a class="text-white hover:text-gray-400 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium"
                               href="groepen.php">
                                Groepen
                            </a>
                            <a class="text-white  hover:text-gray-400 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium"
                               href="lessen.php">
                                Lessen
                            </a>
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
								
                                
                                
                                <!-- <div class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white dark:bg-gray-800 ring-1 ring-black ring-opacity-5">
                                    <div class="py-1 " role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                                        <a href="#" class="block block px-4 py-2 text-md text-gray-700 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-100 dark:hover:text-white dark:hover:bg-gray-600" role="menuitem">
                                            <span class="flex flex-col">
                                                <span>
                                                    Account
                                                </span>
                                            </span>
                                        </a>
                                        <a href="#" class="block block px-4 py-2 text-md text-gray-700 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-100 dark:hover:text-white dark:hover:bg-gray-600" role="menuitem">
                                            <span class="flex flex-col">
                                                <span>
                                                    Logout
                                                </span>
                                            </span>
                                        </a>
                                    </div>
                                </div> -->
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
        <div class="md:hidden">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a class="text-white  hover:text-gray-400 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium"
                   href="#">
                    Dashboard
                </a>
                <a class="text-white  hover:text-gray-400 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium"
                   href="gebruikers.php">
                    Gebruikers
                </a>
                <a class="text-white hover:text-gray-400 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium"
                   href="groepen.php">
                    Groepen
                </a>
                <
            </div>
        </div>
    </nav>
    </a>
</div>
</body>

</html>