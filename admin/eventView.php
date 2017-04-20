<?php 
include 'auth.php';
require 'connectdb.php';

$id = $_GET['event_id'];

$sql = "SELECT event.*,event_type.event_type_name FROM event,event_type WHERE event_id = $id";

$event = mysqli_query($mysqli, $sql);

$row = mysqli_fetch_assoc($event);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $row['event_name']; ?></title>
	<link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
	
	<?php include 'header.php'; ?>

	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<center>
			<img src="../../cover/<?php echo $row['cover']; ?>" alt="" height="200">
			<h2><?php echo $row['event_name']; ?></h2>
			<b><?php echo "Type: ".$row['event_type_name']; ?></b><br>
			<b><?php echo "Price : ".$row['ticket_price']; ?></b>
			<p><?php echo $row['event_description']; ?></p>
			</center>
		</div>
		<div class="col-md-3"></div>
	</div>
</body>
</html>