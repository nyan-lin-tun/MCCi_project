<?php 
function readEventType(){

	require 'connectdb.php';

	$sql = "SELECT * FROM event_type";

	$result = $mysqli->query($sql);

	if ($result) {

		if ($result->num_rows > 0) {

			for ($i=1; $i <= $result->num_rows; $i++) { 
				$rows[] = $result->fetch_object();
			}

			return $rows;

		}else {

			echo "There is no event type";
		}
	}else {

		echo $mysqli->error;

	}

	$mysqli->close();

}

function readSingleEventType($id){

	require 'connectdb.php';

	$sql = "SELECT * FROM event_type WHERE event_type_id = " . $id;

	$result = $mysqli->query($sql);

	if ($result->num_rows > 0) {

		return $result->fetch_object();

	} else {

		echo $mysqli->error;

	}

	$mysqli->close();

}

?>