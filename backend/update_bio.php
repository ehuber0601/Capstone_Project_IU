<?php
include_once("./connection.php");
header("Content-Type: application/json");
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With,Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT');


$incoming_data = json_decode(file_get_contents('php://input'), true);

$userID = $incoming_data['userID'];
$new_bio = $incoming_data['bio'];

$sessionID = $incoming_data['session_id'];

if (empty($sessionID)) {
    $response_header['message'] = "Sorry you have not logged in ";
    $response_header['response_code'] = 206;
} else {

    $updateQuery = "Update User set `bio` = $new_bio  WHERE `userID` = $userID";

    $update = mysqli_query($mysqli, $updateQuery);

    if (mysqli_affected_rows($mysqli) > 0) {
        $response_header["message"] = "Successfully updated Bio";
        $response_header["response_code"] = 200;
    } else {
        $response_header["message"] = "Sorry we Could not update Bio " . mysqli_error($mysqli);
        $response_header["response_code"] = 200;
    }
}
