<?php

// Incudes db
require_once('dbConnection.php');
require_once('api_url.php');
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

public function groepenOphalenGebruiker($gebruikerID){

    $stmt = $this->database->connection->prepare('SELECT groepen.id as groepID, groepnaam, locatie, projectnaam, voornaam, achternaam FROM groepen INNER JOIN gebruikers ON gebruikers.groepid = groepen.id WHERE gebruikers.id = ?');
    $stmt->bind_param('i', $gebruikerID);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

public function getStatus($groepID){
    $stmt = $this->database->connection->prepare('SELECT vraag FROM groepen WHERE id = ? LIMIT 1');
    $stmt->bind_param('i', $groepID);
    $stmt->execute();
    $result = $stmt->get_result();
    $total = $result->fetch_assoc();
    return $total; 
}

public function getGebruikersBijGroep($groepID){
    $stmt = $this->database->connection->prepare('SELECT voornaam, achternaam FROM gebruikers WHERE groepid = ?');
    $stmt->bind_param('i', $groepID);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result; 
}

public function updateVraag($groepID){
    $stmt = $this->database->connection->prepare('UPDATE groepen SET vraag = 1 WHERE id =?');
    $stmt->bind_param('i',$groepID);
    $stmt->execute();
}

public function updateVraagNull($groepID){
    $stmt = $this->database->connection->prepare('UPDATE groepen SET vraag = 0 WHERE id =?');
    $stmt->bind_param('i',$groepID);
    $stmt->execute();
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
    $url = $GLOBALS['host'] . '/api/groepen/create.php';

    $data = array(
        'groepnaam' => $groepnaam,
        'leden' => $leden,
        'locatie' => $locatie,
        'projectnaam' => $projectnaam
    );

    $body = json_encode($data);

    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $result = curl_exec($ch);

    curl_close($ch);

    print_r($result);
    header("location:gebruikers.php");
    header("location:groepen.php");
}

// Updates a cleaner
public function groepWijzigen($id, $groepnaam, $locatie, $projectnaam) {
    $stmt = $this->database->connection->prepare("UPDATE groepen SET groepnaam=?,locatie=?,projectnaam=? WHERE id= ?");
    $stmt->bind_param('sssi', $groepnaam, $locatie, $projectnaam, $id);
    $stmt->execute();
    header("location:groepen.php");
}

// Updates a cleaner
public function locatieWijzigen($id, $locatie) {
    $stmt = $this->database->connection->prepare("UPDATE groepen SET locatie=? WHERE id= ?");
    $stmt->bind_param('si', $locatie, $id);
    $stmt->execute();
    header("location:student.php");
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