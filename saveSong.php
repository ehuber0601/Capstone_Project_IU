<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" href="./css/reset.css">
        <link rel="stylesheet" href="./css/style.css">

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;800&display=swap" rel="stylesheet">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<title>Save Song Form</title>



<style>

table {
  margin: auto;
  padding: 10px;
  background-color: #ffffff;
  box-shadow: 0px 0px 5px #00000085;
  width: 80%;
  text-align: center;
  font-size: 25px;
  border-radius: 25px;
  padding: 20px;
  height: 150px;
  border-collapse:separate;
  border: 1px;
  border-radius:6px;
  -moz-border-radius:6px;
}

td, th {
  border-left: 1px;
  border-top: 1px;
}




  th {
    background-color: #487eb0;
    color: white;
    border-top: none;
  }
  tr:nth-child(even) {background-color: #f2f2f2;}

  tr:nth-child(odd) {background-color: white;}


</style>



</head>
<body>

  <nav class="container-fluid">
              <div class="row">
                	<a href="./index.html">
                  <div class="col-12 col-sm-12 text-center">
                      <i class="d-inline fa fa-home me-2" aria-hidden="true"></i>
                      <a  href ="./group.html">
                          <i class="fa fa-users" aria-hidden="true"></i>

                      </a>
                      <div class="d-inline dropdown">
                          <a class="btn fa fa-cog" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                              aria-expanded="false">
                          </a>

                          <ul class="dropdown-menu setting-dropdown" aria-labelledby="dropdownMenuLink">
                              <li><a class="dropdown-item text-center " href="./setting.html">Setting</a></li>
                          </ul>
                      </div>
                          <button onclick="location.href = 'post-form.html';" id="makePostButton" class="submit-button">Make
                          Post</button>
                          <button onclick="location.href = 'search.html';" id="searchMusicButton" class="submit-button">Search Music
          			</button>
                      <button onclick="location.href = 'saveSong.php';" id="saveMusicButton" class="submit-button">Save
                          Music</button>
                          <button onclick="location.href = 'upcoming_events.php';" id="myButton" class="float-left submit-button">Upcoming Events
                          </button>
                          <button onclick="location.href = 'bio.html';" id="CreateBioButton" class="submit-button">Create Bio</button>

                          <button onclick="location.href = 'profile.php';" id="myButton" class="float-left submit-button">My Profile
                          </button>
                            <button onclick="location.href = 'paypal.html';" id="DonateButton" class="submit-button">Donate </button>
                  </div>
              </div>
          </nav>


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
