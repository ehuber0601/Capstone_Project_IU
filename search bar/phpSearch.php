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
