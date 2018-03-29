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
	<title>Add Theatre</title>
</head>

<body>



<div class="container">
  <span style="text-align: center;"><h3 >Add a Theatre</h3></span>
  <form action="add_theatre_process.php" method="post">

    <div class="radio-buttons">
    <?php
        $mysqli = new mysqli("localhost","root","","332project");
        $complex_name = "";
        $street = "";
        $city = "";
        $pc = "";
        $phone_num = "";
        
        $statement = "SELECT DISTINCT complex_name, street, city, pc, phone_num FROM theatre;";
        $stmt = $mysqli->prepare($statement);
        $stmt->execute();
        $stmt->bind_result($complex_name, $street, $city, $pc, $phone_num);

        while($stmt->fetch()){ ?>
          <label class="radio-container"><?php echo $complex_name; ?>


            <input type="hidden" name="street" value="<?php echo $street; ?>">

            <input type="hidden" name="city" value="<?php echo $city; ?>">

            <input  type="hidden" name="pc" value="<?php echo $pc; ?>">

            <input type="hidden" name="phone_num" value="<?php echo $phone_num; ?>">

          <input type="radio" name="complex_name" value="<?php echo $complex_name; ?>" ><span class="checkmark"></span></label>

    <?php
        }
        $stmt->close();

    ?>
  </div>

    <label>Theatre Number</label>
    <input type="text"  name="theatre_num" placeholder="number">

    <label>Max Seats</label>
    <input type="text" name="max_seats" placeholder="number">

    <label>Screen Size</label>
    <input type="text" name="screen_size" placeholder="s / m / l">
  
    <input type="submit" value="Add">
  </form>

</div>


</body>
</html>