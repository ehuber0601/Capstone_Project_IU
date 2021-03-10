<!DOCTYPE html>
<html>
<head>
  <!header style from here to...>
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
               <form method="POST" action="search.html">
                     <input type="text" name="searchbar"   />
                     <input type="submit" value="Search Song" />
               </form>
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
                                                    <li><a class="dropdown-item"
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
                          <li><a class="dropdown-item" href="#">Your
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
                          <li><a class="dropdown-item" href="#">Your
  Music
                              </a>
                              <span class="fa fa-angle-right"></span>
                          </li>
                          <li><a class="dropdown-item" href="#">Support
                              </a>
                              <span class="fa fa-angle-right"></span>
                          </li>
                      </ul>
                  </div>
              </div>
          </div>
      </nav>

      <div class="main-header text-center pt-3 pb-3">

       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
          crossorigin="anonymous"></script>
      <script src="./javascript/script.js"></script>

      <script> load_posts()</script>

  </body>
<!................HERE..........................>
  <h1>
  <div class="main-header text-center pt-3 pb-3">
            </div>
           <button onclick="location.href = 'index.html';" id="myButton" class="float-right submit-button" >Go Back Home</button>
            <form class="form-signin" id="post-form" action="" onsubmit="event.preventDefault();post();">


</br>
</br>
  </h1>
  <style>

    html {
      background-color: #b3b3b4;
    }

    table {
      border-collapse: collapse;
      width: 100%;
      color: #b3b3b4;
      font-family: "Manrope", sans-serif;
      font-size: 25px;
      text-align: left;
    }
    th {
      background-color: blueviolet;
      color: white;
    }
    tr:nth-child(even) {background-color: #f2f2f2;}

    tr:nth-child(odd) {background-color: white;}


  </style>
</head>
<body>
<table>
  <tr>
    <th>Song ID</th>
    <th>Artist ID</th>
    <th>Artist Name</th>
    <th>Length</th>
    <th>Genre</th>
    <th>Title</th>
  </tr>

  <p>Save a song to your profile:</p>
  <form action="testingsave.php" method="post">
  </br><label for="userName">Your Username:</label></br>
  <input type="text" id="userName" name="userName"></br>
  <label for="songzID">Song ID:</label></br>
  <input type="text" id="songID" name="songID"></br>
</br><button type="submit" name="save">save</button></br>
</body>

<?php
//connecting to server (can change to your personal database)
$servername = "db.luddy.indiana.edu";
$username = "i494f20_team12";
$password = "my+sql=i494f20_team12";

$conn = mysqli_connect($servername, $username, $password, 'i494f20_team12');
if ($conn-> connect_error) {
  die("Connection falied:". $conn-> connect_error);
}

//showing table of songs
$sql = "SELECT songID, artistID, artistName, length, genre, title FROM Song";
$result = $conn-> query($sql);

if ($result-> num_rows > 0) {
  while ($row = $result-> fetch_assoc()) {
    echo "<tr><td>". $row["songID"] ."</td><td>". $row["artistID"] ."</td><td>". $row["artistName"] ."</td><td>". $row["length"] ."</td><td>". $row["genre"] ."</td><td>". $row["title"] ."</td></tr>";
  }
  echo "</table>";
}
else {
  echo "0 result";
}


//naming variables for inserted text
$song = mysqli_real_escape_string($conn, $_REQUEST[songID]);
$userName = mysqli_real_escape_string($conn, $_REQUEST['userName']);


// Attempt insert query execution
if(isset($_POST['save']))
{
  $sql = "INSERT INTO saveSong(song, userName) VALUES ('$song', '$userName')";
  if(mysqli_query($conn, $sql)){
    echo "Records inserted successfully.";
  } else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
  }
}

$conn-> close();
?>


</body>
</html>

