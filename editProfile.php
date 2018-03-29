<?php include "header.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Gold City Movies</title>

    <meta name="keywords" content="movie,theatre,login" />
    <meta name="description" content="Login to purchase tickets" />
    <link rel="icon" href="">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <script src="./js/jquery-1.11.3.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <link rel="stylesheet" rev="stylesheet" type="text/css" media="all" href="./css/login.css">
		<?php include 'css/include.html'; ?>
    <script src="./js/jquery.validate.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="http://apps.bdimg.com/libs/html5shiv/3.7/html5shiv.min.js"></script>
    <script src="http://apps.bdimg.com/libs/respond.js/1.4.2/respond.js"></script>
    <![endif]-->
</head>
<body>
	<div class="container">
    <h1 class="well">Edit Profile</h1>
	<div class="col-lg-12 well">
	<div class="row">


	<?php	
		if(isset($_POST['update-submit'])){

			$account_number = $_SESSION['account_number'];
	        $fname = $_POST['first_name'];
	        $lname = $_POST['last_name'];
	        $street = $_POST['street'];
	        $city = $_POST['city'];
	        $pc = $_POST['pc'];
	        $phone_number = $_POST['phone_number'];
	        $ccard = $_POST['card-number'];
	        $card_expiry = $_POST['card-expiry'];
	        $email = $_POST['email'];



	        $mysqli = new mysqli("localhost","root","","332project");
        	$statement = "UPDATE customer SET first_name = '".$fname."', last_name = '".$lname."', street = '".$street."', city = '".$city."', pc = '".$pc."', phone_number = '".$phone_number."', credit_card = '".$ccard."', card_expiry = '".$card_expiry."', email = '".$email."' WHERE account_number = '".$account_number."';";
	        $stmt = $mysqli->prepare($statement);
	        $stmt->execute();
	        $stmt->close();


		}		

	?>


	<?php 

        			
		$fname = "";
        $lname = "";
        $street = "";
        $city = "";
        $pc = "";
        $phone_number = "";
        $ccard = "";
        $card_expiry = "";
        $email = "";

        $mysqli = new mysqli("localhost","root","","332project");
        $statement = "SELECT first_name, last_name, street, city, pc, phone_number, email, credit_card, card_expiry FROM customer WHERE account_number = ".$_SESSION['account_number'].";";
        $stmt = $mysqli->prepare($statement);
        $stmt->execute();
        $stmt->bind_result($fname, $lname, $street, $city, $pc, $phone_number, $email,$ccard, $card_expiry);
        $stmt->fetch();
        $stmt->close();

      ?>	
				<form method="post" action="">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>First Name</label>
								<input type="text" name="first_name" value="<?php echo $fname; ?>" class="form-control">
							</div>
							<div class="col-sm-6 form-group">
								<label>Last Name</label>
								<input type="text" name="last_name" value="<?php echo $lname; ?>" class="form-control">
							</div>
							
						</div>
						<div class="form-group">
							<label>Street Address</label>
							<input type="text" name="street" value="<?php echo $street; ?>" rows="3" class="form-control">
						</div>
						<div class="row">
							<div class="col-sm-4 form-group">
								<label>City</label>
								<input type="text" name="city" value="<?php echo $city; ?>" class="form-control">
							</div>
							<div class="col-sm-4 form-group">
								<label>Postal Code</label>
								<input type="text" name="pc" value="<?php echo $pc; ?>" class="form-control">
							</div>
						</div>
					<div class="form-group">
						<label for "tel">Phone Number</label>
						<input type="text" name="phone_number" value="<?php echo $phone_number; ?>" class="form-control">
					</div>
					<div class="form-group">
			        <label for="email">Email </label>
			        <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
			    </div>
					<div class="form-group">
						<label class="col-sm-3 control-label" for="card-number">Credit Card Number</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="card-number" id="card-number" value="<?php echo $ccard; ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label" for="expiry-month">Expiration Date</label>
						<div class="col-sm-9">
							
							<input type="text" class="form-control" name="card-expiry" id="card-number" value="<?php echo $card_expiry; ?>">

						</div>
					</div>
					<input type="submit" class="btn btn-lg btn-info" name="update-submit" value="Update">
					
					</div>
				</form>
				</div>


	</div>
	</div>

</body>
</html>
