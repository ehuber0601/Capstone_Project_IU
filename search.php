<html>
<head>
        <title>Search Results</title>
        <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
// Create connection
$conn=mysqli_connect("db.luddy.indiana.edu","i494f20_team12","my+sql=i494f20_team12","i494f20_team12");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error() . "<br>");
}

// Grab POST Data
$var_search = mysqli_real_escape_string($conn, $_GET['search']);

// Create SQL Statement
$sql = ("SELECT * FROM Song WHERE (`title` LIKE '%".$var_search."%');

// Get Results
$result = mysqli_query($conn, $sql);

// Get Number of Rows
$num_rows = mysqli_num_rows($result);

// Display Results
echo $_POST['search'];
if ($result->num_rows > 0) {
    echo "<table>";
        echo "<tr>
        <th>Artist</th>
        <th>Song</th>
        <th>Length</th>
        <th>Genre</th>
        </tr>";
    // Output data of each row, ->fetch_assoc gives array of arrays with keys 
matching column names
        while($row = $result->fetch_assoc()) {
        echo 
"<tr><td>".$row["artistName"]."</td><td>".$row["title"]."</td><td>".$row["length"]."</td>
                <td>".$row["genre"]."</td></tr>";

}
    }
    echo "</table>";
echo "$num_rows Rows <br>";
// Close Connection
mysqli_close($conn);
?>

    </body>
</html>
