<html>
<body>
<h1> Create an Account </h1>

<body>
<form method="get">

First Name:
<input type="text" id="first" name="first">
<br>
Last Name:
<input type="text" id="last" name="last">
<br>
Email Address:
<input type="email" id="email" name="email">
<br>
Phone Number:
<input type="text" id="email" name="phone">
<br>
Birthday (MM/DD/YYYY):
<input type="date" id="birthday" name="birthday">
<br>
Username:
<input type="text" id="username" name="username">
<br>
Password:
<input type="password" id="pwd" name="pwd">
<br>
<input type="submit" value="Submit">
</form>


<p> (This section will be taken from the final version, used now to test form.)</p>
<p>First: <?=$_GET['first'];?></p>
<p>Lasst: <?=$_GET['last'];?></p>
<p>Email: <?=$_GET['email'];?></p>
<p>Phone Number: <?=$_GET['phone'];?></p>
<p>Birthday: <?=$_GET['birthday'];?></p>
<p>Username: <?=$_GET['username'];?></p>
<p>Password: <?=$_GET['password'];?></p>
</body>
</html>
