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
  <?php
  $servername = "db.luddy.indiana.edu";
  $username = "i494f20_team12";
  $password = "my+sql=i494f20_team12";

  $conn = mysqli_connect($servername, $username, $password, 'i494f20_team12');
  if ($conn-> connect_error) {
    die("Connection falied:". $conn-> connect_error);
  }

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

</table>

</br>
<p>Save a song to your profile:</p>
<form>
  <label for="userID">User ID:</label></br>
  <input type="text" id="userID" name="userID"></br>
  <label for="songID">Song ID:</label></br>
  <input type="text" id="songID" name="songID"></br>

</body>
</html>
