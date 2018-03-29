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
  <script type="text/javascript" src="./js/chantal.js"></script>
	<title>Update Theatre</title>
</head>

<body>



<div class="container">
  <span style="text-align: center;"><h3 >Update Theatre Information</h3></span>
  <form action="update_theatre_process.php" method="post">

    <div class="radio-buttons">
    <?php
        $mysqli = new mysqli("localhost","root","","332project");
        $complex_name = "";
        $num = null;
        $statement = "SELECT DISTINCT complex_name, count(theatre_num) FROM theatre GROUP BY complex_name;";
        $stmt = $mysqli->prepare($statement);
        $stmt->execute();
        $stmt->bind_result($complex_name, $num);

        while($stmt->fetch()){ ?>
          <label class="radio-container"><?php echo $complex_name; ?>
          <input type="radio" name="complex_name" value="<?php echo $complex_name; ?>" onclick="theatreRadios(<?php echo $num; ?>);"><span class="checkmark"></span></label>

    <?php
        }
        $stmt->close();

    ?>
  </div>
  <label >Theatre Number</label>
  <div class="radio-buttons" id="hidden-radio">

  </div>



    <label>Max Seats</label>
    <input type="text" name="max_seats" placeholder="number">

    <label >Screen Size</label>
    <input type="text" name="screen_size" placeholder="s / m / l">


  
    <input type="submit" value="Update">
  </form>

</div>


</body>
</html>