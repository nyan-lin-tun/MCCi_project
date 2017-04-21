<?php 

	function deleteCategory($id){

		require 'connectdb.php';

		$sql = "DELETE FROM event_type WHERE event_type_id = " . $id;

		$result = $mysqli->query($sql);

		if ($result) {

			header("location: categoryList.php");

		} else {

			echo $mysqli->error;

		}

		$mysqli->close();

	}

	$id = $_GET['event_type_id'];

	deleteCategory($id);

 ?>