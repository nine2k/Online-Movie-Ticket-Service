<?php
/* Main page with two forms: sign up and log in */
require 'db.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

  <head>
		<?php include 'css/include.html'; ?>
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
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
	        <li class="active"><a href="logged_in_test.php">All movies <span class="sr-only">(current)</span></a></li>
	        
	      </ul>
	      <form class="navbar-form navbar-left" method="GET">
	        <div class="form-group">
	          <input type="text" name = "movieName" class="form-control" placeholder="Search Movie">
	        </div>
	        <button type="submit" name ="search" class="btn btn-default">Search</button>
	      </form>

<?php
					if ($_SESSION['logged_in'] == true){
						echo "<ul class=\"nav navbar-nav navbar-right\">";
						echo "<li class=\"dropdown\">";
						echo "<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">Profile <span class=\"caret\"></span></a>";
						echo "<ul class=\"dropdown-menu\">";
						echo "<li><a href=\"testProfile.php\">View Profile</a></li>";
						echo "<li><a href=\"editProfile.php\">Edit Profile</a></li>";
						echo "<li role=\"separator\" class=\"divider\"></li>";
						echo "<li><a href=\"logout.php\">Logout</a></li>";
						echo "</ul>";
						echo "</li>";
						echo "</ul>";

					} else{
						echo "<ul class=\"nav navbar-nav navbar-right\">";
						echo "<li><a href=\"register.php\"><span class=\"glyphicon glyphicon-user\"></span> Sign Up</a></li>";
						echo "<li><a href=\"login.php\"><span class=\"glyphicon glyphicon-log-in\"></span> Login</a></li>";
						echo "</ul>";
					}
				 ?>

				 <!--
	      <ul class="nav navbar-nav navbar-right">
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profile <span class="caret"></span></a>
	          <ul class="dropdown-menu">
							<li><a href="testProfile.php">View Profile</a></li>
	            <li><a href="#">Edit Profile</a></li>
							<li role="separator" class="divider"></li>
	            <li><a href="#">Logout</a></li>
	          </ul>
	        </li>
	      </ul>
				-->

	    </div><!-- /.navbar-collapse -->
			<?php
			if(isset($_GET['search'])){
				$movie_title = $_GET['movieName'];
				$min_length = 3;
				if(strlen($movie_title)>= $min_length){
					$raw_results = mysqli_query($mysqli,"SELECT title, run_time, plot_synopsis,Cover_img FROM Movie WHERE (title LIKE '%".$movie_title."%') OR (plot_synopsis LIKE '%".$movie_title."%')") or die(mysqli_error($mysqli));
					if (mysqli_num_rows($raw_results)>0){ //if one or more rows are returned
						while ($results=mysqli_fetch_array($raw_results)){
							echo "<div class=\"col-sm-4\">";
							echo "<div class=\"card\" style=\"width:18rem;\">";
								$image_url=$results["Cover_img"];

								#echo "<div class = \"card-img-top\" style=\"content:url(".$image_url.");width:80%;object-fit:cover; padding-top:10px;\">";
								echo "<img src = \"".$image_url."\">";
								echo "<div class=\"card-body\">";
								echo "<h5 class=\"card-title\">" . $results["title"] . "</h5>";
								echo "<p class=\"card-text\">Run Time: ". $results["run_time"] . "</p>";
								?>
								<form action="movieInfo.php" method = "post">
								<!--echo "<a href = \"#\" class=\"btn btn-primary\">See movie details</a>";-->
									<input type= "hidden" name="movie_title" value="<?php echo $results["title"];?>">
									<input type="submit" name = "submit" value="See movie details" class ="btn btn-primary">

								</form>
								<?php
								echo "</div>";
								echo "</div>";

							echo "</div>";

						} //end while

					} else{
						echo "No results";
					}
				}else{
					echo "Minimum search length is ".$min_length;
				}
			} #end if
			?>

	  </div><!-- /.container-fluid -->
	</nav>
