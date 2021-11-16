<?php
class Database{

    // specify your own database credentials
    private $host = "d3y0lbg7abxmbuoi.chr7pe7iynqr.eu-west-1.rds.amazonaws.com";
    private $db_name = "sn08n5umavzmmsbz";
    private $username = "ur2pr1akwv1m9v9n";
    private $password = "fmsntiroclozucam";
    public $conn;

    // get the database connection
    public function getConnection(){

        $this->conn = null;

        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>