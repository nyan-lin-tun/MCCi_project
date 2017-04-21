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
	<title>Customers List</title>
	<link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
	<?php include "header.php"; ?>
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10">
			<center>
				<h1><u><b>Customer List</b></u></h1>
			</center>

			<?php 

			function usersList()
			{
				require 'connectdb.php';

				$sql = "SELECT * FROM users";

				$result = $mysqli->query($sql);

				if ($result) {

					if ($result->num_rows > 0) {

						for ($i=1; $i <= $result->num_rows; $i++) { 
							$rows[] = $result->fetch_object();
						}

						return $rows;

					}else {
						echo "There is no customer.";
					}

				}else {
					echo $mysqli->error;
				}

				$mysqli->close();

			}

			$users = usersList();

			?>
			<table class="table">
				<thead>
					<tr>
						<th>Userame</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Address</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($users as $user): ?>
						<tr>                                   
							<td><h4><?php echo $user->user_name; ?></h4></td>
							<td><h4><?php echo $user->user_email; ?></h4></td>
							<td><h4><?php echo $user->user_ph; ?></h4></td>
							<td><h4><?php echo $user->user_address; ?></h4></td>
							<td>
								<a href="deleteUser.php?user_id=<?php echo $user->user_id; ?>"><button class="btn btn-danger">Delete</button></a>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
		<div class="col-md-1"></div>
	</body>
	</html>