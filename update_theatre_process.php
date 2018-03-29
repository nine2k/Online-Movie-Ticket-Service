<!DOCTYPE html>
<html>
<head>
	<?php include 'header-admin.php';?>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="./css/chantal.css">
	<link rel="stylesheet" type="text/css" href="./css/members.css">
	
	<title>Update Theatre</title>
</head>

<body>
<?php
	$complex_name = $_POST["complex_name"];                      
	$theatre_num = $_POST["theatre_num"];
	$max_seats = $_POST["max_seats"];
	$screen_size = $_POST["screen_size"];

	// Create connection
	$conn = new mysqli("localhost","root","","332project");
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "UPDATE theatre SET max_seats = $max_seats, screen_size = '$screen_size' 
		WHERE complex_name = '$complex_name' and theatre_num = $theatre_num";

	if ($conn->query($sql) === TRUE) { ?>
		<span style="text-align: center;">
			<h3>Theatre Updated Successfully</h3>
		</span>	

	<?php
	} else {
	    echo "Theatre could not be updated";
	}

	$conn->close();

?>



</body>