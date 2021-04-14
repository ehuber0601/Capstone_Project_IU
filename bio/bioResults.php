<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Your Bio</title>

<style>
.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #D8BFD8;
  color: white;
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
    background-color: navy;
    color: white;
  }
  tr:nth-child(even) {background-color: #f2f2f2;}

  tr:nth-child(odd) {background-color: white;}


</style>
	



  
  
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,
initial-scale=1.0">

        <link rel="stylesheet" href="./css/reset.css">
        <link rel="stylesheet" href="./css/style.css">
    
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link
href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;800&display=swap"
rel="stylesheet">
        <link rel="stylesheet"
  
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Home Page</title>
   
        <script> let session_id = localStorage.getItem("session_id");

  
            if (session_id === "" || session_id === null) {
                location.href = "./login.html"
                         location.href = "./login.html"
            }
        </script>
        <script>
  
        
</script>
<style>
.profile { display: block;
float: left;}
.profilepage {font-size: 20px;
color: black; }
</style>
    </head>  

<div class="topnav">
  <a href="./index.html">Home</a>
  <a href="./post-form.html">Make Post</a>
  <a href="./saveSong.php">Save Music</a>
  <a class="active" href="upcoming_events.php">Events</a>
  <a href="./bio.html">Create Bio</a>
  <a href="./profile.php">My Profile</a>
  <a href="./teammembers.html">Team Members</a>
  <a href="./setting.html">Settings</a>
</div
                
                         
<body>
        
  <table>
  <tr>  
    <th>Hometown</th>
    <th>Favorite Genre</th>
    <th>Favorite Artist</th>
    <th>Favorite Song</th>
  </tr>

<?php

$search = $_POST['search'];

$servername = "db.luddy.indiana.edu";
$username = "i494f20_team12";
$password = "my+sql=i494f20_team12";
$db = "i494f20_team12";
  
$conn = new mysqli($servername, $username, $password, $db);
  
if ($conn->connect_error){
        die("Connection failed: ". $conn->connect_error);
}
$sql = "SELECT hometown, genre, artist, song FROM bio WHERE userName like '%$search%'";

$result = $conn->query($sql);
  
if ($result-> num_rows > 0) {
  while ($row = $result-> fetch_assoc()) {
    echo "<tr><td>". $row["hometown"] ."</td><td>". $row["genre"] ."</td><td>". $row["artist"] ."</td><td>". $row["song"] ."</td></tr>";
  }
  echo "</table>";
}
else {
  echo "0 result";
}

$conn-> close();
?>
