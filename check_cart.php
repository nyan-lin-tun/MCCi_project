<?php 
include 'customer/checkCustomer.php';
if(!isset($_SESSION['cart'])) {
	header("location: index.php");
	exit(); 
}
include 'admin/connectdb.php';
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Carts</title>
 	<link rel="stylesheet" href="css/bootstrap.css">
 </head>
 <body>
 	<nav class="navbar navbar-default">
      
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          </button>
          <a class="navbar-brand" href="#">Events Ticket Sale</a>
        </div>
       
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
           
          </ul>
          <ul class="nav navbar-nav navbar-right">
          </ul>
        </div><!--/.nav-collapse -->
      
	</nav>
<!-- End of nav bar -->

	<div class="container">
		<article class="row">
		<center>
		<a href="index.php"><button value="Login" type="submit" class="btn btn-primary">Continue browsing tickets</button></a>
		<a href="clear_cart.php"><button type="reset" class="btn btn-danger" name="btncancel" value="Exit">Clear cart</button></a>
		</center>
		<br>
			<section class="col-lg-12">
				<table class="table">
					<thead>
						<tr>
							<th>Event Name</th>
							<th>Quantity</th>
							<th>Price per ticket</th>
							<th>Price</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$total = 0;
						foreach($_SESSION['cart'] as $event_id => $qty):
							$result = mysqli_query($mysqli, "SELECT event_name, ticket_price FROM event WHERE event_id=$event_id"); 
							$row = mysqli_fetch_assoc($result);
							$total += $row['ticket_price'] * $qty;
						?>
						<tr>
							<td><?php echo $row['event_name'] ?></td> 
							<td><?php echo $qty ?></td>
							<td><?php echo $row['ticket_price'] ?></td> 
							<td><?php echo $row['ticket_price'] * $qty ?></td>
						</tr>
						<?php endforeach; ?>
						<tr>
							<td colspan="3" align="right"><b>Total:</b></td>
							<td><?php echo $total; ?></td>
      					</tr>
      					<tr>
							<td colspan="4" align="right"><a class="btn btn-success" href="submit_orders.php">Submit Orders</a></td>
      					</tr>
				</tbody>
			</table>
			

		</section>
	</article>
</div>

 	
 </body>
 </html>