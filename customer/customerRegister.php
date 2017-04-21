<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Customer register</title>
	<link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
	<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
			<center>
				<h2>Customer Register</h2>
			</center>
				<form action="customerAdd.php" method="POST">
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" class="form-control" id="username" name="username" placeholder="" required>
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control" id="email" name="email" placeholder="" required>
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" id="password" name="password" required>
					</div>
					<div class="form-group">
						<label for="phone">Phone</label>
						<input type="number" class="form-control" id="phone" name="phone" required>
					</div>
					<div class="form-group">
						<label for="address">Address</label>
						<input type="text" class="form-control" id="address" name="address" required>
					</div>
					<button name="btnlogin" value="Login" type="submit" class="btn btn-primary">Sign up</button>
					<button type="reset" class="btn btn-danger" name="btncancel" value="Exit">Clear</button>

				</form>
			</div>
			<div class="col-md-4"></div>
	</div>
</body>
</html>