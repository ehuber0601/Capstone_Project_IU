<?php
//error_reporting(E_ALL);
//t("display_errors", 1);
?>
<html lang="en">


    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" href="./css/reset.css">
        <link rel="stylesheet" href="./css/style.css">

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;800&display=swap" rel="stylesheet">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
        <title>Profile Page</title>
        <style>
        h1 { font-size: 20px; font-weight: 700; }
        .create_playlist {display: none;}
                .create_event {display: none;}
        </style>
        
    </head>

    <body >
    
    <script>
    
        var username = localStorage.getItem("username2") ;
    
    //alert(username);
    
   var username = localStorage.getItem("username") ;

//alert(username);
    
    
    </script>
    
    
    
    
    
    
    
    <?php 
    
     

    		
    		  $user = $_COOKIE['username'] ;
    
    		$name = $_COOKIE['name'] ;

    		
    		$servername='db.luddy.indiana.edu';
        	$username= 'i494f20_team12';
        	$password = 'my+sql=i494f20_team12';
        	$dbname = 'i494f20_team12';
        	
        	$conn = mysqli_connect($servername, $username, $password, $dbname);
        	
        	
        	if ($conn->connect_error) {
  			die("Connection failed: " . $conn->connect_error);
                }
            
            $sql = "SELECT UserID FROM User WHERE userName='$user'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
    
    		$userID = $row['UserID'] ;
    
            
            $sql = "SELECT artistID FROM Artist WHERE userID='".$row['UserID']."'";
     //    echo $sql;
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
      //      echo "[$sql][".$row['artistID']."]"; 
             ?>

        <div class="container-fluid">
            <div class="d-flex justify-content-between mt-2 mb-4">
                <div class=""> <img src="./images/profile.png" alt=""></div>
                <div>
                	 <div class='user_info'>
                    <p class='mt-2 name' id='first-last-name'><?php echo $name; ?></p> <div class='verfication'>
<?php 

$isArtist = FALSE ;

if ($row['artistID'] > 0 ) {

	$isArtist = TRUE ;
}

if ($isArtist ) {
   echo "<img src='images/Verify.png' style='width: 25px'>" ;
}

?>
</div></div>
                    <p class="mt-2" id="username"><?php echo $user; ?></p>
                    <button class="btn btn-primary pe-2 ps-2 mt-2">Follow</button>
                </div>

                <div class="bio-section">
                    <p class="top-heading mb-2">Bio</p>
                    <textarea id="bio-content" class="text-center" name="" id="" rows="15"
                        cols="40"> User Bio </textarea>
                </div>

            </div>

            <div class="post p-2 border mt-2 mb-2">
                <p class="p-2">Date and time</p>

                <div class="border p-2">
                    <h3>Content of post</h3>
                </div>
            </div>
            <div class="post p-2 border mt-2 mb-2">
                <p class="p-2">Date and time</p>

                <div class="border p-2">
                    <h3>Content of post</h3>
                </div>
            </div>
            <div class="post p-2 border mt-2 mb-2">
                <p class="p-2">Date and time</p>

                <div class="border p-2">
                    <h3>Content of post</h3>
                </div>
            </div>
            <div class="post p-2 border mt-2 mb-2">
                <p class="p-2">Date and time</p>

                <div class="border p-2">
                    <h3>Content of post</h3>
                </div>
            </div>
            <!-- <div class="post p-2 border mt-2 mb-2">
                <p class="p-2">Date and time</p>

                <div class="border p-2">
                    <h3>Content of post</h3>
                </div>
            </div>
            <div class="post p-2 border mt-2 mb-2">
                <p class="p-2">Date and time</p>

                <div class="border p-2">
                    <h3>Content of post</h3>
                </div>
            </div>
            <div class="post p-2 border mt-2 mb-2">
                <p class="p-2">Date and time</p>

                <div class="border p-2">
                    <h3>Content of post</h3>
                </div>
            </div>
            <div class="post p-2 border mt-2 mb-2">
                <p class="p-2">Date and time</p>

                <div class="border p-2">
                    <h3>Content of post</h3>
                </div>
            </div> -->


        </div>
        
        <?php

