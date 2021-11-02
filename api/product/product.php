<?php
class Product
{

    // database connection and table name
    private $conn;
    private $table_name = "gebruikers";

    // object properties
    public $id;
    public $gebruikersnaam;
    public $voornaam;
    public $achternaam;
    public $rol;

    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // read products
    function read()
    {

        // select all query
        $query = "SELECT * FROM gebruikers";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }


// create product
    public function create()
    {

        // query to insert record
        $query = "INSERT INTO
                " . $this->table_name . "
            SET
                gebruikersnaam=:gebruikersnaam, voornaam=:voornaam, achternaam=:achternaam, wachtwoord=:wachtwoord, rol=:rol";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->gebruikersnaam = htmlspecialchars(strip_tags($this->gebruikersnaam));
        $this->voornaam = htmlspecialchars(strip_tags($this->voornaam));
        $this->achternaam = htmlspecialchars(strip_tags($this->achternaam));
        $this->wachtwoord = htmlspecialchars(strip_tags($this->wachtwoord));
        $this->rol = htmlspecialchars(strip_tags($this->rol));

        // bind values
        $stmt->bindParam(":gebruikersnaam", $this->gebruikersnaam);
        $stmt->bindParam(":voornaam", $this->voornaam);
        $stmt->bindParam(":achternaam", $this->achternaam);
        $stmt->bindParam(":wachtwoord", $this->wachtwoord);
        $stmt->bindParam(":rol", $this->rol);


        // execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;

    }


// used when filling up the update product form
    function readOne()
    {

        // query to read single record
        $query = "SELECT
                c.name as category_name, p.id, p.name, p.description, p.price, p.category_id, p.created
            FROM
                " . $this->table_name . " p
                LEFT JOIN
                    categories c
                        ON p.category_id = c.id
            WHERE
                p.id = ?
            LIMIT
                0,1";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // bind id of product to be updated
        $stmt->bindParam(1, $this->id);

        // execute query
        $stmt->execute();

        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // set values to object properties
        $this->name = $row['name'];
        $this->price = $row['price'];
        $this->description = $row['description'];
        $this->category_id = $row['category_id'];
        $this->category_name = $row['category_name'];
    }
}
?>