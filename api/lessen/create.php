<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// required to encode json web token
include_once '../login/core.php';
include_once '../../libs/php-jwt-master/src/BeforeValidException.php';
include_once '../../libs/php-jwt-master/src/ExpiredException.php';
include_once '../../libs/php-jwt-master/src/SignatureInvalidException.php';
include_once '../../libs/php-jwt-master/src/JWT.php';
use \Firebase\JWT\JWT;

// files needed to connect to database
include_once '../groepen/database.php';
include_once '../objects/lessen.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// instantiate user object
$lessen = new Lessen($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));

// get jwt
$jwt=isset($data->jwt) ? $data->jwt : "";

// make sure data is not empty
if(
    !empty($data->lesnaam) &&
    !empty($data->lokaal) &&
    !empty($data->dag)&&
    !empty($data->starttijd)&&
    !empty($data->eindtijd)
) {
// if jwt is not empty
    if ($jwt) {

        // if decode succeed, show user details
        try {

            // decode jwt
            $decoded = JWT::decode($jwt, $key, array('HS256'));

            // set user property values
            $lessen->lesnaam = $data->lesnaam;
            $lessen->lokaal = $data->lokaal;
            $lessen->dag = $data->dag;
            $lessen->starttijd = $data->starttijd;
            $lessen->eindtijd = $data->eindtijd;

// update the user record
            if ($lessen->create()) {
                // we need to re-generate jwt because user details might be different
                $token = array(
                    "iat" => $issued_at,
                    "exp" => $expiration_time,
                    "iss" => $issuer,
                    "data" => array()
                );
                $jwt = JWT::encode($token, $key);

// set response code
                http_response_code(200);

// response in json format
                echo json_encode(
                    array(
                        "message" => "Les is created successfully.",
                        "jwt" => $jwt
                    )
                );
            } // message if unable to update user
            else {
                // set response code
                http_response_code(401);

                // show error message
                echo json_encode(array("message" => "Unable to update lessen."));
            }
        } // if decode fails, it means jwt is invalid
        catch (Exception $e) {

            // set response code
            http_response_code(401);

            // show error message
            echo json_encode(array(
                "message" => "Access denied.",
                "error" => $e->getMessage()
            ));
        }
    } // show error message if jwt is empty
    else {

        // set response code
        http_response_code(401);

        // tell the user access denied
        echo json_encode(array("message" => "Access denied."));
    }
}else{

    // set response code - 400 bad request
    http_response_code(400);

    // tell the user
    echo json_encode(array("message" => "Unable to create product. Data is incomplete."));
}
?>