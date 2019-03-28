<!doctype html>
<?php
include("connection.php");
error_reporting(0);
 ?>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<title>ADMIN</title>
	</head>
	<body>
		<div class="container-fluid">
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
				<span class="navbar-brand mb-0 h1">Inventory Mangement System</span>
				<!-- <a class="navbar-brand" href="#"></a> -->
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
				<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				  <div class="navbar-nav">
					<a class="nav-item nav-link active" href="#">Users<span class="sr-only">(current)</span></a>
					<a class="nav-item nav-link" href="Product.php">Product</a>
					<a class="nav-item nav-link" href="#">Contact Us</a>
				  </div>
				</div>
				<form class="form-inline">
				  <button  id="mybutton" class="btn btn-outline-success my-2 my-sm-0"> Log Out</button>
				  
				</form>
			</nav>
			<div id="accordion">
				<div class="card"><!-- Collapse Group 1 started-->
					<div class="card-header" id="headingOne">
						<h5 class="mb-0">
							<button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">Add User</button>
						</h5>
					</div>
					<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
						<div class="card-body">
							<form method="POST">
								<div class="form row">
									<div class="form-group col-md-6">
										<label for="name">Username</label>
										<input type="text" class="form-control" name="uname" placeholder="Name">
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-md-6">
										<label for="password">Password</label>
										<input type="password" id="password" name="pass" class="form-control" placeholder="Password">
									</div>
								</div>

								
								<div class="form-group row invalid">
									<div class="form-group col-md-6">
										<label for="confpassword" style="color:black">Confirm Password</label>
										<input type="password" id="confirmpassword" name="confirmpassword" class="form-control" name="confpassword" placeholder="Confirm Password">
									</div>
								</div>
								<input type="submit" name='submit_add' class="btn btn-primary" value ='Add'>
							</form>
						</div>
					</div>
				</div><!--Collapse Group 1 Ended-->

				<?php 
					if ($_POST['submit_add']){
						$username_add=$_POST['uname'];
						$password_add=md5($_POST['pass']);
						$level=0;
						
						$query_add_user="SELECT * FROM USERS WHERE username='$username'";
						$data_add_user=mysqli_query($conn,$query_add_user);
						$total_add_user=mysqli_num_rows($data_add_user);
						if($total_add_user == 1){

						if($username_add !="" && $password_add !=""){
							$query="INSERT INTO USERS VALUES ('$username_add','$password_add','$level') ";
							$data=mysqli_query($conn,$query);
							if ($data){
								 $message_add = "data inserted Successfully.";
  									echo "<script type='text/javascript'>alert('$message_add');</script>";

							}

						} 
					}else {
						 $message_add_user = "This username is already exist.";
  							echo "<script type='text/javascript'>alert('$message_add_user');</script>";

					}
					
					}

					
					
					
					
					
						
							   	
						?>
				<div class="card"><!--Collapse Gorup 2 Started -->
					<div class="card-header" id="headingTwo">
						<h5 class="mb-0">
							<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Delete User</button>
						</h5>
					</div>
					<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
						<div class="card-body">
							<!--Group 2 Data Started-->
							<form method="POST" action=''>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="username">Username</label>
									<input type="text" class="form-control" name="usname" placeholder="Provide Username of user you want to Delete">
								</div>
							</div>
							<input  class="btn btn-primary" type='submit' name="submit_del" value="Delete User">
							</form>
							<!--Group 2 Data Ended-->
						</div>
					</div>
					<?php 
					if ($_POST['submit_del']){
					$username_del=$_POST['usname'];
					$query_del_user="SELECT * FROM USERS WHERE username='$username'";
					$data_del_user=mysqli_query($conn,$query_del_user);
					$total_del_user=mysqli_num_rows($data_del_user);
					if($total_del_user == 1){

					if ($username_del !=""){
					$query_del = "DELETE FROM USERS WHERE USERNAME='$username_del'"; 
					$data_del =mysqli_query($conn,$query_del);
					if ($data_del){
						$message_del = "data deleted Successfully.";
  									echo "<script type='text/javascript'>alert('$message_del');</script>";
    
					}
						
					
					}
				}else{
					$message_del_user = "Username not found.";
  					echo "<script type='text/javascript'>alert('$message_del_user');</script>";
				}
				}
					

					?>


				</div><!--Collapse group 2 ended-->
				<div class="card"><!--Collapse Gorup 2 Started -->
					<div class="card-header" id="headingThree">
						<h5 class="mb-0">
							<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Update User</button>
						</h5>
					</div>
					<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
						<div class="card-body">
							<!--Group 2 Data Started-->
							<form method="POST" action ="">
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="username">Username</label>
									<input type="text" class="form-control" name="usename" placeholder="Provide Username of user you want to change password of">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="password">Password</label>
									<input type="password" class="form-control" name="pasw" placeholder="New Password">
								</div>
							</div>
							<input class="btn btn-primary" type="submit" name="submit_update" value="Update User">
							</form>
						</div>
					</div>
				</div>
				<?php 
				if ($_POST['submit_update']){
				$username_update=$_POST['usename'];
				$password_update=md5($_POST['pasw']);
				$query_update_user="SELECT * FROM USERS WHERE username='$username'";
				$data_update_user=mysqli_query($conn,$query_update_user);
				$total_update_user=mysqli_num_rows($data_update_user);
				if($total_update_user == 1){

				if ($username_update !=""){

				$query_update="UPDATE USERS SET PASSWORD='$password_update' WHERE USERNAME='$username_update'";
				$data_upadte=mysqli_query($conn,$query_update);
				if ($data_upadte){
					$message_update = "data update Successfully.";
  									echo "<script type='text/javascript'>alert('$message_update');</script>";

						
			    }
			}
		}else{
				$message_update_user = "Username not found.";
  				echo "<script type='text/javascript'>alert('$message_update_user');</script>";

		}
			}
				?>

			<!-- Optional JavaScript -->
			<!-- jQuery first, then Popper.js, then Bootstrap JS -->
			<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		</div>
	</body>
</html>
<?php 


?>