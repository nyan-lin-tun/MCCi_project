<?php 
function addCustomer($username, $email, $password, $phone, $address){
	require '../admin/connectdb.php';

	$sql = "INSERT INTO users (user_name, user_email, user_password, user_ph, user_address, created_date, updated_date) 
	VALUES ('$username', '$email', '$password','$phone', '$address', now(), now())";


	$result = $mysqli->query($sql);

	if ($result) {

		header('location: customerLogin.php');

	}else {

		echo $mysqli->error;

	}

	$mysqli->close();

}

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['phone'];
$address = $_POST['address'];

addCustomer($username, $email, $password, $phone, $address);

?>