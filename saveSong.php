<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Save Song Form</title>

<style>

  html {
    background-color: #b3b3b4;
  }

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
  tr:nth-child(even) {background-color: #f2f2f2;}

  tr:nth-child(odd) {background-color: white;}


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




<form action="example.php" method="post">
    <p>
        <label for="username">Username:</label>
        <input type="text" name="user_name" id="username">
    </p>
    <p>
        <label for="songID">Song ID:</label>
        <input type="text" name="song" id="songID">
    </p>

    <input type="submit" value="Submit">
</form>
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

$conn-> close();
?>




</html>
