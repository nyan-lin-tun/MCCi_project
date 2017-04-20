<?php 

	function deleteEvent($event_id){
		require 'connectdb.php';

		$sql = "DELETE FROM event WHERE event_id = " . $event_id;

		$result = $mysqli->query($sql);

		if ($result) {

			header("location: eventList.php");

		} else {

			echo $mysqli->error;

		}

		$mysqli->close();
	}

	$id = $_GET['event_id'];

	deleteEvent($id);

 ?>