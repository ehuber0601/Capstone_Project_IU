<button onclick="location.href = 'index.html';" id="myButton" class="float-left submit-button" >Homepage</button>
<?php 

$servername='db.luddy.indiana.edu';
        	$username= 'i494f20_team12';
        	$password = 'my+sql=i494f20_team12';
        	$dbname = 'i494f20_team12';
        	
        	$conn = mysqli_connect($servername, $username, $password, $dbname);
        	
        	
        	if ($conn->connect_error) {
  			die("Connection failed: " . $conn->connect_error);
  			
  			}
  
  $sql= "SELECT * from Event as e JOIN User as u On u.userID=e.userID";

          $result = $conn->query($sql);
          $row = $result->fetch_assoc() ;
  
  echo "<h1>Upcoming Events</h1>";
  
  while ($row = $result->fetch_assoc()) {
  
  
  
  
  
  echo "<a href='view_event.php?event=". $row['eventID']."'>".$row['eventName']." ".$row['date']." ".$row['time']." ".$row['firstName']." ".$row['lastName']."<br>";
  
  
  }
  ?>