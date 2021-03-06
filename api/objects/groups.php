<?php
// 'groepen' object
class Groepen
{

    // database connection and table name
    private $conn;
    private $table_name = "groepen";

    // object properties
    public $id;
    public $groepnaam;
    public $locatie;
    public $projectnaam;

    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // read products
    function read()
    {

        // select all query
        $query = "SELECT * FROM groepen";

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
                groepnaam=:groepnaam, locatie=:locatie, projectnaam=:projectnaam";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->groepnaam = htmlspecialchars(strip_tags($this->groepnaam));
        $this->locatie = htmlspecialchars(strip_tags($this->locatie));
        $this->projectnaam = htmlspecialchars(strip_tags($this->projectnaam));

        // bind values
        $stmt->bindParam(":groepnaam", $this->groepnaam);
        $stmt->bindParam(":locatie", $this->locatie);
        $stmt->bindParam(":projectnaam", $this->projectnaam);


        // execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;

    }


    // update a user record
    public function update()
    {


        // if no posted password, do not update the password
        $query = "UPDATE " . $this->table_name . "
            SET
                groepnaam = :groepnaam,
                locatie = :locatie,
                projectnaam = :projectnaam
            WHERE id = :id";

        // prepare the query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->groepnaam = htmlspecialchars(strip_tags($this->groepnaam));
        $this->locatie = htmlspecialchars(strip_tags($this->locatie));
        $this->projectnaam = htmlspecialchars(strip_tags($this->projectnaam));

        // bind the values from the form
        $stmt->bindParam(':groepnaam', $this->groepnaam);
        $stmt->bindParam(':locatie', $this->locatie);
        $stmt->bindParam(':projectnaam', $this->projectnaam);

        // unique ID of record to be edited
        $stmt->bindParam(':id', $this->id);

        // execute the query
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

// delete the product
    function delete()
    {

        // delete query
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->id = htmlspecialchars(strip_tags($this->id));

        // bind id of record to delete
        $stmt->bindParam(1, $this->id);

        // execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}
?>