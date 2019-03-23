<?php
include("connection.php");
error_reporting(0);
?>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" type="text/css" href="floating-labels.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<title>LogIn/SignUp</title>
	</head>
	<body class="container">
		<form class="form-signin" method="POST" action="">
			<div class="form-label-group">
				<input type="text" id="username" class="form-control" placeholder="Username" name="uname" required autofocus>
				<label for="username">Username</label>
			</div>

			<div class="form-label-group">
				<input type="password" id="password" class="form-control" placeholder="Password" name="pass" required>
				<label for="password">Password</label>
			</div>
			<button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>
			<p class="mt-5 mb-3 text-muted text-center">Inventory Management System <br>By Tathya Thaker, Vashishtha Upadhyay,<br> Shalmal Soni and Heer Shah</p>
		</form>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	</body>
</html>

<?php 
$username=$_POST['uname'];
$password=md5($_POST['pass']);
$query="SELECT * FROM USERS WHERE username='$username' && password='$password'";
$data=mysqli_query($conn,$query);
$total=mysqli_num_rows($data);
$posted = false;
if($_POST){

	$posted=true;
}
if ($posted){
if ($total ==1){

	header('location:admin.php');

}
else {
	
	 $message = "Username Or Password incorrect.\\nTry again.";
  echo "<script type='text/javascript'>alert('$message');</script>";

}
}
?>