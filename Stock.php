<!doctype html>
<?php 
include("connection.php");
//error_reporting(0);
?>
<html lang="en">
	<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<title>Stock</title>
</head>
<body>
	<div class="container-fluid">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<span class="navbar-brand mb-0 h1">Inventory Mangement System</span>
			<!-- <a class="navbar-brand" href="#"></a> -->
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			  <div class="navbar-nav">
				<a class="nav-item nav-link" href="Admin.php">Users</a>
				<a class="nav-item nav-link" href="Product.php">Product</a>
				<a class="nav-item nav-link active" href="#">Stock<span class="sr-only">(current)</span></a>
			  </div>
			</div>
			<form class="form-inline">
			  <button  class="btn btn-outline-success my-2 my-sm-0"> Log Out</button>
			</form>
		</nav>
		<div class="list-group">
		<?php  // for green 

			$query_stock="SELECT * FROM PROCHECK WHERE id=1 ";
			$result_stock =mysqli_query($conn,$query_stock);
			$arrays=mysqli_fetch_array($result_stock);
			$green_check=$arrays[1];
			$red_check=$arrays[2];

			// for red 
				$query_red_stock ="SELECT * FROM PRODUCT WHERE QUANTITY <= '$red_check' ";
				$data_red =mysqli_query($conn,$query_red_stock);

					while ($arrayr = mysqli_fetch_assoc($data_red)){


						echo '<a class="list-group-item list-group-item-action flex-column align-items-start">
						<div class="d-flex w-100 justify-content-between">
						<h5 class="mb-1">'.$arrayr['product_name'].'</h5>
						<small>'.$arrayr['id'].'</small>
						</div>
						<p class="mb-1">Price:  '.$arrayr['price'].'</p>
						<span class="badge badge-danger badge-pill">Quantity:  '.$arrayr['quantity'].'</span>
			  			</a>';
					}
				
				// for yellow
					$query_yellow_stock ="SELECT * FROM PRODUCT WHERE QUANTITY  BETWEEN '$red_check' AND '$green_check' ";
					$data_yellow =mysqli_query($conn,$query_yellow_stock);

					while ($arrayy = mysqli_fetch_assoc($data_yellow)){

						echo'<a class="list-group-item list-group-item-action flex-column align-items-start">
						<div class="d-flex w-100 justify-content-between">
						<h5 class="mb-1">'.$arrayy['product_name'].'</h5>
						<small>'.$arrayy['id'].'</small>
						</div>
						<p class="mb-1">Price:  '.$arrayy['price'].'</p>
						<span class="badge badge-warning badge-pill">Quantity: '.$arrayy['quantity'].'</span>
						</a>';
							}


			//for green
					$query_green_stock="SELECT * FROM PRODUCT WHERE QUANTITY >= '$green_check' ";
					$data_green = mysqli_query($conn,$query_green_stock);
			
					while ($array = mysqli_fetch_assoc($data_green)){
				
					echo '
						<a class="list-group-item list-group-item-action flex-column align-items-start">
				 		<div class="d-flex w-100 justify-content-between">
						<h5 class="mb-1">'.$array['product_name'].'</h5>
						<small>'.$array['id'].'</small>
						</div>
						<p class="mb-1">Price:  '.$array['price'].'</p>
						<span class="badge badge-success badge-pill">Quantity:'.$array['quantity'] .'</span></a>';

							}
			
			
		  
                 
			 
			?>
		</div>
	</div>


	
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>