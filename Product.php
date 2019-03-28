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
					<a class="nav-item nav-link" href="Admin.php">Users</a>
					<a class="nav-item nav-link active" href="#">Product<span class="sr-only">(current)</span></a>
					<a class="nav-item nav-link" href="#">Contact Us</a>
				  </div>
				</div>
				<form class="form-inline">
				  <button  class="btn btn-outline-success my-2 my-sm-0">Log Out</button>
				</form>
			</nav>
			<div id="accordion">
				<div class="card"><!-- Collapse Group 1 started-->
					<div class="card-header" id="headingOne">
						<h5 class="mb-0">
							<button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">Add Product</button>
						</h5>
					</div>
					<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
						<div class="card-body">
							<form method="post" action="">
								<div class="form row">
									<div class="form-group col-md-6">
										<label for="name">Name of the product</label>
										<input type="text" class="form-control" name="product_name" placeholder="Product Name">
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-md-6">
										<label for="price">Price of the Product</label>
										<input type="number" id="price" name="product_price" class="form-control" placeholder="Price">
									</div>
								</div>
								<div class="form-group row invalid">
									<div class="form-group col-md-6">
										<label for="quant" >Quantity of the Product</label>
										<input type="number" id="quant" name="product_quant" class="form-control" placeholder="Total Quantity">
									</div>
								</div>
								<input type="submit" name="submit_a" class="btn btn-primary" value="Add">
							</form>
						</div>
					</div>
				</div><!--Collapse Group 1 Ended-->

				<?php 
				if(isset($_POST['submit_a'])){
					$product_name=$_POST['product_name'];
					$price=$_POST['product_price'];
					$quantity=$_POST['product_quant'];
					$id=0;
					if($product_name !="" && $price !="" && $quantity != ""){
						$query_product="INSERT INTO PRODUCT VALUES ('$id','$product_name','$price','$quantity') ";
						$data_product=mysqli_query($conn,$query_product);
						
						if($data_product){
							$message_add_product = "product inserted Successfully.";
  							echo "<script type='text/javascript'>alert('$message_add_product');</script>";
						}
					
					}
				header('location: Admin.php');
				}

				?>
				<div class="card"><!--Collapse Gorup 2 Started -->
					<div class="card-header" id="headingTwo">
						<h5 class="mb-0">
							<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Update Product</button>
						</h5>
					</div>
					<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
						<div class="card-body">
							<!--Group 2 Data Started-->
							<form method="post">
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="pid">Product Id</label>
									<input type="text" class="form-control" name="pid" placeholder="Provide ID of the Product you want to Update">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="quant">Quantity</label>
									<div class="custom-control custom-radio">
										<input type="radio" id="customRadio1" name="radio" value="add" class="custom-control-input">
										<label class="custom-control-label" for="customRadio1">Add</label>
									</div>
									<div class="custom-control custom-radio">
										<input type="radio" id="customRadio2" name="radio" value="sub" class="custom-control-input">
										<label class="custom-control-label" for="customRadio2">Subtract</label>
									</div>
									<input type="number" class="form-control" name="quant" placeholder="Enter the number of Quantity you want to Add/Sub">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="price">Price</label>
									<input type="number" class="form-control" name="price" placeholder="Enter the new price">
								</div>
							</div>
							<input class="btn btn-primary" type="submit" name="update_submit" value="Update Product">
							</form>
							<!--Group 2 Data Ended-->
						</div>
					</div>
				</div><!--Collapse group 2 ended-->
				<?php 
				if($_POST['update_submit']){
					$product_id=$_POST['pid'];
					$update_pro_price=$_POST['price'];
					$quantity = $_POST['quant'];
					$radio=$_POST['radio'];
					$query_product_check="SELECT * FROM PRODUCT WHERE ID='$product_id' ";
					$data=mysqli_query($conn,$query_product_check);
					$total=mysqli_num_rows($data);
					if ($total ==1)
					{


					if($radio == 'add'){
						$query_update="SELECT * FROM PRODUCT WHERE id='$product_id'";
						$result =mysqli_query($conn,$query_update);
						$array=mysqli_fetch_array($result);
						$update_quantity=$array[3];
						$update_quantity = $update_quantity + $quantity ;
						$query_pro_update="UPDATE PRODUCT SET quantity ='$update_quantity',price ='$update_pro_price' WHERE ID='$product_id'";
						$data_pro_upadte=mysqli_query($conn,$query_pro_update);
					}
					elseif ($radio == 'sub') {
					  	$query_update="SELECT * FROM PRODUCT WHERE id='$product_id'";
						$result =mysqli_query($conn,$query_update);
						$array=mysqli_fetch_array($result);
						$update_quantity=$array[3];
						$update_quantity = $update_quantity - $quantity ;
						$query_pro_update="UPDATE PRODUCT SET quantity ='$update_quantity',price ='$update_pro_price' WHERE ID='$product_id'";
						$data_pro_upadte=mysqli_query($conn,$query_pro_update);
					  }  
					header('location: Admin.php');
				}else{
					$message_update_product = "Product not Found.";
  							echo "<script type='text/javascript'>alert('$message_update_product');</script>";
				}
			}
				?>

				<div class="card"><!--Collapse Gorup 2 Started -->
					<div class="card-header" id="headingThree">
						<h5 class="mb-0">
							<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Delete Product</button>
						</h5>
					</div>
					<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
						<div class="card-body">
							<!--Group 2 Data Started-->
							<form method="post">
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="pid">Product Id</label>
									<input type="text" class="form-control" name="del_pid" placeholder="Provide ID of the Product you want to Delete">
								</div>
							</div>
							<input class="btn btn-primary" type="submit" name="submit_del" value="Delete Product">
							</form>
						</div>
					</div>
				</div>
				<?php 
					if ($_POST['submit_del']){
					$id_del=$_POST['del_pid'];
						if ($id_del !=""){
						$query_pro_del = "DELETE FROM PRODUCT WHERE ID='$id_del'"; 
						$data_pro_del =mysqli_query($conn,$query_pro_del);
						header('location: Admin.php');
							// if ($data_del){
						// 	$message_del = "data deleted Successfully.";
  						// 	echo "<script type='text/javascript'>alert('$message_del');</script>";
    
							// }
						
					
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