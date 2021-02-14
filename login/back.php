<!-- Backup here -->

<?php
header("Content-Type: application/json");
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With,Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT');

// setting header file to accept request

// db credentials

$servername = "localhost";
$username = "root";
$password = "";



// Create connection
$conn = mysqli_connect($servername, $username, $password, 'my-database');

// this response array will be sent to calling function
$response = array("status_code" => null, "response_message" => "HI");



// Check connection
if (!$conn) {
    // if connectoin to db does not established
    die("Connection failed: " . mysqli_connect_error());
} else {
    // echo "Connected successfully \n";

    // $v = json_decode(stripslashes(file_get_contents("php://input")));
    $data = json_decode(file_get_contents('php://input'), true);
    // getting data from POST resquest and Decodes a JSON string into string
    // echo json_encode($data);

    //converting array into normal array  from assosiative array 
    $data = array_values($data);


    // exh

    $sql = "SELECT * FROM User WHERE `email` = '$data[0]' ";

    if ($result = mysqli_query($conn, $sql)) {

        if (mysqli_num_rows($result) == 1) {

            // Fetch one and one row
            while ($row = mysqli_fetch_row($result)) {
                // printf("%s (%s)\n", $row[0], $row[1]);

                // $verify = password_verify($data[1], $row[3]);

                // Print the result depending if they match 
                if ((password_verify('$data[1]', $row[3]))) {
                    $response['status_code'] = 200;
                    $response['response_message'] = 'Sucess! Your Username and Password found ';
                    echo json_encode($response);
                } else {
                    // echo 'Incorrect Password!';
                    $response['status_code'] = 206;
                    $response['response_message'] = 'Sorry Your Password is incorrect.Try another password value ' . $row[3] . ' your password is  ' . $data[1];
                    echo json_encode($response);
                }
            }
            mysqli_free_result($result);
        } else {
            $response['status_code'] = 404;
            $response['response_message'] = 'Sorry No user found against your record ! Please try another username';
            // echo 'h';
            echo json_encode($response);
        }
    }
}

?>
