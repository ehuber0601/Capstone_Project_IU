<?php include('server.php') ?>
<!DOCTYPE html>

<html>
<head> <link rel="stylesheet" href="style.css"> </head>
<title> Create an Account </title>
<body>
<h1> Create an Account </h1>

<body>
<form method="post" action="newUser.php">
<?php include('errors.php'); ?>

First Name:
<input type="text" id="first" name="first" value="<?php echo $firstName; ?>">
<br>
Last Name:
<input type="text" id="last" name="last" value="<?php echo $lastName; ?>" >
<br>
Email Address:
<input type="email" id="email" name="email" value="<?php echo $email; ?>">
<br>
Phone Number:
<input type="text" id="email" name="phone" value="<?php echo $phoneNumber; ?>">
<br>
Birthday (MM/DD/YYYY):
<input type="date" id="birthday" name="birthday" value="<?php echo $DOB; ?>">
<br>
Username:
<input type="text" id="username" name="username" value="<?php echo $userName; ?>">
<br>
Password:
<input type="password" id="pwd" name="pwd" value="<?php echo $Password; ?>" >
<br>
<input type="submit" value="Submit">
</form>



</body>
</html>
