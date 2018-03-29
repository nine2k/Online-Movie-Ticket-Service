<!DOCTYPE html>
<html>
<head>
	<?php include 'header-admin.php';?>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="./css/chantal.css">
    <link rel="stylesheet" type="text/css" href="./css/members.css">
    <title>Add Movie</title>
</head>

<body>
<?php
	$title = $_POST["title"];                      
	$run_time = $_POST["run_time"];
	$pg_rating = $_POST["pg_rating"];
	$plot_synopis = $_POST["plot_synopsis"];
	$production_company = $_POST["production_company"];
	$supplier = $_POST["supplier"];
	$start_date = $_POST["start_date"];
	$end_date = $_POST["end_date"];
	$director_fname = $_POST["director_fname"];
	$director_lname = $_POST["director_lname"];
	$Cover_img = $_POST["Cover_img"];

	// Create connection
	$conn = new mysqli("localhost","root","","332project");
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "INSERT INTO movie values ('$title',$run_time,'$pg_rating','$plot_synopis','$production_company',
	'$supplier','$start_date','$end_date','$director_fname','$director_lname','$Cover_img')";

	if ($conn->query($sql) === TRUE) { ?>
	    <span style="text-align: center;">
			<h3>Movie Added Successfully</h3>
		<a href="add_movies.php" style="margin-left: 44%"><button type="button" class="btn btn-default">Add Another Movie</button></a>
	</span>	


	<?php    
	} else {
	    echo "Cannot Add Movie";
	}

	$conn->close();

?>


</body>