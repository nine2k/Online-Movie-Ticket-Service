<!DOCTYPE html>
<html>
<head>
	<?php include 'header-admin.php';?>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="chantal.css">
    <link rel="stylesheet" type="text/css" href="members.css">
    <title>Add Showing</title>
</head>

<body>
<?php
	$movie_title = $_POST["movie_title"];                      
	$start_time = $_POST["start_time"];
	$end_time = $_POST["end_time"];
	$theatre_num = $_POST["theatre_num"];
	$num_seats = $_POST["num_seats"];
	$complex_name = $_POST["complex_name"];

	// Create connection
	$conn = new mysqli("localhost","root","","332project");
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$sql = "INSERT INTO showing values('$movie_title','$start_time','$end_time',
		$theatre_num, $num_seats, '$complex_name')";


	if ($conn->query($sql) === TRUE) { ?>
	<span style="text-align: center;">
		<h3>Movie Added Successfully</h3>
		<a href="add_showings.php" style="margin-left: 44%"><button type="button" class="btn btn-default">Add Another Movie</button></a>
	</span>	
	<?php
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();

?>


</body>