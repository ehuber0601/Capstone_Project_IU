<?php
// Create connection
$conn=mysqli_connect("db.luddy.indiana.edu","i494f20_allnagy","my+sql=i494f20_allnagy","i494f20_allnagy");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error() . "<br>");
}
        
// Grab POST Data
$var_search = mysqli_real_escape_string($conn, $_GET['searchbar']);
        
// Create SQL Statement 
$sql = ("SELECT * FROM Song WHERE (`title` LIKE '%".$var_search."%') OR (`artistName` LIKE '%".$var_search."%') OR (`genre` LIKE
'%".$var_search."%')");
        
// Get Results
$result = mysqli_query($conn, $sql);
        
// Get Number of Rows
$num_rows = mysqli_num_rows($result);

// Display Results
echo $_POST['searchname'];
if ($result->num_rows > 0) {
    echo "<table>";
        echo "<tr>
        <th>Song ID</th>
        <th>Artist</th>
        <th>Time</th>
        <th>Genre</th>
        <th>Title</th>
        </tr>";
    // Output data of each row, ->fetch_assoc gives array of arrays with keys matching column names
	while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["songID"]."</td><td>".$row["artistName"]."</td><td>".$row["length"]."</td>
        	<td>".$row["genre"]."</td><td>".$row["title"]."</td></tr>";

}    
    }
    echo "</table>";
echo "$num_rows Rows <br>";
// Close Connection
mysqli_close($conn);
?>
