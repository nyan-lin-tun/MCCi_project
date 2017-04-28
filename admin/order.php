<?php require 'auth.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Order list</title>
	<link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
	<?php include "header.php"; ?>
	<center><h1>Order list</h1></center>
	<?php 

	function orderList(){
		require 'connectdb.php';

		$sql = "SELECT *, orders.order_id as order_id FROM orders LEFT JOIN users 
					ON orders.user_id = users.user_id ORDER BY orders.created_date DESC";

		$result = $mysqli->query($sql);

		if ($result) {
			
			if ($result->num_rows > 0) {
				for ($i=1; $i <= $result->num_rows; $i++) { 
					$rows[] = $result->fetch_object();
				}
				return $rows;
			}else {
				echo "There is no Order right now.";
			}

		}else {
			echo $mysqli->error;
		}

		$mysqli->close();

	}

	$user_orders = orderList();

 ?>
 	<table class="table">
		<thead>
			<tr>
				<th>Users Infomation</th>
				<th>Order Items</th>
				<th>Order Status</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($user_orders as $user_order): ?>
				<tr>
					<td>
						<h5><?php echo $user_order->user_name ?></h5>
						<h5><?php echo $user_order->user_email; ?></h5>
						<h5><?php echo $user_order->user_ph; ?></h5>
						<h5><?php echo $user_order->user_address; ?></h5>
					</td>
					<?php
						include 'connectdb.php';
						$order_id = $user_order->order_id;
						$items = mysqli_query($mysqli,"SELECT user_order.*, event.event_name
           				FROM user_order LEFT JOIN event ON user_order.event_id = event.event_id
           				WHERE user_order.order_id = $order_id");?>
           				<td>
           				<?php foreach ( $items as $item): ?>
							<b><a href="../event_detail.php?event_id=<?php echo $item['event_id'] ?>"><?php echo $item['event_name'] ?> </a>(<?php echo $item['qty'] ?>) </b><br>
						<?php endforeach ?>
						</td>	
					<td>
						<?php if ($user_order->order_status == 0) : ?>
							<a class="btn btn-success" href="../order_status.php?id=<?php echo $user_order->order_id; ?>&status=1"> Mark as Delivered</a>
						<?php else: ?>	
							<a class="btn btn-default"> Delivered </a>
						<?php endif; ?>	
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</body>
</html>
