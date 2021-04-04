<html>

    <head>
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
        <title>Home Page</title>

        <script> let session_id = localStorage.getItem("session_id");


            if (session_id === "" || session_id === null) {
                location.href = "./login.html"
                         location.href = "./login.html"
            }
        </script>
        <script>

function show_profile2() {
  if (
    localStorage.getItem(
      "session_id" === null || localStorage.getItem("session_id") === ""
    )
  ) {
    window.location = "./profile.php";
  } else {
    var request_url = this.base_url + "view_user_profile.php";
    console.log("requested url ", request_url);
    var json = { username: localStorage.getItem("username") };
                         
    fetch(request_url, {
          method: "POST",
      mode: "no-cors",
      body: JSON.stringify(json),
      headers: {
        "Content-type": "application/x-www-form-urlencoded;
charset=UTF-8",
      },
    })
     .then((response) => {
        if (!response.ok) {
          console.log("response is, ", response);
          throw new Error("Could not reach website.");
        }
        console.log(response);
        return response.json();
      })
            .then(function (json) {
        console.log("Data from fetch");
        console.log(json);
      
        
document.getElementById("profilelink").href="profile.php?user=" +
json["username"];
      })
      .catch((err) => console.error(err));
  }
}
          
</script>
<style>
.profile { display: block;
float: left;}
.profilepage {font-size: 20px;
color: black; }
</style>
    </head>
        
    <body onload="show_profile2()">

        <nav class="container-fluid">
            <div class="row">
   
                <div class="col-11 text-center">
                 <div class="profile">
            <a class="profilepage" id= "profilelink"
href="./profile.php">My Profile</a>
            </div>
                </div>
                <div class="col-1 text-end">
                    <i class="d-inline fa fa-home me-2"
aria-hidden="true"></i>
                    <div class="d-inline dropdown">
                        <a class="btn fa fa-cog" href="#" role="button"
id="dropdownMenuLink" data-bs-toggle="dropdown"
                            aria-expanded="false">
                        </a>
                        <ul class="dropdown-menu setting-dropdown"
aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item text-center "
href="./setting.html">Setting</a></li>
<li><a
class="dropdown-item"
href="#">Notification
                                </a>
                                <span class="fa fa-angle-right"></span>
                            </li>
                            <li><a class="dropdown-item"
href="./profile.html">Account
                                </a>
                                <span class="fa fa-angle-right"></span>
                            </li>
                            <li><a class="dropdown-item" href="#">Security
                                </a>
                                <span class="fa fa-angle-right"></span>
                            </li>
                            <li><a class="dropdown-item" href="#">Posts
                                </a>
                                <span class="fa fa-angle-right"></span>
                            </li>
                            <li><a class="dropdown-item" href="#">Liked
Posts
                                </a>
                                <span class="fa fa-angle-right"></span>
                            </li>
                            <li><a class="dropdown-item" href="#">Privacy
                                </a>
                                <span class="fa fa-angle-right"></span>
                            </li>
                                </a>
                            <li><a class="dropdown-item" href="#">Your
Music
                                </a>
                                <span class="fa fa-angle-right"></span>
                            </li>
                            <li><a class="dropdown-item" href="#">Support
                                </a>
                                <span class="fa fa-angle-right"></span>
                            </li>
                                </a>
                        <li><a class="dropdown-item" href="./index.html">Home
                                         </a>
                                <span class="fa fa-angle-right"></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <div class="main-header text-center pt-3 pb-3">
                                
         <script
src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
                                
integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
            crossorigin="anonymous"></script>
        <script src="./javascript/script.js"></script>
                            
        <script> load_posts()</script>

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
