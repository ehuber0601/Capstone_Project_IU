		<?php
        	$servername='db.luddy.indiana.edu';
        	$username= 'i494f20_team12';
        	$password = 'my+sql=i494f20_team12';
        	$dbname = 'i494f20_team12';
        	
        	$conn = mysqli_connect($servername, $username, $password, $dbname);
        	
        	
        	if ($conn->connect_error) {
  			die("Connection failed: " . $conn->connect_error);
                }
            $user = $_COOKIE['username'] ; 
            $sql = "SELECT UserID FROM User WHERE userName='$user'";
            $result = $conn->query($sql);
            
            $row = $result->fetch_assoc();
    //    echo "[$sql][".$row['UserID']."]"; 
            
            $sql = "SELECT artistID FROM Artist WHERE userID='".$row['UserID']."'";
       //     echo $sql;
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
       //     echo "[$sql][".$row['artistID']."]"; 
            
                  
  			
  			$sql = "SELECT title FROM Song WHERE artistID='".$row['artistID']."'";
  			$result = $conn->query($sql);
  			
  	//		            echo "[$sql][".$row['artistID']."]"; 

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
