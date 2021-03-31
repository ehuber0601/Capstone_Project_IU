<?php
include_once("./connection.php");
header("Content-Type: application/json");
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With,Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT');


$incoming_data = json_decode(file_get_contents('php://input'), true);

$name = $incoming_data['email'];
$sessionID = $incoming_data['session_id'];
$userID = $incoming_data['userID'];

if (empty($sessionID)) {
    $response_header['message'] = "Sorry you have not logged in ";
    $response_header['response_code'] = 206;
} else {

    $updateQuery = "Update User set `username` = $userName , `email` = $userName WHERE `userID` = $userID";
    $update = mysqli_query($mysqli, $updateQuery);

    if (mysqli_affected_rows($mysqli) > 0) {
        $response_header["message"] = "Successfully updated Email";
        $response_header["response_code"] = 200;
    } else {
        $response_header["message"] = "Sorry we Could not update Email " . mysqli_error($mysqli);
        $response_header["response_code"] = 207;
    }
}
