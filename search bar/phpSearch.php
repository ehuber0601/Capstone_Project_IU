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
        <title>Search Results</title>

    </head>

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
                    <button onclick="location.href = 'saveSong.php';" id="saveMusicButton" class="submit-button">Save
                        Music</button>
                        <button onclick="location.href = 'upcoming_events.php';" id="myButton" class="float-left submit-button">Upcoming Events
                        </button>

                        <button onclick="location.href = 'profile.php';" id="myButton" class="float-left submit-button">My Profile
                        </button>
                </div>
            </div>
        </nav>

        <div class="main-header text-center pt-3 pb-3">
            <h2>Search Results</h2>
        </div>
        


<?php

$search = $_POST['search'];

$servername = "db.luddy.indiana.edu";
$username = "i494f20_team12";
$password = "my+sql=i494f20_team12";
$db = "i494f20_team12";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

$sql = "select * from Song where title like '%$search%'";

$result = $conn->query($sql);

if ($result->num_rows > 0){
while($row = $result->fetch_assoc() ){
	echo $row["title"]."  ".$row["artistName"]."  ".$row["genre"]."<br>";
}
} else {
	echo "0 records";
}

$conn->close();

?>

</body>
</html>
