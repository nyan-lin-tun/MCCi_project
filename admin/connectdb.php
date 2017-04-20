<?php 

	$dbhost = "127.0.0.1";
	$dbuser = "root";
	$dbpass = "root";
	$dbname = "event_ticket_sale";

	$mysqli = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
	
	if (mysqli_connect_errno()){
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}

 ?>