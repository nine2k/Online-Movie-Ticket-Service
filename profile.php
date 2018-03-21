<?php
/* Displays user information and some useful messages */
session_start();

// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: error.php");
}
else {
    // Makes it easier to read
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Welcome <?= $first_name.' '.$last_name ?></title>
  <?php include 'css/css.html'; ?>
</head>

<body>
  <div class="form">

          <h1>Welcome</h1>
					<p>
					<?php

					// Display message about account verification link only once
					if ( isset($_SESSION['message']) )
					{
							echo $_SESSION['message'];

							// Don't annoy the user with more messages upon page refresh
							unset( $_SESSION['message'] );
					}

					?>
					</p>

          <h2><?php echo $first_name.' '.$last_name; ?></h2>
          <p><?= $email ?></p>
					
					<a href="home.php"><button class="button" name="home"/>Home Page</button></a>
					<a href="logout.php"><button class="button" name="logout"/>Log Out</button></a>

    </div>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>

</body>
</html>