<?php
class LoginCheck {
    // Checks if user is logged in and what role they have
    public function checkLogin($role) {
        if($role == 1) {
            $diffrole = 0;
        } else if ($role == 0) {
            $diffrole = 1;
        } else {
            $diffrole = -1;
        }
        if ($_SESSION['loggedin'] == false) {
            header('location:index.php');
            die;
        } else if ($_SESSION['rol'] == $diffrole) {
            if ($role == 0) {
                header('location:dashboard.php');
                die;
            } else {
                header('location:student.php');
                die;
            }
        }
    }
}
?>