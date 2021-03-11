<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
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
        <title>Profile Page</title>
        <style>
        h1 { font-size: 20px; font-weight: 700; }
        </style>
    </head>

    <body onload="show_profile()">
    <?php 
    		$user = $_REQUEST['user'];
    		
    		$servername='db.luddy.indiana.edu';
        	$username= 'i494f20_team12';
        	$password = 'my+sql=i494f20_team12';
        	$dbname = 'i494f20_team12';
        	
        	$conn = mysqli_connect($servername, $username, $password, $dbname);
        	
        	
        	if ($conn->connect_error) {
  			die("Connection failed: " . $conn->connect_error);
                }
            
            $sql = "SELECT UserID FROM User WHERE email='$user'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            //echo "[$sql][".$row['UserID']."]"; 
            
            $sql = "SELECT artistID FROM Artist WHERE userID='".$row['UserID']."'";
            //echo $sql;
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            //echo "[$sql][".$row['artistID']."]"; 
             ?>

        <div class="container-fluid">
            <div class="d-flex justify-content-between mt-2 mb-4">
                <div class=""> <img src="./images/profile.png" alt=""></div>
                <div>
                	 <div class='user_info'>
                    <p class='mt-2 name' id='first-last-name'>First Name Last Name</p> <div class='verfication'>
<?php 
if ($row['artistID'] > 0 ) {
   echo "<img src='images/Verify.png' style='width: 25px'>" ;
}

?>
</div></div>
                    <p class="mt-2" id="username">@username</p>
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
        
        





        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
            crossorigin="anonymous"></script>
        <script src="./javascript/script.js"></script>
        
    </body>

</html>
