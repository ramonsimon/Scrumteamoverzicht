<?php
// 'lessen' object
class Lessen
{

    // database connection and table name
    private $conn;
    private $table_name = "lessen";

    // object properties
    public $id;
    public $lesnaam;
    public $lokaal;
    public $dag;
    public $starttijd;
    public $eindtijd;

    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // read products
    function read()
    {

        // select all query
        $query = "SELECT * FROM lessen";

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
                lesnaam=:lesnaam, lokaal=:lokaal, dag=:dag, starttijd=:starttijd, eindtijd=:eindtijd";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->lesnaam = htmlspecialchars(strip_tags($this->lesnaam));
        $this->lokaal = htmlspecialchars(strip_tags($this->lokaal));
        $this->dag = htmlspecialchars(strip_tags($this->dag));
        $this->starttijd = htmlspecialchars(strip_tags($this->starttijd));
        $this->eindtijd = htmlspecialchars(strip_tags($this->eindtijd));

        // bind values
        $stmt->bindParam(":lesnaam", $this->lesnaam);
        $stmt->bindParam(":lokaal", $this->lokaal);
        $stmt->bindParam(":dag", $this->dag);
        $stmt->bindParam(":starttijd", $this->starttijd);
        $stmt->bindParam(":eindtijd", $this->eindtijd);


        // execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;

    }


    // update a user record
    public function update(){


        // if no posted password, do not update the password
        $query = "UPDATE " . $this->table_name . "
            SET
                lesnaam = :lesnaam,
                lokaal = :lokaal,
                dag = :dag,
                starttijd = :starttijd,
                eindtijd = :eindtijd
            WHERE id = :id";

        // prepare the query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->lesnaam=htmlspecialchars(strip_tags($this->lesnaam));
        $this->lokaal=htmlspecialchars(strip_tags($this->lokaal));
        $this->dag=htmlspecialchars(strip_tags($this->dag));
        $this->starttijd=htmlspecialchars(strip_tags($this->starttijd));
        $this->eindtijd=htmlspecialchars(strip_tags($this->eindtijd));

        // bind the values from the form
        $stmt->bindParam(':lesnaam', $this->lesnaam);
        $stmt->bindParam(':lokaal', $this->lokaal);
        $stmt->bindParam(':dag', $this->dag);
        $stmt->bindParam(':starttijd', $this->starttijd);
        $stmt->bindParam(':eindtijd', $this->eindtijd);
        // unique ID of record to be edited
        $stmt->bindParam(':id', $this->id);

        // execute the query
        if($stmt->execute()){
            return true;
        }

        return false;
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

?>