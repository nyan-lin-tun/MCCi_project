<?php
	session_start();
	$event_id = $_GET['event_id']; 
	if(!isset($_SESSION['cart'][$event_id])){
  		$_SESSION['cart'][$event_id]=0;
 	}
 	$_SESSION['cart'][$event_id]++;
	header("location: index.php"); 
?>