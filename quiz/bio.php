
<html>
<head>
<link rel="stylesheet" href="allisonstyle.css">
<link href='https://fonts.googleapis.com/css?family=Almarai' rel='stylesheet'>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1">

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
  background-color: #f1faee;
  color: black;
}

.topnav a.active {
  background-color: #8D99AE;
  color: white;
}

h1 {
  font-family: 'Brush Script MT', cursive;
  text-align: center;
}

div.form {

	border-style: outset;
	border-color: #2B2D42;
	background-color: #8D99AE;

	border-width:5px;
    display: block;
    margin-left: auto;
    margin-right: auto;
    text-align: center;
    padding-top: 25px;
    padding-right: 15px;
    padding-left: 15px;
    padding-bottom: 5px;
    width: 50%;
}
</style>

<body>
<div class="topnav">
  <a href="./index.html">Home</a>
  <a href="#,/profile.php">Profile</a>
  <a href="./post-form.html">Make Post</a>
  <a href="./search.html">Search</a>
  <a href="./saveSong.php">Save Song</a>
  <a href="playlist">Make Playlist</a>
  <a class="active" href="./setting.html">Settings</a>
</div>


<h1>Social Sounds</h1>


<div
      Thank you for using Social Sounds. </br>
      Click <a href ="./profile.php"> here </a> to view your profile.
</div>

    
<body>
</html>
    
 
<?php   
//connecting to server
$servername = "db.luddy.indiana.edu";
$username = "i494f20_team12";
$password = "my+sql=i494f20_team12";
  
$conn = mysqli_connect($servername, $username, $password,
'i494f20_team12');

if ($conn-> connect_error) {
  die("Connection falied:". $conn-> connect_error);
}


$userName = mysqli_real_escape_string($conn, $_REQUEST['userName']);
$hometown = mysqli_real_escape_string($conn, $_REQUEST['hometown']);
$genre = mysqli_real_escape_string($conn, $_REQUEST['genre']);
$artist = mysqli_real_escape_string($conn, $_REQUEST['artist']);
$song = mysqli_real_escape_string($conn, $_REQUEST['song']);

//insert query execution
if(isset($_POST['save']))
{

  $sql = "INSERT INTO bio (userName, hometown, genre, artist, song) VALUES ('$userName','$hometown','$genre','$artist','$song')";
  if(mysqli_query($conn, $sql)){
    echo "<script>alert('Records inserted successfully.')</script>";
  } else{
    echo "<script>alert('ERROR: Could not able to execute $sql.')</script>" . mysqli_error($conn);

  }
}

$conn-> close();
?>

