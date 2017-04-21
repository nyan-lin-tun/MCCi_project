<?php 
	function createEventType($name, $description){

		require 'connectdb.php';

		$sql = "INSERT INTO event_type (event_type_name, event_type_desc, created_date,
				updated_date) VALUES ('$name', '$description', now(), now())";

		$result = $mysqli->query($sql);

		if ($result) {
			
			header('location:categoryList.php');

		}else {
			
			echo $mysqli->error;

		}

		$mysqli->close;

	}

	$name = $_POST['event_type_name'];
	$description = $_POST['type_description'];


	createEventType($name,$description);




 ?>