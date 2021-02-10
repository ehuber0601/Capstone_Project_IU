<?php
session_start();

// initializing variables
$firstName = "";
$lastName    = "";
$email    = "";
$phoneNumber    = "";
$DOB    = "";
$userName    = "";
$Password = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('db.luddy.indiana.edu', 'i494f20_team12', 'my+sql=i494f20_team12', 'i494f20_team12');

// REGISTER USER

if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $firstName = mysqli_real_escape_string($db, $_POST['firstName']);
  $lastName = mysqli_real_escape_string($db, $_POST['lastName']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $phoneNumber = mysqli_real_escape_string($db, $_POST['phoneNumber']);
  $DOB = mysqli_real_escape_string($db, $_POST['DOB']);
  $userName = mysqli_real_escape_string($db, $_POST['userName']);
  $Password = mysqli_real_escape_string($db, $_POST['Password']);
  

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($firstName)) { array_push($errors, "First Name is required"); }
  if (empty($lastName)) { array_push($errors, "Last Name is required"); }
  if (empty($phoneNumber)) { array_push($errors, "Phone Number is required"); }
  if (empty($userName)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($Password)) { array_push($errors, "Password is required"); }
   {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $User_check_query = "SELECT * FROM User WHERE userName='$userName' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $User_check_query);
  $User = mysqli_fetch_assoc($result);
  
  if ($User) { // if user exists
    if ($User['userName'] === $userName) {
      array_push($errors, "Username already exists");
    }

    if ($User['email'] === $email) {
      array_push($errors, "email already exists");
    }
    if ($User['phoneNumber'] === $phoneNumber) {
      array_push($errors, "Phone Number already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$Password = md5($Password);//encrypt the password before saving in the database

  	$query = "INSERT INTO User (userName, firstName, lastName, email, phoneNumber, DOB, Password) 
  			  VALUES('$username', '$firstName', '$lastName' ,'$email', '$phoneNumber', '$DOB', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['userName'] = $userName;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: home.html');
  }
}