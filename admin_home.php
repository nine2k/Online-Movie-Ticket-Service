<!DOCTYPE html>
<html lang="en">
<html>
<head>
		<?php include 'css/include.html'; ?>
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
</head>
<body>
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="logged_in_test.php">GoldCity Movies</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li class="active"><a href="admin_home.php">Administrator Home Page <span class="sr-only">(current)</span></a></li>
					<li class="active"><a href="logged_in_test.php">Movies Home Page <span class="sr-only">(current)</span></a></li>
	      </ul>

				<ul class="nav navbar-nav navbar-right">
				<div class="dropdown">
			  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    Members Information
			  </button>
			  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
			    <a class="dropdown-item" href="members.php">Search + Edit Members</a>
			  </div>
			</div>
			 </ul>

	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	<a href="add_movies.php"><button type="button" class="btn btn-success float-right" style ="margin-left:50px;">Add Movie</button></a>
	<a href="add_theatre.php"><button type="button" class="btn btn-success float-right">Add Theatre</button></a>
	<a href="add_complex.php"><button type="button" class="btn btn-success float-right">Add Complex</button></a>
	<a href="add_showings.php"><button type="button" class="btn btn-success float-right">Add Showing</button></a>
	<a href="update_complex.php"><button type="button" class="btn btn-success float-right">Update Complex Information</button></a>
	<a href="update_theatre.php"><button type="button" class="btn btn-success float-right">Update Theatres Information</button></a>
	<br>
	<br>




<?php

// Create connection
$conn = new mysqli("localhost","root","","332project");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql_complex = "SELECT
    complex_name
FROM
    (
    SELECT
        complex_name,
        SUM(tickets_reserved) AS A1
    FROM
        going_to
    GROUP BY
        complex_name
) AS T
where A1 IN
(SELECT
    MAX(A1) AS A2
FROM
    (
    SELECT
        complex_name,
        SUM(tickets_reserved) AS A1
    FROM
        going_to
    GROUP BY
        complex_name
) as T)";

$sql_num_tickets = "SELECT
    MAX(A1) AS A2
FROM
    (
    SELECT
        complex_name,
        SUM(tickets_reserved) AS A1
    FROM
        going_to
    GROUP BY
        complex_name
) as T";

echo "";

$complex_result = $conn->query($sql_complex);
if ($complex_result->num_rows > 0) {
    // output data of each row
    while($row = $complex_result->fetch_assoc()) {
			echo "<div class=\"card\">";
		 	echo "<div class=\"card-header\">";
		 	echo "Complex Analytics";
		 	echo "</div>";
		 	echo "<div class=\"card-body\">";
		 	echo "<blockquote class=\"blockquote mb-0\">";
			echo "<p>The most popular complex is ".$row["complex_name"]. "</p>";

    }
} else {
		echo "<div class=\"card\">";
		echo "<div class=\"card-header\">";
		echo "Movie Analytics";
		echo "</div>";
		echo "<div class=\"card-body\">";
		echo "<blockquote class=\"blockquote mb-0\">";
			echo "<p>The most popular movie is</p>";
			echo "<footer class=\"blockquote-footer\"> 0 complex results</footer>";
			echo "</blockquote>";
			echo "</div>";
			echo "</div>";
}

$complex_tickets_result = $conn->query($sql_num_tickets);
if ($complex_tickets_result->num_rows > 0) {
    // output data of each row
    while($row = $complex_tickets_result->fetch_assoc()) {
			echo "<footer class=\"blockquote-footer\">Number of movie tickets sold is: ". $row["A2"] ."</footer>";
			echo "</blockquote>";
			echo "</div>";
			echo "</div>";

    }
} else {
    echo "0 number of tickets results";
}

$sql_movie = "SELECT
    movie_title
FROM
    (
    SELECT
        movie_title,
        SUM(tickets_reserved) AS A1
    FROM
        going_to
    GROUP BY
        movie_title
) AS T
where A1 IN
(SELECT
    MAX(A1) AS A2
FROM
    (
    SELECT
        movie_title,
        SUM(tickets_reserved) AS A1
    FROM
        going_to
    GROUP BY
        movie_title
) as T)";

$sql_num_tickets2 = "SELECT
    MAX(A1) AS A2
FROM
    (
    SELECT
        movie_title,
        SUM(tickets_reserved) AS A1
    FROM
        going_to
    GROUP BY
        movie_title
) as T";

$movie_result = $conn->query($sql_movie);
if ($movie_result->num_rows > 0) {
    // output data of each row
    while($row = $movie_result->fetch_assoc()) {
			echo "<div class=\"card\">";
			echo "<div class=\"card-header\">";
			echo "Movie Analytics";
			echo "</div>";
			echo "<div class=\"card-body\">";
			echo "<blockquote class=\"blockquote mb-0\">";
				echo "<p>The most popular movie is ".$row["movie_title"]. "</p>";


    }
} else {

		echo "<div class=\"card\">";
		echo "<div class=\"card-header\">";
		echo "Movie Analytics";
		echo "</div>";
		echo "<div class=\"card-body\">";
		echo "<blockquote class=\"blockquote mb-0\">";
			echo "<p>The most popular movie is</p>";
			echo "<footer class=\"blockquote-footer\"> 0 movie_title results</footer>";
			echo "</blockquote>";
			echo "</div>";
			echo "</div>";

}

$movie_tickets_result = $conn->query($sql_num_tickets2);
if ($movie_tickets_result->num_rows > 0) {
    // output data of each row
    while($row = $movie_tickets_result->fetch_assoc()) {
			echo "<footer class=\"blockquote-footer\">Number of movie tickets sold is: ". $row["A2"] ."</footer>";
			echo "</blockquote>";
			echo "</div>";
			echo "</div>";

    }
} else {
    echo "0 number of tickets results";
}

?>

</body>
</html>
