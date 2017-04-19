<?php
	session_start();

	$name = $_POST['name']; 
	$password = $_POST['password'];

	if($name == "admin" and $password == "admin") { 
		$_SESSION['auth'] = true;
		header("location: ../books/book-list.php");
	} else {
		header("location: ../index.php");
	} 
?>