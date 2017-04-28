<?php 
	require 'admin/connectdb.php';
	$id = $_GET['id'];
	$status = $_GET['status'];
	mysqli_query($mysqli, "UPDATE orders SET order_status=$status, updated_date=now() WHERE order_id=$id");
	header("location: admin/order.php"); 
?>