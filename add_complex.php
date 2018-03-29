<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'header-admin.php';?>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="./css/chantal.css">
	<link rel="stylesheet" type="text/css" href="./css/members.css">
	<title>Add Complex</title>
</head>

<body>


<div class="container">
  <span style="text-align: center;"><h3 >Add a Complex</h3></span>
  <form action="add_complex_process.php" method="post">
    <label >Complex Name</label>
    <input type="text" name="complex_name" placeholder="name">

    <label >Street</label>
    <input type="text" name="street" placeholder="street name">

    <label>City</label>
    <input type="text" name="city" placeholder="city name">

    <label >Postal Code</label>
    <input  type="text" name="pc" placeholder="postal code"></textarea> 

    <label>Phone Number</label>
    <input type="text" name="phone_num" placeholder="XXXXXXXXXX">

    <label>Theatre Number</label>
    <p>(Complex must have atleast one theatre)</p>
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