<?php

// include_once("./session.php");
include_once("./connection.php");
session_start();


$incoming_data = json_decode(file_get_contents('php://input'), true);

$name = $incoming_data['username'];
$userPassword = $incoming_data['password'];


$sql = " SELECT * FROM `Profile` WHERE `username` = '$name' AND `password` = '$userPassword'";

if ($result = mysqli_query($conn, $sql)) {
    if (mysqli_num_rows($result) <= 0) {
        $row = mysqli_fetch_assoc($result);
        // $response_header['username'] = $row['username'];

        $response_header['response_message'] = "Sorry Invalid credentials ";
        $response_header['result_code'] = 206;
        echo json_encode($response_header);
    } else {
        $row = mysqli_fetch_assoc($result);
        // session_start();
        $_SESSION['username'] = $name;
        $session_id = generateRandomString(12);
        $_SESSION['session_id'] = $session_id;
        // $response_header['session_id2'] = $_SESSION['session_id'];
        $response_header['username'] = $row['username'];
        $response_header['session_id'] = $_SESSION['session_id'];
        $response_header['result_code'] = 200;
        $response_header['response_message'] = "Success";
        echo json_encode($response_header);
    }
} else {
    $response_header['response_message'] = "Error :" . mysqli_error($conn);
    echo json_encode($response_header);
}
