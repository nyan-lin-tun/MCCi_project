<?php 
include 'customer/checkCustomer.php';
require 'admin/connectdb.php';

$event_id = $_GET['event_id'];

$sql = "SELECT * FROM event WHERE event_id = $event_id";

$event = mysqli_query($mysqli, $sql);

$row = mysqli_fetch_assoc($event);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Event</title>
	<link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="navbar-header">
			<a class="navbar-brand" href="#">Events Ticket Sale</a>
		</div>
	</nav>
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<center>
			<img src="img/<?php echo $row['event_img']; ?>" alt="" height="200">
			<h2><?php echo $row['event_name']; ?></h2> <br>
			<?php echo "Price: ".$row['ticket_price']; ?><br>
			<i><?php echo "Date: ".$row['event_start_date']; ?></i>
			<p><?php echo "Price: ".$row['event_description']; ?></p>
			<a href="add_to_cart.php?id=<?php echo $row['event_id'] ?>" class="btn btn-info">Add to Cart</a><br><br>
			</center>
		</div>
		<div class="col-md-3"></div>
	</body>
	</html>