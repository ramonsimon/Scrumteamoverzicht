<?php

// Incudes db
require_once('dbConnection.php');
class Groep{

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

    $stmt = $this->database->connection->prepare("DELETE FROM groepen WHERE id= ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
}

// Gets all users
public function groepenOphalen() {
    $stmt = $this->database->connection->prepare('SELECT * FROM groepen');
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

// Gets all cleaners
public function schoonmakersOphalen() {
    $stmt = $this->database->connection->prepare('SELECT * FROM groepen WHERE rol = 0');
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

// Adds a cleaner
public function groepToevoegen($groepnaam, $leden, $locatie, $projectnaam) {
    $stmt = $this->database->connection->prepare("INSERT INTO groepen (groepnaam,leden,locatie,projectnaam) VALUES (?,?,?,?)");
    $stmt->bind_param('ssss', $groepnaam, $leden, $locatie, $projectnaam);
    $stmt->execute();
    header("location:groepen.php");
}

// Updates a cleaner
public function groepWijzigen($id, $groepnaam, $leden, $locatie, $projectnaam) {
    $stmt = $this->database->connection->prepare("UPDATE groepen SET groepnaam=?,leden=?,locatie=?,projectnaam=? WHERE id= ?");
    $stmt->bind_param('ssssi', $groepnaam, $leden, $locatie, $projectnaam, $id);
    $stmt->execute();
    header("location:groepen.php");
}

// Gets user based on the id
public function groepOphalen($id) {
    $stmt = $this->database->connection->prepare('SELECT * FROM groepen WHERE id= ? LIMIT 1');
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

}
?>