<?php

include 'customer/checkCustomer.php';
require 'admin/connectdb.php';

$cart = 0;

if(isset($_SESSION['cart'])) {

	foreach($_SESSION['cart'] as $qty) {
		$cart += $qty;
	} 

}

if(isset($_GET['cat'])) {

	$cat_id = $_GET['cat'];
	$events = mysqli_query($mysqli,"SELECT * FROM event WHERE event_type_id = $cat_id");

} else {

	$events = mysqli_query($mysqli,"SELECT * FROM event");

}

$cats = mysqli_query($mysqli,"SELECT * FROM event_type"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Event Ticket Sale</title>
	<link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>

	<nav class="navbar navbar-default">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">


			</button>
			<a class="navbar-brand" href="#">Events Ticket Sale</a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="check_cart.php">(<?php echo $cart ?>) ticket(s) in your cart</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</div>
			<!--  <ul class="nav navbar-nav navbar-right">
					
		</ul> -->


	</nav>


	<div class="container">

		<div class="row">

		<div class="col-md-8">

				<article class="row">
				<center>
					<?php foreach ($events as $event): ?>
						<section>
							<a href="event_detail.php?event_id=<?php echo $event['event_id']; ?>"><img src="cover/<?php echo $event['event_img']; ?>" alt="" width="110" height="150"></a>
							<br>
							<h2><?php echo $event['event_name']; ?></h2>
							<h4><?php echo "Price : ".$event['ticket_price']; ?></h4>
							<a href="add_to_cart.php?event_id=<?php echo $event['event_id']; ?>" class="btn btn-info">Add To Cart</a>
							<hr>
						</section>
					<?php endforeach ?>
				</center>	
				</article>

			</div>
			<div class="col-md-4">
				<aside class="col-lg-8">
					<ul class="list-group">
						<li class="list-group-item"><a href="index.php">All Category</a></li>
						<?php foreach ($cats as $cat): ?>
							<li class="list-group-item"><a href="index.php?cat=<?php echo $cat['event_type_id'] ?>"><?php echo $cat['event_type_name']; ?></a></li>
						<?php endforeach ?>
					</ul>
				</aside>
			</div>
		</div>
	</div>
</body>
</html>