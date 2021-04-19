<?php

$servername='db.luddy.indiana.edu';
        	$username= 'i494f20_team12';
        	$password = 'my+sql=i494f20_team12';
        	$dbname = 'i494f20_team12';
        	
        	$conn = mysqli_connect($servername, $username, $password, $dbname);
        	
        	
        	if ($conn->connect_error) {
  			die("Connection failed: " . $conn->connect_error);
                }
                
                $user = mysqli_real_escape_string($conn,$_REQUEST['user']);
                $playlist = mysqli_real_escape_string($conn,$_REQUEST['playlist_name']);
                
                $counter = 1 ;
                
                $song_array = '' ;
                
                while ($counter < 50) {
                
                	$songID = mysqli_real_escape_string($conn,$_REQUEST['song'.$counter]);
                
                	$counter = $counter + 1; 
                	
         //       	echo "[$songID]<br>" ;
                	
                	if ($songID > 0 ) {
                	
                		$song_array = $song_array. $songID . ',' ;
                	
                	}
                	
                
                }
                
  
            
            $sql = "INSERT INTO Playlist (playlistName, email, Song ) VALUES ('$playlist','$user', '$song_array')";
            $result = $conn->query($sql);
            
            echo mysqli_error();
                
                header("Location: profile.php") ;
                
?>
