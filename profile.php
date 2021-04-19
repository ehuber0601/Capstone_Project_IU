<?php

//error_reporting(E_ALL);

//ini_set("display_errors", 1);

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
  
          <link rel="stylesheet" href="https://cgi.sice.indiana.edu/~team12/css/style.css">

            <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
        <title>Profile Page</title>
        <style>
        h1 { font-size: 20px; font-weight: 700; }
        .create_playlist {display: none;}
                .create_event {display: none;}
        a:link {
  color: black;
  background-color: transparent;
  text-decoration: underline;   
  }     
        a:visited {
  color: red;
  background-color: transparent;
  text-decoration: none;
}
a:hover {
  color: red;
  background-color: transparent;
  text-decoration: underline;
}
a:active {
  color: yellow;
  background-color: transparent;
  text-decoration: underline;
}        

  table {
      margin: auto;
    padding: 15px;
    border-collapse: collapse;
    width: 60%;
    color: #b3b3b4;
    font-family: "Manrope", sans-serif;
    font-size: 25px;
    text-align: left;
    box-shadow: 0px 0px 5px #00000085;
  }
tr:nth-child(even) {background-color: #f2f2f2;}

  tr:nth-child(odd) {background-color: white;}
th {
    background-color: #353b48;
    color: white;
    padding: 15px;
}



        </style>
        
    </head>

    <body>
    <nav class="container-fluid">
        <div class="row">
            <a href="./index.html">
                <div class="col-12 col-sm-12 text-center">
                    <i class="d-inline fa fa-home me-2" aria-hidden="true"></i>
                    <a href="./group.html">
                        <i class="fa fa-users" aria-hidden="true"></i>

                    </a>
                    <div class="d-inline dropdown">
                        <a class="btn fa fa-cog" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        </a>

                        <ul class="dropdown-menu setting-dropdown" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item text-center " href="./setting.html">Setting</a></li>
                        </ul>
                    </div>
                    <button onclick="location.href = 
'post-form.html';" id="makePostButton" class="submit-button">Make
                        Post</button>
                    <button onclick="location.href = 'search.html';" id="searchMusicButton" class="submit-button">Search Music
                    </button>
                    <button onclick="location.href = 'saveSong.php';" id="saveMusicButton" class="submit-button">Save
                        Music</button>
                    <button onclick="location.href = 
'upcoming_events.php';" id="myButton" class="float-left 
submit-button">Upcoming Events
                    </button>
                    <button onclick="location.href = 'bio.html';" id="CreateBioButton" class="submit-button">Create Bio</button>

                    <button onclick="location.href = 'profile.php';" id="myButton" class="float-left submit-button">My Profile
                    </button>
                    <button onclick="location.href = 'paypal.html';" id="DonateButton" class="submit-button">Donate </button>
                </div>
        </div>
    </nav>

    
    <script>
    
        var username = localStorage.getItem("username2") ;
    
    //alert(username);
    
   var username = localStorage.getItem("username") ;

//alert(username);
    
    
    </script>
    
    
    
    
    
    
    
    <?php 
    
     

    		
    		  $user = $_COOKIE['username'] ;
    
    		$name = $_COOKIE['name'] ;

    		$email = $_COOKIE['email'] ;
    		    		$test = $_COOKIE['test'] ;
    		    		    		$test1 = $_COOKIE['test1'] ;
    		    		$sql = $_COOKIE['sql'] ;
    		
    		echo "[$email][$test][$test1]" ;
    		
    		$servername='db.luddy.indiana.edu';
        	$username= 'i494f20_team12';
        	$password = 'my+sql=i494f20_team12';
        	$dbname = 'i494f20_team12';
        	
        	$conn = mysqli_connect($servername, $username, $password, $dbname);
        	
        	
        	if ($conn->connect_error) {
  			die("Connection failed: " . $conn->connect_error);
                }
            
            $sql = "SELECT UserID, firstName, lastName FROM User WHERE userName='$user'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
    
    		$userID = $row['UserID'] ;
    		$name = $row['firstName']. ' '. $row['lastName'];
    
            
            $sql = "SELECT artistID FROM Artist WHERE userID='".$row['UserID']."'";
     //    echo $sql;
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
      //      echo "[$sql][".$row['artistID']."]"; 
             ?>

        <div class="container-fluid">
            <div class="justify-content-between mt-2 mb-4">
              
             
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
</div>
                    <p class="mt-2" id="username"><?php echo $user; ?></p>
                    
                </div>

                <div class="bio-section">
                    <!-- 
<p class="top-heading mb-2">Bio</p>
                    <textarea id="bio-content" class="text-center" name="" id="" rows="15"
                        cols="40"> User Bio </textarea>

 -->

 
 <?php
 
 
 
 			$servername='db.luddy.indiana.edu';
        	$username= 'i494f20_team12';
        	$password = 'my+sql=i494f20_team12';
        	$dbname = 'i494f20_team12';
        	
        	$conn = mysqli_connect($servername, $username, $password, $dbname);
        	
        	
        	if ($conn->connect_error) {
  			die("Connection failed: " . $conn->connect_error);
                }
                
            $sql = "SELECT * FROM bio WHERE userName = '$user'";
            $result = $conn->query($sql);
            
           
           
           
           
           
            echo "<br><table>";

   		    echo "<tr><th>Hometown</th><th>Favorite Genre</th><th>Favorite Artist</th><th>Favorite Song</th>";
   		  
   		    
          if( $row = $result->fetch_assoc()) {
            
  
  echo "<tr><td>". $row['hometown']. "</td><td>" .$row['genre']."</td><td>".$row['artist']."</td><td>".$row['song']."</td></tr>";
  
  } else {
  
  	echo "<tr><td clspan='4'><a href='./bio.html'>Create Bio</a></td></tr>";
  
  }
  
  ?>
  </table>

            
                </div>             
    
                
<div class='user_posts'>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
    <br>
     <br>
     <br>
     
     
     
      <?php
 
 
 
 			$servername='db.luddy.indiana.edu';
        	$username= 'i494f20_team12';
        	$password = 'my+sql=i494f20_team12';
        	$dbname = 'i494f20_team12';
        	
        	$conn = mysqli_connect($servername, $username, $password, $dbname);
        	
        	
        	if ($conn->connect_error) {
  			die("Connection failed: " . $conn->connect_error);
                }
                
            $sql = "SELECT * FROM Posts WHERE userID = '$userID'";
            $result = $conn->query($sql);
            
            
            		while ($row = $result->fetch_assoc()) {
	
        echo '<div class="post p-2 border mt-2 mb-2"><p class="p-2">' ;
        echo $row['postDate'];
        echo '</p><div class="border p-2"><h3>' ;
        echo $row['postContent'] ;
        echo '</h3></div></div>' ;
        
        
        }
            
            ?>

   
   
        </div>
        
        <?php

$user = mysqli_real_escape_string($conn,$_REQUEST['user']) ;

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
        
        
        <style>
        
        .user_info {
display: block;
float: left!important;

width: 50%!important;
}

.bio-section {
display: block;
float: left!important;

width:50%!important;
}


.user_posts {
display: block;
float: left!important;

width: 100%!important;
}

.artistcontent, .playlist {

display: block;
float: left!important;

width: 100%!important;

}


</style>
        
        
    </body>

</html>
