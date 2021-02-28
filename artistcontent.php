
        	<?php
        	$servername='db.luddy.indiana.edu';
        	$username= 'i494f20_team12';
        	$password = 'my+sql=i494f20_team12';
        	$dbname = 'i494f20_team12';
        	
        	
        	
        	if ($conn->connect_error) {
  			die("Connection failed: " . $conn->connect_error);
                }
                
            $artist = isset($_GET['artistID']) ? $_GET['artistID'] : 'No Songs';    
  			
  			$sql = "SELECT s.title FROM Song AS s JOIN Artist AS a ON a.artistID=s.artistID";
  			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
  // output data of each row
  			while($row = $result->fetch_assoc()) {
    		echo "<ul>".$row["title"]."</ul>";
  		}
			 }else {
  				echo "0 results";
					}
				$conn->close();
			?>

