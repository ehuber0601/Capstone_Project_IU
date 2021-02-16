<?php

include_once("./connection.php");


// function search_artist($atrist_name)
$incoming_data = json_decode(file_get_contents('php://input'), true);
// {
$search_name = $incoming_data['search_name'];
$sql = "SELECT * FROM song WHERE `songID` LIKE '%$search_name%' OR `artistName` = '$search_name' ";
// $sql = "SELECT * FROM posts";
if ($result = mysqli_query($conn, $sql)) {

    if (mysqli_num_rows($result) > 0) {

        $response_header["Artists"] =
            mysqli_fetch_all($result, MYSQLI_ASSOC);
        echo json_encode($response_header);
    } else {
        $response_header["message"] = " No Artist found";
        echo json_encode($response_header);
    }
    // echo json_encode($response_header);
} else {
    // $response_header['session_id'] = $session_id;
    $response_header["message"] = " Please login again " . mysqli_error($conn);
    echo json_encode($response_header);
}


// }
