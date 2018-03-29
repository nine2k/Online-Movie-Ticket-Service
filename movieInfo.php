<!DOCTYPE html>
<html>
<head>
  <title>Gold City Movies</title>
  <?php require_once("header.php"); ?>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link rel="stylesheet" type="text/css" href="./css/chantal.css">
  <script type="text/javascript" src="./js/chantal.js"></script>
  
</head>
<body>
  <?php 
  if(isset($_POST['submit'])){

    $movie_title = $_POST['movie_title'];
    $_SESSION['movie_title'] = $movie_title;
     
   ?>

  
  
    <?php 
      $star_rating = null;
      
      $run_time = null;
      $pg_rating = "";
      $plot_synopsis = "";
      $production_company = "";
      $start_date = "";
      $end_date = "";
      $director_fname = "";
      $director_lname = "";
      $actor_fname = "";
      $actor_lname = "";
      $cover_img = "";

      $mysqli = new mysqli("localhost","root","","332project");

      $statement = "SELECT AVG(star_rating), run_time, pg_rating, plot_synopsis, production_company, start_date, end_date, director_fname, director_lname, cover_img FROM rates RIGHT JOIN movie ON movie_title = title WHERE title = '".$movie_title."' GROUP BY movie_title;";
      $stmt = $mysqli->prepare($statement);
      $stmt->execute();
      $stmt->bind_result($star_rating, $run_time, $pg_rating, $plot_synopsis, $production_company, $start_date, $end_date, $director_fname, $director_lname, $cover_img);
      $stmt->fetch();
      
    ?>
  <!-- Playlist Wrapper Start -->
<div class="wrapper position white shadow cf">

  <!-- Header Start -->
  <div class="row">

    <!-- Thumbnail Start -->
    <div class="col-3 tablet-col-persist shadow2">
      <img class="thumbnail" src="<?php echo $cover_img; ?>"/>
    </div>
    <!-- Thumbnail End -->

    <!-- About Start  -->
    <div class="col-9 tablet-col-persist padding-20 lh">

      <!-- Title Start -->
      <h4><?php echo $movie_title; ?><span class="label orange-red border"></span></h4>
      <!-- Title End -->

      <!-- Rating Start -->
      <div class="rating">

        <a href="reviews.php">
        <span class="a">☆</span><span class="a">☆</span><span class="a">☆</span><span  class="a">☆</span><span  class="a">☆</span><span  class="a">☆</span><span  class="a">☆</span><span  class="a">☆</span><span  class="a">☆</span><span  class="a">☆</span>
        <script type="text/javascript">colourStars(<?php echo $star_rating;?>);</script>
        </a><br>
        <a href="reviews.php"><button type="button" class="btn btn-default">Full Reviews</button></a>

      </div>
      <!-- Rating End -->

      <!-- Info Start -->
      <p><span class="account-details"><?php echo $pg_rating ?></span></p>
      <p><span class="account-details">Duration:</span> <?php echo $run_time; ?> min</p>
      <p><span class="account-details">Release Date:</span> <?php echo $start_date; ?> (CAN)</p>
      <p><span class="account-details">Director:</span> <?php echo $director_fname." ".$director_lname; ?></p>
      
      <p><span class="account-details">Starts:</span>
      <?php 
          $stmt->close();
          $statement2 = "SELECT actor_fname, actor_lname FROM acts_in WHERE movie_title = '".$movie_title."';";
          $stmt2 = $mysqli->prepare($statement2);
          $stmt2->execute();
          $stmt2->bind_result($actor_fname, $actor_lname);
          $stmt2->fetch();
          echo $actor_fname." ".$actor_lname;
          while($stmt2->fetch()){
            echo ", ".$actor_fname." ".$actor_lname." ";
          }
          $stmt2->close();

      ?>
      </p>
      <!-- Info End -->
      <div class= "showtimes">
        <h4 id= "showtimeHeader">SHOWTIMES</h4>
        <?php
        $start_time = "";
        $complex_name = "";
        $num_seats = null;
        $city = "";
        $theatre_num = null;

        $statement = "SELECT start_time, complex_name, num_seats, city, theatre_num FROM showing NATURAL JOIN theatre WHERE movie_title = '".$movie_title."';";
        $stmt = $mysqli->prepare($statement);
        $stmt->execute();
        $stmt->bind_result($start_time, $complex_name, $num_seats, $city, $theatre_num);

        while($stmt->fetch()){ 
          if(strtotime($start_time) > time()){ ?>
          <div class="box">
            
              <div class="box-title"><?php echo $complex_name; ?></div>
              <div class="box-city"><?php echo $city; ?></div>
              <div class="box-date"><script type="text/javascript">document.write(getDate(<?php echo "'".$start_time."'"; ?>))</script></div>
              <div class="box-time"><script type="text/javascript">document.write(getTime(<?php echo "'".$start_time."'"; ?>))</script></div>
              <?php
              if($num_seats == null || $num_seats < 1){ ?>
                <a href="ticketOrder.php" class="purchaseButton">Sold Out</a>
                <?php

              }else{ ?>
                
                <form method="post" action="ticketOrder.php" id="buttonForm">
                  <input type="hidden" name="start_time" value="<?php echo $start_time ?>">
                  <input type="hidden" name="theatre_num" value="<?php echo $theatre_num ?>">
                  <input type="hidden" name="complex_name" value="<?php echo $complex_name ?>">
                  <input type="submit" class="purchaseButton" name="ticketSubmit" value="Purchase Tickets">
                </form>
              
              <?php
              }
              ?>
              
              
          </div>
          <?php } }?>

      </div>




    </div>
    <!-- About End -->
  </div>
  <!-- Header End -->

  <?php }
  else{
      echo "We're sorry, an error occured!";
  }

?>

</div>
<!-- Playlist Wrapper End -->
</body>
</html>