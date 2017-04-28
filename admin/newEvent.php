<?php
session_start(); 
if(!isset($_SESSION['auth'])) {
  header("location: ../index.php");
  exit(); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Dashboard</title>
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>
<body>
	<?php include "header.php"; ?>
  <center><h1>Create New Event</h1></center>

  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <center>
        <div id="imgDiv">
        </div>
      </center>
      <form action="addEvent.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="name">Event name</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="" required>
        </div>
        <div class="form-group">
          <label for="date">Event date</label>
          <input type="date" class="form-control" id="date" name="date" required>
        </div>

        <div class="form-group">
          <label for="category_id">Category</label>

          <select name="category_id" id="category_id" class="form-control" required>

            <option value="0">-- Choose event type--</option>
            <?php 
            require 'eventTypeProcess.php';
            $categories = readEventType();
            ?>

            <?php foreach ($categories as $category): ?>
              <option value="<?php echo $category->event_type_id; ?>">
                <?php echo $category->event_type_name; ?>
              </option>
            <?php endforeach ?>

          </select>
        </div>

        <div class="form-group">
          <label for="description">Description</label>
          <textarea name="description" class="form-control" id="description" cols="20" rows="10"></textarea>
        </div>

        <div class="form-group">
          <label for="price">Ticket price</label>
          <input type="text" name="price" class="form-control" id="price" required>
        </div>

        <div class="form-group">
          <label for="cover">Event image</label>
          <input type="file" name="cover" class="form-control" id="cover">
        </div>
        
        <button name="btnlogin" value="Login" type="submit" class="btn btn-primary">Create</button>
        <button type="reset" class="btn btn-danger" name="btncancel" value="Exit">Clear</button>

      </form>
      <br>
      <br>
    </div>
    <div class="col-md-3"></div>
    

  </div>
</body>
</html>