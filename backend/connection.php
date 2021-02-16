<?php

header("Content-Type: application/json");
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With,Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT');
header('Access-Control-Allow-Origin: https://a4e09254e4c9.ngrok.io');


// $servername = "localhost"; //user your own server name or SERVER URL here
// $username = "root";
// $password = "";
// $database_name = 'jack';

$servername = "db.luddy.indiana.edu";
$username = "i494f20_team12";
$password = "my+sql=i494f20_team12";

$conn = mysqli_connect($servername, $username, $password, 'i494f20_team12');
// // Create connection
// $conn = mysqli_connect($servername, $username, $password, $database_name);
// $incoming_data = json_decode(file_get_contents('php://input'), true);
// $incoming_data = file_get_contents('php://input');

if (!$conn) {
    // if connectoin to db does not established
    die("Connection failed: " . mysqli_connect_error());
    $response_header['status_code'] = 404;
    $response_header['response_message'] = 'We cannot connect to database ' . mysqli_connect_error();
    echo json_encode($response_header);
}


function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
