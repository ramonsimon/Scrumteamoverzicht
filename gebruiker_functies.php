<?php

// Incudes db
require_once('dbConnection.php');
require_once('api_url.php');

class Gebruiker{
private $database = [];
    

// Db connection
public function __construct(){
    $this->database = new DbConnection(); 
}

// Deletes a user 
public function gebruikerVerwijderen($id) {
    
    // $stmt2 = $this->database->connection->prepare("DELETE FROM opmerkingen WHERE opmerkingen.idGebruikers= ?");
    // $stmt2->bind_param('i', $id);
    // $stmt2->execute(); 

    // $stmt3 = $this->database->connection->prepare("DELETE FROM planning WHERE planning.idGebruikers= ?");
    // $stmt3->bind_param('i', $id);
    // $stmt3->execute(); 

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
public function gebruikerToevoegen($gebruikersnaam, $wachtwoord, $voornaam, $achternaam) {

    $url = $GLOBALS['host'] .'/api/product/create.php';

    $data = array(
        'gebruikersnaam' => $gebruikersnaam,
        'voornaam' => $voornaam,
        'achternaam' => $achternaam,
        'wachtwoord' => $wachtwoord,
        'rol' => '1'
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
}

// Updates a cleaner
public function gebruikerWijzigen($id, $gebruikersnaam, $voornaam, $achternaam) {
    $stmt = $this->database->connection->prepare("UPDATE gebruikers SET gebruikersnaam=?,voornaam=?,achternaam=? WHERE id= ?");
    $stmt->bind_param('sssi', $gebruikersnaam, $voornaam, $achternaam, $id);
    $stmt->execute();
    header("location:gebruikers.php");
}

// Updates a cleaner with password
public function gebruikerWijzigenMetWachtwoord($id, $gebruikersnaam, $wachtwoord, $voornaam, $achternaam) {
    $stmt = $this->database->connection->prepare("UPDATE gebruikers SET gebruikersnaam=?,wachtwoord=?,voornaam=?,achternaam=? WHERE id= ?");
    $stmt->bind_param('ssssi', $gebruikersnaam, $wachtwoord, $voornaam, $achternaam, $id);
    $stmt->execute();
    header("location:gebruikers.php");
}

// Updates password
public function wachtwoordWijzigen($id, $wachtwoord) {
    $stmt = $this->database->connection->prepare("UPDATE gebruikers SET wachtwoord=? WHERE id= ?");
    $stmt->bind_param('si', $wachtwoord, $id);
    $stmt->execute();
    header("location:gebruikers.php");
}

// Gets user based on the id
public function gebruikerOphalen($id) {
    $stmt = $this->database->connection->prepare('SELECT * FROM gebruikers WHERE id= ? LIMIT 1');
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

// Method: POST, PUT, GET etc
// Data: array("param" => "value") ==> index.php?param=value

  public function CallAPI($method, $url, $data = false){
        $curl = curl_init();

        switch ($method)
        {
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);

                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_PUT, 1);
                break;
            default:
                if ($data)
                    $url = sprintf("%s?%s", $url, http_build_query($data));
        }

        // Optional Authentication:
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_USERPWD, "username:password");

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($curl);

        curl_close($curl);

        return $result;
    }

}