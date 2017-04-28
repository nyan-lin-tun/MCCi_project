<?php 
	
	include 'customer/checkCustomer.php';

	include 'admin/connectdb.php';

	$user_id = $_SESSION['user_id'];

	
	mysqli_query($mysqli, "INSERT INTO orders(user_id, order_status, created_date, updated_date) VALUES ('$user_id', 0, now(), now()) ");

	$order_id = mysqli_insert_id($mysqli); 

	foreach($_SESSION['cart'] as $event_id => $qty) {

		mysqli_query($mysqli, "INSERT INTO user_order(order_id, event_id, qty, created_date, updated_date) VALUES ($order_id,$event_id,$qty, now(), now())"); 

	}

	unset($_SESSION['cart']); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Order Submit</title>
	<link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
	
	<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				
			</button>
			<a class="navbar-brand" href="index.php">Event Ticket Sale</a>
		</div>
		<div id="navbar" class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
			</ul>
		</div><!--/.nav-collapse -->
	</div>
	</nav>
	<br>
	<br>
	<br>
	<center>
	<img src="img/right.png" alt="right" width="100" height="100">
	<br>
	<div class="container">
		<div class="alert alert-success">
  			 Your order has been submitted. We'll deliver the ticket soon.
  			<a href="index.php" class="btn btn-info">Home</a>
		</div>
	</div>
	</center>
</body>
</html>