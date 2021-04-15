<?php

include_once("./connection.php");


$incoming_data = json_decode(file_get_contents('php://input'), true);



 $name = $_COOKIE['username'] ;

// $name  = 'donec';

//$name = 'ehuber0601@gmail.com' ;

// $incoming_data = json_decode(file_get_contents('php://input'), true);

$sql = "SELECT * FROM User WHERE userName = '$name'";

try {
    if ($result = mysqli_query($conn, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            echo json_encode($row);
        } else {
<<<<<<< HEAD
            $response_header["message"] = "Sorry no profile exist with 
username " . $name;
=======
            $response_header["message"] = "Sorry no profile exist with username " . $name;
>>>>>>> 3757a3dfc8433a033a76268d48399f68bed7134a
            echo json_encode($response_header);
        }
    } else {
        $response_header["message"] = " " . mysqli_error($conn);
        echo json_encode($response_header);
    }
} catch (Exception $excpetion) {
    $response_header["message"] = " " . mysqli_error($conn);
    echo json_encode($response_header);
<<<<<<< HEAD
} ?>
=======
} ?>
>>>>>>> 3757a3dfc8433a033a76268d48399f68bed7134a
