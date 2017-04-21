<?php
session_start(); 
if(!isset($_SESSION['auth'])) {
	header("location: ../index.php");
	exit(); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Event list</title>
	<link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
	<?php include "header.php"; ?>
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10">
			<center>
				<h1><u><b>Event List</b></u></h1>
				<br>
				<a href="newEvent.php"><button class="btn btn-success">New event</button></a>
			</center>
			<?php
			include 'connectdb.php';
			$sql = "SELECT event.*,event_type.event_type_name FROM event LEFT JOIN event_type ON event.event_type_id = event_type.event_type_id ORDER BY event.created_date DESC";
			$result = mysqli_query($mysqli,$sql);
			?>
			<table class="table">
				<thead>
					<tr>
						<th>Name</th>
						<th>Category</th>
						<th>Start Date</th>
						<th>Price</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php while ($row = mysqli_fetch_assoc($result)) : ?>
						<tr>                                   
							<td><h4><?php echo $row['event_name'] ?></h4></td>
							<td><h4><?php echo $row['event_type_name']; ?></h4></td>
							<td><h4><?php echo $row['event_start_date']; ?></h4></td>
							<td><h4><?php echo $row['ticket_price']; ?></h4></td>
							<td>                                
								<a href="eventView.php?event_id=<?php echo $row['event_id']; ?>"><button class="btn btn-success">View</button></a>
								<a href="eventEdit.php?event_id=<?php echo $row['event_id']; ?>"><button class="btn btn-info">Edit</button></a>
								<a href="deleteEvent.php?event_id=<?php echo $row['event_id']; ?>"><button class="btn btn-danger">Delete</button></a>
							</td>
						</tr>
					<?php endwhile ?>
				</tbody>
			</table>
		</div>
		<div class="col-md-1"></div>
	</body>
	</html>