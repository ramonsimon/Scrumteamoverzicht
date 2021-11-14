<?php
// 'user' object
class User{

    // database connection and table name
    private $conn;
    private $table_name = "gebruikers";

    // object properties
    public $id;
    public $gebruikersnaam;
    public $voornaam;
    public $achternaam;
    public $wachtwoord;
    public $rol = 0;

    // constructor
    public function __construct($db){
        $this->conn = $db;
    }

// create new user record
    function create(){

        // insert query
        $query = "INSERT INTO " . $this->table_name . "
            SET
                gebruikersnaam = :gebruikersnaam,
                voornaam = :voornaam,
                achternaam = :achternaam,
                wachtwoord = :wachtwoord";

        // prepare the query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->gebruikersnaam=htmlspecialchars(strip_tags($this->gebruikersnaam));
        $this->voornaam=htmlspecialchars(strip_tags($this->voornaam));
        $this->achternaam=htmlspecialchars(strip_tags($this->achternaam));
        $this->wachtwoord=htmlspecialchars(strip_tags($this->wachtwoord));

        // bind the values
        $stmt->bindParam(':gebruikersnaam', $this->gebruikersnaam);
        $stmt->bindParam(':voornaam', $this->voornaam);
        $stmt->bindParam(':achternaam', $this->achternaam);


        // hash the password before saving to database
        $password_hash = password_hash($this->wachtwoord, PASSWORD_BCRYPT);
        $stmt->bindParam(':wachtwoord', $password_hash);


        // execute the query, also check if query was successful
        if($stmt->execute()){
            return true;
        }

        return false;
    }

// check if given email exist in the database
    function emailExists(){

        // query to check if email exists
        $query = "SELECT *
            FROM " . $this->table_name . "
            WHERE gebruikersnaam = ?
            LIMIT 0,1";

        // prepare the query
        $stmt = $this->conn->prepare( $query );

        // sanitize
        $this->gebruikersnaam=htmlspecialchars(strip_tags($this->gebruikersnaam));

        // bind given email value
        $stmt->bindParam(1, $this->gebruikersnaam);

        // execute the query
        $stmt->execute();

        // get number of rows
        $num = $stmt->rowCount();

        // if email exists, assign values to object properties for easy access and use for php sessions
        if($num>0){

            // get record details / values
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // assign values to object properties
            $this->gebruikersnaam = $row['gebruikersnaam'];
            $this->voornaam = $row['voornaam'];
            $this->wachtwoord = $row['wachtwoord'];

            // return true because email exists in the database
            return true;
        }

        // return false if email does not exist in the database
        return false;
    }

// update() method will be here
}