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
if ($result->num_rows > 0) {
    echo "<table>";
        echo "<tr>
        <th>Shift ID</th>
        <th>Employee ID</th>
        <th>wdate</th>
        <th>time_in</th>
        <th>time_out</th>
        <th>role</th>
        </tr>";
    // Output data of each row, ->fetch_assoc gives array of arrays with keys matching column names
	 //while($row = $result->fetch_assoc()) {
        //echo "<tr><td>".$row["shiftid"]."</td><td>".$row["empid"]."</td><td>".$row["wdate"]."</td>
                      //<td>".$row["time_in"]."</td><td>".$row["time_out"]."</td><td>".$row["role"]."</td></tr>";


while ($row = mysql_fetch_array($result)){
echo 'songID: ' .$row['songID'];
echo '<br /> artistID: ' .$row['artistID'];
echo '<br /> Artist Name: '.$row['artistName'];
echo '<br /> Time: '.$row['length'];
echo '<br /> Genre: '.$row['genre'];
echo '<br /> Title: '.$row['title'];
}    
    }
    echo "</table>";
echo "$num_rows Rows <br>";
// Close Connection
mysqli_close($conn);
?>
