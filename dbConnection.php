<?php
class DbConnection{

    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'scrumteamdashboard';

    public $connection;

    // Makes db connection
    public function __construct(){

        if (!isset($this->connection)) {

            $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);

            if (!$this->connection) {
                echo 'Verbinding met databaseserver mislukt';
                exit;
            }            
        }    

        return $this->connection;
    }
}
?>