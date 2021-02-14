
<?php
header("Content-Type: application/json");
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With,Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT');

// setting header file to accept request

// db credentials

$servername = "db.luddy.indiana.edu"; 
$username = "i494f20_team12";
$password = "my+sql=i494f20_team12";

$conn = mysqli_connect($servername, $username, $password, 'i494f20_team12');

// this response array will be sent to calling function
$response = array("status_code" => null, "response_message" => "HI");



// Check connection
if (!$conn) {
  // if connectoin to db does not established
  // die("Connection failed: " . mysqli_connect_error());
  $response['status_code'] = 200;
  $response['response_message'] = mysqli_connect_error($conn);
  echo json_encode($response);
} else {
  // $v = json_decode(stripslashes(file_get_contents("php://input")));
  $user_data = json_decode(file_get_contents('php://input'), true);

  $user_data = array_values($user_data);

  $sql = "SELECT `email` , `password` FROM User WHERE `email` = '$user_data[0]' ";

  if ($result = mysqli_query($conn, $sql)) {

    if (mysqli_num_rows($result)) {

      // Fetch one and one row
      while ($row = mysqli_fetch_row($result)) {
        // printf("%s (%s)\n", $row[0], $row[1]);

        // $verify = password_verify($data[1], $row[3]);
        $match_password = password_verify($user_data[1], $row[1]);

        if ($match_password) {
          $response['status_code'] = 200;
          $response['response_message'] = 'Sucess! Your Username and Password found ';
          echo json_encode($response);
        } else {
          // echo 'Incorrect Password!';
          $response['status_code'] = 206;
          $response['response_message'] = 'Sorry Your Password is incorrect.Try another password';
          echo json_encode($response);
        }
      }
      mysqli_free_result($result);
    } else {
      $response['status_code'] = 404;
      $response['response_message'] = 'Sorry No data found against your record ! Please try another email';
      // echo 'h';
      echo json_encode($response);
    }
  }
}

?>
