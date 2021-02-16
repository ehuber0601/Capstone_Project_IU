<?php

// include_once('./session.php');
// session_start();
include_once("./connection.php");


$incoming_data = json_decode(file_get_contents('php://input'), true);

$session_id = $incoming_data['session_id'];
if ($session_id != null) {
    $sql = "SELECT * FROM posts";

    if ($result = mysqli_query($conn, $sql)) {

        if (mysqli_num_rows($result) > 0) {

            $response_header["posts"] =
                mysqli_fetch_all($result, MYSQLI_ASSOC);
            echo json_encode($response_header);
        } else {
            $response_header["message"] = " No Post found";
            echo json_encode($response_header);
        }
        // echo json_encode($response_header);
    } else {
        $response_header['session_id'] = $session_id;
        $response_header["message"] = " Please login again";
        echo json_encode($response_header);
    }
}
