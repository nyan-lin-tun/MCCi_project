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
	<title>Category Lists</title>
	<link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
	<?php include "header.php"; ?>
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10">
			<center>
				<h1><u><b>Event Type List</b></u></h1>
				<br>
				<a href="newEventType.php"><button class="btn btn-success">New event type</button></a>
			</center>
			<?php 
			include 'eventTypeProcess.php';

			$categories = readEventType();

			?>
			<table class="table">
				<thead>
					<tr>
						<th>Event type</th>
						<th>Description</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($categories as $category): ?>
						<tr>                                   
							<td><h4><?php echo $category->event_type_name ?></h4></td>
							<td><h4><?php echo $category->event_type_desc ?></h4></td>
							<td>                                
								<a href="eventTypeEdit.php?event_type_id=<?php echo $category->event_type_id; ?>"><button class="btn btn-info">Edit</button></a>
								<a href="eventTypeDelete.php?event_type_id=<?php echo $category->event_type_id; ?>"><button class="btn btn-danger">Delete</button></a>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
		<div class="col-md-1"></div>
	</body>
	</html>