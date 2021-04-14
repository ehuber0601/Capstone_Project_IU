<button onclick="location.href = 'index.html';" id="myButton" class="float-left submit-button" >Homepage</button>
<?php

//error_reporting(E_ALL);
//ini_set("display_errors", 1);



            		$servername='db.luddy.indiana.edu';
        	$username= 'i494f20_team12';
        	$password = 'my+sql=i494f20_team12';
        	$dbname = 'i494f20_team12';
        	
        	$conn = mysqli_connect($servername, $username, $password, $dbname);
        	
        	
        	if ($conn->connect_error) {
  			die("Connection failed: " . $conn->connect_error);
                }
                
                $eventID = $_REQUEST['event'] ;
        
    $sql = "SELECT * FROM Event where eventID = '".$eventID."'";
    
  //  echo "[$sql]";
        
        $result = $conn->query($sql);
        
		$row = $result->fetch_assoc() ;
		
  	//		echo "[".$row['playlistID']."][".$row['playlistName']."][".$row['Song']."]" ;
  	
  	
  	echo "Event: ".$row['eventName']." ".$row['date']." ".$row['time']."<hr>" ;
  			       
  
  $date = date('Y-m-d') ;
  $time = date("H:i:s") ;
  
  if (($date >= $row['date']) and ($time >= $row['time']) ) {
  
        
  
  echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/oSzwQLxxA2E" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
  
 
 }
 		
      



 
?>

