<?php

//logout.php

include('login.html');

//Reset OAuth access token
$google_client->revokeToken();

//Destroy entire session data.
session_destroy();

//redirect page to login.html
header('location:login.html');

?>
