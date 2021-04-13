<?php

$username = $_POST['username'];
/* Attempt MySQL server connection.  */
$servername = "db.luddy.indiana.edu";
$username = "i494f20_team12";
$password = "my+sql=i494f20_team12";
$db = "i494f20_team12";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error){
        die("Connection failed: ". $conn->connect_error);
}


// Attempt select query execution
//$sql = "SELECT * FROM bio";
$sql = "select * from bio where userName like '%$username%'";
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>userName</th>";
                echo "<th>hometown</th>";
                echo "<th>artist</th>";
                echo "<th>song</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['userName'] . "</td>";
                echo "<td>" . $row['hometown'] . "</td>";
                echo "<td>" . $row['artist'] . "</td>";
                echo "<td>" . $row['song'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "<script>alert('No records matching your username were found.')</script>";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($conn);
?>

