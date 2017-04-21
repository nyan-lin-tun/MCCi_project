<?php 

	function deleteUser($user_id){
		require 'connectdb.php';

		$sql = "DELETE FROM users WHERE user_id = " . $user_id;

		$result = $mysqli->query($sql);

		if ($result) {

			header("location: customerList.php");

		} else {

			echo $mysqli->error;

		}

		$mysqli->close();
	}

	$user_id = $_GET['user_id'];

	deleteUser($user_id);

 ?>