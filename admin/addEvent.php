<?php 

	require 'connectdb.php';

	$name = $_POST['name'];
	$description = $_POST['description'];
	$price = $_POST['price'];
	$event_type_id = $_POST['category_id'];
	$cover = $_FILES['cover']['name'];
	$tmp = $_FILES['cover']['tmp_name'];



	

	$description = str_replace("'", "''", $description);

		$sql = "INSERT INTO event (event_type_id, event_name, event_description, event_img, ticket_price, created_date, updated_date) 
				VALUES ($event_type_id, '$name', '$description', '$cover', '$price', now(), now())";

		$result = $mysqli->query($sql);

		if ($result) {
			
			header('location:eventList.php');

		}else {
			
			echo $mysqli->error;

		}

		$mysqli->close();

	if($cover) {
		echo "---------------------------------------";
		$var = move_uploaded_file($tmp, "cover/$cover");
		die(var_dump($var));
	}

?>