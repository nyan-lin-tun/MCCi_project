<?php 
	
	$id = $_POST['id'];

	$eventTypeName = $_POST['event_type_name'];

	$description = $_POST['type_description'];

	function updateEventType($id, $eventTypeName, $description){

		require 'connectdb.php';

		$sql = "UPDATE event_type SET event_type_name = '$eventTypeName',event_type_desc = '$description' WHERE event_type_id = $id";

		$result = $mysqli->query($sql);

		if ($result) {
			
			header("location: categoryList.php");

		} else {

			echo $mysqli->error;
			
		}

		$mysqli->close();

	}
	

	updateEventType($id, $eventTypeName, $description);


 ?>