<?php

// Incudes db
require_once('dbConnection.php');
class Gebruiker{

private $database = [];
    

// Db connection
public function __construct(){
    $this->database = new DbConnection(); 
}

// Deletes a user 
public function gebruikerVerwijderen($id) {
    
    $stmt2 = $this->database->connection->prepare("DELETE FROM opmerkingen WHERE opmerkingen.idGebruikers= ?");
    $stmt2->bind_param('i', $id);
    $stmt2->execute(); 

    $stmt3 = $this->database->connection->prepare("DELETE FROM planning WHERE planning.idGebruikers= ?");
    $stmt3->bind_param('i', $id);
    $stmt3->execute(); 

    $stmt = $this->database->connection->prepare("DELETE FROM gebruikers WHERE id= ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
}

// Gets all users
public function gebruikersOphalen() {
    $stmt = $this->database->connection->prepare('SELECT * FROM gebruikers');
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

// Gets all cleaners
public function schoonmakersOphalen() {
    $stmt = $this->database->connection->prepare('SELECT * FROM gebruikers WHERE rol = 0');
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

// Adds a cleaner
public function gebruikerToevoegen($gebruikersnaam, $wachtwoord, $naam, $achternaam) {
    $stmt = $this->database->connection->prepare("INSERT INTO gebruikers (gebruikersnaam,wachtwoord,naam,achternaam) VALUES (?,?,?,?)");
    $stmt->bind_param('ssss', $gebruikersnaam, $wachtwoord, $naam, $achternaam);
    $stmt->execute();
    header("location:../admin/gebruikers/");
}

// Updates a cleaner
public function gebruikerWijzigen($id, $gebruikersnaam, $naam, $achternaam) {
    $stmt = $this->database->connection->prepare("UPDATE gebruikers SET gebruikersnaam=?,naam=?,achternaam=? WHERE id= ?");
    $stmt->bind_param('sssi', $gebruikersnaam, $naam, $achternaam, $id);
    $stmt->execute();
    header("location:../admin/gebruikers/");
}

// Updates a cleaner with password
public function gebruikerWijzigenMetWachtwoord($id, $gebruikersnaam, $wachtwoord, $naam, $achternaam) {
    $stmt = $this->database->connection->prepare("UPDATE gebruikers SET gebruikersnaam=?,wachtwoord=?,naam=?,achternaam=? WHERE id= ?");
    $stmt->bind_param('ssssi', $gebruikersnaam, $wachtwoord, $naam, $achternaam, $id);
    $stmt->execute();
    header("location:../admin/gebruikers/");
}

// Updates password
public function wachtwoordWijzigen($id, $wachtwoord) {
    $stmt = $this->database->connection->prepare("UPDATE gebruikers SET wachtwoord=? WHERE id= ?");
    $stmt->bind_param('si', $wachtwoord, $id);
    $stmt->execute();
    header("location:../profile/");
}

// Gets user based on the id
public function gebruikerOphalen($id) {
    $stmt = $this->database->connection->prepare('SELECT * FROM gebruikers WHERE id= ? LIMIT 1');
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

}
?>