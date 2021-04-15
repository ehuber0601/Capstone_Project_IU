<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$servername = "db.luddy.indiana.edu";
$username = "i494f20_team12";
$password = "my+sql=i494f20_team12";

$link = mysqli_connect($servername, $username, $password, 
'i494f20_team12');

if($link == false){
  die("Connection falied:". mysqli_connect_error());
}


// Escape user inputs for security
$user_name = mysqli_real_escape_string($link, $_REQUEST['user_name']);
$song = mysqli_real_escape_string($link, $_REQUEST['song']);

// Attempt insert query execution
$sql = "INSERT INTO saveSong (userName, songID) VALUES ('$user_name', 
'$song')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
?>
