<?php

// include_once("./session.php");
include_once("./connection.php");
header("Content-Type: application/json");
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With,Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT');

session_start();

$age = array("Peter"=>35, "Ben"=>37, "Joe"=>43);


function console_log($output, $with_script_tags = true) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}
console_log($age);


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
