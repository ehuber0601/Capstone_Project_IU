<html>
<head>
<title>Bio Redirect</title>
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
        <title>Create Bio</title>

    </head>
<link rel="stylesheet" href="style.css">


</head>
<link rel="stylesheet" href="style.css">
</head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>


h1 {
  font-family: 'Brush Script MT', cursive;
  text-align: center;
}

div.form {
        border-style: outset;
        border-color: #2B2D42;
        background-color: #8D99AE;
        border-width:5px;
    display: block;
    margin-left: auto;
    margin-right: auto;
    text-align: center;
    padding-top: 25px;
    padding-right: 15px;
    padding-left: 15px;
    padding-bottom: 5px;
    width: 50%;
}
</style>

<body>

      <nav class="container-fluid">
            <div class="row">
              
                <div class="col-12 col-sm-12 text-center">
                    <i class="d-inline fa fa-home me-2" aria-hidden="true"></i>
                    <a  href ="./group.html">
                        <i class="fa fa-users" aria-hidden="true"></i>

                    </a>
                    <div class="d-inline dropdown">
                        <a class="btn fa fa-cog" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                            aria-expanded="false">
                        </a>

                        <ul class="dropdown-menu setting-dropdown" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item text-center " href="./setting.html">Setting</a></li>
                        </ul>
                    </div>
                        <button onclick="location.href = 'post-form.html';" id="makePostButton" class="submit-button">Make
                        Post</button>
                         <button onclick="location.href = 'search.html';" id="myButton" class="float-left submit-button">Search Music
                        </button>
                    <button onclick="location.href = 'saveSong.php';" id="saveMusicButton" class="submit-button">Save
                        Music</button>
                        <button onclick="location.href = 'upcoming_events.php';" id="myButton" class="float-left submit-button">Upcoming Events
                        </button>
                    
                         <button onclick="location.href = 'bio.html';" id="myButton" class="float-left submit-button">Create Bio
                        </button>

                        <button onclick="location.href = 'profile.php';" id="myButton" class="float-left submit-button">My Profile
                        </button>
                </div>
            </div>
        </nav>



<h1>Social Sounds</h1>
        
<div
      <p>Thank you for using Social Sounds. </p>
      Click <a href ="./bioLoopkup.html"> here </a> to view your bio.
    

</div>

  
<?php
//connecting to server
$servername = "db.luddy.indiana.edu"; 
$username = "i494f20_team12";
$password = "my+sql=i494f20_team12";

$conn = mysqli_connect($servername, $username, $password,
'i494f20_team12');
if ($conn-> connect_error) {
  die("Connection falied:". $conn-> connect_error);
}
    
      
$userName = mysqli_real_escape_string($conn, $_REQUEST['userName']);
$hometown = mysqli_real_escape_string($conn, $_REQUEST['hometown']);
$genre = mysqli_real_escape_string($conn, $_REQUEST['genre']);
$artist = mysqli_real_escape_string($conn, $_REQUEST['artist']);
$song = mysqli_real_escape_string($conn, $_REQUEST['song']);

//insert query execution
if(isset($_POST['save']))
{
  $sql = "INSERT INTO bio (userName, hometown, genre, artist, song) VALUES
('$userName','$hometown','$genre','$artist','$song')";
  if(mysqli_query($conn, $sql)){
    echo "<script>alert('Records inserted successfully.')</script>";
  } else{
    echo "<script>alert('ERROR: Could not able to execute
$sql.')</script>" . mysqli_error($conn);
  }
}

$conn-> close();
?>

</body>
</html>
