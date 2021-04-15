<?
$servername='db.luddy.indiana.edu';
        	$username= 'i494f20_team12';
        	$password = 'my+sql=i494f20_team12';
        	$dbname = 'i494f20_team12';
        	
<<<<<<< HEAD
        	$conn = mysqli_connect($servername, $username, $password, 
$dbname);
=======
        	$conn = mysqli_connect($servername, $username, $password, $dbname);
>>>>>>> 3757a3dfc8433a033a76268d48399f68bed7134a
        	
        	
        	if ($conn->connect_error) {
  			die("Connection failed: " . $conn->connect_error);
                }
                
                $user = $_REQUEST['user'];

                $event = $_REQUEST['event_name'];
                $date = $_REQUEST
                
<<<<<<< HEAD
                $sql = "INSERT INTO Event (playlistName, email, Song ) 
VALUES ('$playlist','$user', '$song_array')";
=======
                $sql = "INSERT INTO Event (playlistName, email, Song ) VALUES ('$playlist','$user', '$song_array')";
>>>>>>> 3757a3dfc8433a033a76268d48399f68bed7134a
            $result = $conn->query($sql);
            
            echo mysqli_error(); 

          $userID = $_REQUEST['userID'];
                $event = $_REQUEST['event_name'];
                $date = $_REQUEST['event_date'];
                $time = $_REQUEST['event_time'];
                
<<<<<<< HEAD
                $sql = "INSERT INTO Event (userID, eventName, date, time ) 
VALUES ('$userID','$event','$date', '$time')";
=======
                $sql = "INSERT INTO Event (userID, eventName, date, time ) VALUES ('$userID','$event','$date', '$time')";
>>>>>>> 3757a3dfc8433a033a76268d48399f68bed7134a
            $result = $conn->query($sql);
            
            echo mysqli_error(); ?>
            
<<<<<<< HEAD
            <a href = "profile.php?user=<?php echo $user; ?>">Back to 
Profile</a>
=======
            <a href = "profile.php?user=<?php echo $user; ?>">Back to Profile</a>

>>>>>>> 3757a3dfc8433a033a76268d48399f68bed7134a
