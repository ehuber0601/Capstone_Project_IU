<?php
include_once("./connection.php");
header("Content-Type: application/json");
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With,Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT');


// setting header file to accept request

// db credentials

// $servername = "db.luddy.indiana.edu";
// $username = "i494f20_team12";
// $password = "my+sql=i494f20_team12";

// $conn = mysqli_connect($servername, $username, $password, 'i494f20_team12');
$response_header = array("status_code" => null, "response_message" => null);


if (!$conn) {
    // die("Connection failed: " . mysqli_connect_error());
    $response_header['status_code'] = 400;
    $response_header['response_message'] = 'Db error  ' . mysqli_error($conn);
    echo json_encode($response_header);
} else {

    $form_data = json_decode(file_get_contents('php://input'), true);
    $form_data = array_values($form_data);

    $sql = "SELECT * FROM User WHERE `email` = '$form_data[0]' ";

    if ($result = mysqli_query($conn, $sql)) {

        if (mysqli_num_rows($result) > 0) {

            $response_header['status_code'] = 205;
            $response_header['response_message'] = 'User Email ' . $form_data[0] . ' already exists ';
            echo json_encode($response_header);
        } else {
            $password_encription
                = password_hash($form_data[3], PASSWORD_DEFAULT);
            $userID = rand(pow(10, $digits - 1), pow(10, $digits) - 1);
            $sql_insert = "INSERT INTO User (`userID`,`userName`, `firstName`, `lastName`, `email`, `phoneNumber`, `DOB`) VALUES ( '$userId', '$form_data[0]', '$form_data[1]' , '$form_data[2]' , '$form_data[3]' , '' , '')";

            if (mysqli_query($conn, $sql_insert)) {

                $delete_blank = "DELETE FROM `user` WHERE `email` = '' ";
                mysqli_query($conn, $delete_blank);
                $response_header['status_code'] = 200;
                $response_header['response_message'] = 'Account Registered Successfully';
                echo json_encode($response_header);
                // mysql_free_result() 
            } else {
                $response_header['status_code'] = 206;
                $response_header['response_message'] = 'Error' . mysqli_error($conn);
                echo json_encode($response_header);
            }
        }
    } else {
        $response_header['status_code'] = 400;
        $response_header['response_message'] = 'dB  Error' . mysqli_error($conn);
        echo json_encode($response_header);
    }
}
