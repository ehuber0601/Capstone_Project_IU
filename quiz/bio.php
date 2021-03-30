<?php
//connecting to server (can change to your personal database)
$servername = "db.luddy.indiana.edu";
$username = "i494f20_allnagy";
$password = "my+sql=i494f20_allnagy";

$conn = mysqli_connect($servername, $username, $password, 'i494f20_allnagy');
if ($conn-> connect_error) {
  die("Connection falied:". $conn-> connect_error);
}


$song = mysqli_real_escape_string($conn, $_REQUEST[songID]);
$userName = mysqli_real_escape_string($conn, $_REQUEST['userName']);
$hometown = mysqli_real_escape_string($conn, $_REQUEST['hometown']);
$genre = mysqli_real_escape_string($conn, $_REQUEST['genre']);
$artist = mysqli_real_escape_string($conn, $_REQUEST['artist']);
$song = mysqli_real_escape_string($conn, $_REQUEST['song']);

// Attempt insert query execution
if(isset($_POST['save']))
{
  $sql = "INSERT INTO bio (userName, hometown, genre, artist, song) VALUES ('$userName','$hometown','$genre','$artist','$song')";
  if(mysqli_query($conn, $sql)){
    echo "Records inserted successfully.";
  } else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
  }
}

$conn-> close();
?>
