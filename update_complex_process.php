<!DOCTYPE html>
<html>
<head>
	<?php include 'header-admin.php';?>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="./css/chantal.css">
	<link rel="stylesheet" type="text/css" href="./css/members.css">
	<title>Update Complex</title>
</head>

<body>
<?php
	$complex_name = $_POST["complex_name"];                      
	$street = $_POST["street"];
	$city = $_POST["city"];
	$pc = $_POST["pc"];
	$phone_num = $_POST["phone_num"];

	// Create connection
	$conn = new mysqli("localhost","root","","332project");
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "UPDATE theatre SET street = '$street', city = '$city', pc = '$pc', phone_num = '$phone_num' 
		WHERE complex_name = '$complex_name'";


	if ($conn->query($sql) === TRUE) { ?>
		<span style="text-align: center;">
			<h3>Complex Updated Successfully</h3>
		</span>	

	 <?php   
	} else {
	    echo "Complex could not be updated.";
	    
	}

	$conn->close();

?>



</body>