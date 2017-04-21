<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>New Event Type</title>
	<link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
	<?php include "header.php"; ?>
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<center>
				<h1><u>New Event Type</u></h1>
				<br>
				<form action="addEventType.php" method="POST">

					<div class="form-group">
						<label for="event_type_name">Event Type Name :</label>
						<input type="text" name="event_type_name" class="form-control" id="event_type_name">
					</div>

					<div class="form-group">
						<label for="type_description">Description</label>
						<textarea name="type_description" class="form-control" id="type_description" cols="30" rows="10"></textarea>
					</div>

					<button type="submit" class="btn btn-primary">Add</button>
					<button type="reset" class="btn btn-danger" name="btncancel" value="Exit">Clear</button>

				</form>
			</center>	

		</div>
		<div class="col-md-4"></div>

	</div>
	
</body>
</html>