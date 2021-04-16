<html>
<head>
<title>Upcoming Events</title>
<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, 
initial-scale=1.0">
        <link 
href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" 
rel="stylesheet"
            
integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" 
crossorigin="anonymous">
        <link rel="stylesheet" href="./css/reset.css">
        <link rel="stylesheet" href="./css/style.css">

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link 
href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;800&display=swap" 
rel="stylesheet">
        <link rel="stylesheet"
            
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
        <nav class="container-fluid">
            <div class="row">
              	<a href="./index.html">
                <div class="col-12 col-sm-12 text-center">
                    <i class="d-inline fa fa-home me-2" 
aria-hidden="true"></i>
                    <a  href ="./group.html">
                        <i class="fa fa-users" aria-hidden="true"></i>

                    </a>
                    <div class="d-inline dropdown">
                        <a class="btn fa fa-cog" href="#" role="button" 
id="dropdownMenuLink" data-bs-toggle="dropdown"
                            aria-expanded="false">
                        </a>

                        <ul class="dropdown-menu setting-dropdown" 
aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item text-center " 
href="./setting.html">Setting</a></li>
                        </ul>
                    </div>
                        <button onclick="location.href = 
'post-form.html';" id="makePostButton" class="submit-button">Make
                        Post</button>
                        <button onclick="location.href = 'search.html';" 
id="searchMusicButton" class="submit-button">Search Music
        			</button>
                    <button onclick="location.href = 'saveSong.php';" 
id="saveMusicButton" class="submit-button">Save
                        Music</button>
                        <button onclick="location.href = 
'upcoming_events.php';" id="myButton" class="float-left 
submit-button">Upcoming Events
                        </button>
                        <button onclick="location.href = 'bio.html';" 
id="CreateBioButton" class="submit-button">Create Bio</button>

                        <button onclick="location.href = 'profile.php';" 
id="myButton" class="float-left submit-button">My Profile
                        </button>
                          <button onclick="location.href = 'paypal.html';" 
id="DonateButton" class="submit-button">Donate </button>
                </div>
            </div>
        </nav>

<br>
<div class="main-header text-center pt-3 pb-3">
            <h2>Upcoming Events</h2>
        </div>
<?php 

$servername='db.luddy.indiana.edu';
        	$username= 'i494f20_team12';
        	$password = 'my+sql=i494f20_team12';
        	$dbname = 'i494f20_team12';
        	
        	$conn = mysqli_connect($servername, $username, $password, $dbname);
        	
        	
        	if ($conn->connect_error) {
  			die("Connection failed: " . $conn->connect_error);
  			
  			}
  
  $sql= "SELECT * from Event as e JOIN User as u On u.userID=e.userID";

          $result = $conn->query($sql);
          $row = $result->fetch_assoc() ;
  
  
  

  echo "<br><table>";

    echo "<tr><th>Name</th><th>Date</th><th>Time</th><th>First Name</th><td>Last Name</th></tr>";


  while ($row = $result->fetch_assoc()) {
  
  
  
  
  
  echo "<tr><td><a href='view_event.php?event=". $row['eventID']."'>".$row['eventName']."</td><td>".$row['date']."</td><td>".$row['time']."</td><td>".$row['firstName']."</td><td>".$row['lastName']."</td></tr>";
  
  
  }
  ?>
  </table>
  
  <style>
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
/* 
h1{font-size: 24px;
}
.main-header {
    font-size: 28px;
    font-weight: 600;
}
.main-header h2 {
    font-size: 55px;
    font-weight: 700;
    color: #fff;
}
 */

  
  </style>
  
  
  </body>
  </html>
