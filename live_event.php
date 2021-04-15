<?
$servername='db.luddy.indiana.edu';
        	$username= 'i494f20_team12';
        	$password = 'my+sql=i494f20_team12';
        	$dbname = 'i494f20_team12';
        	
        	$conn = mysqli_connect($servername, $username, $password, $dbname);
        	
        	
        	if ($conn->connect_error) {
  			die("Connection failed: " . $conn->connect_error);
                }
                
                $user = $_REQUEST['user'];

                $event = $_REQUEST['event_name'];
                $date = $_REQUEST
                
                $sql = "INSERT INTO Event (playlistName, email, Song ) VALUES ('$playlist','$user', '$song_array')";
            $result = $conn->query($sql);
            
            echo mysqli_error(); 

          $userID = $_REQUEST['userID'];
                $event = $_REQUEST['event_name'];
                $date = $_REQUEST['event_date'];
                $time = $_REQUEST['event_time'];
                
                $sql = "INSERT INTO Event (userID, eventName, date, time ) VALUES ('$userID','$event','$date', '$time')";
            $result = $conn->query($sql);
            
            echo mysqli_error(); ?>
            
            <a href = "profile.php?user=<?php echo $user; ?>">Back to Profile</a>

