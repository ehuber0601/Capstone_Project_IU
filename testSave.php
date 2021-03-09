<!DOCTYPE html>
<html>
<head>
  <h1>Song List</h1>
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
      color: #b3b3b4;
      font-family: "Manrope", sans-serif;
      font-size: 25px;
      text-align: left;
    }
    th {
      background-color: blueviolet;
      color: white;
    }
    tr:nth-child(even) {background-color: #f2f2f2}
  </style>
</head>
<body>
<table>
  <tr>
    <th>Song ID</th>
    <th>Artist ID</th>
    <th>Artist Name</th>
    <th>Length</th>
    <th>Genre</th>
    <th>Title</th>
  </tr>

  <p>Save a song to your profile:</p>
  <form action="testingsave.php" method="post">
  <label for="userName">Your Username:</label></br>
  <input type="text" id="userName" name="userName"></br>
  <label for="songzID">Song ID:</label></br>
  <input type="text" id="songID" name="songID"></br>
  <button type="submit" name="save">save</button>
</body>

<?php
//connecting to server (can change to your personal database)
$servername = "db.luddy.indiana.edu";
$username = "i494f20_team12";
$password = "my+sql=i494f20_team12";

$conn = mysqli_connect($servername, $username, $password, 'i494f20_team12');
if ($conn-> connect_error) {
  die("Connection falied:". $conn-> connect_error);
}

//showing table of songs
$sql = "SELECT songID, artistID, artistName, length, genre, title FROM Song";
$result = $conn-> query($sql);

if ($result-> num_rows > 0) {
  while ($row = $result-> fetch_assoc()) {
    echo "<tr><td>". $row["songID"] ."</td><td>". $row["artistID"] ."</td><td>". $row["artistName"] ."</td><td>". $row["length"] ."</td><td>". $row["genre"] ."</td><td>". $row["title"] ."</td></tr>";
  }
  echo "</table>";
}
else {
  echo "0 result";
}


//naming variables for inserted text
$song = mysqli_real_escape_string($conn, $_REQUEST[songID]);
$userName = mysqli_real_escape_string($conn, $_REQUEST['userName']);


// Attempt insert query execution
if(isset($_POST['save']))
{
  $sql = "INSERT INTO saveSong(song, userName) VALUES ('$song', '$userName')";
  if(mysqli_query($conn, $sql)){
    echo "Records inserted successfully.";
  } else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
  }
}

$conn-> close();
?>


</body>
</html>
