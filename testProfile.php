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
  <div class="side_wrapper">
  <section class="about-dev">
    <header class="profile-card_header">
      <div class="profile-card_header-container">
        <div class="profile-card_header-imgbox">
          <img src="https://fsa.zobj.net/crop.php?r=MhlyYExpKF1buWwrZ5Ny2dFgnwM6wXjen2gXsHmJLxYpqxLajhE0b-Pdvz7PV2SarNlJXAYu8jizSIB5loD9usVXYFzdpnsfVUeIo4a-dDqlsSCA0bwANfVNQ3crP7KZGNa5F5KZlg1xQK9O" alt="Toy Story Aliens" />
        </div>
        <?php 

        if(isset($_POST['delete-reso'])){
              $start_time = $_POST['start_time'];
              $theatre_num = $_POST['theatre_num'];
              $account_number = $_SESSION['account_number'];
              $mysqli = new mysqli("localhost","root","","332project");
              $statement = "DELETE FROM `going_to` WHERE start_time = '".$start_time."' AND theatre_num = '".$theatre_num."' AND customer_account = '".$account_number."';";
               $stmt = $mysqli->prepare($statement);
              $stmt->execute();
              $stmt->close();

        }


  if($_SESSION['logged_in'] == true){
    ?>
    <div>
    
      <?php 
        $account_number = $_SESSION['account_number'];
        $fnme = "";
        $lname = "";
        $street = "";
        $city = "";
        $pc = "";
        $phone_number = "";
        $ccard = "";
        
        $mysqli = new mysqli("localhost","root","","332project");
        $statement = "SELECT first_name, last_name, street, city, pc, phone_number, email, credit_card FROM customer WHERE account_number = ".$_SESSION['account_number'].";";
        $stmt = $mysqli->prepare($statement);
        $stmt->execute();
        $stmt->bind_result($fname, $lname, $street, $city, $pc, $phone_number, $email,$ccard);
        $stmt->fetch();
        

      ?>
      <h1><?php echo $fname." ".$lname; ?> <span>Movie Watcher</span></h1>
      </div>
      </header>
      <div class="profile-card_about">
      <h2>Account Details </h2>
      <p>
      <br>
      <span class="account-details">Account Number:</span> <?php echo $account_number;?><br>
      <span class="account-details">Email:</span> <?php echo $email;?><br>
      <span class="account-details">Address:</span> <?php echo $street.", ".$city." ".$pc;?><br>
      <span class="account-details">Phone Number:</span> <?php echo $phone_number;?> <br>
      <span class="account-details">Credit Card:</span> <script type="text/javascript"> document.write(hideCard(<?php echo "'".$ccard."'"; ?>))</script>
    </p>
      <span class="account-details" id="upcoming"> Upcoming Movies:</span><br>
      <?php 
        $stmt->close();
        $movie_title = "";
        $start_time = "";
        $theatre_num = null;
        $complex_name = "";
        $tickets_reserved = null;
        $statement = "SELECT movie_title, start_time, theatre_num, complex_name, tickets_reserved FROM going_to WHERE customer_account = ".$_SESSION['account_number'].";";
        $stmt = $mysqli->prepare($statement);
        $stmt->execute();
        $stmt->bind_result($movie_title, $start_time, $theatre_num, $complex_name, $tickets_reserved);
        while($stmt->fetch()){
          /*Check if movie has passed - time > means movie has already passed*/
          ?>
          
          <?php
          if(strtotime($start_time) > time()){
       ?>
          <div class="box2 special">
            <div class="box2-title"><h4><?php echo $movie_title; ?></h4></div>
            <div class="box2-tickets"><?php echo $tickets_reserved." tickets reserved at ".$complex_name; ?></div>
            <div class="box2-when"><script type="text/javascript">document.write(getTime(<?php echo "'".$start_time."'"; ?>) + " " +getDate(<?php echo "'".$start_time."'"; ?>))</script></div>
            <form method="post" action="" class="small-form">
              <input type="hidden" name="start_time" value="<?php echo $start_time; ?>">
              <input type="hidden" name="theatre_num" value="<?php echo $theatre_num; ?>">
              <input type="submit" name="delete-reso" class="btn btn-danger" value="Delete Reservation">

            </form>

          </div>

       <?php }else{ ?>

          <div class="box2 allPurchases" style="display: none;">
            <div class="box2-title"><h4><?php echo $movie_title; ?></h4></div>
            <div class="box2-tickets"><?php echo $tickets_reserved." tickets reserved at ".$complex_name; ?></div>
            <div class="box2-when"><script type="text/javascript">document.write(getTime(<?php echo "'".$start_time."'"; ?>) + " " +getDate(<?php echo "'".$start_time."'"; ?>))</script></div>

          </div>

      <?php     }
      } ?>

      <button type="button" id="viewAllPurchasesButton" class="btn btn-default" onclick="showPurchases()">View All Purchases</button>
     

     
    
    <div>
    <?php
  }else{
    ?>
    <p id="profilePageError">
      <h2>Sorry! You do not have access to this page. Please log in to continue.</h2>
      <a href="login.php" id="profilePageLogInButton">Log In</a>
    </p>
    

    <?php
  }

  ?>

      <footer class="profile-card_footer">
        
        <p><a class="back-to-profile" href="editProfile.php">Edit Profile</a></p>
      </footer>
    </div>
  </section>
</div>
</body>
</html>