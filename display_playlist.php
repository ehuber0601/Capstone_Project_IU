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
                
                $playlistID = $_REQUEST['playlist'] ;
        
    $sql = "SELECT * FROM Playlist where playlistID = '".$playlistID."'";
    
  //  echo "[$sql]";
        
        $result = $conn->query($sql);
        
		$row = $result->fetch_assoc() ;
		
  	//		echo "[".$row['playlistID']."][".$row['playlistName']."][".$row['Song']."]" ;
  	
  	
  	echo "Playlist: ".$row['playlistName']."<hr>" ;
  			       
        
        $items = explode(',',$row['Song']) ;
 
      
      foreach($items as $i =>$key) {
 
 
 		
      
   //   	echo $i.' '.$key.'<br>'; 
      	
      	$sql = "select * from Song where songID = '$key'" ;
      	
      	           
        $result = $conn->query($sql);
        
		$row = $result->fetch_assoc() ;
		
		echo $row['title']."<br>" ;
      
      
      
      }
        

 
?>

