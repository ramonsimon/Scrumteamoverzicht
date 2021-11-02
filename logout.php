<?php

// Start session
session_start();
 


// Empties the session variable
unset($_SESSION);

// Destroys the session and logs out
session_destroy();
session_write_close();
header('Location:index.php');
die;
?>