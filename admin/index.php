<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin</title>
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">

	<style>
		center{
			margin-top: 60px;
		}

	</style>
</head>
<body>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<center>
					<div id="imgDiv">
						<img src="../img/superman.png" alt="Superman" width="100" height="100">	
						<h1>Dashboard</h1>
						<b><h4>Hello, good to see you!</h4></b>
					</div>
				</center>
				<form action="../admin/adminAuth/admin-login.php" method="POST">
					<div class="form-group">
						<label for="email">Username</label>
						<input type="text" class="form-control" id="name" name="name" placeholder="" required>
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" id="password" name="password" required>
					</div>
					<button name="btnlogin" value="Login" type="submit" class="btn btn-primary">Login</button>
					<button type="reset" class="btn btn-danger" name="btncancel" value="Exit">Clear</button>

				</form>
			</div>
			<div class="col-md-4"></div>
		

	</div>
</body>
</html>