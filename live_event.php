<?
$servername='db.luddy.indiana.edu';
        	$username= 'i494f20_team12';
        	$password = 'my+sql=i494f20_team12';
        	$dbname = 'i494f20_team12';
        	
        	$conn = mysqli_connect($servername, $username, $password, $dbname);
        	
        	
        	if ($conn->connect_error) {
  			die("Connection failed: " . $conn->connect_error);
                }
                
                $user =  mysqli_real_escape_string($conn,$_REQUEST['user']);
          $userID = mysqli_real_escape_string($conn,$_REQUEST['userID']);
                $event = mysqli_real_escape_string($conn,$_REQUEST['event_name']);
                $date = mysqli_real_escape_string($conn, $_REQUEST['event_date']);
                $time = mysqli_real_escape_string($conn,$_REQUEST['event_time']);
                
                $sql = "INSERT INTO Event (userID, eventName, date, time ) VALUES ('$userID','$event','$date', '$time')";
            $result = $conn->query($sql);
            
            echo mysqli_error(); 
            
            header("Location: profile.php");
            
            
            ?>

