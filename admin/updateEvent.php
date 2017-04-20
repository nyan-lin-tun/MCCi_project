<?php 
	function updateEvent($id, $event_name, $event_type, $event_desc, $ticket_price, $event_img  ,$tmp){

		require 'connectdb.php';

		$event_desc = str_replace("'", "''", $event_desc);

		if ($event_img) {
			move_uploaded_file($tmp, "cover/$cover");
			$sql = "UPDATE event SET event_name='$event_name', event_type_id='$event_type',
     				event_description='$event_desc', ticket_price='$ticket_price', event_img='$event_img', updated_date=now() WHERE event_id = $id";
		}else{
			$sql = "UPDATE event SET event_name='$event_name', event_type_id='$event_type',
     				event_description='$event_desc', ticket_price='$ticket_price',
      				updated_date=now() WHERE event_id = $id";
		}

		$result = $mysqli->query($sql);

		if ($result) {
			
			header("location: eventList.php");

		} else {

			echo $mysqli->error;
			
		}

		$mysqli->close();

	}

	$id = $_POST['id'];
    $title = $_POST['name'];
    $category_id = $_POST['category_id'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $cover = $_FILES['cover']['name'];
    $tmp = $_FILES['cover']['tmp_name'];

    updateEvent($id, $title, $category_id, $description, $price, $cover, $tmp);








 ?>