<?php
	session_start(); 
	if(!isset($_SESSION['user'])) {
		header('location: ../customer_login_form.php');
		exit(); 
	}
?>