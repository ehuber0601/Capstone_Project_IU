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
    </head>

    <body onload="show_profile()">

        <div class="container-fluid">
            <div class="d-flex justify-content-between mt-2 mb-4">
                <div class=""> <img src="./images/profile.png" alt=""></div>
                <div>
                    <p class="mt-2 name" id="first-last-name">First Name Last Name</p>
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
        
        <div class="artistcontent">
        <ul>
        	<?php
        	$db = mysqli_connect('db.luddy.indiana.edu', 'i494f20_team12', 'my+sql=i494f20_team12', 'i494f20_team12');
        	if ($conn->connect_error) {
  			die("Connection failed: " . $conn->connect_error);
  			
  			$sql = "SELECT s.title FROM Song AS s JOIN Artist AS a ON a.artistID=s.artistID;"
  			$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo $row["title"];
  }
} else {
  echo "0 results";
}
$conn->close();
?>
</ul>
</div>

  		
  



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
            crossorigin="anonymous"></script>
        <script src="./javascript/script.js"></script>
    </body>

</html>
