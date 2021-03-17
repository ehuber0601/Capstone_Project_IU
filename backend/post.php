
<?php
//  include_once("./session.php");
include_once("./connection.php");
header("Content-Type: application/json");
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With,Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT');
session_start();
$incoming_data = json_decode(file_get_contents('php://input'), true);

$postbox = $incoming_data['postbox'];
// $dummy_post_id = 12421;
$dummy_post_id = rand(11, 1000);
$dummy_user_id = 124921;
$dummy_post_date = "2/16/1999";
$dummy_likes = 0;

$incoming_data = json_decode(file_get_contents('php://input'), true);

$user_id = (int)$incoming_data['userID'];
// postID, userID, postContent, postDate, likes
$sql_insert = "INSERT INTO Posts ( `postID`, `userID`, `postContent`, `postDate`, `likes`  ) VALUES ('$dummy_post_id', '$user_id' , '$postbox' , '$dummy_post_date' , '$dummy_likes' )";
if (mysqli_query($conn, $sql_insert)) {
    $response_header['status_code'] = 200;
    $response_header['response_message'] = 'Post Added Successfully';
    echo json_encode($response_header);
    // mysql_free_result() 
} else {
    $response_header['status_code'] = 206;
    $response_header["userID"] = $user_id;
    $response_header['response_message'] = 'Error' . mysqli_error($conn);
    echo json_encode($response_header);
}







