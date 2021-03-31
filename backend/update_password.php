<?php
include_once("./connection.php");
header("Content-Type: application/json");
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With,Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT');


$incoming_data = json_decode(file_get_contents('php://input'), true);

$oldPassword = $incoming_data['currentPassword'];
$newPassword = $incoming_data['newPassword'];
$sessionID = $incoming_data['session_id'];
$userID = $incoming_data['userID'];

if (empty($sessionID)) {
    $response_header['message'] = "Sorry you have not logged in ";
    $response_header['response_code'] = 206;
} else {

    $sql = "SELECT * FROM User WHERE `password` = '$oldPassword' ";

    if ($result = mysqli_query($conn, $sql)) {

        if (mysqli_num_rows($result) <= 0) {
            $response_header['status_code'] = 207;
            $response_header['response_message'] = 'You have entered invalid Old password';
            echo json_encode($response_header);
        } else {

            $sql = "UPDATE User set `password` = $newPassword  WHERE `userID` = $userID ";
            $update = mysqli_query($mysqli, $sql);

            if (mysqli_affected_rows($mysqli) > 0) {
                $response_header["message"] = "Successfully updated Password";
                $response_header["response_code"] = 200;
            } else {
                $response_header["message"] = "Sorry we Could not Password !! " . mysqli_error($mysqli);
                $response_header["response_code"] = 207;
            }
        }
    } else {
        $response_header["message"] = "Sorry we Could not Password !! " . mysqli_error($mysqli);
        $response_header["response_code"] = 207;
    }
}
