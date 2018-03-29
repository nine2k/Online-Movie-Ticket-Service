<!DOCTYPE html>
<html>

<head>
	<title>Gold City Movies</title>
		<?php require_once("header.php"); ?>
	   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	  <link rel="stylesheet" type="text/css" href="./css/chantal.css">
	  <link rel="stylesheet" type="text/css" href="./css/reviews.css">
	  <script type="text/javascript" src="./js/chantal.js"></script>
	  
</head>

<body>
	<div class="wrapper position white shadow cf">
		<div class="row">

	<div class="col-sm-8">
		<?php
		$movie_title = $_SESSION['movie_title'];    
		if(isset($_POST['submitForm'])){ //check if form was submitteds
		  
		  $review = $_POST['review'];
		  $star_rating = $_POST['star_rating'];
		  $account_number = $_SESSION['account_number'];
		  $mysqli = new mysqli("localhost","root","","332project");
			if($mysqli->connect_error){
				die("Connection Failed: ".$mysqli->connect_error);
			}

			$stmt = $mysqli->prepare("INSERT INTO `rates` VALUES ('$account_number', '$movie_title', $star_rating, '$review');");

			$stmt->execute();
			$stmt->close();
			
	 
		}
		?>
	
		<?php 
			$star_rating = null;
			


			$mysqli = new mysqli("localhost","root","","332project");

			$statement = "SELECT AVG(star_rating) FROM rates WHERE movie_title = '".$movie_title."' GROUP BY movie_title";
			$stmt = $mysqli->prepare($statement);
			$stmt->execute();
			$stmt->bind_result($star_rating);
			$stmt->fetch();
		?>

		<h1 style="text-align: center;"><?php echo $movie_title;?></h1>

		<?php 
			$stmt->close();
			$review = "";
			$reviewer_name = "";
			$reviewer_city ="";
			$statement = "SELECT first_name, city, star_rating, review FROM rates JOIN customer ON customer_account = account_number WHERE movie_title = '".$movie_title."';";
			$stmt = $mysqli->prepare($statement);
			$stmt->execute();
			$stmt->bind_result($reviewer_name, $reviewer_city, $star_rating, $review);

			while($stmt->fetch()){ ?>
				<div class="box2">
					<p>
						<span class="account-details"><?php echo $star_rating."/10 "; ?></span>
						<span class="account-details"><?php echo $reviewer_name." from ".$reviewer_city; ?></span>
					</p>
					<p>
						<?php echo $review; ?>
					</p>
				</div>

		<?php	}
			$stmt->close();

				
		 ?>
</div>
<div class="col-sm-4">
	
			   

		<form id="review-form" action="" method="post">
		  <h2>Write Your Review</h2>

		  <label class="radio-container">0
		  <input type="radio" name="star_rating" id="val0" value="0"><span class="checkmark"></span></label>
		  <label class="radio-container">1
		  <input type="radio" name="star_rating" id="val1" value="1"><span class="checkmark"></span></label>
		  <label class="radio-container">3
		  <input type="radio" name="star_rating" id="val3" value="3"><span class="checkmark"></span></label>
		  <label class="radio-container">4
		  <input type="radio" name="star_rating" id="val4" value="4"><span class="checkmark"></span></label>
		  <label class="radio-container">5
		  <input type="radio" name="star_rating" id="val5" value="5"><span class="checkmark"></span></label>
		  <label class="radio-container">6
		  <input type="radio" name="star_rating" id="val6" value="6"><span class="checkmark"></span></label>
		  <label class="radio-container">7
		  <input type="radio" name="star_rating" id="val7" value="7"><span class="checkmark"></span></label>
		  <label class="radio-container">8
		  <input type="radio" name="star_rating" id="val8" value="8"><span class="checkmark"></span></label>
		  <label class="radio-container">9
		  <input type="radio" name="star_rating" id="val9" value="9"><span class="checkmark"></span></label>
		  <label class="radio-container">10
		  <input type="radio" name="star_rating" id="val10" value="10"><span class="checkmark"></span></label>


		  <span id="starsInfo" class="help-block">
		    Click on a circle to change your rating 1 - 10, where 10 = great! and 1 = really bad
		  </span>
		  <div class="form-group">
		    <label class="control-label" for="review">Your Review (Optional):</label>
		    <textarea class="form-control" rows="10" placeholder="Your Review" name="review" id="review"></textarea>
		    <span id="reviewInfo" class="help-block pull-right">
		      
		    <br>
		   <?php 
		   if($_SESSION['logged_in'] == true){ ?>

		   		<button type="submit" class="btn btn-primary" name="submitForm">Submit</button>
		   		<span id="submitInfo" class="help-block">
		   		 By clicking <strong>Submit</strong>, I authorize the sharing of my name and review on the web.
		  		</span>

		   <?php }else{
		    ?>
		  		<button type="submit" class="btn btn-primary" disabled>Submit</button>
		  		<span id="submitInfo" class="help-block">
		    	You must be logged in to submit a review.
		  		</span>

		  <?php } ?>
		  

		</form>




</div>
</div>
</body>
</html>