$user = $_REQUEST['user'] ;

//echo "Username = ".$user."" ;

?>
        
        <div class="artistcontent">
        <h1>Songs</h1>

        
        
        <br>	
        	<?php include 'artistcontent.php';?>
        </div>
        
        <br>
        
        <div class="playlist">
        <h1>Playlists</h1>
        <br>
        <button onclick="$('.create_playlist').css('display','block');">Create Playlist</button>
        <div class='create_playlist'>
        <form action='new_playlist.php' method="post">
        Playlist Name:
        <input type='text' value='' name='playlist_name'><br>
        
        <?php
        
                    		$servername='db.luddy.indiana.edu';
        	$username= 'i494f20_team12';
        	$password = 'my+sql=i494f20_team12';
        	$dbname = 'i494f20_team12';
        	
        	$conn = mysqli_connect($servername, $username, $password, $dbname);
        	
        	
        	if ($conn->connect_error) {
  			die("Connection failed: " . $conn->connect_error);
                }
        
        $sql = 'select * from Song' ;
        
               $result = $conn->query($sql);
        
        $counter = 0 ;
        
		while ($row = $result->fetch_assoc()) {
		
        echo "<input type='checkbox' id='song".$counter."' name='song".$counter."' value='".$row['songID']."'>".$row['title']." (".$row['artistName'].")<br>" ;
        
        $counter = $counter + 1;
        
        } 
        
        
        ?>
        
        <input type='hidden' value='<?php echo $user; ?>' name='user' >
       <input type='submit' value='submit'>
               </form>
  
        </div>
        <br><br>
        
      <?php 
        
            		$servername='db.luddy.indiana.edu';
        	$username= 'i494f20_team12';
        	$password = 'my+sql=i494f20_team12';
        	$dbname = 'i494f20_team12';
        	
        	$conn = mysqli_connect($servername, $username, $password, $dbname);
        	
        	
        	if ($conn->connect_error) {
  			die("Connection failed: " . $conn->connect_error);
                }
        
        $sql = "SELECT playlistName, playlistID FROM Playlist WHERE email = '$user'";
        
        $result = $conn->query($sql);
        
		while ($row = $result->fetch_assoc()) {
		
        echo "<a href='display_playlist.php?playlist=".$row['playlistID']."'>".$row['playlistName']."</a><br>" ;
        
        }
        
        ?>
        
<hr>
        <?php 
        if ($isArtist ) {
        
        ?>
        
<h1>Live Events</h1>
<button onclick="$('.create_event').css('display','block');">Create Event</button>
<div class='create_event'>
<form action='live_event.php' method='post'>
Event Name: <input type='text' value='' name='event_name'><br>
<input type='hidden' value='<?php echo $userID; ?>' name='userID' >
<input type='hidden' value='<?php echo $user; ?>' name='user' >
Date: <input type='date' name='event_date' value='<?php echo date('Y-m-d'); ?>'> (yyyy-mm-dd)<br>
Time: <input type='time' name='event_time' min='00:00' max='23:59'> (hh:mm)<br>
<input type='submit' value='submit'>
</form>
</div>
<br>
<?php

   }     
   
             		$servername='db.luddy.indiana.edu';
        	$username= 'i494f20_team12';
        	$password = 'my+sql=i494f20_team12';
        	$dbname = 'i494f20_team12';
        	
        	$conn = mysqli_connect($servername, $username, $password, $dbname);
        	
        	
        	if ($conn->connect_error) {
  			die("Connection failed: " . $conn->connect_error);
                }
        
        $sql = "SELECT * FROM Event WHERE userID = '$userID'";
        
        $result = $conn->query($sql);
        
        
        
		while ($row = $result->fetch_assoc()) {
		
        echo "<a href='view_event.php?event=". $row['eventID']."'>".$row['date']." ".$row['time']." ".$row['eventName']."</a><br>" ;
        
        }
   
   
?>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
            crossorigin="anonymous"></script>
        <script src="./javascript/newscript.js"></script>
        
    </body>

</html>
