<?php

//$search = $_POST['search'];

$servername = "db.luddy.indiana.edu";
$username = "i494f20_allnagy";
$password = "my+sql=i494f20_allnagy";
$db = "i494f20_allnagy";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

$sql = "INSERT INTO Quiz ('username','color','day','season','vacation','food')  
VALUES ('".$_POST["username"]."','".$_POST["color"]."','".$_POST["day"]."',
'".$_POST["season"]."','".$_POST["vacation"]."','".$_POST["food"]."')";

$select = "select * from Quiz";

$result = $conn->query($sql);

if ($result->num_rows > 0){
while($row = $result->fetch_assoc() ){
	echo $row["username"]."  ".$row["color"]."  ".$row["food"]."<br>";
}
} else {
	echo "0 records";
}

$conn->close();

?>
