<?php

// Incudes db
require_once('dbConnection.php');
class Les{

private $database = [];
    

// Db connection
public function __construct(){
    $this->database = new DbConnection(); 
}

// Deletes a user 
public function groepVerwijderen($id) {
    
    // $stmt2 = $this->database->connection->prepare("DELETE FROM opmerkingen WHERE opmerkingen.idgroepen= ?");
    // $stmt2->bind_param('i', $id);
    // $stmt2->execute(); 

    // $stmt3 = $this->database->connection->prepare("DELETE FROM planning WHERE planning.idgroepen= ?");
    // $stmt3->bind_param('i', $id);
    // $stmt3->execute(); 

    $stmt = $this->database->connection->prepare("DELETE FROM lessen WHERE id= ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
}

// Gets all users
public function lessenOphalen() {
    $stmt = $this->database->connection->prepare('SELECT * FROM lessen');
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

// Gets all cleaners
public function schoonmakersOphalen() {
    $stmt = $this->database->connection->prepare('SELECT * FROM lessen WHERE rol = 0');
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

// Adds a cleaner
public function lesToevoegen($lesnaam, $lokaal, $starttijd, $eindtijd) {
    $stmt = $this->database->connection->prepare("INSERT INTO lessen (lesnaam,lokaal,starttijd,eindtijd) VALUES (?,?,?,?)");
    $stmt->bind_param('ssss', $lesnaam, $lokaal, $starttijd, $eindtijd);
    $stmt->execute();
    header("location:lessen.php");
}

// Updates a cleaner
public function groepWijzigen($id, $groepnaam, $leden, $locatie, $projectnaam) {
    $stmt = $this->database->connection->prepare("UPDATE lessen SET groepnaam=?,leden=?,locatie=?,projectnaam=? WHERE id= ?");
    $stmt->bind_param('ssssi', $groepnaam, $leden, $locatie, $projectnaam, $id);
    $stmt->execute();
    header("location:lessen.php");
}

// Gets user based on the id
public function groepOphalen($id) {
    $stmt = $this->database->connection->prepare('SELECT * FROM lessen WHERE id= ? LIMIT 1');
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

}
?>