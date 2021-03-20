
<html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="allisonstyle.css">
		<link href='https://fonts.googleapis.com/css?family=Almarai' rel='stylesheet'>
	</head>
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
<h1> Results </h1>
<div class="topnav">
  <a href="./index.html">Home</a>
  <a href="#,/profile.php">Profile</a>
  <a href="./post-form.html">Make Post</a>
  <a class="active href="./search.html">Search</a>
  <a href="./saveSong.php">Save Song</a>
  <a href="playlist">Make Playlist</a>
  <a href="./setting.html">Settings</a>
</div>

<h1> Results </h1>

</body>

<?php

$search = $_POST['search'];

$servername = "db.luddy.indiana.edu";
$username = "i494f20_allnagy";
$password = "my+sql=i494f20_allnagy";
$db = "i494f20_allnagy";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

$sql = "select * from Song where title like '%$search%'";

$result = $conn->query($sql);

if ($result->num_rows > 0){
while($row = $result->fetch_assoc() ){
	echo $row["title"]."  ".$row["artistName"]."  ".$row["genre"]."<br>";
}
} else {
	echo "0 records";
}

$conn->close();

?>
