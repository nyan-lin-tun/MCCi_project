<?php 

	session_start(); 
	unset($_SESSION['customer']); 
	header("location: customer_login_form.php");

 ?>