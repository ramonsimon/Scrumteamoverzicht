<?php
require_once('dbConnection.php');
class LoginUser{

    private $userid = [];
    private $rol = [];
    private $database = [];

    // Db
    public function __construct(){
        $this->database = new DbConnection();
    }

    // Checks if user is logged in 
    public function checkLogin($username){
        // Prepared statement
        $stmt2 = $this->database->connection->prepare("SELECT * FROM gebruikers WHERE gebruikersnaam = ?");
        $stmt2->bind_param('s', $username);
        $stmt2->execute();
        $result = $stmt2->get_result();
        return $result->fetch_assoc();
    }
}