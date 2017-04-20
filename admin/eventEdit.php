<?php 
include 'auth.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit Event</title>
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>
<body>
	<?php include "header.php"; ?>
  <?php 
  require 'connectdb.php';

  $id = $_GET['event_id'];
  $result = mysqli_query($mysqli,"SELECT * FROM event WHERE event_id = $id");
  $row = mysqli_fetch_assoc($result);
  ?>
  <center><h1>Edit Event</h1></center>

  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">

      <form action="updateEvent.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $row['event_id']; ?>">
        <div class="form-group">
          <label for="name">Event name</label>
          <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['event_name']; ?>" required>
        </div>

        <div class="form-group">
          <label for="category_id">Category</label>

          <select name="category_id" id="category_id" class="form-control">

            <option value="0">-- Choose event type--</option>
            <?php 
            require 'eventTypeProcess.php';
            $categories = readEventType();
            ?>
            <?php foreach ($categories as $category): ?>
              <option value="<?php echo $category->event_type_id; ?>">
                <?php if ($category->event_type_id == $row['event_type_id']) echo "selected"; ?>
                <?php echo $category->event_type_name; ?>
              </option>
            <?php endforeach ?>

          </select>
        </div>

        <div class="form-group">
          <label for="description">Description</label>
          <textarea name="description" class="form-control" id="description" cols="20" rows="10"><?php echo $row['event_description']; ?></textarea></textarea>
        </div>

        <div class="form-group">
          <label for="price">Ticket price</label>
          <input type="text" name="price" class="form-control" id="price" value="<?php echo $row['ticket_price']; ?>">
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