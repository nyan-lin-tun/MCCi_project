<?php 
	
	session_start();
	require '../admin/connectdb.php';



	$message = "";
	if (isset($_POST['login'])) {

		$email = $_POST['email'];
		$password = $_POST['password'];
		$sql = "SELECT * FROM users WHERE user_email = '$email' AND user_password = '$password'";		
		$result = $mysqli->query($sql);
		
		if ($result) {

			if ($result->num_rows > 0) {

				$users = $result->fetch_object();
				$_SESSION['user_id'] = $users->user_id;
				$_SESSION['user'] = true;
				header('Location: ../index.php');	
			}else{
				// $message = '<div class="alert alert-danger">Please Register!</div>';
				$message = "pl";
			}

		}else{

			echo $mysqli->error;

		}

		$mysqli->close();

	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Customer login</title>
	<link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
	<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
			<center>
				<h2>Customer Login</h2>
			</center>
				<form class="form-signin" action="" method="post">
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control" id="email" name="email" placeholder="" required>
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" id="password" name="password" required>
					</div>
					<button name="login" value="Login" type="submit" class="btn btn-primary">Login</button>
					<button type="reset" class="btn btn-danger" name="btncancel" value="Exit">Clear</button>
					<br>
					<a href="customerRegister.php"><u>Don't have an account. Sign up</u></a>

				</form>
			</div>
			<div class="col-md-4"></div>
	</div>
</body>
</html>