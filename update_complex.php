<!DOCTYPE html>
<html lang="en">
<head>
  <?php include 'header-admin.php';?>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="./css/chantal.css">
	<link rel="stylesheet" type="text/css" href="./css/members.css">
  <link rel="stylesheet" type="text/css" href="./css/admin.css">
	<title>Update Complex</title>
</head>

<body>


<div class="container">
  <span style="text-align: center;"><h3 >Update Complex Information</h3></span>
  <form action="update_complex_process.php" method="post">
    <div class="radio-buttons">
    <?php
      $mysqli = new mysqli("localhost","root","","332project");
      $complex_name = "";
      $statement = "SELECT DISTINCT complex_name FROM theatre;";
      $stmt = $mysqli->prepare($statement);
      $stmt->execute();
      $stmt->bind_result($complex_name);

      while($stmt->fetch()){ ?>
        <label class="radio-container"><?php echo $complex_name; ?>
        <input type="radio" name="complex_name" value="<?php echo $complex_name; ?>"><span class="checkmark"></span></label>

    <?php
      }
      $stmt->close();

    ?>
  </div>
   <!-- <label >Complex Name</label>
    <input type="text" name="complex_name" placeholder="complex name"> -->

    <label class="after-radio">Street</label>
    <input type="text" name="street" placeholder="street name">

    <label>City</label>
    <input type="text" name="city" placeholder="city name">

    <label >Postal Code</label>
    <input type="text" name="pc" placeholder="XXXXXX">

    <label >Phone Number</label>
    <input type="text" name="phone_num" placeholder="XXXXXXXXXX">

    <input type="submit" value="Update">
  </form>

</div>

</body>
</html>